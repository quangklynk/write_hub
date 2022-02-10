<?php

namespace App;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'email', 'password', 'flag', 'idRole'
=======
        'flag', 'email', 'password', 'idRole'
>>>>>>> origin/relationship_model
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'idRole', 'id');
    }

    public function teacher(){
        return $this->hasMany(Teacher::class, 'idTeacher', 'id');
    }

    public function student(){
        return $this->hasMany(Student::class, 'idStudent', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
