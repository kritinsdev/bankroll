import {fetchAdminAjax} from './helpers';

class Filters {
    constructor() {
        this.filterBlock = document.querySelector('#filter');
        this.selectedFilters = document.querySelector("#selectedFilters");
        this.selectedFilterData = [
            {
                providers: null,
                themes:null,
                features:null
            }
        ];
        this.events();
    }

    events() {
        document.addEventListener('click', this.filterPosts);
        this.filterBlock.addEventListener('click', this.filtersController);
        this.selectedFilters.addEventListener('click', this.removeFilterItem);
    }

    filtersController = (e) => { // Open or closed 
        if(e.target.closest('[data-filter]') && !e.target.closest('[data-term-id]')) {
            const filter = e.target.closest('[data-filter]');
            const filterData = filter.querySelector('[data-filter-data]');
    
            if(!filterData.classList.contains('show')) {
                filterData.classList.add('show');
            } else {
                filterData.classList.remove('show');
            }
        }

        if(e.target.closest('[data-term-id]')) {
            e.preventDefault();

            const dataTag = e.target.closest('[data-term-id]');
            const termId = dataTag.getAttribute('data-term-id');
            const title = dataTag.querySelector('label').innerText;
            const checkbox = dataTag.querySelector('input[type="checkbox"]');
            const checkboxStatus = checkbox.checked;

            if(!checkboxStatus) {
                checkbox.checked = true;
                this.createSelectedFilterElement(termId, title);
            } else {
                const selectedFilterItem = this.selectedFilters.querySelector(`[data-term-id="${termId}"]`);
                selectedFilterItem.remove();
                checkbox.checked = false;
            }
        }

    }

    removeFilterItem = (e) => {
        if(e.target.closest('[data-term-id]')) {
            const currentItem = e.target.closest('[data-term-id]');
            const itemId = currentItem.getAttribute('data-term-id');

            const filterItem = this.filterBlock.querySelector(`[data-term-id="${itemId}"]`);
            const filterCheckbox = filterItem.querySelector('input[type="checkbox"]');

            currentItem.remove();
            filterCheckbox.checked = false;
        }
    }


    createSelectedFilterElement(id, termTitle) 
    {
        const element = document.createElement('div');
        element.classList.add('selectedFilters__item');
        element.setAttribute('data-term-id', id);

        const title = document.createElement('span');
        title.classList.add('selectedFilters__title');
        title.innerText = termTitle;

        const cross = document.createElement('span');
        cross.setAttribute('id', 'cross');
        cross.classList.add('cross');

        element.appendChild(title);
        element.appendChild(cross);
        this.selectedFilters.appendChild(element);
    }

    filterPosts() {
        fetchAdminAjax('filterPosts', { terms: [1,2,3,4,5,6] })
            .then(data => {
                const termsArray = JSON.parse(data);
                console.log(termsArray);
            })
            .catch(error => console.log(error));
    }
}

export {Filters};