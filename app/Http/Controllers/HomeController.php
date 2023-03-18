<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function show(){
		if(Auth::check()){
			$folder = Auth::user()->folders()->first();
			if($folder){
				return redirect()->route('tasks.index', ['folder' => $folder->id]);
			}
			return redirect()->route('tasks.first_index');
		}

		return redirect()->route('login');
	}
}
