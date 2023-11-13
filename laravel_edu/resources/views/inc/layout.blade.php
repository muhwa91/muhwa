<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	{{-- @yield : 자식 템플릿에서 해당하는 section에게 자리 양도
		 		자식한테 section 없을 경우 부모의 두번째 파라미터 사용--}}
	<title>@yield('title', '부모 타이틀')</title> 
</head>
<body>
	{{-- 다른 템플릿을 포함시키는 방법 --}}
	@include('inc.header')

	{{-- 메인 영역 --}}
	@yield('main')

	{{-- @section ~ @show : 자식 템플릿에 해당하는 section 없을 때,
							부모의 @section ~ @show 실행 --}}
	@section('show')
		<h2>부모의 show</h2>
		<p>부모</p>
	@show

	{{-- 다른 템플릿을 포함시킬 때 변수 세팅하는 방법 --}}
	@include('inc.footer', ['key1' => 'key1 부모에서 세팅'])
</body>
</html>