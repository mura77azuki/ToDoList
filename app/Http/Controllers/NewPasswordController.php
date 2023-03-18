<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class NewPasswordController extends Controller
{
  public function show($token, Request $request){
		$email = $request->email;
		return view('auth.reset-password', ['token' => $token, 'email' => $email]);
	}

	public function store(NewPasswordRequest $request){
		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password)
				])->setRememberToken(Str::random(60));

				$user->save();
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect()->route('login')->with('status', __($status))
			: back()->withErrors(['email' => [__($status)]]);
	}
}
