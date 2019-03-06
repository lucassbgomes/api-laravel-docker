<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\APIController;
use App\Models\v1\User;

class UserController extends APIController
{
  public function list() {
    $users = User::select('email','firstName','middleName','lastName','data')
      ->orderBy('id', 'desc')
      ->get();
    
    return response()->json($users);
  }
}
