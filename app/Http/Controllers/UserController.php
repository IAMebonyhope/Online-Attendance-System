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

    public function getRegister(){
        
        $citsStaff = Auth::guard()->user();

        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if($staff == null){
            //fetch the department of lecturer
            //pass it to getCoursesCodes() method
            //if result is not null
            //get coursesIds
            //get courses object using the courseIds
            //pass the courses to the register view

            $coursesCodes = $this->getCoursesCodes($citsStaff->dept);
            if($coursesCodes != null){
                $courses = Course::getCoursesByCodes($coursesCodes);
                //dd($courses);
                return view('lecturer.register', compact('citsStaff', 'courses'));
            }
        }
        else{
            return redirect('lecturer/dashboard');
        }
    }


    public function postRegister(){

        $this->validate(request(), [
            'newCourses' => 'required|array|min:1',     
        ]);

        $citsStaff = Auth::guard()->user();

        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if($staff == null){
            $courses = implode(',', Request('newCourses'));
            $citsStaff = Auth::guard()->user();

            $staff = User::create([
                            'staffId' => $citsStaff->staffId,
                            'courses' => $courses,
                        ]);

            session()->flash('registrationSuccessful', 'You have successfully registered on this platform');   

            return redirect('lecturer/dashboard');
        }
        else{
            return redirect('lecturer/dashboard');
        }
    }


    public function dashboard(){
        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if($staff != null){
            $courseIds = explode(',', $staff->courses);
            $courses = Course::getCourses($courseIds);

            return view('lecturer.dashboard', compact('courses'));
        }
        else{
            return redirect('lecturer/login');
        }
    }


    public function courses(){
        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if($staff != null){
            $courseIds = explode(',', $staff->courses);
            $courses = Course::getCourses($courseIds);

            return view('lecturer.attendance.new.allCourses', compact('courses'));
        }
        else{
            return redirect('lecturer/login');
        }
    }


    public function viewCourses(){
        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if($staff != null){
            $courseIds = explode(',', $staff->courses);
            $courses = Course::getCourses($courseIds);

            return view('lecturer.attendance.allAtt', compact('courses'));
        }
        else{
            return redirect('lecturer/login');
        }
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
