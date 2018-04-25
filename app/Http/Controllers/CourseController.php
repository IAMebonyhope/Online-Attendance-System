<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getCreate($id){

        $citsStaff = Auth::guard()->user();

        if($citsStaff != null){
            //fetch the department of lecturer
            //pass it to getCoursesCodes() method
            //if result is not null
            //get coursesIds
            //get courses object using the courseIds
            //pass the courses to the register view

            $coursesCodes = $this->getCoursesCodes($citsStaff->dept);
            if($coursesCodes != null){
                $courses = Course::getCoursesByCodes($coursesCodes);
                dd($courses);
                return view('course.new', compact('citsStaff', 'courses'));
            }
        }
        else{
            return redirect('staff/login');
        }
    }


    public function postCreate(){
        //validate incoming request
        //get courses llecturer is taking
        //turn it to array
        //add incoming course id(s) to courses arrayow($id){
        //get course with id = $id
        //get all students
        //loop through all student
            //loop through the courses they are taking
            //if course with id = $id is found 
            //add the students to the array
        //pass the array to the view
    }


    public function delete($id){
        //get courses llecturer is taking
        //turn it to array
        //loop through the courses
        //if the course with id = $id is present
        //delete from the course array
        //turn it to straing back
        //save
    }


    public function getCoursesCodes($dept){

        $courses = array();

        if($dept == "Computer Sciences"){

            $courses = array("csc401", "csc402", "csc413", "csc405", "csc431", "csc422", "csc421");
        }

        else{
            $courses = array();
        }

        return $courses;

    }
}
