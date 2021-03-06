<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use function foo\func;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username','email', 'password'
    ];

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

    protected static function boot(){
        parent::boot();//The orignal bootable function.
        static ::created(function($user){
           $user->profile()->create([
               'title'=>$user->username,
               ]);
        });
    }
    //defining the relationship between the user and its profile.
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //defining the relationship between user and its posts.
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }
}
