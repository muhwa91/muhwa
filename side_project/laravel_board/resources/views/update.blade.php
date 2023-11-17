@extends('layout.layout')
{{-- layout.blade.php 상속 --}}
@section('title', 'Update')
{{-- title로 Update 표기 --}}
@section('main')
{{-- layout.blade.php의 상속을 받지 않고 독자적으로 구성 --}}
<main>
	<form class="mt-5 mb-5" method="POST" action="{{route('board.update', ['board' => $data->b_id])}}">
		
		@include('layout.errorlayout')
		{{-- 에러메세지 있을 시 errorlayout.blade.php에서 forelse 사용하여 에러메세지 출력 --}}
		@csrf
		{{-- form 태그에서는 의도하지 않은 요청을 악의적으로 전송하여 다른 유저계정에서 실행되는 액션을 
			트리거하는 공격방어 목적으로 @csrf 사용 --}}
		@method('put')
		{{-- delete, put, patch 메소드 : 변경되는 메소드로 처리 될 수 있도록 @method('')설정필요 --}}		
		<div>
			<label for="b_title" class="form-label">제목</label>
			<input type="text" class="form-control" id="b_title" name="b_title" 
			 value="{{$data->b_title}}" autocomplete="off">
		</div>
		<div>
			<label for="b_content" class="form-label">내용</label>
			<textarea class="form-control" name="b_content" id="b_content" cols="30" rows="15">{{$data->b_content}}</textarea>
		</div>
		<div class="text-center mt-5 mb-5">
			<button type="submit" class="btn btn-primary">수정</button>
			<a class="btn btn-secondary" href="{{route('board.show', ['board' => $data->b_id])}}">취소</a>
		</div>
	</form>
</main>

@endsection