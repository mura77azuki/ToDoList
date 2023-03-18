@extends('layout.common')

@section('title', 'ToDoList-Login')

@include('layout.header')

@section('content')
<main>
	@if(session('status'))
		<div class="status">{{ session('status') }}</div>
	@endif
	<div class="content">
		<div class="box login">

			<h2>ログイン</h2>

			<form action="{{ route('login') }}" method="POST">

				@csrf

				<div class="item">
					<label for="email">メールアドレス</label>
					@error('email')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com">
				</div>

				<div class="item">
					<label for="password">パスワード</label>
					@error('password')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="password" id="password" name="password" placeholder="password">
				</div>

				<div class="item">
					<button type="submit">ログイン</button>
				</div>

			</form>

			<a href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>

		</div>
	</div>
</main>
@endsection