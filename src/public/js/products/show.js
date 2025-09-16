const token = $('meta[name="csrf-token"]').attr('content');

/**
 * コメントが投稿されたときの処理
 * @param {void}
 * @returns {void}
 */
function incrementCommentCounts() {
    // ヘッダのバッジ
    const $badge = $('.product-container__comment-count');
    const n1 = parseInt($badge.text(), 10) || 0;
    $badge.text(n1 + 1);

    // 見出し「コメント（N）」のNを更新
    const $title = $('.product-comment__title');
    const m = $title.text().match(/（(\d+)）/);
    if (m) {
        const n2 = (parseInt(m[1], 10) || 0) + 1;
        $title.text(`コメント（${n2}）`);
    }
}

/**
 * コメントをリストの先頭に追加する
 * @param {Object} c コメントオブジェクト {text, user, img, created_at}
 * @returns {void}
 */
function prependCommentToList(c) {
    console.log('prependCommentToList', c);
    const html = `
        <div class="product-comment__comment">
            <img class="product-comment__img" src="${c.img || 'https://placehold.co/600x600'}" alt="">
            <div class="product-comment__comment-right">
                <span class="product-comment__comment-user">${c.user || ''}</span>
                <div class="product-comment__comment-content">
                    <span class="product-comment__comment-text">${c.text}</span>
                    <span class="product-comment__comment-date">今</span>
                </div>
            </div>
        </div>`;
    $('.product-comment__comments').prepend(html);
}

$('.product-comment__submit-btn').on('click', function () {
    let $form = $(this).closest('div');
    let $tr = $form.find('textarea');
    let commentText = $tr.val();
    if (commentText.trim() === '') {
        alert('コメントを入力してください。');
        return;
    }

    $.ajax({
        url: $form.data('url'),
        method: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            comment: commentText,
            _token: token,
        },
        success: function (res) {
            alert('コメントが投稿されました。');
            console.log(res.comment.img);
            const c = res && res.comment ? res.comment : {
                text,
                name: res.comment.user,
                created_at: '今',
                image_path: res.comment.img
            };
            prependCommentToList(c);
            incrementCommentCounts();
            $tr.val('');
            //コメント欄の更新
        },
        error: function (xhr) {
            // エラー時の処理
            alert('コメントの投稿に失敗しました。');
        }
    });
});

/**
 * いいね！ボタンがクリックされたときの処理
 */
$("#favorite-btn").on('click', function () {
    $btn = $(this);
    if ($btn.prop('disabled')) return; // 2秒間は無効化

    $btn.toggleClass('active');
    $btn.prop('disabled', true);

    // いいねの背景を反転
    $btn.find('img').toggleClass('favorite-colored');

    // activeクラスが付いていればtrue（お気に入り中）、なければfalse（解除）
    const isFavorite = $(this).hasClass('active') ? 1 : 0;

    // API即時送信
    $.ajax({
        url: $btn.data('url'),
        method: 'POST',
        data: {
            favorite: isFavorite,
            _token: token,
        },
        complete: function() {
            setTimeout(function() {
                $btn.prop('disabled', false); // 2秒後に有効化
            }, 1000);
        }
    });
});