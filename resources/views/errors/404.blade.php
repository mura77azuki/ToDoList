@extends('layout.common')

@section('title', 'ToDoList-Error')

@include('layout.header')

@section('content')
<main>
	<div class="content">
		<div class="box error_screen">

			<h2>404 Error : Not Found Error</h2>

			<div>

				<p>ページが見つかりませんでした。</p>

				<a href="/">ToDoListへ戻る</a>

			</div>

		</div>
	</div>
</main>
@endsection