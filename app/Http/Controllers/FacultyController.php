<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\SubjectMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{

    public function index(){
        $enroled_course = Course::where('user_id', Auth::user()->id)->get();
        return view('web.faculty.dashboard', compact('enroled_course'));
    }

    public function markCreate(){
        $student = User::whereUser_type('student')->get();
        $course = Course::whereUser_id(auth()->user()->id)->get();
        return view('faculty.mark_create',compact('student','course'));
    }

    public function markCreatePost(Request $request){
        
        $request->validate([
            'user_id' => 'required',
            'edu_year' => 'required',
            'semester' => 'required',
            'course_id' => 'required',
            'section' => 'required',
            'grade' => 'required',
        ]);

        $student = new SubjectMark();
        $student->user_id = $request->user_id;
        $student->faculty_id = auth()->user()->id;
        $student->year =  $request->edu_year;
        $student->semester =  $request->semester;
        $student->course_id =  $request->course_id;
        $student->section =  $request->section;
        $student->grade =   strtoupper($request->grade);
        $student->save();
        return back()->withNotify('CO Create Successfully'); 
    }

    public function totalCo(){
        $my_course = Course::where('user_id', Auth::user()->id)->get();
        return view('faculty.total_co', compact('my_course'));
    }

    public function totalCoPost(Request $request){
        $request->validate([
            'course' => 'required',
            'section' => 'required',
            'semester' => 'required',
            'year' => 'required',
        ]);
    

        $data = SubjectMark::where('faculty_id', auth()->user()->id)
                            ->where('section',$request->section)
                            ->where('course_id',$request->course)
                            ->where('semester',$request->semester)
                            ->where('year',$request->year)
                            ->get();
        $array = [];
        foreach($data as $grade){
             if ($grade->grade == 'A') {
                array_push($array,90);
            } elseif ($grade->grade == 'A-') {
                array_push($array,85);
            } elseif ($grade->grade == 'B+') {
                array_push($array,80);
            } elseif ($grade->grade == 'B') {
                array_push($array,75);
            } elseif ($grade->grade == 'B-') {
                array_push($array,70);
            }elseif ($grade->grade == 'C+') {
                 array_push($array,65);
            }elseif ($grade->grade == 'C') {
                array_push($array,60);
            }elseif ($grade->grade == 'C-') {
                 array_push($array,55);
            }elseif ($grade->grade == 'D+') {
                   array_push($array,50);
            }elseif ($grade->grade == 'D') {
                 array_push($array,45);
            }elseif ($grade->grade == 'F') {
                array_push($array,0);
            }
           
        }

         $average = array_sum($array)/count($array);
        
        return back()->withGrade($average);
    }

}
