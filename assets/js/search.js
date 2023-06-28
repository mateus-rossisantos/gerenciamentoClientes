window.onload = function() {
    
    searchElements();
}


function searchElements() {
    let searchName = searchInput.value.toUpperCase();
    let rows = document.querySelectorAll('.table tbody tr');

    rows.forEach(row => {
        let cells = Array.from(row.querySelectorAll('td:not(#btn-editar)')); // não pega o botão editar

        // cells.pop(); // remove o último elemento
        let cellsWithoutEditButton = cells.filter(cell => cell.id !== 'select-status');

        let select = row.querySelector('select');
        let selectedOption = select.options[select.selectedIndex];
        cellsWithoutEditButton.push(selectedOption); // adiciona o valor do option no fim do array
        
        let matchFound = false;
        cellsWithoutEditButton.forEach(cell => {
            let cellText = cell.textContent || cell.innerText || cell.text;
            console.log(cellText);
            if (cellText.toUpperCase().includes(searchName)) {
                matchFound = true;
                return;
            }
        });

        row.style.display = matchFound ? "" : "none";
    });
}