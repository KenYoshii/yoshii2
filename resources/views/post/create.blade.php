@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-10 mt-6">
		<div class="card-body">
			<h1 class="mt4">新規登録</h1>

			<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
					<label for="company_name">会社名</label>
				<select
					id="company_id"
					name="company_id"
					class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
					value="{{ old('company_id') }}"
                    required
				>
                    <option value="">未選択</option>
					@foreach($companies as $company)
						<option value="{{ $company->id }}">{{ $company->company_name }}</option>
					@endforeach
				</select>
				</div>
				
				<div class="form-group">
					<label for="product_name">商品名</label>
					<input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Title" required>
				</div>

				<div class="form-group">
					<label for="price">金額</label>
					<input type="number" name="price" class="form-control" id="price" placeholder="price" required>
				</div>

				<div class="form-group">
					<label for="stock">在庫</label>
					<input type="number" name="stock" class="form-control" id="stock" placeholder="stock" required>
				</div>

				<div class="form-group">
					<label for="comment">コメント</label>
					<textarea name="comment" class="form-control" id="comment" cols="30" rows="10" ></textarea>
				</div>

				<div class="form-group">
					<label for="image">画像</label>
					<div calss="col-md-6">
						<input id="image" type="file" name="image">
				    </div>
			    </div>

				<button type="submit" class="btn-success">送信する</button>
				<p style="margin-top: 20px"><a href="{{route('home')}}" class="btn btn-info btn-sm">戻る</a></p>
			</form>
		</div>
	</div>
</div>
@endsection
