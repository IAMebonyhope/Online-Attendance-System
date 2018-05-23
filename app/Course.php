<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Course extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'courseName', 'courseCode', 'dept', 'faculty', 'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public static function getCourseIds($courseCodes){
        
        $courseIds = [];

        foreach($courseCodes as $courseCode) {
           $course = self::where('courseCode', '=', $courseCode)->first();
           array_push($courseIds, $course->id);
        }

        return $courseIds;
    }


    public static function getCourses($courseIds){
        
        $courses = [];

        foreach($courseIds as $courseId) {
           $course = self::where('id', '=', $courseId)->first();
           array_push($courses, $course);
        }

        return $courses;
    }

    public static function getCoursesByCodes($courseCodes){
        
        $courses = [];

        foreach($courseCodes as $courseCode) {
           $course = self::where('courseCode', '=', $courseCode)->first();
           if($course != null){
                array_push($courses, $course);
           }
        }

        return $courses;
    }
}
