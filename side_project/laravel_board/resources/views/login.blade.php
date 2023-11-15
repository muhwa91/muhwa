@extends('layout.layout')

@section('title', 'Login')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<form method="POST" action="{{route('user.login.post')}}" style="width: 400px;">
		@include('layout.errorlayout')
		@csrf		
		<div class="mb-3">
			<label for="email" class="form-label">이메일</label>
			<input type="text" class="form-control" id="email" name="email" autocomplete="off">
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">비밀번호</label>
			<input type="password" class="form-control" id="password" name="password" autocomplete="off">
		</div>			
		<button type="submit" class="btn btn-primary">로그인</button>
	</form>
</main>
@endsection
