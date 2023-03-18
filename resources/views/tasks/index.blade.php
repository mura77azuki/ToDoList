@extends('layout.common')

@section('title', 'ToDoList')

@section('pageCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('pageJs')
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
@endsection

@include('layout.header')

@section('content')
<main>
	@if(session('status'))
		<div class="status">{{ session('status') }}</div>
	@endif
	<div class="content">

		<div class="folder box">
			
			<h2>フォルダ</h2>

			@if(!isset($current_folder_id))
			<div class="no_content">まだフォルダがありません。</div>
			@endif

			<div class="add">
				<a onclick="showCreateFolder()">フォルダを追加する</a>
			</div>
			<div class="list">
				@foreach($folders as $folder)
				<a	href="{{ route('tasks.index', ['folder' => $folder->id]) }}"
						class="{{ $current_folder_id === $folder->id ? 'active' : '' }}">
					{{ $folder->title }}
				</a>
				@endforeach
			</div>

		</div>

		<div class="task box">

			<h2>タスク</h2>

			@if(count($tasks) < 1)
			<div class="no_content">まだタスクは登録されていません。</div>
			@endif

			@if(isset($current_folder_id))
			<div class="add">
				<a onclick="showCreateTask('/folders/{{ $current_folder_id }}/tasks/create')">タスクを追加する</a>
			</div>
			@endif

			@if(count($tasks) > 0)
			<div>
				<table>
					<thead>
						<tr>
							<th>タイトル</th>
							<th>状態</th>
							<th>期限</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($tasks as $task)
						<tr>
							<td>{{ $task->title }}</td>
							<td><span class="{{ $task->status_class }}">{{ $task->status_label }}</span></td>
							<td>{{ $task->formatted_due_date }}</td>
							<td><a onclick="showCreateTask('/folders/{{ $current_folder_id }}/tasks/{{ $task->id}}/edit')">編集</a></td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
			@endif

		</div>

	</div>

	<div id="modal_outer" class="modal outer">
		<div id="modal_window" class="modal window"></div>
	</div>
</main>
@endsection