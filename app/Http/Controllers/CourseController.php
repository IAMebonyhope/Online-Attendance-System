<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Student;
use App\Attendance;
use App\CitsStaff;
use App\CitsStudent;
use Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getCreate(){

        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if(($citsStaff != null) && ($staff != null)){
            //fetch the department of lecturer
            //pass it to getCoursesCodes() method
            //if result is not null
            //get coursesIds
            //get courses object using the courseIds
            //pass the courses to the register view

            $coursesCodes = $this->getCoursesCodes($citsStaff->dept);
            if($coursesCodes != null){
                $courses = Course::getCoursesByCodes($coursesCodes);
                return view('lecturer.course.new', compact('citsStaff', 'courses'));
            }
        }
        else{
            return redirect('lecturer/login');
        }
    }


    public function postCreate(){
        
        $this->validate(request(), [
            'courses' => 'required|array|min:1',     
        ]);

        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if($staff != null){
            $newCourses = Request('courses');
            $courses = explode(',', $staff->courses);

            $courses = array_unique(array_merge($newCourses,$courses));
            $staff->courses = implode(',',$courses);
            $staff->save();

            return redirect('lecturer/dashboard');
        }
        else{
            return redirect('lecturer/login');
        }

    }

    //read aggregate of attandance for the course id;
    public function read($id){

        //get all students
        //loop through all student
            //loop through the courses they are taking
            //if course with id = $id is found 
            //add the students to the array
        //pass the array to the view
        $course = Course::find($id);
        $students = Student::all();
        $count = Attendance::where('courseId', '=', $id)->get()->count();
        if($count == 0){
            $count = 1;
        }

        $courseStudents = [];
        foreach($students as $student){ 
            $courses = json_decode($student->courses, true);
            if(array_key_exists($id, $courses)) {
                $st = CitsStudent::where('matricNo', '=', $student->matricNo)->first();
                $student->name = $st->surname. " " . $st->firstName. " " . $st->otherName;
                $x = $courses[$id];
                if($x == 0){
                    $x = 1;
                }
                $student->percent = ceil(($x / $count) * 100);

                array_push($courseStudents, $student);
            }

        }
        return view('lecturer.attendance.aggregate', compact('courseStudents', 'course'));

    }


    public function delete($id){
        //get courses llecturer is taking
        //turn it to array
        //loop through the courses
        //if the course with id = $id is present
        //delete from the course array
        //turn it to straing back
        //save

        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if($staff != null){
            $courses = explode(',', $staff->courses);

            if (($key = array_search($id, $courses)) !== false) {
                unset($courses[$key]);
            }

            $staff->courses = implode(',',$courses);
            $staff->save();

            return redirect('lecturer/dashboard');
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
