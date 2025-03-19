document.addEventListener("DOMContentLoaded", () => {
    const slider = document.querySelector(".qsomos-slider");
    const prevBtn = document.querySelector(".qsomos-prev");
    const nextBtn = document.querySelector(".qsomos-next");
    const totalSlides = document.querySelectorAll(".qsomos-card").length;
    
    let index = 0;

    function updateSlider() {
        slider.style.transform = `translateX(${-index * 100}%)`;
    }

    nextBtn.addEventListener("click", () => {
        index = (index + 1) % totalSlides;
        updateSlider();
    });

    prevBtn.addEventListener("click", () => {
        index = (index - 1 + totalSlides) % totalSlides;
        updateSlider();
    });
});
