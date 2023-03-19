@extends('layout.common')

@section('title', 'ToDoList-Profile')

@include('layout.header')

@section('content')
<main>
	@if(session('status'))
		<div class="status">{{ session('status') }}</div>
	@endif
	<div class="content">
		<div class="box profile">

			<h2>パスワード変更</h2>

			<form action="{{ route('profile.password') }}" method="POST">

				@csrf

				<div class="item">
					<label for="current_password">現在のパスワード</label>
					@error('current_password')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="password" id="current_password" name="current_password" placeholder="現在のパスワード">
				</div>

				<div class="item">
					<label for="password">新しいパスワード</label>
					@error('password')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="password" id="password" name="password" placeholder="新しいパスワード">
				</div>

				<div class="item">
					<label for="password_confirmation">新しいパスワードの確認</label>
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="もう一度パスワードを入力">
				</div>

				<div class="item">
					<button type="submit">パスワード変更</button>
				</div>

			</form>

			<div class="menu">
				<a href="{{ route('profile') }}">プロフィール確認に戻る</a>
			</div>

		</div>
	</div>
</main>
@endsection