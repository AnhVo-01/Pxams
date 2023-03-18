var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    slidesPerView: 1,
    grabCursor: true,
    centeredSlides: true,
    breakpoints: {
        320: {
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        },
        992: {
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
        },
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// =====================================================================

const ques = document.querySelectorAll(".flip-card-front"),
    ans = document.querySelectorAll(".flip-card-back"),
    flip = document.querySelectorAll(".flip-card-inner"),
    qaBox = document.querySelectorAll(".flip-card");

for (let j = 0; j < qaBox.length; j++) {
    qaBox[j].onclick = function () {
        flip[j].style.transform = "rotateX(180deg)";

        if (ans[j].style.display === "flex") {
            ans[j].style.display = "none";
            ques[j].style.display = "flex";
            flip[j].style.transform = "rotateX(0deg)";
        } else {
            ans[j].style.display = "flex";
            ques[j].style.display = "none";
        }
    };
}
