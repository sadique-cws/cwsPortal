<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;
use DateTime;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $this->generate_payment();
        $data['countStudent'] = Student::all()->count();
        $data['due_payment'] = Payment::where("status","due")->get();
        return view("admin/dashboard",$data);
    }
   
    public function managePayment(Request $req){
        if($req->segment(4)=="paid"){
            $data['payment'] = Payment::where("status","paid")->get();
        }
        else{
            $data['payment'] = Payment::where("status","due")->get();
        }
        return view("admin/managePayment",$data);
    }

    // generate payment
    public function generate_payment(){
        $students  = Student::where("status","1")->get();
        $now = new DateTime();
        
        foreach($students as $student){
            $dateOfJoin = new DateTime($student->created_at);
            $start_year = $dateOfJoin->format("Y");
            $nowYear = $now->format("Y");
            
            for($year = $start_year; $year <= $nowYear;$year++){
                if($start_year == $nowYear){
                    $start_month = $dateOfJoin->format("m");
                    $end_month = $now->format("m");
                }
                elseif($year==$start_year){
                    $start_month = $dateOfJoin->format("m");
                    $end_month = 12;
                }
                elseif($year == $nowYear){
                    $start_month = 01;
                    if($now->format("d") > $dateOfJoin->format("d")){
                        $end_month = $now->format("m");
                    }
                    else{
                        $end_month = $now->format("m")-1;
                    }
                }
                else{
                    $start_month = 01;
                    $end_month = 12;
                }
            for($month = $start_month; $month <= $end_month; $month++){
                //loop iterate for due months  
                $result = new DateTime("$year-$month-".$dateOfJoin->format('d'));
                $newDate = $result->format("Y-m-d");
                $student_id = $student->id;

                $payment = Payment::where([["student_id",$student_id],['due_date',$newDate]])->get();

                if($payment->count() == 0){
                    // create payment record here
                    $newPay = new Payment();
                    $newPay->student_id = $student_id;
                    $newPay->amount = 700;
                    $newPay->due_date = $newDate;
                    $newPay->save();
                
                }
            }


            }
        }
    }

    static public function makeCashPayment($std_id,$id){
        $std = Student::find($std_id);

        if($std){
            $payment  = Payment::where([["student_id",$std->id],["id",$id]])->first();
            $payment->status = "paid";
            $payment->save();
        }
        return redirect()->route("admin.dashboard");
    }
    

    public function approveStudent($id){
        $std = Student::find($id);
        $std->status = "1";
        $std->save();
        return redirect()->route("admin.manage.student.active");
    }
    public function passoutStudent($id){
        $std = Student::find($id);
        $std->status = "2";
        $std->save();
        return redirect()->route("admin.manage.student.passout");
    }
    
}
