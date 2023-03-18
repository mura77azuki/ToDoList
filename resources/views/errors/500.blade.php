@extends('layout.common')

@section('title', 'ToDoList-Error')

@include('layout.header')

@section('content')
<main>
	<div class="content">
		<div class="box error_screen">

			<h2>500 Error : Server Error</h2>

			<p>サーバーエラーが発生しました。</p>

			<a href="/">ToDoListへ戻る</a>
			
		</div>
	</div>
</main>
@endsection