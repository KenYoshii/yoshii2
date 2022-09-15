@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-10 mt-6">
		<div class="card-body">
			<h1 class="mt4">新規登録</h1>
			<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
				@csrf

				<div>
                    <label for="">会社ID
                    <div>
                        <select name="company" data-toggle="select">
                            <option value="">全て</option>
                            @foreach ($companies_list as $companies_item)
                                <option value="{{ $companies_item->getCompany() }}" @if($company=='{{ $companies_item->getCompany() }}') selected @endif>{{ $companies_item->getCompany() }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>
				<div class="form-group">
					<label for="product_name">商品名</label>
					<input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Title">
				</div>

				<div class="form-group">
					<label for="price">金額</label>
					<input type="number" name="price" class="form-control" id="price" placeholder="price">
				</div>

				<div class="form-group">
					<label for="stock">在庫</label>
					<input type="number" name="stock" class="form-control" id="stock" placeholder="stock">
				</div>

				<div class="form-group">
					<label for="comment">コメント</label>
					<textarea name="comment" class="form-control" id="comment" cols="30" rows="10"></textarea>
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
