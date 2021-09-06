var avatars = document.getElementById("avatars");
var news = document.getElementById("news");
avatars.addEventListener("click", () => {
  if (news.style.display === "none" || news.style.display === "") {
    news.style.display = "block";
  } else {
    news.style.display = "none";
  }
});

var activeIdx = 0;
let left_btn = document.querySelector(".left-btn"),
  right_btn = document.querySelector(".right-btn"),
  nums = document.querySelectorAll(".num");

function removeActive() {
  let active = document.querySelector(".active");
  // console.log(active);
  active.classList.remove("active");
}

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
