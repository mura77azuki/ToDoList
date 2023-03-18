<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordResetLinkRequest;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
  public function show(){
		return view('auth.forgot-password');
	}

	public function send(PasswordResetLinkRequest $request){
		$status = Password::sendResetLink($request->only('email'));

		return $status === Password::RESET_LINK_SENT
			? back()->with(['status' => __($status)])
			: back()->withErrors(['email' => __($status)]);
	}
}
