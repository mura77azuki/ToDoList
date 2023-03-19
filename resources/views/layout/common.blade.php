<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('/css/reset.css')}}">
	<link rel="stylesheet" href="{{asset('/css/common.css')}}">
	@yield('pageCss')
	<script src="{{asset('/js/common.js')}}"></script>
	@yield('pageJs')
</head>
<body>
<div id="vdbanner"></div>
@yield('header')
@yield('content')
@yield('footer')
</body>
</html>