<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'idStudent','idExam','idCategory','idType','content','idStatus',
    ];

    public function exam(){
        return $this->belongsTo(Examination::class, 'idExam', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'idCategory', 'id');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'idType', 'id');
    }
}
