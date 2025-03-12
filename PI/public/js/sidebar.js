const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('open_btn');

// Alternar expansão da sidebar com clique
toggleButton.addEventListener('click', (event) => {
    sidebar.classList.toggle('open-sidebar');
    event.stopPropagation(); 
});

// Fechar a sidebar ao clicar fora dela
document.addEventListener('click', (event) => {
    if (!sidebar.contains(event.target) && sidebar.classList.contains('open-sidebar')) {
        sidebar.classList.remove('open-sidebar');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const segundomenuToggles = document.querySelectorAll('.menu-item .sidemenu-item .has-segundomenu'); 
    segundomenuToggles.forEach(item => {
        const segundomenu = item.querySelector('.segundomenu'); 
        const menuLink = item.querySelector('a'); 
        const arrow = menuLink.querySelector('#arrow'); 
    });
});

// Quando a sidebar for aberta ou fechada, alterna a rotação da seta do botão
document.getElementById('open_btn').addEventListener('click', function () {
    const arrow = document.querySelector('#open_btn_icon');
    arrow.classList.toggle('rotated'); 
});