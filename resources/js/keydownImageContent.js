// Simulacion de click cuando se presiona Enter o Space en la imagen del label (tanto para el registro como para la edicion/creacion de publicaciones)

const labelImage = document.querySelector('.label-image');

addEventListener('DOMContentLoaded', function () {
    // Verifica si el elemento labelImage existe antes de agregar el evento
    if (labelImage) {
        labelImage.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' || event.key === ' ') {
                console.log("aprete")
                event.preventDefault();
                labelImage.click(); // Dispara el evento de click
            }
        });
    }
});
