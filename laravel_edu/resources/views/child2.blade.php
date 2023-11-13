{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}

@section('main')

@for($i = 1; $i <= 9; $i++) 
	<span>{{$i}}단</span><br>
	@for($j = 1; $j <= 9; $j++)
		<span>{{$i}} x {{$j}} = {{$i * $j}}</span><br>
	@endfor
@endfor




@endsection