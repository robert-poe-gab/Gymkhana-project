document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('profile_image');
    const previewImage = document.getElementById('previewImageUser');

    fileInput.addEventListener('change', e => {
        const file = e.target.files[0];
        if (file) {
            previewImage.src = URL.createObjectURL(file);
        }
    });
});