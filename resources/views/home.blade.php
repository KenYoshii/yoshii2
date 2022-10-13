@extends('layouts.app')

@section('content')
<p><a href="{{route('product.create')}}" class="btn btn-info btn-sm">新規登録</a></p>

<!-- 検索フォーム -->
<form method="get" action="" class="form-inline">
    <div class="form-group">
        <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="キーワード検索">
    </div>
    <div class="form-group">
        <input type="submit" value="検索" class="btn btn-info" style="margin: 15px; color:white;">
    </div>
</form>

{{--  <!-- セレクトボックス -->
<select class="form-control" name="company_select" value="{{$company}}">
    <option value="">選択</option>
    @foreach (as)
    <option value={{  }}</option>
    @endforeach
</select>  --}}

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
