<?php

namespace App\Models\v1;

use App\Models\v1\APIModel;

class User extends APIModel
{

  protected $fillable=[
    'email',
    'password',
    'firstName',
    'middleName',
    'lastName',
    'data',
    'language',
    'office_id',
    'paymentStatus'
  ];

  protected $casts = [
    'data' => 'array',
  ];

  public function getInitials() {
    return substr($this->firstName,0,1).substr($this->lastName,0,1);
  }

  public function getFullName() {
    return $this->firstName.' '.$this->lastName;
  }
}
