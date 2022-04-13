<?php

namespace App\Http\Controllers;
use App\Models\{Student,Payment};
use Illuminate\Http\Request;

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
}
