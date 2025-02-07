const departments = document.querySelectorAll('.department');

departments.forEach(department => {
    const submenu = department.querySelector('.submenu'); 
    const arrow = department.querySelector('i'); 

    department.addEventListener('mouseenter', () => {
        department.classList.add('open');
        arrow.style.transform = 'rotate(90deg)';
    });

    department.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!submenu.matches(':hover')) {
                department.classList.remove('open');
                arrow.style.transform = 'rotate(0deg)';

                // Fecha todos os submenu-sub ao sair do submenu
                const submenuSubs = submenu.querySelectorAll('.submenu-sub');
                submenuSubs.forEach(submenuSub => {
                    submenuSub.style.display = 'none';
                    const subArrow = submenuSub.previousElementSibling.querySelector('i');
                    if (subArrow) subArrow.style.transform = 'rotate(0deg)';
                });
            }
        }, 100);
    });

    submenu.addEventListener('mouseenter', () => {
        department.classList.add('open');
        arrow.style.transform = 'rotate(90deg)';
    });

    submenu.addEventListener('mouseleave', () => {
        department.classList.remove('open');
        arrow.style.transform = 'rotate(0deg)';

        // Fecha todos os submenu-sub ao sair do submenu
        const submenuSubs = submenu.querySelectorAll('.submenu-sub');
        submenuSubs.forEach(submenuSub => {
            submenuSub.style.display = 'none';
            const subArrow = submenuSub.previousElementSibling.querySelector('i');
            if (subArrow) subArrow.style.transform = 'rotate(0deg)';
        });
    });
});

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

document.addEventListener('click', () => {
    const submenus = document.querySelectorAll('.submenu-sub');
    submenus.forEach(submenu => {
        submenu.style.display = 'none';  
    });

    const openDepartments = document.querySelectorAll('.department.open');
    openDepartments.forEach(department => {
        department.classList.remove('open');
        const arrow = department.querySelector('i');
        if (arrow) arrow.style.transform = 'rotate(0deg)'; 
    });
});

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

document.getElementById('hamburger').addEventListener('click', function() {
    const departments = document.getElementById('departments');
    if (departments.style.display === 'flex') {
        departments.style.display = 'none'; // Oculta os departamentos
    } else {
        departments.style.display = 'flex'; // Exibe os departamentos
    }
});