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

// window.onscroll = () => {
//     const sidebar = document.getElementById('sidebar');
//     const scrollPosition = window.scrollY;  // Posição de rolagem da página
//     const footer = document.querySelector('footer');
//     const footerOffset = footer.offsetTop; // Posição do rodapé
//     const footerHeight = footer.offsetHeight; // Altura do rodapé
//     const sidebarHeight = sidebar.offsetHeight; // Altura da sidebar

//     // Limite superior (topo da página)
//     const minTop = 150;

//     // Limite inferior (evitar sobreposição com o rodapé)
//     const maxTop = footerOffset - sidebarHeight - footerHeight;

//     // Atualiza a posição da sidebar, respeitando os limites
//     if (scrollPosition >= minTop && scrollPosition <= maxTop) {
//         sidebar.style.top = scrollPosition + 'px';
//     } else if (scrollPosition < minTop) {
//         sidebar.style.top = minTop + 'px';
//     } else if (scrollPosition > maxTop) {
//         sidebar.style.top = maxTop + 'px';
//     }
// };
