<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Photo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Relations\HasMany;

use function PHPUnit\Framework\returnValue;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'role_id',
        'photo_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function role(){


        return $this->belongsTo('App\Models\Role');
    }


    public function photo(){

        return $this->belongsTo('App\Models\Photo');
    }


    // for security check
    // public function isAdmin(){

    //     if($this->role->name == 'administrator'){

    //         return true;
    //     }


    //     return false;

    // }



    //has many table connected to it from post table because we are getting each user and displaying on post
    //connect the post table to the user table using belongs to in the post model
    public function posts(){

        return $this->hasMany('App\Models\Post');

    }




}
