<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\AdminPasswordResetNotification;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;              
use Illuminate\Auth\Passwords\CanResetPassword;


use Illuminate\Notifications\Notifiable;
class Admin extends Model implements AuthenticatableContract ,CanResetPasswordContract
{
    use Notifiable;
use Authenticatable;
use CanResetPassword;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone_no','email', 'password','avatar','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
    	$this->notify(new AdminPasswordResetNotification($token));
    }
  
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
