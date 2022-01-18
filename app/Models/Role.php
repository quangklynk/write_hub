<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'des',
    ];
    public function user(){
        return $this->hasMany(User::class, 'idRole', 'id');
    }
}
