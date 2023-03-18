<div class="box">
	<h2>タスクを編集する</h2>
	@if($errors->any())
	<div>
		<ul>
			@foreach($errors->all() as $message)
			<li>{{ $message }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form id="editTask" action="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}" method="POST">
		
		@csrf

		<div class="item">
			<label for="title">タイトル</label>
			<p id="error_title" class="error"></p>
			<input type="text" name="title" id="title" placeholder="新しいタスク" value="{{ old('title', $task->title) }}">
		</div>

		<div class="item">
			<label for="status">状態</label>
			<p id="error_status" class="error"></p>
			<select name="status" id="status">
				@foreach(\App\Models\Task::STATUS as $key => $val)

				<option value="{{ $key }}" {{ $key == old('status', $task->status) ? 'selected' : ''}}>
					{{ $val['label'] }}
				</option>

				@endforeach
			</select>
		</div>

		<div class="item">
			<label for="due_date">期限</label>
			<p id="error_due_date" class="error"></p>
			<input type="text" name="due_date" id="due_date" placeholder="日付を入力" value="{{ old('due_date', $task->formatted_due_date) }}">
		</div>

		<div class="item">
			<button type="button" onclick="editTask()">送信</button>
		</div>

	</form>
</div>