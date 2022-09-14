@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-10 mt-6">
		<div class="card-body">
			<h1 class="mt4">新規登録</h1>
			<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">商品名</label>
					<input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
				</div>

				<div class="form-group">
					<label for="body">本文</label>
					<textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
				</div>

				<div class="form-group">
					<label for="image">画像</label>
					<div calss="col-md-6">
						<input id="image" type="file" name="image">
				</div>
			</div>

				<button type="submit" class="btn-success">送信する</button>
			</form>
		</div>
	</div>
</div>
@endsection
