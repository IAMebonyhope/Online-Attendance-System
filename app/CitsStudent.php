<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CitsStudent extends Authenticatable
{
    use Notifiable;

    protected $table = 'cits-students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'firstName', 'otherName', 'phoneNo', 'email', 'matricNo', 'dept', 'faculty', 'level', 'courses', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
