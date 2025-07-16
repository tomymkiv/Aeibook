document.addEventListener("DOMContentLoaded", function () {
  const menuButton = document.querySelectorAll(".info-button");

  menuButton.forEach(menu => {
    let dropdownMenu = menu.nextElementSibling;
    menu.addEventListener("click", function () {
      dropdownMenu.classList.toggle("hidden");

      document.addEventListener("click", function (event) {
        if (!menu.contains(event.target) && !dropdownMenu.contains(event.target)) {
          dropdownMenu.classList.add("hidden");
        }
      });
    });
  })
});
