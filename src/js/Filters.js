class Filters {
    constructor() {
        this.filterBlock = document.querySelector('#filter');
        this.filters = this.filterBlock.querySelectorAll('[data-filter]');

        this.events();
    }

    events() {
        for(const filter of this.filters) {
            filter.addEventListener('click', this.changeFiltersState);
        }
    }

    changeFiltersState = (e) => { // Open or closed 
        const filter = e.target.closest('[data-filter]');
        const filterData = filter.querySelector('[data-filter-data]');

        if(!filterData.classList.contains('show')) {
            filterData.classList.add('show');
        } else {
            filterData.classList.remove('show');
        }

    }
}

export {Filters};