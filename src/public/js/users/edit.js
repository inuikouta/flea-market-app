const imageInput = document.getElementById('profileImage');
const previewImage = document.getElementById('previewImage');

imageInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            previewImage.src = event.target.result;
            previewImage.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});