@extends('layout.layout')
{{-- layout.blade.php 상속 --}}
@section('title', 'List')
{{-- title로 List 표기 --}}
@section('main')
{{-- layout.blade.php의 상속을 받지 않고 독자적으로 구성 --}}
<div class="text-center mt-5 mb-5">
	<a href="{{route('board.create')}}" class="btn btn-primary">
		{{-- 1. 보드컨트롤러 create메소드 호출
			 2. return view('create'); --}}
		<svg xmlns="http://www.w3.org/2000/svg" 
			width="40" height="40" fill="currentColor" 
			class="bi bi-pencil-fill" viewBox="0 0 16 16">
				<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
		</svg>
	</a>
</div>

<main>
	@forelse($data as $item)
	{{-- 1. 보드컨트롤러 index메소드 호출
		 2. 보드모델 통하여 DB 저장된 데이터를 $result 저장
		 3. return view('list')->with('data', $result);
		 4. $result에 저장한 값을 $data로 받아 forelse 사용하여 b_title, b_content 출력 --}}
		<div class="card">		
			<div class="card-body">
			<h5 class="card-title">{{$item->b_title}}</h5>
			<p class="card-text">{{$item->b_content}}</p>
			<a href="{{route('board.show', ['board' => $item->b_id])}}" class="btn btn-primary">상세</a>
			{{-- board.show라우트의 url은 board/{board}이므로, url상에서 동적으로 변하는 값으로 설정하기 위해
			 세그먼트 파라미터인 {board}에 $item->b_id 설정
			 (배열표기법을 사용하여 {board} 세그먼트 파라미터에 $item->b_id 아규먼트 전달) --}}
			</div>
		</div>
	@empty
		<div>게시글 없음</div>
	@endforelse
</main>
@endsection