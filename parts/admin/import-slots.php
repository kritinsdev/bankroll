<div class="wrap">
    <h1>Slot importer</h1>
    <p>Import any slot from our database over 20,000 slots</p>
    <form method="post" id="importForm">
        <div class="form-control">
            <h2>Find slot by name</h2>
            <input type="text" id="slot" name="slot" placeholder="Search by name">
        </div>

        <div class="form-control">
            <h2>Find slots by provider</h2>
            <input type="text" id="provider" name="provider" placeholder="Search by provider">
        </div>
        <button id="slotsSearch" class="button button-primary" disabled style="margin-top:24px;">Search</button>
    </form>

    <div class="results" id="results"></div>
    <div id="pagination"></div>
</div>

<style>
    .results {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 16px;
    }

    .resultBox {
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 16px;
        background-color: white;
        flex: 0 0 calc(20% - 40px);
    }

    .resultBox span {
        display: block;
        font-weight: bold;
        font-size: 14px;
    }

    .resultBox input {
        position: absolute;
        top: 8px;
        right: 0;
    }
</style>

<script>
    class SlotsImporter {
        constructor() {
            this.form = document.getElementById('importForm');
            this.searchButton = document.querySelector('#slotsSearch');
            this.resultsElement = document.getElementById('results');
            this.paginationElement = document.querySelector('#pagination');
            this.providerInput = this.form.querySelector('#provider');
            this.slotInput = this.form.querySelector('#slot');
            this.currentPage = 1;
            this.itemsPerPage = 10;

            this.events();
        }

        events() {
            document.addEventListener('click', this.handleClick);
            this.form.addEventListener('input', this.buttonState);
            this.searchButton.addEventListener('click', this.updateResults);
        }

        buttonState = (e) => {
            const input = e.target.value;

            if (input.length > 2) {
                this.searchButton.disabled = false;
            } else {
                this.searchButton.disabled = true;
            }
        }

        updateResults = (e) => {
            e.preventDefault();
            let searchType, searchValue;
            if (this.slotInput.value.length > 2) {
                searchType = 'name';
                searchValue = this.slotInput.value;
            } else if (this.providerInput.value.length > 2) {
                searchType = 'provider';
                searchValue = this.providerInput.value;
            }
            this.getSlots(searchType, searchValue);
        }

        async getSlots(type, value) {
            try {
                const response = await fetch(`http://localhost:3000/api/v1/slots?${type}=${encodeURIComponent(value)}&page=${this.currentPage}&limit=${this.itemsPerPage}`);
                const data = await response.json();

                this.resultsElement.innerHTML = data.data.map(slot => {
                    return `<div class="resultBox">
                            <span>${slot.name}</span>
                            <p>By: ${slot.providers}</p>
                            <button class="import-btn" data-id="${slot._id}">Import</button>
                            <input type="checkbox" data-id="${slot._id}" />
                        </div>`;
                }).join('');

                const totalPages = data.totalPages;
                this.paginationElement.innerHTML = this.generatePagination(totalPages);
            } catch (error) {
                console.error('Error fetching data:', error);
                this.resultsElement.innerHTML = '<p>An error occurred while fetching data.</p>';
            }
        }

        generatePagination(totalPages) {
            let buttons = '';

            for (let i = 1; i <= totalPages; i++) {
                buttons += `<button class="pagination-btn" data-page="${i}">${i}</button>`;
            }

            return buttons;
        }
    }
    new SlotsImporter();
</script>