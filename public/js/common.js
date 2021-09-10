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


// 打开回帖弹窗
function hideModal() {
    let reply = document.querySelector(".reply-modal");
    reply.style.display = "none";
}
function openModal() {
    let reply = document.querySelector(".reply-modal");
    reply.style.display = "block";
    reply.style.height = "auto";
}
function foldModal(e) {
    let reply = document.querySelector(".reply-modal");
    reply.style.height = "44px";
    e.stopPropagation();
}
function resetModal() {
    let reply = document.querySelector(".reply-modal");
    reply.style.height = "auto";
}
// 切换喜欢帖子
function toggleLike(el) {
    let src = el.getAttribute("src");
    // console.log(src);
    el.src =
        src === "/assets/like.png" ? "/assets/liked.png" : "/assets/like.png";
}
// 切换收藏帖子
function toggleCollect(el) {
    let src = el.getAttribute("src");

    el.src =
        src === "/assets/collect.png"
            ? "/assets/yellow_collect.png"
            : "/assets/collect.png";
}
// 评论输入框
function addComment(el) {
    let parent = el.parentNode.parentNode;

    let form = parent.querySelector(".add-form");
    let cur = form.style.display;
    if (cur === "none" || cur === "") {
        form.style.display = "flex";
    } else {
        form.style.display = "none";
    }
}
