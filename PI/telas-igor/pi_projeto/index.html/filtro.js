 //function toggleFiltro() {
    const filtro = document.getElementById('filtro-lateral');
    if (filtro.style.display === 'none' || filtro.style.display === '') {
        filtro.style.display = 'block';
    } else {
        filtro.style.display = 'none';
    }
//}

function toggleFiltro() {
    const filtro = document.getElementById('filtro-lateral');
    const btn = document.querySelector('.btn-toggle-filtro');
    
    if (filtro.style.display === 'none' || filtro.style.display === '') {
        filtro.style.display = 'block';
        btn.textContent = 'Fechar Filtros';
    } else {
        filtro.style.display = 'none';
        btn.textContent = 'Filtros';
    }
}

