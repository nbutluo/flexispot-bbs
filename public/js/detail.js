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
var activeIdx = 0;
function removeActive() {
    let active = document.querySelector(".active");
    console.log(active);
    active.classList.remove("active");
}

// let left_btn = document.querySelector(".left-btn"),
//     right_btn = document.querySelector(".right-btn"),
//     nums = document.querySelectorAll(".num");
// right_btn.addEventListener("click", () => {
//     removeActive();
//     if (activeIdx < nums.length - 1) {
//         activeIdx++;
//     } else {
//         activeIdx = 0;
//     }
//     nums[activeIdx].classList.add("active");
// });
// left_btn.addEventListener("click", () => {
//     removeActive();
//     if (activeIdx > 0) {
//         activeIdx--;
//     } else {
//         activeIdx = nums.length - 1;
//     }
//     nums[activeIdx].classList.add("active");
// });
//   打开复制弹窗
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
