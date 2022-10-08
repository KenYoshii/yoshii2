@extends('layouts.app')

@section('content')
<p><a href="{{route('product.create')}}" class="btn btn-info btn-sm">新規登録</a></p>
{{--  <div class="search">
    <form action="{{ route('product.index') }}" method="GET">
        @csrf

        <div class="form-group">
            <div>
                <label for="">キーワード
                <div>
                    <input type="text" name="keyword" value="{{ $keyword }}">
                </div>
                </label>
            </div>

            <div>
                <label for="">メーカー名
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

            <div>
                <input type="submit" class="btn" value="検索">
            </div>
        </div>
    </form>
</div>  --}}
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
