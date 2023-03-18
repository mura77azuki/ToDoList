<div class="box">
	<h2>タスクを追加する</h2>
	@if($errors->any())
	<div>
		<ul>
			@foreach($errors->all() as $message)
			<li>{{ $message }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form id="createTask" action="{{ route('tasks.create', ['folder' => $folder_id]) }}" method="POST">
		@csrf
		<div class="item">
			<label for="title">タイトル</label>
			<p id="error_title" class="error"></p>
			<input type="text" name="title" id="title" placeholder="新しいタスク" value="{{ old('title') }}">
		</div>
		<div class="item">
			<label for="due_date">期限</label>
			<p id="error_due_date" class="error"></p>
			<input type="text" name="due_date" id="due_date" placeholder="日付を入力" value="{{ old('due_date') }}">
		</div>
		<div class="item">
			<button type="button" onclick="createTask()">送信</button>
		</div>
	</form>
</div>