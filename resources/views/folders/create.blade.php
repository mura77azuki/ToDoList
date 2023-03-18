<div class="box">
	<h2>フォルダを追加する</h2>
	@if($errors->any())
	<div>
		<ul>
			@foreach($errors->all() as $message)
			<li>{{ $message }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form id="createFolder" action="{{ route('folders.create') }}" method="POST">
		@csrf
		<div class="item">
			<label for="title">フォルダ名</label>
			<p id="error_title" class="error"></p>
			<input type="text" name="title" id="title" placeholder="フォルダ名" value="{{ old('title') }}">
		</div>
		<div class="item">
			<button type="button" onclick="createFolder()">送信</button>
		</div>
	</form>
</div>