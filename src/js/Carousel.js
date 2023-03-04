import Splide from '@splidejs/splide';

class Carousel {
    constructor() {
        const carousels = document.querySelectorAll('.splide');

        if(carousels) {
            carousels.forEach((carousel) => {
                new Splide( carousel, {
                    perPage: 6,
                    gap: '1.6rem',
                    breakpoints: {
                        600: {
                            perPage: 2,
                            arrows: false,
                        }
                    }
                }).mount();
            })
        }
    }
}

export {Carousel}