<?php

namespace App\Models\v1;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAuth extends Authenticatable
{
  use HasApiTokens, Notifiable;

  protected $table = 'users';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'firstName', 'lastName', 'email', 'password',
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
    $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
  }
}