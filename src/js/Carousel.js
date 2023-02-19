import EmblaCarousel from 'embla-carousel';

class Carousel {
    constructor() {
        const emblaNode = document.querySelector('.boardCarousel')
        const options = { loop: false }
        const embla = EmblaCarousel(emblaNode, options)
    }
}

export {Carousel}