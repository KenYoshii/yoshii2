@extends('layouts.app')
@section('content')
<div class="card mb-4">
	<div class="card-header">
		<h4>{{$post->product_name}}</h4>
	</div>
	<div class="card-body">
		<div>{{$post->img_path}}</div>
		<p class="card-text">{{$post->company_id}}</p>
		<p class="card-text">{{$post->price}}</p>
		<p class="card-text">{{$post->stock}}</p>
		<p class="card-text">{{$post->comment}}</p>
	</div>
	<div class="card-footer">
		<span class="mr-2 float-right">
			投稿日時{{$post->created_at}}
		</span>
	</div>
</div>
			
@endsection
