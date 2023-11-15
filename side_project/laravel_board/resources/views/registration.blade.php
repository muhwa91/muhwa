@extends('layout.layout')

@section('title', 'Registration')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<form method="POST" action="{{route('user.registration.post')}}" style="width: 400px;">
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
		<div class="mb-3">
			<label for="passwordchk" class="form-label">비밀번호 확인</label>
			<input type="password" class="form-control" id="passwordchk" name="passwordchk" autocomplete="off">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">이름</label>
			<input type="text" class="form-control" id="name" name="name" autocomplete="off">
		</div>
		<a class="btn btn-secondary" href="{{route('user.login.get')}}">취소</a>
		<button type="submit" class="btn btn-primary float-end">회원가입</button>
	</form>
</main>
@endsection