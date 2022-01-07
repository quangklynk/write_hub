<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'idStudent', 'idExam', 'idType', 'idCategory', 'idStatus', 'content',
    ];
}
