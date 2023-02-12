$(function () {
    $("#btn").on("click", function () {
        let search = $("#search").val();
        let search2 = $("#categoryId").val();
        $("#tbl").empty();
        console.log("okok");

        
        $.ajax({
                type: "get", //HTTP通信の種類
                url: "searchproduct",
                dataType: "json",
                data: {
                    product_name: search,
                    product_categoryId: search2,
                    searchWord: search
                },
                cache: false,
        })
        //通信が成功したとき
        .done(function (res) { // resの部分にコントローラーから返ってきた値が入る
            let products = res.products.data;
            let categories = res.categories;
            console.log(products);
            let html = '';

            $.each(products, function (index, product) {
                    let company_name = categories[product.company_id];
                html = `
                <tr>
                    <td>${ product.id }</td>
                    <td><img src="{{asset('storage/images/'.${product.img_path}}" style="height: 150px;"></td>
                    <td>${ product.product_name }</td>
                    <td>${ product.price }</td>
                    <td>${ product.stock }</td>
                    <td>${ company_name }</td>
                    </td>
                    <td class="text-nowrap">
                        <p><a href ="product/${product.id}"class="btn btn-primary btn-sm">詳細</a></p>
                        <p><a class="btn btn-danger btn-sm" onClick="return confirm('削除しますか？');">
                            削除</a></p>
                    </td>
                </tr>
                    `;
                $("#tbl").append(html); 
            });
        })
        //通信が失敗したとき
        .fail(function (data, xhr, err) {
                console.log(xhr);
                console.log(err);
                console.log(data || 'null');
        });
    });
});