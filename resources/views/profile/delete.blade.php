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

			<h2>アカウント削除</h2>

			<div>
				<p>
					現在ログインしているアカウントを削除します。
				</p>
				<p>
					アカウントを削除すると保存されているデータは全て消去され、元に戻す事が出来ません。
					<br>
					よろしければ、削除ボタンを押してください。
				</p>
				<p class="error">※これ以降に確認はありませんので、ご注意ください。</p>
			</div>

			<form action="{{ route('profile.delete') }}" method="POST">
				@csrf
				<div class="item">
					<button type="submit">削除</button>
				</div>
			</form>

			<div class="menu">
				<a href="{{ route('profile') }}">プロフィール確認に戻る</a>
			</div>

		</div>
	</div>
</main>
@endsection