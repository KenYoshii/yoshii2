$(function () {
    // 検索ボタン押下時
    $("#btn").on("click", function () {
        let search = $("#search").val();
        let search2 = $("#categoryId").val();
        $("#tbl").empty();

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
            let html = '';

            $.each(products, function (index, product) {
                let company_name = categories[product.company_id];
                html = `
                <tr id="${ product.id }">
                    <td>${ product.id }</td>
                    <td><img src="http://localhost:8888/${product.img_path}" style="height: 150px;"></td>
                    <td>${ product.product_name }</td>
                    <td>${ product.price }</td>
                    <td>${ product.stock }</td>
                    <td>${ company_name }</td>
                    </td>
                    <td class="text-nowrap">
                        <p><a href ="product/${product.id}"class="btn btn-primary btn-sm">詳細</a></p>
                        <p><button id="" value="" type="button" class="btn btn-danger btn-sm deleteBtn">削除</button></p>					
                    </td>
                </tr>
                    `;
                $("#tbl").append(html);
                // 検索結果に対してのソート機能を追加
                $("#table").trigger("update");
            });
        })
        //通信が失敗したとき
        .fail(function (data, xhr, err) {
                console.log(xhr);
                console.log(err);
                console.log(data || 'null');
        });
    });

    // 削除ボタン押下時
    $(document).on("click", ".deleteBtn", function() {
        if(window.confirm('削除しますか？')) {
            // 削除対象の商品IDを取得
            let clickEle = $(this);
            let productId = clickEle.parent().parent().parent().attr('id');
            console.log(productId);

            $.ajax({
                type: "delete", //HTTP通信の種類
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "/product/destroy",
                dataType: "json",
                data: {
                    product_id : productId,
                },
                cache: false,
            })
            //通信が成功したとき
            .done(function (res) { // resの部分にコントローラーから返ってきた値が入る
                let id = res;
                $("#"+id).empty();
                alert('削除しました。')
            })
            //通信が失敗したとき
            .fail(function (data, xhr, err) {
                console.log(xhr);
                console.log(err);
                console.log(data || 'null');
            });
        }                   
    });

    // ソート機能
    $("#table").tablesorter({
        headers: {
            0: {sorter: true},
            1: {sorter: false},
            2: {sorter: true},
            3: {sorter: true},
            4: {sorter: true},
            5: {sorter: true},
            6: {sorter: false},
        },
        sortReset: true,
    }); 
    
});