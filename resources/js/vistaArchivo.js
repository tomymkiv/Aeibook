const input = document.getElementById('file-upload');

input.addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault(); // Prevenir el comportamiento por defecto del Enter
        input.click(); // Simular un clic en el input de archivo
    }
});

input.addEventListener('change', function (event) {
    let file = event.target.files[0]; // Obtener el archivo seleccionado
    let fileType = file.type;
    if (file) {
        let reader = new FileReader();

        reader.onload = function (e) {
            let img = document.getElementById('previewImage');
            let userPhoto = document.querySelector(".user-photo");
            let newPhotoContainer = document.getElementById("previewContainer");

            if (userPhoto)
                userPhoto.classList.add('hidden');
            if (newPhotoContainer.classList.contains('hidden'))
                newPhotoContainer.classList.remove('hidden');

            if (!fileType.includes('video')) {
                img.src = e.target.result;
                img.classList.add('block'); // Mostrar la imagen ingresada
            }
            else {
                img.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUDgh6GxoGFNrTIyBLhz58Mp09BRLboPuIBw&s';
            }
        };

        // Verificar si el archivo es una imagen o un video
        reader.readAsDataURL(file);
    }
});

