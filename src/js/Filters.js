class Filters {
    constructor() {
        this.filterBlock = document.querySelector('#filter');

        this.filters = this.filterBlock.querySelectorAll('[data-filter]');

        this.events();
    }

    events() {
        console.log(this.filters);
    }
}