@extends('layout.common')

@section('title', 'ToDoList-Register')

@include('layout.header')

@section('content')
<main>
	<div class="content">
		<div class="box register">

			<h2>新規登録</h2>

			<form action="{{ route('register') }}" method="POST">

				@csrf

				<div class="item">
					<label for="email">メールアドレス</label>
					@error('email')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" >
				</div>

				<div class="item">
					<label for="name">ユーザー名</label>
					@error('name')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="ユーザー名">
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
					<button type="submit">登録</button>
				</div>

			</form>

		</div>
	</div>
</main>
@endsection