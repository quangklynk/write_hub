<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name','idTeacher','to','from',
    ];

    public function exam(){
        return $this->hasMany(Examination::class, 'idExam', 'id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'idTeacher', 'id');
    }

    public function stuInCourse() {
        return $this->belongsTo(StuInCourse::class, 'idCourse', 'id');
    }
}
