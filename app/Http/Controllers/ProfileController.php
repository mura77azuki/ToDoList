<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\ChangePasswordRequest;


class ProfileController extends Controller
{
  public function show(){
		return view('profile.edit', ['user' => Auth::user()]);
	}

	public function edit(EditProfileRequest $request){
		$user = Auth::user();

		$user->email = $request->email;
		$user->name = $request->name;
		$user->save();

		return redirect()->route('profile')->with('status', 'プロフィールを編集しました。');
	}

	public function showChangePassword(){
		return view('profile.password', ['user' => Auth::user()]);
	}
	public function changePassword(ChangePasswordRequest $request){

		$request->user()->update([
			'password' => Hash::make($request['password'])
		]);

		return redirect()->route('profile')->with('status', 'パスワードを変更しました。');
	}
	public function showDelete(){
		return view('profile.delete', ['user' => Auth::user()]);
	}
	public function delete(Request $request){
		$user = $request->user();

		Auth::logout();

		$user->tasks()->delete();

		$user->folders()->delete();

		$user->delete();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('login')->with('status', 'アカウントは削除されました。');
	}
}
