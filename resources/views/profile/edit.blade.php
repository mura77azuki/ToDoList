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

			<h2>プロフィール確認・編集</h2>

			<form action="{{ route('profile') }}" method="POST">

				@csrf

				<div class="item">
					<label for="email">メールアドレス</label>
					@error('email')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="email@example.com" >
				</div>

				<div class="item">
					<label for="name">ユーザー名</label>
					@error('name')
					<p class="error">{{ $message }}</p>
					@enderror
					<input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="ユーザー名">
				</div>

				<div class="item">
					<button type="submit">編集</button>
				</div>

			</form>

			<div class="menu">
				<a href="{{ route('home') }}">ToDoListへ戻る</a>
				<a href="{{ route('profile.password') }}">パスワードの変更</a>
				<a href="{{ route('profile.delete') }}">アカウントの削除</a>
			</div>

		</div>
	</div>
</main>
@endsection