<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function studentCreate(){
        return view('admin.student_create');
    }

    public function studentCreatePost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'user_id' => 'required|unique:users',
            'password' => 'required|same:confirm_password|min:6',
        ]);

        $student = new User();
        $student->name = $request->name;
        $student->email =  $request->name;
        $student->user_id =  $request->user_id;
        $student->password =  Hash::make($request->password);
        $student->save();
        return back()->withNotify('Student Create Successfully');
    }
    
    public function faculityCreate(){
        return view('admin.faculity_create');
    }

    public function faculityCreatePost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'user_id' => 'required|unique:users',
            'password' => 'required|same:confirm_password|min:6',
        ]);

        $faculity = new User();
        $faculity->name = $request->name;
        $faculity->email =  $request->name;
        $faculity->user_id =  $request->user_id;
        $faculity->password =  Hash::make($request->password);
        $faculity->user_type = 'faculty';
        $faculity->save();
        return back()->withNotify('Faculity Create Successfully');
    }
     public function courseCreate(){
        $faculity = User::whereUser_type('faculty')->get();
        return view('admin.course_create',compact('faculity'));
    }

    public function courseCreatePost(Request $request){
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'course_id' => 'required|unique:courses',
            'section' => 'required',
        ]);

        $student = new Course();
        $student->user_id = $request->user_id;
        $student->name =  $request->name;
        $student->course_id =  $request->course_id;
        $student->section =  $request->section;
        $student->save();
        return back()->withNotify('Course Create Successfully');
    }
}
