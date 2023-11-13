{{-- 상속(블레이드 문법) --}}
@extends('inc.layout')

{{-- @section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식1 타이틀')

{{-- @section ~ @endsection : 처리해야 될 코드가 많을 경우 --}}
@section('main')
<h2>자식1 화면</h2>
<p>여러 데이터를 표시</p>
<hr>
{{-- 조건문 --}}
@if($gender === '0') 
	<span>성별 : 남자</span>
@elseif($gender === '1')
	<span>성별 : 여자</span>
@else
	<span>성별 : 기타</span>
@endif
<hr>

{{-- 반복문 --}}
<h3>for 반복문</h3>

@for($i = 0; $i < 5; $i++)
	{{-- {{변수}}화면에 변수 출력 --}}
	{{-- <span>{{$i}}</span>  --}}
	{{$i}}
@endfor
<hr>
<h3>foreach문</h3>

@foreach ($data as $key => $val)
	{{-- 반복되는 배열의 아이템 수 >> 현재 반복문의 횟수 --}}
	<p>{{$loop->count.' >> '.$loop->iteration}}</p>
	<span>{{$key.' : '.$val}}</span><br>

@endforeach
<hr>
@forelse($data2 as $key => $val)
	<span>{{$key.' : '.$val}}</span><br>
@empty
	<span>빈 배열</span>
@endforelse

@endsection

{{-- 부모 show 테스트용 --}}
@section('show')
<h2>자식1의 show</h2>
<p>자식1</p>
@endsection