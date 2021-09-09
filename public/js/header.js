var avatars = document.getElementById("avatars");
var news = document.getElementById("news");
avatars.addEventListener("click", () => {
  if (news.style.display === "none" || news.style.display === "") {
    news.style.display = "block";
  } else {
    news.style.display = "none";
  }
});
