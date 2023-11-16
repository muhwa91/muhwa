@extends('layout.layout')
{{-- layout.blade.php 상속 --}}
@section('title', 'Create')
{{-- title로 Create 표기 --}}
@section('main')
{{-- layout.blade.php의 상속을 받지 않고 독자적으로 구성 --}}
<main>
	<form class="mt-5 mb-5" method="POST" action="{{route('board.store')}}">
		{{-- 1. 미들웨어로 권한 체크
			 2. 보드컨트롤러 store()메소드 호출하여 유저 입력 값 중 only()메소드 사용하여 b_title, b_content
			 배열형태로 $data 저장
			 3. 보드모델 create메소드 호출하여 유저 제출 데이터 DB insert 처리
			 4. return redirect()->route('board.index'); --}}
		@include('layout.errorlayout')
		{{-- 에러메세지 있을 시 errorlayout.blade.php에서 forelse 사용하여 에러메세지 출력 --}}
		@csrf
		{{-- form 태그에서는 의도하지 않은 요청을 악의적으로 전송하여 다른 유저계정에서 실행되는 액션을 
			트리거하는 공격방어 목적으로 @csrf 사용 --}}		
		<div>
			<label for="b_title" class="form-label">제목</label>
			<input type="text" class="form-control" id="b_title" name="b_title" autocomplete="off">
		</div>
		<div>
			<label for="b_content" class="form-label">내용</label>
			<textarea class="form-control" name="b_content" id="b_content" cols="30" rows="15"></textarea>
		</div>
		<div class="text-center mt-5 mb-5">
			<button type="submit" class="btn btn-primary">작성</button>
			<a class="btn btn-secondary" href="{{route('board.index')}}">취소</a>
		</div>
	</form>
</main>

@endsection