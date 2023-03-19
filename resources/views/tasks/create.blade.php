<div class="box">
	<h2>タスクを追加する</h2>
	<form id="createTask" action="{{ route('tasks.create', ['folder' => $folder_id]) }}" method="POST" onsubmit="return false">
		@csrf
		<div class="item">
			<label for="title">タイトル</label>
			<p id="error_title" class="error"></p>
			<input type="text" name="title" id="title" placeholder="新しいタスク">
		</div>
		<div class="item">
			<label for="due_date">期限</label>
			<p id="error_due_date" class="error"></p>
			<input type="text" name="due_date" id="due_date" placeholder="日付を入力">
		</div>
		<div class="btn_area">
			<button type="button" onclick="createTask()">送信</button>
			<button type="button" onclick="modal_cancel()">キャンセル</button>
		</div>
	</form>
</div>