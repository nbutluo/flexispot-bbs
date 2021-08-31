function testMobile() {
    if (
        /Android|webOS|iPhone|iPod|BlackBerry|iPad/i.test(navigator.userAgent)
    ) {
        return true;
    } else {
        return false;
    }
}

function goTop() {
    document.documentElement.scrollTop = 0;
}

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

function setActive(el) {
    let active = document.querySelector(".active-category-tab");
    if (active) {
        active.classList.remove("active-category-tab");
    }

    el.classList.add("active-category-tab");
}

function setHeight(el, height) {
    if (
        el.nextElementSibling.style.height &&
        el.nextElementSibling.style.height !== "0px"
    ) {
        el.lastElementChild.classList.remove("open");
        el.nextElementSibling.style.height = "0px";
    } else {
        let active = document.querySelector(".active-category-tab");
        if (active) {
            active.classList.remove("active-category-tab");
        }
        el.classList.add("active-category-tab");
        el.lastElementChild.classList.add("open");
        el.nextElementSibling.style.height = height || "120px";
    }
}

function showFloat(el) {
    let float = el.nextElementSibling;
    if (float) {
        float.style.display = "flex";
    }
}

function hideFloat(el) {
    let float = el.nextElementSibling;
    if (float) {
        float.style.display = "none";
    }
}

var modal = document.querySelector(".category_box"),
    all_tab = document.querySelector(".all_tab"),
    cates = document.querySelector(".cates_pc");

// all_tab.addEventListener("click", () => {
//     if (testMobile()) {
//         modal.style.display = "flex";
//     } else {
//         cates.style.display = "flex";
//     }
// });

// modal.addEventListener("click", () => {
//     modal.style.display = "none";
// });
