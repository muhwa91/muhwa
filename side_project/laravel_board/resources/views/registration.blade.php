@extends('layout.layout')
{{-- layout.blade.php 상속 --}}
@section('title', 'Registration')
{{-- title로 Registration 표기 --}}
@section('main')
{{-- layout.blade.php의 상속을 받지 않고 독자적으로 구성 --}}
<main class="d-flex justify-content-center align-items-center h-75">
	<form method="POST" action="{{route('user.registration.post')}}" style="width: 400px;">
		{{-- 1. 미들웨어로 유효성 체크&검사
			 2. return $next($request);
			 3. 유저 요청건에 대하여 유저컨트롤러에서 registrationpost 메소드 호출
			 4. 유저 제출 데이터 중 only메소드 사용하여 email, 비밀번호, 이름만 배열로 받아 $data 저장
			 5. Hash클래스의 make메소드 호출하여 비밀번호 암호화
			 6. 유저모델 create메소드 호출하여 유저 제출 데이터 DB insert 처리
			 7. return redirect()->route('user.login.get');
		@include('layout.errorlayout')
		{{-- 에러메세지 있을 시 errorlayout.blade.php에서 forelse 사용하여 에러메세지 출력 --}}
		@csrf 
		{{-- form 태그에서는 의도하지 않은 요청을 악의적으로 전송하여 다른 유저계정에서 실행되는 액션을 
			트리거하는 공격방어 목적으로 @csrf 사용 --}}
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