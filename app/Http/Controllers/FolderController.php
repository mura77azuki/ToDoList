<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFolderRequest;
use App\Http\Requests\EditFolderRequest;
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

		public function showEdit(Folder $folder){
			return view('folders.edit', ['title' => $folder->title,'folder_id' => $folder->id]);
		}

		public function edit(Folder $folder, EditFolderRequest $request){

			$folder->title = $request->title;
			$folder->save();

			session()->flash('status', 'フォルダを編集しました！');

			$url = urldecode(url(route('tasks.index', ['folder' => $folder->id])));
			return ['url' => $url];
		}

		public function showDelete(Folder $folder){
			return view('folders.delete', ['title' => $folder->title,'folder_id' => $folder->id]);
		}

		public function delete(Folder $folder){

			$folder->tasks()->delete();
			
			$folder->delete();

			session()->flash('status', 'フォルダを削除しました！');
			return redirect()->route('home');
		}
}
