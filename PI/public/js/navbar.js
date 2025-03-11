document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.querySelector(".hamburguer");
    const menu = document.querySelector(".hamburger-menu");

    hamburger.addEventListener("click", function () {
        menu.classList.toggle("active"); // Alterna a classe 'active' no menu
    });

    document.addEventListener("click", function (event) {
        if (!menu.contains(event.target) && !hamburger.contains(event.target)) {
            menu.classList.remove("active"); // Fecha o menu se o clique for fora do menu
        }
    });
});

// Seleciona todos os departamentos
const departments = document.querySelectorAll('.department');

departments.forEach(department => {
    const submenu = department.querySelector('.submenu');
    const arrow = department.querySelector('i');

    // Abre/fecha o submenu ao passar o mouse (desktop)
    department.addEventListener('mouseenter', () => {
        if (window.innerWidth > 768) { // Só aplica hover em telas maiores
            department.classList.add('open');
            if (arrow) arrow.style.transform = 'rotate(90deg)';
        }
    });

    department.addEventListener('mouseleave', () => {
        if (window.innerWidth > 768) { // Só aplica hover em telas maiores
            setTimeout(() => {
                if (!submenu.matches(':hover')) {
                    department.classList.remove('open');
                    if (arrow) arrow.style.transform = 'rotate(0deg)';

                    // Fecha todos os submenu-sub ao sair do submenu
                    const submenuSubs = submenu.querySelectorAll('.submenu-sub');
                    submenuSubs.forEach(submenuSub => {
                        submenuSub.style.display = 'none';
                        const subArrow = submenuSub.previousElementSibling.querySelector('i');
                        if (subArrow) subArrow.style.transform = 'rotate(0deg)';
                    });
                }
            }, 100);
        }
    });

    // Abre/fecha o submenu ao clicar (mobile)
    department.addEventListener('click', (event) => {
        if (window.innerWidth >= 768) { // Só aplica clique em telas menores
            event.stopPropagation(); // Evita que o clique se propague
            department.classList.toggle('open');
            if (arrow) arrow.style.transform = department.classList.contains('open') ? 'rotate(90deg)' : 'rotate(0deg)';
        }
    });

    // Mantém o submenu aberto ao interagir com ele (mobile)
    submenu.addEventListener('click', (event) => {
        event.stopPropagation(); // Evita que o clique no submenu feche o departamento
    });
});

// Fecha o submenu ao clicar fora
document.addEventListener('click', () => {
    departments.forEach(department => {
        department.classList.remove('open');
        const arrow = department.querySelector('i');
        if (arrow) arrow.style.transform = 'rotate(0deg)';

        // Fecha todos os submenu-sub
        const submenu = department.querySelector('.submenu');
        if (submenu) {
            const submenuSubs = submenu.querySelectorAll('.submenu-sub');
            submenuSubs.forEach(submenuSub => {
                submenuSub.style.display = 'none';
                const subArrow = submenuSub.previousElementSibling.querySelector('i');
                if (subArrow) subArrow.style.transform = 'rotate(0deg)';
            });
        }
    });
});

// Abre/fecha submenu-sub ao clicar nos itens do submenu
const menuItems = document.querySelectorAll('.submenu > li > a');

menuItems.forEach(item => {
    const arrow = item.querySelector('i');
    if (arrow) arrow.style.transform = 'rotate(0deg)';

    item.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();

        const submenuSub = item.nextElementSibling;

        if (submenuSub && submenuSub.style.display !== 'block') {
            submenuSub.style.display = 'block';
            if (arrow) arrow.style.transform = 'rotate(90deg)';
        } else {
            submenuSub.style.display = 'none';
            if (arrow) arrow.style.transform = 'rotate(0deg)';
        }
    });
});

// Submenu do usuário
const userIcon = document.querySelector('.user-icon');
const userSubmenu = document.querySelector('.user-submenu');

if (userIcon) {
    userIcon.addEventListener('click', (event) => {
        event.stopPropagation();
        userSubmenu.style.display = userSubmenu.style.display === 'block' ? 'none' : 'block';
    });
}

document.addEventListener('click', () => {
    if (userSubmenu) userSubmenu.style.display = 'none';
});
