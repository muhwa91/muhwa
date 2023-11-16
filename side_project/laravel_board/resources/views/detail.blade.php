@extends('layout.layout')

@section('title', 'Detail')

@section('main')

<main>
	<form class="text-center mt-5 mb-5" method="POST" action="{{route('board.destroy', ['board' => $data->b_id])}}">
		@csrf
		@method('delete')
		<div class="mb-3">
			<p>번호</p>
			<p>{{$data->b_id}}</p>
		</div>
		<div class="mb-3">
			<p>제목</p>
			<p class="card-text">{{$data->b_title}}</p>
		</div>
		<div class="mb-3">
			<p>내용</p>
			<p class="card-text">{{$data->b_content}}</p>
		</div>
		<div class="mb-3">
			<p>조회수</p>
			<p class="card-text">{{$data->b_hits}}</p>
		</div>
		<div class="mb-3">
			<p>작성일</p>
			<p class="card-text">{{$data->created_at}}</p>
		</div>
		<div class="mb-3">
			<p>수정일</p>
			<p class="card-text">{{$data->updated_at}}</p>
		</div>
		<div class="text-center mt-5 mb-5">
			<button type="submit" class="btn btn-primary">삭제</button>
			<a class="btn btn-secondary" href="{{route('board.index')}}">취소</a>
		</div>
	</form>
</main>	
	{{-- 보드컨트롤러에서 find메소드 사용하여 b_id의 값 가져와서 data에 저장한 것을 호출 --}}

@endsection