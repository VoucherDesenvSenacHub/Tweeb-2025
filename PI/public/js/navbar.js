const departments = document.querySelectorAll('.department');

// Para cada departamento, adiciona eventos de mouseenter e mouseleave para abrir/fechar o submenu
departments.forEach(department => {
    department.addEventListener('mouseenter', () => {
        // Adiciona a classe 'open' para mostrar o submenu
        department.classList.add('open');
    });

    department.addEventListener('mouseleave', () => {
        // Remove a classe 'open' para ocultar o submenu
        department.classList.remove('open');
    });
});

// Seleciona todos os itens de submenu (os departamentos específicos como "Placa Mãe", "Placa de Vídeo", etc.)
const menuItems = document.querySelectorAll('.submenu > li > a');

// Adiciona o evento de clique para abrir/fechar o submenu de tipos
menuItems.forEach(item => {
    // Define a rotação da seta inicialmente para a direita
    const arrow = item.querySelector('i');
    arrow.style.transform = 'rotate(0deg)'; // Faz com que a seta inicie virada para a direita

    item.addEventListener('click', (event) => {
        event.preventDefault();  // Impede o comportamento padrão do link
        event.stopPropagation();  // Impede que o clique no item feche o submenu principal

        // Pega o submenu dos tipos
        const submenuSub = item.nextElementSibling;  // Submenu de tipos (ul)

        // Alterna a visibilidade do submenu dos tipos
        if (submenuSub && submenuSub.style.display !== 'block') {
            submenuSub.style.display = 'block';  // Abre o submenu dos tipos
            // Roda a seta para baixo
            arrow.style.transform = 'rotate(90deg)';
        } else {
            submenuSub.style.display = 'none';  // Fecha o submenu dos tipos
            // Roda a seta para a direita
            arrow.style.transform = 'rotate(0deg)';
        }
    });
});

// Fecha todos os submenus quando o usuário clica fora do menu
document.addEventListener('click', () => {
    const submenus = document.querySelectorAll('.submenu-sub');
    submenus.forEach(submenu => {
        submenu.style.display = 'none';  // Fecha todos os submenus de tipos ao clicar fora
    });

    // Fecha todos os submenus principais ao clicar fora
    const openDepartments = document.querySelectorAll('.department.open');
    openDepartments.forEach(department => {
        department.classList.remove('open');
    });
});

const userIcon = document.querySelector('.user-icon');
const userSubmenu = document.querySelector('.user-submenu');

// Adiciona um evento de clique no ícone do usuário
userIcon.addEventListener('click', (event) => {
    event.stopPropagation(); // Impede que o clique no ícone se propague para o documento e feche o submenu imediatamente
    // Alterna a visibilidade do submenu
    userSubmenu.style.display = userSubmenu.style.display === 'block' ? 'none' : 'block';
});

// Fecha o submenu se o usuário clicar fora do ícone
document.addEventListener('click', () => {
    userSubmenu.style.display = 'none'; // Fecha o submenu
});
