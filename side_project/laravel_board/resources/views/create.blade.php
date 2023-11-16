@extends('layout.layout')

@section('title', 'Create')

@section('main')

<main>
	<form class="mt-5 mb-5" method="POST" action="{{route('board.store')}}">
		@include('layout.errorlayout')
		@csrf		
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