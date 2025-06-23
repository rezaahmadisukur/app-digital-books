const profile = document.querySelector(".profile");
const dropdownLink = document.querySelector(".dropdown-links");
const profileArrow = document.querySelector(".ri-arrow-down-s-line");

profile.addEventListener("click", () => {
    dropdownLink.classList.toggle("active");
    profileArrow.classList.toggle("active");
});

window.onscroll = () => {
    const nav = document.querySelector("nav");
    const arrowUp = document.querySelector(".arrow-up");
    const topPage = nav.offsetTop;
    if (window.pageYOffset > topPage) {
        arrowUp.classList.add("active");
    } else {
        arrowUp.classList.remove("active");
    }
};
