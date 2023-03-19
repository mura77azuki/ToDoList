@section('header')
<header>
	<div class="header">
		<div class="title">
			<a href="/">To-Do-List</a>
		</div>
		<div class="menu">
			@auth
			<p>いらっしゃいませ、<a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>さん！</p>
			<button type="submit" form="logout">ログアウト</button>
			<form id="logout" action="/logout" method="POST">@csrf</form>
			@else
			<a href="/login">ログイン</a>
			<a href="/register">新規登録</a>
			@endauth
		</div>
	</div>
</header>
@endsection