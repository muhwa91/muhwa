@extends('layout.layout')

@section('title', 'List')

@section('main')
<main>
	{{-- @forelse($data as $item) --}}
		<div class="card">		
			<div class="card-body">
			<h5 class="card-title">{{$data->b_title}}</h5>
			<p class="card-text">{{$data->b_content}}</p>
			<p class="card-text">{{$data->b_hits}}</p>
			<p class="card-text">{{$data->created_at}}</p>
			<p class="card-text">{{$data->updated_at}}</p>
			</div>
		</div>
	{{-- @empty
	@endforelse --}}
</main>
@endsection