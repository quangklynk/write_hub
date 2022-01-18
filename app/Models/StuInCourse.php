<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StuInCourse extends Model
{
    //
    protected $fillable = [
        'idCourse','idStudent','isPay',
    ];

    public function course(){
        return $this->hasMany(Course::class, 'idCourse', 'id');
    }
    public function student(){
        return $this->hasMany(Student::class, 'idStudent', 'id');
    }
}
