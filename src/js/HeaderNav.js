class HeaderNav {
    constructor() {
        this.header = document.querySelector('#header');
        this.headerHeight = this.header.offsetHeight;
        this.scrollThreshold = this.headerHeight;

        this.events();
    }

    events = () => {
        window.addEventListener('scroll', this.handleScroll);
    };

    handleScroll = () => {
        const scrollPosition = window.scrollY;

        if (scrollPosition > this.scrollThreshold) {
            this.header.classList.add('active');
        } else {
            this.header.classList.remove('active');
        }
    };
}

export {HeaderNav}