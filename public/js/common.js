function toggleMenu() {
  let target = document.querySelector(".hamburg-menu"),
    menu_box = document.querySelector(".type");
  target.classList.toggle("active");
  if (target.classList.contains("active")) {
    menu_box.style.display = "flex";
  } else {
    menu_box.style.display = "none";
  }
}

function handleLogin(e) {
  if (e.keyCode === 13) {
    document.forms["login-form"].submit();
  }
}
