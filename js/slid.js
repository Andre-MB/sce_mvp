const carousel = document.querySelector(".imagens_do_slide");
firstImg = carousel.querySelectorAll(".item")[1];
arrowIcons = document.querySelectorAll(".control");

console.log(arrowIcons)
let isDragStart = false, prevPagex, prevScrollLeft;
let firstImgWidth = firstImg.clientWidth + 54;

console.log(firstImgWidth)

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        // console.log(icon);
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;

        if (carousel.scrollLeft >= 800) {
            carousel.scrollLeft = 0;
        } else if (icon.id == "left" && carousel.scrollLeft == 0) {
            carousel.scrollLeft = 700;
        }
    })
})

setInterval(function () {
    carousel.scrollLeft += firstImgWidth + 30;

    console.log(carousel.scrollLeft);
    console.log("iofvisdj")

    if (carousel.scrollLeft >= 800) {
        carousel.scrollLeft = 0;
    }
}, 3000);