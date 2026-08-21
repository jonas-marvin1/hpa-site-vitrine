document.addEventListener('DOMContentLoaded', function() {
    initWPFilters();
});

function initWPFilters() {
    const table = document.querySelector('table.table');
    if (!table) return;

    // Remove the old search bar if it exists
    const oldSearchGroup = document.querySelector('.card-header .input-group');
    if (oldSearchGroup) oldSearchGroup.remove();

    // 1. Inject CSS
    const style = document.createElement('style');
    style.innerHTML = `
        .wp-filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f1f1f1;
            padding: 8px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccd0d4;
            border-radius: 4px;
            font-size: 13px;
        }
        .wp-filter-group { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .wp-filter-bar select, .wp-filter-bar input[type="text"] {
            padding: 4px 8px;
            border: 1px solid #8c8f94;
            border-radius: 3px;
            font-size: 13px;
            background: #fff;
            height: 30px;
        }
        .wp-filter-bar .btn-wp {
            padding: 4px 10px;
            border: 1px solid #2271b1;
            background: #f6f7f7;
            color: #2271b1;
            border-radius: 3px;
            font-size: 13px;
            cursor: pointer;
            height: 30px;
        }
        .wp-filter-bar .btn-wp:hover { background: #f0f0f1; border-color: #0a4b78; color: #0a4b78; }
        .wp-pagination { display: flex; align-items: center; gap: 5px; font-weight: 500;}
        .wp-pagination-btn { border: 1px solid #8c8f94; background: #fff; border-radius: 3px; padding: 2px 6px; cursor:pointer;}
        .wp-pagination-btn:hover { background: #f0f0f1; }
        .wp-pagination-btn:disabled { opacity: 0.5; cursor: not-allowed; }
    `;
    document.head.appendChild(style);

    const thead = table.querySelector('thead tr');
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    // 3. Analyze columns to generate dropdowns (categorical data)
    let headers = Array.from(thead.querySelectorAll('th')).map(th => th.textContent.trim());
    let columnFilters = [];
    
    for (let col = 0; col < headers.length; col++) {
        // Exclude generic action/image columns
        if (headers[col].toLowerCase().includes('action') || headers[col].toLowerCase().includes('image')) continue;

        let uniqueValues = new Set();
        let isValidCategory = true;
        let isDateCol = headers[col].toLowerCase().includes('created') || headers[col].toLowerCase().includes('date');
        let isForceCol = headers[col].toLowerCase().includes('nationalit');

        rows.forEach(row => {
            let cells = row.querySelectorAll('td');
            if (cells[col]) {
                let val = cells[col].textContent.trim();
                
                if (isDateCol && val.length >= 10) {
                    val = val.substring(0, 10);
                }

                if(val.length > 50) isValidCategory = false; // Too long for a category
                if(val !== '') uniqueValues.add(val);
            }
        });

        // Increase threshold to 25 and force inclusion of dates and specific columns
        if (isValidCategory && uniqueValues.size > 0 && (uniqueValues.size <= 25 || isForceCol || isDateCol)) {
            columnFilters.push({ index: col, name: headers[col], values: Array.from(uniqueValues).sort(), isDate: isDateCol });
        }
    }

    // 4. Build WP Filter Bar
    const filterBar = document.createElement('div');
    filterBar.className = 'wp-filter-bar';

    let filterHtml = `
        <div class="wp-filter-group">
    `;

    // Add generated dropdowns
    columnFilters.forEach(cf => {
        let dateAttr = cf.isDate ? ' data-is-date="true"' : '';
        filterHtml += `<select class="dynamic-filter" data-col="${cf.index}"${dateAttr}>
            <option value="all">Filtrer par ${cf.name}</option>`;
        cf.values.forEach(v => {
            filterHtml += `<option value="${v}">${v}</option>`;
        });
        filterHtml += `</select>`;
    });

    filterHtml += `
            <button class="btn-wp" id="do-filter">Filtrer</button>
        </div>
        <div class="wp-filter-group">
            <span class="wp-pagination" id="items-count">${rows.length} éléments</span>
            <input type="text" id="wp-search-input" placeholder="Recherche..." style="width: 150px;">
            <button class="btn-wp" id="do-search">Rechercher</button>
        </div>
    `;

    filterBar.innerHTML = filterHtml;
    table.parentNode.insertBefore(filterBar, table);

    // 7. Logic: Filtering & Search
    document.getElementById('do-filter').addEventListener('click', applyFilters);
    document.getElementById('do-search').addEventListener('click', applyFilters);
    document.getElementById('wp-search-input').addEventListener('keyup', (e) => {
        if(e.key === 'Enter') applyFilters();
    });

    function applyFilters() {
        const searchText = document.getElementById('wp-search-input').value.toLowerCase();
        const activeFilters = Array.from(document.querySelectorAll('.dynamic-filter')).map(select => {
            return { col: parseInt(select.getAttribute('data-col')), val: select.value, isDate: select.getAttribute('data-is-date') === 'true' };
        });

        let visibleCount = 0;
        const currentRows = Array.from(tbody.querySelectorAll('tr'));

        currentRows.forEach(row => {
            let show = true;
            let cells = row.querySelectorAll('td');

            // Apply dropdown filters
            activeFilters.forEach(f => {
                if (f.val !== 'all' && cells[f.col]) {
                    let cellVal = cells[f.col].textContent.trim();
                    if (f.isDate && cellVal.length >= 10) {
                        cellVal = cellVal.substring(0, 10);
                    }
                    if (cellVal !== f.val) show = false;
                }
            });

            // Apply search filter
            if (show && searchText !== '') {
                if (!row.textContent.toLowerCase().includes(searchText)) {
                    show = false;
                }
            }

            row.style.display = show ? '' : 'none';
            if(show) visibleCount++;
        });

        document.getElementById('items-count').textContent = `${visibleCount} élément(s)`;
    }

    // Export function (CSV)
    function exportToCSV(rowsArray) {
        let csvContent = "data:text/csv;charset=utf-8,";
        // Get headers (skip checkbox and actions)
        let headersArr = Array.from(thead.querySelectorAll('th'))
            .map(th => th.textContent.trim())
            .filter(h => h !== '' && !h.toLowerCase().includes('action'));
        csvContent += headersArr.join(";") + "\n";

        rowsArray.forEach(row => {
            let cellsArr = Array.from(row.querySelectorAll('td'))
                // Skip any cell that contains links or svg (usually actions or images)
                .filter(td => !td.querySelector('a') && !td.querySelector('svg'))
                .map(td => '"' + td.textContent.trim().replace(/"/g, '""') + '"');
            csvContent += cellsArr.join(";") + "\n";
        });

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "export_donnees.csv");
        document.body.appendChild(link);
        link.click();
        link.remove();
    }
}
