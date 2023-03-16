import {fetchAdminAjax} from './helpers';

class Filters {
    constructor() {
        this.filterBlock = document.querySelector('#filter');
        this.selectedFilterItems = document.querySelector("#selectedFilters");
        this.boardItems = document.querySelector("#boardItems");
        this.filtersForQuery = {theme:[], provider: [], feature: []};
        this.events();
    }

    events() {
        this.filterBlock.addEventListener('click', this.filtersController);
        this.selectedFilterItems.addEventListener('click', this.removeFilterItem);
    }

    filtersController = (e) => { // Open or closed
        if(e.target.closest('[data-filter]')) {
            const filter = e.target.closest('[data-filter]');

            if(!filter.classList.contains('show')) {
                filter.classList.add('show');
            } else {
                filter.classList.remove('show');
            }
        }

        if(e.target.closest('[data-term-id]')) {
            const taxonomy = e.target.closest('[data-filter]').getAttribute('data-filter');
            const dataTag = e.target.closest('[data-term-id]');
            const termId = dataTag.getAttribute('data-term-id');
            const title = dataTag.querySelector('span').innerText;

            this.filtersForQuery[`${taxonomy}`].push(termId);
            this.createSelectedFilterElement(termId, title);

            this.updateFiltersQuery(taxonomy, termId);
            
            // this.filterResults();

            // const selectedFilterItem = this.selectedFilterItems.querySelector(`[data-term-id="${termId}"]`);
            // selectedFilterItem.remove();
            // checkbox.checked = false;

            console.log(this.filtersForQuery);
        }

    }

    removeFilterItem = (e) => {
        if(e.target.closest('[data-term-id]')) {
            const currentItem = e.target.closest('[data-term-id]');
            const itemId = currentItem.getAttribute('data-term-id');

            const filterItem = this.filterBlock.querySelector(`[data-term-id="${itemId}"]`);
            const filterCheckbox = filterItem.querySelector('input[type="checkbox"]');

            // updateFiltersQuery(a,b, 'remove');

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
        this.selectedFilterItems.appendChild(element);
    }

    updateFiltersQuery(taxonomy, termId, action = 'add') {
        if(action === 'add') {
            this.filtersForQuery[`${taxonomy}`].push(termId);
        }

        if(action === 'remove'){
            this.filtersForQuery[`${taxonomy}`] = this.filtersForQuery[`${taxonomy}`].filter((id) => {
                return id !== termId || !this.filtersQuery[`${taxonomy}`] || !this.filtersQuery[`${taxonomy}`].includes(id);
            });
        }
    }

    filterResults() {
        fetchAdminAjax('filterPosts', {terms: [1,2,3]})
            .then(data => {
                console.log(data);
            })
            .catch(error => console.log(error));
    }
}

export {Filters};