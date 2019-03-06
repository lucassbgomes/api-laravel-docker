<?php

namespace App\Http\Controllers\Auth\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthenticateController extends Controller
{
  public function showLoginForm () { return view('auth/login'); }

  public function login (Request $request) {
    
    try {
      $http = new \GuzzleHttp\Client;

      $res = $http->post(config('services.passport.login_endpoint'),[
        'form_params' => [
          'grant_type' => 'password',
          'client_id' => config('services.passport.client_id'),
          'client_secret' => config('services.passport.client_secret'),
          'username' => $request->email,
          'password' => $request->password
        ]
      ]);

      return $res->getBody();
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
      if ($e->getCode() === 400) {
        return response()->json(['message' => 'Invalid Request. Please enter a username or a password.'], $e->getCode());
      } else {
        if ($e->getCode() === 401) {
          return response()->json(['message' => 'Your credentials are incorrect. Please try again.'], $e->getCode());
        }
      }

      return response()->json(['message' => 'Something went wrong on the server.'], $e->getCode());
    }
  }

  public function logout() {
    auth()->user()->tokens->each(function ($token, $key) {
      $token->delete();
    });

    return response()->json('Logged out successfully.', 200);
  }
}
