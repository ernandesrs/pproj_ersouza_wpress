const header = document.querySelector(".header");
const navToggler = header.querySelector(".toggler");

const cookieAlert = document.querySelector(".cookie-alert");
const allowCookie = cookieAlert.querySelector(".allow-cookie");

if (!cookie_accepted()) {
    show_cookie_alert();
}

document.addEventListener("scroll", function () {
    let top = window.top.scrollY;

    if (top < 75 && header.classList.contains("fill-background")) {
        header.classList.remove("fill-background");
    }

    if (top >= 75 && !header.classList.contains("fill-background")) {
        header.classList.add("fill-background");
    }
});

navToggler.addEventListener("click", () => {
    const nav = header.querySelector(".nav");

    if (nav.classList.contains("visible")) {
        nav.classList.remove("mobile");
        nav.classList.remove("visible");
    } else {
        nav.classList.add("mobile");
        nav.classList.add("visible");
    }
});

allowCookie.addEventListener("click", () => {
    cookie_accept();
    hide_cookie_alert();
})

/**
 * check if cookie has accepted
 */
function cookie_accepted() {
    return localStorage.getItem("allowed_cookie") ?? false;
}

/**
 * accept cookie
 */
function cookie_accept() {
    localStorage.setItem("allowed_cookie", true);
}

/**
 * show cookie alert
 */
function show_cookie_alert() {
    cookieAlert.classList.add("show-cookie-alert");
    setTimeout(() => {
        cookieAlert.classList.remove("show-cookie-alert");
        cookieAlert.classList.add("show");
    }, 1000);
}

/**
 * hide cookie alert
 */
function hide_cookie_alert() {
    cookieAlert.classList.add("hide-cookie-alert");
    setTimeout(() => {
        cookieAlert.classList.remove("show");
        cookieAlert.classList.remove("hide-cookie-alert");
    }, 500);
}