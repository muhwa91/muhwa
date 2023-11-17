@extends('layout.layout')
{{-- layout.blade.php 상속 --}}
@section('title', 'Detail')
{{-- title로 Detail 표기 --}}
@section('main')
{{-- layout.blade.php의 상속을 받지 않고 독자적으로 구성 --}}
<main>
	{{-- 1. list.blade.php에서 상세버튼 클릭 시 보드컨트롤러 show메소드 호출
		 2. 보드모델 통하여 DB 저장된 데이터 중 $id에 해당하는 레코드 반환하여 $result 저장
		 3. b_hits 조회수 ++사용하여 조회수 증가처리
		 4. 현재시간 기준으로 조회할 때 마다 현재시간으로 수정일 변경되는 건에 대하여 
		 timestamps false처리
		 5. 처리 후 save메소드 호출하여 변경 값 저장
		 6. return view('detail')->with('data', $result);
		 7. $result에 저장한 값을 $data로 받아 b_id, b_title, b_content, b_hits, created_at, updated_at 출력 --}}
	<form class="text-center mt-5 mb-5" method="POST" action="{{route('board.destroy', ['board' => $data->b_id])}}">
		{{-- 1. 미들웨어로 권한 체크
			 2. 보드컨트롤러 destroy($id)메소드 호출하여 해당 데이터 찾아 delete 처리
			 3. return redirect()->route('board.index'); --}}
		{{-- board.destroy라우트의 url은 board/{board}이므로, url상에서 동적으로 변하는 값으로 설정하기 위해
		세그먼트 파라미터인 {board}에 $data->b_id 설정
		(배열표기법을 사용하여 {board} 세그먼트 파라미터에 $data->b_id 아규먼트 전달) --}}
		@csrf
		{{-- form 태그에서는 의도하지 않은 요청을 악의적으로 전송하여 다른 유저계정에서 실행되는 액션을 
			트리거하는 공격방어 목적으로 @csrf 사용 --}}
		@method('delete')
		{{-- delete, put, patch 메소드 : 변경되는 메소드로 처리 될 수 있도록 @method('')설정필요 --}}
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
			<button type="submit" class="btn btn-danger">삭제</button>
			<a class="btn btn-primary" href="{{route('board.edit', ['board' => $data->b_id])}}">수정</a>
			<a class="btn btn-secondary" href="{{route('board.index')}}">취소</a>
		</div>
	</form>
</main>	

@endsection