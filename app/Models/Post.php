<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    //
    protected $fillable = [
<<<<<<< HEAD
        'idStudent', 'idExam', 'idType', 'idCategory', 'idStatus', 'content',
    ];
=======
        'idTeacher','idStudent','idExam','idCategory','idType','content','idStatus','score',
    ];

    public function exam(){
        return $this->belongsTo(Examination::class, 'idExam', 'id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'idStudent', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'idCategory', 'id');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'idType', 'id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'idStatus', 'id');
    }
>>>>>>> origin/relationship_model
}
