<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
			return view('auth.login');
		}
		public function login(LoginRequest $request){
			$credentials = $request->only('email', 'password');

			if(Auth::attempt($credentials)){
				$request->session()->regenerate();

				return redirect()->intended('/');
			}

			return back()->withErrors(['email' => '認証情報が一致しませんでした。'])->onlyInput('email');
		}
		public function logout(Request $request){
			Auth::logout();

			$request->session()->invalidate();

			$request->session()->regenerateToken();
			
			return redirect('/');
		}
}
