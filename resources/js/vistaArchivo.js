const input = document.getElementById('file-upload');

input.addEventListener('change', function (event) {
    let file = event.target.files[0]; // Obtener el archivo seleccionado
    if (file) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let img = document.getElementById('previewImage');
            let userPhoto = document.querySelector(".user-photo");
            let newPhotoContainer = document.getElementById("previewContainer");
            if(userPhoto)
                userPhoto.classList.add('hidden');
            if (newPhotoContainer.classList.contains('hidden'))
                newPhotoContainer.classList.remove('hidden');

            img.src = e.target.result;
            img.classList.add('block'); // Mostrar la imagen
        };
        reader.readAsDataURL(file); // Leer el archivo como URL
    }
});

