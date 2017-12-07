//  表示するページを更新する
$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getLists(page);
        }
    }
});

//  ページ移動するリンクのエベント
$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        getLists($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});

//  AJAXでリストを取得する
function getLists(page) {
    //  検索条件を取得する
    var search = window.location.search;
    if (search) {
        //  検索条件がある場合
        search = search + '&page=';
    } else {
        //  検索条件が無い場合
        search = '?page=';
    }
    //  レクエストする
    $.ajax({
        url : search + page,
        dataType: 'json',
    }).done(function (data) {
        $('.lists').html(data);
        location.hash = page;
    }).fail(function () {
        alert('ページが取得出来ません。');
    });
}