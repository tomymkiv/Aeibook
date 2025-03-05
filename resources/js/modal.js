const deleteBtn = document.querySelectorAll(".delete-btn");
const cancelBtn = document.querySelectorAll(".cancel-btn");
const modal = document.querySelector(".modal-container");

// shows modal
deleteBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        modal.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    });
});
// hides modal
cancelBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        document.body.classList.toggle('overflow-hidden');
        modal.classList.add('hidden')
    })
})