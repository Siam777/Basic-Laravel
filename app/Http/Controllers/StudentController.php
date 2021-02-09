<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function student(){
    	return view('student.create');
    }
    public function store(Request $request){
    	$validateData = $request->validate([
       'name' => 'required|max:25|min:4',
       'phone' => 'required|unique:students|max:12|min:9',
       'email' => 'required|unique:students'
   	    ]);

   	    $student = new Student;
   	    $student->name = $request->name;
   	    $student->phone = $request->phone;
   	    $student->email = $request->email;

   	   // return response()->json($student);
   	    $student->save();

   	    	$notification = array(
   	  		'message'=>'Successfully done',
   	  		'alert-type'=>'success'
   	  	);

   	  return Redirect()->back()->with($notification);
    }
}
