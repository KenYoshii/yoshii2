$(function () {
    $("#btn").on("click", function () {
        let search = $("#search").val();
        $.ajax({
                type: "get", //HTTP通信の種類
                url: "searchproduct",
                dataType: "json",
                data: {
                    product_name: search
                },
                cache: false,
            })
            //通信が成功したとき
            .done(function (res) { // resの部分にコントローラーから返ってきた値 $users が入る
                console.log('seikou');
                //     $.each(res, function (index, value) {
                //         html = `
                // 				<tr class="user-list">
                // 					<td class="col-xs-2">ユーザー名</td>
                // 				</tr>
                //    `;
                // $(".user-table").append(html); //できあがったテンプレートを user-tableクラスの中に追加
                // });
            })
            //通信が失敗したとき
            .fail(function (data, xhr, err) {
                console.log(xhr);
                console.log(err);
                console.log(data || 'null');
            });
    });
})
