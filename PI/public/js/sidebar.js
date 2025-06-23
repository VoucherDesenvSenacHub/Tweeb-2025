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

window.addEventListener('scroll', function() {
    // 1. IDENTIFIQUE SEUS ELEMENTOS
    //    Certifique-se de que sua navbar e footer sejam fáceis de encontrar.
    //    Pode ser pela tag (header, footer) ou por um ID (#navbar, #rodape).
    const navbar = document.querySelector('header'); // Altere se sua navbar não for a tag <header>
    const sidebar = document.getElementById('sidebar');
    const footer = document.querySelector('footer'); // Altere se seu footer não for a tag <footer>

    // Se algum dos elementos essenciais não for encontrado, o script para.
    if (!sidebar || !navbar || !footer) {
        // console.error("Atenção: Um dos elementos (sidebar, navbar ou footer) não foi encontrado no HTML.");
        return;
    }

    // 2. CALCULE OS LIMITES DINAMICAMENTE
    const scrollPosition = window.scrollY;

    // Onde a sidebar deve PARAR no topo (ex: exatamente na altura da navbar)
    const limiteSuperior = navbar.offsetHeight;

    // Onde a sidebar deve PARAR embaixo para não sobrepor o footer
    const alturaSidebar = sidebar.offsetHeight;
    const posicaoTopoFooter = footer.offsetTop;
    const espacoDeRespiro = 20; // Uma margem de segurança para não colar no footer
    const limiteInferior = posicaoTopoFooter - alturaSidebar - espacoDeRespiro;


    // 3. APLIQUE A LÓGICA DE POSICIONAMENTO COM OS LIMITES
    if (scrollPosition < limiteSuperior) {
        // Se o scroll está ACIMA do limite, trava a sidebar no ponto inicial
        sidebar.style.top = limiteSuperior + 'px';

    } else if (scrollPosition > limiteInferior) {
        // Se o scroll passou do limite de BAIXO, trava a sidebar no fundo
        sidebar.style.top = limiteInferior + 'px';

    } else {
        // Se estiver ENTRE os limites, a sidebar acompanha o scroll normalmente
        sidebar.style.top = scrollPosition + 'px';
    }
});

