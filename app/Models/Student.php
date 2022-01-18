<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Student extends Model
{
    //
    protected $fillable = [
        'idUser','name','birth','address',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function stuInCourse() {
        return $this->belongsTo(Student::class, 'idStudent', 'id');
    }
}
