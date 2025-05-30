// Vanilla JS property slider for Estatein
// Shows 3 properties per slide on desktop/laptop, 1 per slide on mobile

document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('properties-slider');
    const slides = slider ? Array.from(slider.getElementsByClassName('property-slide')) : [];
    const prevBtn = document.getElementById('properties-prev');
    const nextBtn = document.getElementById('properties-next');
    const counter = document.getElementById('properties-counter');

    if (!slider || slides.length === 0) return;

    let current = 0;
    let perView = getSlidesPerView();

    function getSlidesPerView() {
        return window.innerWidth <= 600 ? 1 : 3;
    }

    function updateSlider() {
        perView = getSlidesPerView();
        slides.forEach((slide, i) => {
            if (i >= current && i < current + perView) {
                slide.style.display = '';
            } else {
                slide.style.display = 'none';
            }
        });
        updateCounter();
        updateArrows();
    }

    function updateCounter() {
        const totalSlides = slides.length;
        const totalPages = Math.ceil(totalSlides / perView);
        const currentPage = Math.floor(current / perView) + 1;
        if (counter) {
            counter.textContent = `Showing ${currentPage} of ${totalPages}`;
        }
    }

    function updateArrows() {
        prevBtn.disabled = current === 0;
        nextBtn.disabled = current + perView >= slides.length;
        prevBtn.classList.toggle('disabled', prevBtn.disabled);
        nextBtn.classList.toggle('disabled', nextBtn.disabled);
    }

    function goToPrev() {
        if (current > 0) {
            current -= perView;
            if (current < 0) current = 0;
            updateSlider();
        }
    }

    function goToNext() {
        if (current + perView < slides.length) {
            current += perView;
            updateSlider();
        }
    }

    prevBtn.addEventListener('click', goToPrev);
    nextBtn.addEventListener('click', goToNext);

    window.addEventListener('resize', function () {
        const oldPerView = perView;
        perView = getSlidesPerView();
        if (oldPerView !== perView) {
            current = Math.floor(current / perView) * perView;
            updateSlider();
        }
    });

    updateSlider();
});
