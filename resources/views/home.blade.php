@extends('layouts.app')

@section('content')
<p><a href="{{route('product.create')}}" class="btn btn-info btn-sm">新規登録</a></p>
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
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td><img src="{{asset('storage/images/'.$post->img_path)}}" style="height: 150px;"></td>
                <td>{{ $post->product_name }}</td>
                <td>{{ $post->price }}</td>
                <td>{{ $post->stock }}</td>
                <td>{{ $post->company_name }}</td>
                </td>
                <td class="text-nowrap">
                    <p><a href="{{route('product.show', $post)}}" class="btn btn-primary btn-sm">詳細</a></p>
                    <p><a href="" class="btn btn-danger btn-sm">削除</a></p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
