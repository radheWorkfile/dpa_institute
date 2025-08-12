const menu = document.querySelector(".menu");
const openMenuBtn = document.querySelector(".open-menu-btn");
const closeMenuBtn = document.querySelector(".close-menu-btn");

[openMenuBtn, closeMenuBtn].forEach((btn) => {
  btn.addEventListener("click", (event) => {
    menu.classList.toggle("open");
    menu.style.transition = "transform 0.5s ease";
    event.stopPropagation(); 
  });
});


document.addEventListener("click", (event) => {
  console.log(event);
  if (menu.classList.contains("open") && !menu.contains(event.target) && !openMenuBtn.contains(event.target)) {
    menu.classList.remove("open");
  }
});


menu.addEventListener("transitionend", function () {
  this.removeAttribute("style");
});

menu.querySelectorAll(".dropdown > i").forEach((arrow) => {
  arrow.addEventListener("click", function (event) {
    this.closest(".dropdown").classList.toggle("active");
    event.stopPropagation(); 
  });
});
