<div class="box">
	<h2>フォルダの削除</h2>
	<form id="deleteFolder" action="{{ route('folders.delete', ['folder' => $folder_id]) }}" method="POST">
		@csrf
		<div>
			<p>
				フォルダ『{{$title}}』を削除します。
				<br>
				フォルダを削除すると中のタスクも全て削除されます。
				<br>
				よろしければ、削除ボタンを押してください。
			</p>
		</div>
		<div class="btn_area">
			<button type="submit" onclick="deleteFolder()">削除</button>
			<button type="button" onclick="modal_cancel()">キャンセル</button>
		</div>
	</form>
</div>