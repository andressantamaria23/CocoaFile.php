function editarFila(button) {
    var row = button.closest('tr');
    var accionesCell = row.querySelector('.hidden');
    accionesCell.style.display = 'table-cell';
}