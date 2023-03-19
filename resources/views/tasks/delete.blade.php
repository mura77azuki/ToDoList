<div class="box">
	<h2>タスクの削除</h2>
	<form id="deleteTask" action="{{ route('tasks.delete', ['folder' => $folder_id, 'task' => $task_id]) }}" method="POST">
		@csrf
		<div>
			<p>
				タスク『{{$title}}』を削除します。
				<br>
				よろしければ、削除ボタンを押してください。
			</p>
		</div>
		<div class="btn_area">
			<button type="submit" onclick="deleteTask()">削除</button>
			<button type="button" onclick="modal_cancel()">キャンセル</button>
		</div>
	</form>
</div>