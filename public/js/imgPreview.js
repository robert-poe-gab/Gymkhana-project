document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('imageGim');
    const previewImage = document.getElementById('previewImage');

    fileInput.addEventListener('change', e => {
        const file = e.target.files[0];
        if (file) {
            previewImage.src = URL.createObjectURL(file);
        }
    });
});
