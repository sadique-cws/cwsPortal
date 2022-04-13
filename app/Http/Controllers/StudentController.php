<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function index(){
        $data['students'] = Student::where("status","1")->get();
        $data['title'] = "Active";
        return view("admin/manageStudents",$data);
    }
    public function newAdmission(){
        $data['students'] = Student::where("status","0")->get();
        $data['title'] = "New Admission";
        return view("admin/manageStudents",$data);
    }
    public function passOut(){
        $data['students'] = Student::where("status","2")->get();
        $data['title'] = "Pass Out";
        return view("admin/manageStudents",$data);
    }
}
