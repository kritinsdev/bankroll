import Splide from '@splidejs/splide';

class Carousel {
    constructor() {
        new Splide( '.splide', {
            perPage: 6,
            gap: '1.6rem',
            breakpoints: {
                600: {
                    perPage: 2,
                    arrows: false,
                }
            }
        }).mount();
    }
}

export {Carousel}