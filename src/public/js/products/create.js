const imageInput = $('#image-input');
const previewImage = $('#previewImage');
const previewWrapper = $('.product-create__image-wrapper');

imageInput.on('change', function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader(); // ファイルを読み込むためのオブジェクト
        reader.onload = function (e) {
            previewImage.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
        previewImage.css('display', 'block'); // 画像が選択されたら表示
    }
});