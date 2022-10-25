@extends('layouts.app')

@section('content')
<p><a href="{{route('product.create')}}" class="btn btn-info btn-sm">新規登録</a></p>

<!--検索フォーム-->
      <div class="row">
        <div class="col-sm">
          <form method="GET" action="{{ route('searchproduct')}}">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">キーワード検索</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">検索</button>
              </div>
            </div>     
            <!--プルダウンカテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2">メーカー名</label>
              <div class="col-sm-3">
                <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                  <option value="">未選択</option>

                  @foreach($categories as $id => $company_name)
                  <option value="{{ $id }}">
                    {{ $company_name }}
                  </option>  
                  @endforeach
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{asset('storage/images/'.$product->img_path)}}" style="height: 150px;"></td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                </td>
                <td class="text-nowrap">
                    <p><a href="{{route('product.show', $product)}}" class="btn btn-primary btn-sm">詳細</a></p>
                    <p><a href="{{route('product.destroy', $product)}}" class="btn btn-danger btn-sm" onClick="return confirm('削除しますか？');">
                        @csrf
                        @method('delete')削除</a></p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
