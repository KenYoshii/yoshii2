@extends('layouts.app')
@section('content')
<div class="card mb-4">
	<div class="card-header">
		<h4>{{$post->product_name}}</h4>
		<span class="ml-auto">
			<p><a href="{{route('product.edit', $post)}}" class="btn btn-info btn-sm">編集</a></p>
		</span>

	</div>
	<div class="card-body">
		<div>
			<img src="{{asset('storage/images/'.$post->img_path)}}" style="height: 300px;">
		</div>
		<p class="card-text">{{$post->company_name}}</p>
		<p class="card-text">価格：{{$post->price}}円</p>
		<p class="card-text">在庫数：{{$post->stock}}</p>
		<p class="card-text">コメント：{{$post->comment}}</p>
	</div>
	<div class="card-footer">
		<span class="mr-2 float-right">
			投稿日時{{$post->created_at}}
		</span>
	</div>
</div>
			
@endsection
