<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Student;
use App\Attendance;
use App\CitsLecturer;
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

            $course = Course::where('id', '=', $courseId)->first();
            $count = Attendance::where('courseId', '=', $courseId)->get()->count();
            $course->lect = $count + 1;
            if($count == 0){
                $count = 1;
            }
            $students = [];

            $allStudents = Student::all();
            foreach ($allStudents as $st) {
                $courses = json_decode($st->courses, true);
                if (array_key_exists($courseId, $courses)) {
                    $student = CitsStudent::where('matricNo', '=', $st->matricNo)->first();
                    $st->name = $student->surname. " " . $student->firstName. " " . $student->otherName;
                    $st->level = $student->level;
                    $x = $courses[$courseId];
                    $st->count = $x + 1;
                    if($x == 0){
                        $x = 1;
                    }
                    $st->percent = ceil(($x / $count) * 100);

                    array_push($students, $st);
                }
            }

            return view('lecturer.attendance.new.create', compact('students', 'course'));
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
            $course = Course::where('id', '=', $courseId)->first();
            $studentIds = Request('students');

            $attendance = Attendance::create([
                        'staffId' => $staff->id,
                        'courseId' => $courseId,
                        'students' => implode(',', $studentIds),
                    ]); 

            foreach ($studentIds as $studentId) {
                $student = Student::where('id', '=', $studentId)->first();
                $courses = json_decode($student->courses, true);
                if (array_key_exists($courseId, $courses)) {
                    $courses[$courseId] = $courses[$courseId] + 1;
                    $student->courses = json_encode($courses);
                    $student->save();
                }
            }

            return redirect('lecturer/dashboard');
        }
        else{
            return redirect('lecturer/login');
        }
    }

    public function readAll($courseId){
        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if(($citsStaff != null) && ($staff != null)){
            $course = Course::where('id', '=', $courseId)->first();
            $attendances = Attendance::where('courseId', '=', $courseId)->get();

            foreach ($attendances as $attendance) {
                $lect = CitsLecturer::where('id', '=', $attendance->staffId)->first();
                $attendance->lect = $lect->surname. " " . $lect->firstName;
                $attendance->students = count(explode(',', $attendance->students));
            }
            
            return view('lecturer.attendance.allCourseAtt', compact('attendances', 'course'));
        }
        else{
            return redirect('lecturer/login');
        }
    }


    public function read($courseId, $attId){
        $citsStaff = Auth::guard()->user();
        $staff = User::where('staffId', '=', $citsStaff->staffId)->first();

        if(($citsStaff != null) && ($staff != null)){
            $course = Course::where('id', '=', $courseId)->first();
            $attendance = Attendance::where('id', '=', $attId)->first();
            $course->attDate = $attendance->created_at;
            $students = [];

            if($attendance != null){
                $sts = explode(',', $attendance->students);

                $allStudents = Student::all();
                foreach ($allStudents as $st) {
                    $courses = json_decode($st->courses, true);
                    if (array_key_exists($courseId, $courses)) {
                        $student = CitsStudent::where('matricNo', '=', $st->matricNo)->first();
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
            }

            return view('lecturer.attendance.showAtt', compact('students', 'course'));
        }
        else{
            return redirect('lecturer/login');
        }
    }

}
