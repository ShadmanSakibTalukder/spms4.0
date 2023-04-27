<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubjectMark;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $enroled_course = Course::all();
        return view('web.student.dashboard', compact('enroled_course'));
    }

    public function resultShow(){
        $result = SubjectMark::whereUser_id(auth()->user()->id)->get();
        $course = Course::get();
        return view('student.result_show',compact('result','course'));
    }

    public function coCheck(Request $request){

        
        $request->validate([
            'course' => 'required',
            'section' => 'required',
            'semester' => 'required',
            'year' => 'required',
        ]);
    

        $data = SubjectMark::where('user_id', auth()->user()->id)
                            ->where('section',strtoupper($request->section))
                            ->where('course_id',$request->course)
                            ->where('semester',$request->semester)
                            ->where('year',$request->year)
                            ->first();

        return back()->withGrade($data->grade);
    }
}
