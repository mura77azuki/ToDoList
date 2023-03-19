<div class="box">
	<h2>フォルダを編集する</h2>
	<form id="editFolder" action="{{ route('folders.edit', ['folder' => $folder_id]) }}" method="POST" onsubmit="return false">
		@csrf
		<div class="item">
			<label for="title">フォルダ名</label>
			<p id="error_title" class="error"></p>
			<input type="text" name="title" id="title" placeholder="フォルダ名" value="{{ $title }}">
		</div>
		<div class="btn_area">
			<button type="button" onclick="editFolder()">送信</button>
			<button type="button" onclick="modal_cancel()">キャンセル</button>
		</div>
	</form>
</div>