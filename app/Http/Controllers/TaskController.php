<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;

class TaskController extends Controller
{
		public function first_index(){
			$folder = Auth::user()->folders()->first();
			if($folder){
				return redirect()->route('tasks.index', ['folder' => $folder->id]);
			}

			$params = [
				'folders' => array(),
				'current_folder_id' => null,
				'tasks' => array(),
			];

			return view('tasks.index', $params);
		}
    public function index(Folder $folder){

			$folders = Auth::user()->folders;

			$tasks = $folder->tasks()->get();

			$params = [
				'folders' => $folders,
				'current_folder_id' => $folder->id,
				'tasks' => $tasks,
			];

			return view('tasks.index', $params);
		}

		public function showCreateForm(Folder $folder){
			return view('tasks.create', ['folder_id' => $folder->id]);
		}

		public function create(Folder $folder, CreateTaskRequest $request){
			$current_folder = Folder::find($folder->id);

			$task = new Task();
			$task->title = $request->title;
			$task->due_date = $request->due_date;

			$current_folder->tasks()->save($task);

			$request->session()->flash('status', 'タスクを作成しました！');
			//return redirect()->route('tasks.index', ['id' => $current_folder->id]);
			$url = urldecode(url(route('tasks.index', ['folder' => $current_folder->id])));
			return ['url' => $url];
		}

		public function showEditForm(Folder $folder, Task $task){

			$this->checkRelation($folder, $task);

			$task = Task::find($task->id);

			return view('tasks.edit', ['task' => $task]);
		}

		public function edit(Folder $folder, Task $task, EditTaskRequest $request){

			$this->checkRelation($folder, $task);

			$task->title = $request->title;
			$task->status = $request->status;
			$task->due_date = $request->due_date;
			$task->save();

			$request->session()->flash('status', 'タスクを編集しました！');
			//return redirect()->route('tasks.index', ['id' => $task->folder_id]);
			$url = urldecode(url(route('tasks.index', ['folder' => $task->folder_id])));
			return ['url' => $url];
		}

		public function showDeleteForm(Folder $folder, Task $task){
			$this->checkRelation($folder, $task);
			return view('tasks.delete', ['title' => $task->title, 'folder_id' => $folder->id, 'task_id' => $task->id]);
		}
		public function delete(Folder $folder, Task $task){
			$this->checkRelation($folder, $task);

			$task->delete();

			session()->flash('status', 'タスクを削除しました！');
			return redirect()->route('tasks.index', ['folder' => $task->folder_id]);
		}

		public function checkRelation(Folder $folder, Task $task){
			if($folder->id !== $task->folder_id){
				abort(404);
			}
		}
}
