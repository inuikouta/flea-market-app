const token = $('meta[name="csrf-token"]').attr('content');

/**
 * 支払い方法選択時のラベルを更新
 */
$('select[name="payment-method"]').on('change', function () {
    const $select = $(this);
    const selectedText = $select.find('option:selected').text();
    $('.purchase-table__value--payment').text(selectedText);
});

/**
 * 購入ボタンクリック時の処理
 */
$('#buy-btn').on('click', function (e) {
    // 支払い方法が選択されているか確認
    const $select = $('#payment-method');
    if (!$select.val()) {
        alert("支払い方法を選択してください。");
        e.preventDefault(); // フォームの送信を防止
        return false;
    }
});