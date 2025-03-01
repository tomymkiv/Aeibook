const menuButton = document.querySelectorAll(".info-button");

menuButton.forEach(menu => {
  let dropdownMenu = menu.nextElementSibling;
  menu.addEventListener("click", function () {
    console.log();
    dropdownMenu.classList.toggle("hidden");

    document.addEventListener("click", function (event) {
      if (!menu.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add("hidden");
      }
    });
  });
})