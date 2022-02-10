<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    //
    protected $fillable = [
<<<<<<< HEAD
        'dateExam', 'idClass', 'idTeacher'
    ];
=======
        'idCourse','idTeacher','dateExam','duration',
    ];

    public function course() {
        return $this->belongsTo(Course::class, 'idCourse', 'id');
    }


    public function teacher() {
        return $this->belongsTo(Teacher::class, 'idTeacher', 'id');
    }

    public function post() {
        return $this->hasMany(Post::class, 'idPost', 'id');
    }
    

>>>>>>> origin/relationship_model
}
