const deleteBtnModal = document.querySelectorAll('.delete-btn-modal');
const deleteBtnPost = document.querySelectorAll('.delete-btn');

deleteBtnPost.forEach(btn => {
    btn.addEventListener('click', function () {
        deleteBtnModal.forEach(btnModal => {
            btnModal.addEventListener('click', function () {
                // Envío el formulario luego de clickear "eliminar" en el modal. El modal solo cumple con la funcion de confirmar la eliminación (frontend).
                btn.closest('div[role=none]').querySelector('form').submit();// Busco el formulario más cercano al botón de eliminar y lo envío.
                // Envío el formulario que contiene el ID del post seleccionado.
            });
        });
    });
});