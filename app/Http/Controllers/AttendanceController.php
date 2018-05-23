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

class AttendanceController extends Controller
{
    //create, read, delete
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCreate($courseId){
        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if(($citsStaff != null) && ($staff != null)){

            $course = Course::where('courseId', '=', $courseId)->first();
            $count = Attendance::where('courseId', '=', $id)->get()->count();
            $students = [];

            $allStudents = Student::all();
            foreach ($allStudents as $st) {
                $courses = unserialize($st->courses);
                if (array_key_exists($courseId, $courses)) {
                    $student = CitsStudent::where('matricNo', '=', $st->matricNo);
                    $st->name = $student->surname. " " . $student->firstName. " " . $student->otherName;
                    $x = $st->courses[$courseId];
                    $st->percent = ($x / $count) * 100;

                    array_push($students, $st);
                }
            }

            return view('attendance.new', compact('students', 'course'));
        }
        else{
            return redirect('staff/login');
        }
    }



    public function postCreate($courseId){
        $this->validate(request(), [
            'students' => 'required|array|min:1',     
        ]);

        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if(($citsStaff != null) && ($staff != null)){
            $course = Course::where('courseId', '=', $courseId)->first();
            $studentIds = Request('students');

            $attendance = Attendance::create([
                        'staffId' => $staff->id,
                        'courseId' => $courseId,
                        'students' => implode(',', $studentIds),
                    ]); 

            foreach ($studentIds as $studentId) {
                $student = Student::where('id', '=', $studentId)->first();
                $courses = unserialize($student->courses);
                if (array_key_exists($courseId, $courses)) {
                    $student->courses[$courseId] += 1;
                    $student-save();
                }
            }

            return redirect('staff/dashboard');
        }
        else{
            return redirect('staff/login');
        }
    }


    public function read($courseId, $attId){
        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if(($citsStaff != null) && ($staff != null)){
            $course = Course::where('courseId', '=', $courseId)->first();
            $attendance = Attendance::where('id', '=', $attId)->first();
            $students = [];
            $sts = explode(',', $attendance->students);

            $allStudents = Student::all();
            foreach ($allStudents as $st) {
                $courses = unserialize($st->courses);
                if (array_key_exists($courseId, $courses)) {
                    $student = CitsStudent::where('matricNo', '=', $st->matricNo);
                    $st->name = $student->surname. " " . $student->firstName. " " . $student->otherName;
                    if(in_array($st->id, $sts)){
                        $st->present = true;
                    }
                    else{
                        $st->present = false;
                    }
                    array_push($students, $st);
                }
            }

            return view('attendance.read', compact('students', 'course'));
        }
        else{
            return redirect('staff/login');
        }
    }
}
