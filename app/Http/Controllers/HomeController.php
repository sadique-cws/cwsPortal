<?php

namespace App\Http\Controllers;
use App\Models\{Student,Payment};
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use PaytmWallet;

class HomeController extends Controller
{
    public function index(){
        return view("homepages/home");
    }
    public function courses(){
        return view("homepages/courses");
    }
    public function apply(Request $req){
        if ($req->method() == "POST"){
            $data  = $req->validate([
                'name'=>'required',
                'father_name'=>'required',
                'contact'=>'required',
                'email'=>'required',
                'dob'=>'required',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'education'=>'required',
            ]);

            Student::create($data);
            return redirect()->route("homepage");

        }
        return view("homepages.apply");
    }
    public function contact(){
        return view("homepages.contact");
    }
    public function onlinePayment(Request $req){
        $data["payment"]  = [];
        if($req->method() == "POST"){
            $contact = $req->contact;
            $std = Student::where("contact",$contact)->first();
            if($std){
                $data['payment'] = Payment::where("student_id",$std->id)->get();
            }
        }
       
        return view("homepages.onlinePayment",$data);
    }

    public function makePayment(Request $req)
    {
        $contact = $req->contact;
        $std = Student::where("contact",$contact)->first();
        $pay = Payment::find($req->pay_id);
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $pay->id,
          'user' => $std->id,
          'mobile_number' => $std->contact,
          'email' => $std->email,
          'amount' => $pay->amount,
          'callback_url' => "http://localhost:8000/online-payment/call-back"
        ]);
        return $payment->receive();
    }

  

    
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){
            $order_id = $response['ORDERID'];
            $paymentRecord = Payment::find($order_id);
            $studentRecord = Student::find($paymentRecord->student_id);
            AdminController::makeCashPayment($studentRecord->id,$paymentRecord->id);
            return redirect()->back();

        }else if($transaction->isFailed()){
          echo "failed";
        }else if($transaction->isOpen()){
          echo "processing";
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }    
}
