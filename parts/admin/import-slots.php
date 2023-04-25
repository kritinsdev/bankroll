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
    const form = document.getElementById('importForm');
    const resultsElement = document.getElementById('results');
    const paginationElement = document.querySelector('#pagination');

    let currentPage = 1;
    const itemsPerPage = 10;

    form.addEventListener('input', fetchData);
    document.addEventListener('click', handleClick);

    async function fetchData(currentPage, itemsPerPage) {
        const inputField = event.target;
        let fetchUrl = '';
        const resultsElement = document.getElementById('results');

        const input = inputField.value;
        const searchType = inputField.id;

        switch (searchType) {
            case 'slot':
                fetchUrl = `http://localhost:3000/api/v1/slots/name/${encodeURIComponent(input)}?page=${currentPage}&limit=${itemsPerPage}`;
                break;
            case 'provider':
                fetchUrl = `http://localhost:3000/api/v1/providers/${encodeURIComponent(input)}?page=${currentPage}&limit=${itemsPerPage}`;
                break;
        }

        if (input.length > 2) {
            try {
                const response = await fetch(fetchUrl);
                const data = await response.json();

                // Display the results
                resultsElement.innerHTML = data.data.map(slot => {
                    return `<div class="resultBox">
                            <span>${slot.name}</span>
                            <p>By: ${slot.providers}</p>
                            <button class="import-btn" data-id="${slot._id}">Import</button>
                            <input type="checkbox" data-id="${slot._id}" />
                        </div>`;
                }).join('');

                // Generate and display pagination buttons
                const totalPages = data.totalPages;
                paginationElement.innerHTML = generatePagination(totalPages, currentPage);

            } catch (error) {
                console.error('Error fetching data:', error);
                resultsElement.innerHTML = '<p>An error occurred while fetching data.</p>';
            }
        } else {
            resultsElement.innerHTML = '';
        }
    }

    function handleClick(event) {
        const currentTarget = event.target;

        if (currentTarget.classList.contains('import-btn')) {
            const slotId = currentTarget.getAttribute('data-id');
            fetch(`http://bankroll.local/wp-json/bankroll/v1/import?slot_id=${encodeURIComponent(slotId)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Slot imported successfully');
                    } else {
                        alert('Error importing slot');
                    }
                })
                .catch(error => {
                    console.error('Error importing slot:', error);
                    alert('Error importing slot');
                });
        }

        if (currentTarget.classList.contains('pagination-btn')) {
            currentPage = parseInt(currentTarget.dataset.page);
            fetchData();
        }
    }

    function generatePagination(totalPages, currentPage) {
        let buttons = '';

        for (let i = 1; i <= totalPages; i++) {
            buttons += `<button class="pagination-btn" data-page="${i}">${i}</button>`;
        }

        return buttons;
    }
</script>