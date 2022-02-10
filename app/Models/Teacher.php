<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Teacher extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'name', 'birth', 'address'
    ];
=======
    //
    protected $fillable = [
        'name','birth','address','idUser'
    ];

    public function exam(){
        return $this->hasMany(Examination::class, 'idExam', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function course(){
        return $this->hasMany(Course::class, 'idCourse', 'id');
    }

>>>>>>> origin/relationship_model
}
