const input = document.getElementById('file-upload');

input.addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault(); // Prevenir el comportamiento por defecto del Enter
        input.click(); // Simular un clic en el input de archivo
    }
});

input.addEventListener('change', function (event) {
    let file = event.target.files[0]; // Obtener el archivo seleccionado
    if (file) {
        let reader = new FileReader();
        let video = null;
        reader.onload = function (e) {
            let img = document.getElementById('previewImage');
            let userPhoto = document.querySelector(".user-photo");
            let newPhotoContainer = document.getElementById("previewContainer");
            if(userPhoto)
                userPhoto.classList.add('hidden');
            if (newPhotoContainer.classList.contains('hidden'))
                newPhotoContainer.classList.remove('hidden');


            img.src = e.target.result;
            // e.target.result.includes("video") VERIFICAR SI ES VIDEO
            // muestro la imagen en caso de ser una imagen
            if (!video)
                img.classList.add('block'); // Mostrar la imagen
            // else
            //     assert(false, "No se esperaba un video en este contexto");
                //muestro algo referido a un video para dar a entender que es un video
        };
        
        // Verificar si el archivo es una imagen o un video
        reader.readAsDataURL(file);
    }   
});

