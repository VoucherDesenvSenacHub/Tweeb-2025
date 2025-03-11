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

// Expandir e recolher submenus
document.addEventListener('DOMContentLoaded', function () {
    const submenuToggles = document.querySelectorAll('.has-submenu_sidbarAdm');

    submenuToggles.forEach(item => {
        item.addEventListener('click', function (event) {
            event.stopPropagation();
            const submenu = this.querySelector('.submenu_sidbarAdm');
            const arrow = this.querySelector('#arrow');

            if (submenu) {
                const isVisible = submenu.style.display === 'block';
                submenu.style.display = isVisible ? 'none' : 'block';

                // Alternar seta de indicação
                if (arrow) {
                    arrow.style.transform = isVisible ? 'rotate(0deg)' : 'rotate(180deg)';
                }
            }
        });
    });
});

// Quando a sidebar for aberta ou fechada, alterna a rotação da seta do botão
toggleButton.addEventListener('click', function () {
    const arrow = document.querySelector('#open_btn_icon');
    arrow.classList.toggle('rotated');
});
