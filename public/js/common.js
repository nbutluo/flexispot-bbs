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

function handleCol(el, height) {
  if (
    el.nextElementSibling.style.height &&
    el.nextElementSibling.style.height !== "0px"
  ) {
    el.lastElementChild.lastElementChild.setAttribute(
      "d",
      "M512 256L512 768M256 512L768 512"
    );
    el.nextElementSibling.style.height = "0px";
  } else {
    el.lastElementChild.lastElementChild.setAttribute("d", "M256 512L768 512");
    el.nextElementSibling.style.height = height || "120px";
  }
}

//  打开复制弹窗
var open_box = document.querySelector(".copy_box");
function openAlert(e) {
  open_box.style.display = "flex";
}
function closeAlert(e) {
  open_box.style.display = "none";
}
