const btn = document.querySelector(".menuBtn");
const asideContainer = document.querySelector('.aside-nav');
const menuSection = document.querySelector(".menu-sec");
const menuBars = document.querySelector(".bars");

if (btn) {
  btn.addEventListener('click', () => {
    // Si es una pantalla <= 767px, oculto el scroll al abrir el menu
    if (innerWidth <= 1024) {
      document.querySelector('body').classList.toggle('overflow-hidden');
    }

    asideContainer.classList.toggle('w-0');
    asideContainer.classList.toggle('w-screen');
    asideContainer.classList.toggle('p-4');
    menuSection.classList.toggle('z-40');
    menuBars.classList.toggle('bg-black/65')
  })
}
