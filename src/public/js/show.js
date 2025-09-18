$(document).ready(function() {
    // タブのクリックイベント
    $('.product__tabs__tab-button').on('click', function() {
        const tabId = $(this).data('tab');

        // 選択中のタブボタンに active クラスを変更
        $('.product__tabs__tab-button').removeClass('product__tabs__tab-button--active');
        $(this).addClass('product__tabs__tab-button--active');

        // 選択中のコンテンツを表示
        $('.product__tab-content').removeClass('product__tab-content--active');
        $('#' + tabId + '-products').addClass('product__tab-content--active');
    });
});