<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFolderRequest;
use App\Models\Folder;
use App\Models\User;

class FolderController extends Controller
{
    public function showCreateForm(Request $request){
			return view('folders.create');
		}

		public function create(CreateFolderRequest $request){
			$folder = new Folder();

			$folder->title = $request->title;

			Auth::user()->folders()->save($folder);

			$request->session()->flash('status', 'フォルダを作成しました！');
			//return redirect()->route('tasks.index', ['id' => $folder->id]);
			$url = urldecode(url(route('tasks.index', ['folder' => $folder->id])));
			return ['url' => $url];
		}
}
