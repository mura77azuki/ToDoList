@extends('layout.common')

@section('title', 'ToDoList-PasswordReset')

@include('layout.header')

@section('content')
<main>
	<div class="content">
		<div class="box login">

			<h2>パスワードリセット</h2>

			<form action="{{ route('password.store') }}" method="POST">

				@csrf

				<input type="hidden" name="token" value="{{ $token }}">

				<div class="item">
					<label for="email">メールアドレス</label>
					@error('email')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="email" id="email" name="email" value="{{ old('email', $email) }}" placeholder="email@example.com">
				</div>

				<div class="item">
					<label for="password">パスワード</label>
					@error('password')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="password" id="password" name="password" placeholder="パスワード">
				</div>

				<div class="item">
					<label for="password_confirmation">パスワード(確認)</label>
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="もう一度パスワードを入力">
				</div>

				<div class="item">
					<button type="submit">送信</button>
				</div>

			</form>

		</div>
	</div>
</main>
@endsection