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
            e.preventDefault();

            const taxonomy = e.target.closest('[data-filter]').getAttribute('data-filter');
            const dataTag = e.target.closest('[data-term-id]');
            const checkbox = dataTag.querySelector('input');
            const termId = dataTag.getAttribute('data-term-id');
            const title = dataTag.querySelector('span').innerText;
            
            if(!checkbox.checked) {
                checkbox.checked = true;
                this.selectedFilterLabelAction(taxonomy, termId, title);
                this.updateFiltersQuery(taxonomy, termId);
            } else {
                checkbox.checked = false;
                this.selectedFilterLabelAction(taxonomy, termId, title, 'remove');
                this.updateFiltersQuery(taxonomy, termId, 'remove');
            }

            this.filterResults();
        }
    }

    removeFilterItem = (e) => {
        if(e.target.closest('[data-term-id]')) {
            const currentItem = e.target.closest('[data-term-id]');
            const termId = currentItem.getAttribute('data-term-id');
            const taxonomy = currentItem.getAttribute('data-filter');

            const filterItem = this.filterBlock.querySelector(`[data-term-id="${termId}"]`);
            const checkbox = filterItem.querySelector('input[type="checkbox"]');

            this.updateFiltersQuery(taxonomy, termId, 'remove');
            currentItem.remove();
            checkbox.checked = false;
        }
    }


    selectedFilterLabelAction(taxonomy, termId, termTitle = null, action = 'add') 
    {
        if(action === 'add') {
            const element = document.createElement('div');
            element.classList.add('selectedFilters__item');
            element.setAttribute('data-term-id', termId);
            element.setAttribute('data-filter', taxonomy);
    
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

        if(action === 'remove') {
            this.selectedFilterItems.querySelector(`[data-term-id="${termId}"]`).remove();
        }

    }

    updateFiltersQuery(taxonomy, termId, action = 'add') {
        if(action === 'add') {
            this.filtersForQuery[`${taxonomy}`].push(termId);
        }

        if(action === 'remove'){
            this.filtersForQuery[`${taxonomy}`] = this.filtersForQuery[`${taxonomy}`].filter((id) => {
                return id !== termId;
            });
        }
    }

    filterResults() 
    {
        fetch(`${ajaxObject.ajaxUrl}?action=filterResults`, {
            method: "POST",
            credentials: 'same-origin',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(this.filtersForQuery)
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => (error));
    }

}

export {Filters};