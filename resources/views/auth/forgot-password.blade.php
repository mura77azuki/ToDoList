@extends('layout.common')

@section('title', 'ToDoList-PasswordReset')

@include('layout.header')

@section('content')
<main>
	@if(session('status'))
	<div class="status">{{ session('status') }}</div>
	@endif
	<div class="content">
		<div class="box login">

			<h2>パスワードリセット</h2>

			<form action="{{ route('password.request') }}" method="POST">

				@csrf

				<div class="item">
					<label for="email">メールアドレス</label>
					@error('email')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com">
				</div>

				<div class="item">
					<button type="submit">送信</button>
				</div>

			</form>

		</div>
	</div>
</main>
@endsection