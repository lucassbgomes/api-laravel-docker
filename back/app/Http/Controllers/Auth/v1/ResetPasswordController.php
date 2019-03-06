<?php

namespace App\Http\Controllers\Auth\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\Json;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Password Reset Controller
  |--------------------------------------------------------------------------
  |
  | This controller is responsible for handling password reset requests
  | and uses a simple trait to include this behavior. You're free to
  | explore this trait and override any methods you wish to tweak.
  |
  */

  use ResetsPasswords;

  /**
   * Where to redirect users after resetting their password.
   *
   * @var string
   */
  protected $redirectTo = '/login';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  public function reset(Request $request) {
    $this->validate($request, $this->rules(), $this->validationErrorMessages());

    $response = $this->broker()->reset(
      $this->credentials($request), function ($user, $password) {
        $this->resetPassword($user, $password);
      }
    );

    if ($request->wantsJson()) {
      if ($response === Password::PASSWORD_RESET) {
        return response()->json(Json::response(null, trans('passwords.reset')));
      } else {
        return response()->json(Json::response($request->input('email'), trans($response)), 401);
      }
    }

    return $response == Password::PASSWORD_RESET
      ? $this->sendResetResponse($response)
      : $this->sendResetFailedResponse($request, $response);
  }
}
