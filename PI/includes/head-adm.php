<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/estoque_cadastrar_novo.css">
    <title>Cadastro de Produto</title>
</head>
<body>
    <div class="hamburguer-admin">
        <i class='bx bx-menu'></i>
    </div>
    <header class="header-container">
        <div class="header-logo"><img src="../../../../public/assets/img/Ativo 2.png" alt="Logo Tweeb"></div>
    </header>

    <div class="mini-navbar"></div> 
        <div class="admin-mini-navbar">
            <nav class="admin-menu">
                <div class="admin-user-info">
                    <img src="../../../../public/assets/img/Avatar.png" alt="Foto do Usuário">
                    <p class="admin-hi-user"> <span class="itemAdm-descricao">
                      Letícia Almeida <br>
                      <small>VENDEDOR</small>
                    </span></p>
                    <span class="admin-close-menu"><i class="fa-solid fa-xmark"></i></span>
                </div>
        
                <hr class="admin-separator"> 
        
                <ul class="admin-menu-options">
                    <li class="admin-menu-item">
                        <a href="#" class="toggle-categories">
                            <img src="../../../../public/assets/img/analytics 1.png" alt="">
                            <span class="admin-item-description">Painel</span>
                        </a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="#"><img src="../../../../public/assets/img/Calendar.png" alt=""><span class="admin-item-description">Manutenções</span></a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="#"><img src="../../../../public/assets/img/Inbox.png" alt=""><span class="admin-item-description">Orçamentos</span></a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="#" class="toggle-products">
                            <img src="../../../../public/assets/img/Reports.png" alt="">
                            <span class="admin-item-description">Produtos</span>
                            <i class="admin-arrow fa-solid fa-chevron-right"></i> 
                        </a>
                        <ul class="admin-submenu">
                            <li><a href="#"><span class="admin-item-description">Cadastro</span></a></li>
                            <li><a href="#"><span class="admin-item-description">Estoque</span></a></li>
                        </ul>
                    </li>
                    <li class="admin-menu-item">
                        <a href="#"><img src="../../../../public/assets/img/Vector (4).png" alt=""><span class="admin-item-description">Clientes</span></a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="#"><img src="../../../../public/assets/img/Vector (5).png" alt=""><span class="admin-item-description">Aparencia</span></a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="#"><img src="../../../../public/assets/img/sair.png" alt=""><span class="admin-item-description">Sair</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".hamburguer-admin");
    const menu = document.querySelector(".admin-menu");
    const closeMenu = document.querySelector(".admin-close-menu");

    // Abrir o menu ao clicar no hambúrguer
    menuToggle.addEventListener("click", function () {
        menu.classList.toggle("open");
    });

    // Fechar o menu ao clicar no ícone de fechar
    closeMenu.addEventListener("click", function () {
        menu.classList.remove("open");
    });

    // Fechar o menu ao clicar fora dele
    document.addEventListener("click", function (event) {
        if (!menu.contains(event.target) && !menuToggle.contains(event.target)) {
            menu.classList.remove("open");
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const toggleProducts = document.querySelector(".toggle-products");
    const submenu = document.querySelector(".admin-submenu");
    const arrow = document.querySelector(".admin-arrow");

    // Alterna a visibilidade do submenu ao clicar em "Produtos"
    toggleProducts.addEventListener("click", function (event) {
        event.preventDefault(); // Evita que a página role para o topo
        submenu.classList.toggle("open");
        arrow.classList.toggle("rotate"); // Para girar o ícone da seta
    });

    // Fecha o submenu se clicar fora dele
    document.addEventListener("click", function (event) {
        if (!submenu.contains(event.target) && !toggleProducts.contains(event.target)) {
            submenu.classList.remove("open");
            arrow.classList.remove("rotate");
        }
    });
});

        </script>
</body>