const imgCover = document.querySelector(".img-cover");
const dropdownLink = document.querySelector(".dropdown-links");

imgCover.addEventListener("click", () => {
    dropdownLink.classList.toggle("active");
});
