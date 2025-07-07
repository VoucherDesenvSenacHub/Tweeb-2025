<?php

// Define a variável $is_logged_in para facilitar a verificação no HTML.
$is_logged_in = isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Inclua aqui seus links de CSS e outras metatags se este for um arquivo standalone -->
    <!-- Exemplo: <link rel="stylesheet" href="/Tweeb-2025/PI/public/css/navbar.css"> -->
    <!-- Exemplo: <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <!-- Exemplo: <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->
</head>
<body class="navBody">

<header class="headNav">
    <div class="hamburguer">
        <i class='bx bx-menu'></i>
    </div>

    <div class="logo">
        <a href="/Tweeb-2025/PI/home.php"><img src="/Tweeb-2025/PI/public/assets/img/Ativo 2.png" alt="logo tweeb"></a>
    </div>

    <!-- Barra de busca unificada -->
    <div class="searchn-box">
        <form class="search-form-nav"action="">
            <button class="search-button" type="submit"><i class='bx bx-search'></i></button>
            <input type="text" name="search" class="search-input" placeholder="Buscar">
        </form>
    </div>

    <div class="responsive-menu">
        <a href="/Tweeb-2025/PI/App/user/View/pages/quemsomos.php">Sobre</a>
        <a href="/Tweeb-2025/PI/App/user/View/pages/orcamento.php">Orçamento</a>
    </div>

    <!-- Navegação principal que muda com base no login -->
    <nav class="navb">
        <ul>
            <li><a class="op" href="/Tweeb-2025/PI/home.php">Home</a></li>
            <li><a class="op" href="/Tweeb-2025/PI/App/user/View/pages/quemsomos.php">Sobre</a></li>
            <li><a class="op" href="/Tweeb-2025/PI/App/user/View/pages/orcamento.php">Orçamento</a></li>

            <?php if ($is_logged_in): ?>
                <!-- Links para usuário LOGADO -->
                <li><a class="op" href="/Tweeb-2025/PI/app/user/Controllers/LogoutController.php">Sair</a></li>
                <li>
                    <a class="op" href="/Tweeb-2025/PI/App/user/View/pages/carrinho.php"><i class='bx bx-cart-alt'></i></a>
                    <a href="/Tweeb-2025/PI/App/user/View/pages/perfil-usuario.php" class="user-icon">
                        <?php
                        $foto_perfil = !empty($_SESSION['usuario']['foto_perfil']) ? $_SESSION['usuario']['foto_perfil'] : 'imagem_padrao.png';
                        $caminho_foto = '/Tweeb-2025/PI/public/uploads/' . $foto_perfil;
                        ?>
                        <img src="<?php echo htmlspecialchars($caminho_foto); ?>" alt="Foto de Perfil">
                    </a>
                </li>
            <?php else: ?>
                <!-- Links para usuário DESLOGADO -->
                <li><a class="op" href="/Tweeb-2025/PI/app/user/View/pages/cadastro.php">Cadastre-se</a></li>
                <li>
                    <a class="op" href="/Tweeb-2025/PI/App/user/View/pages/Carrinho.php"><i class='bx bx-cart-alt'></i></a>
                    <a class="op" href="/Tweeb-2025/PI/app/user/view/pages/login.php"><i class='bx bx-user'></i></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Menu hambúrguer que muda com base no login -->
    <div class="hamburger-menu">
        <div class="user-info">
            <?php if ($is_logged_in): ?>
                <!-- Info do usuário LOGADO -->
                <?php
                $foto_perfil_menu = !empty($_SESSION['usuario']['foto_perfil']) ? $_SESSION['usuario']['foto_perfil'] : 'imagem_padrao.png';
                $caminho_foto_menu = '/Tweeb-2025/PI/public/uploads/' . $foto_perfil_menu;
                ?>
                <img src="<?php echo htmlspecialchars($caminho_foto_menu); ?>" alt="Foto do Usuário">
                <p class="hi-user">Olá, <?php echo htmlspecialchars($_SESSION['usuario']['nome'] ?? 'Usuário'); ?></p>
            <?php else: ?>
                <!-- Info do usuário DESLOGADO -->
                <img src="/Tweeb-2025/PI/public/assets/img/User Pic.png" alt="Foto do Usuário">
                <p class="hi-user">Olá, visitante!</p>
            <?php endif; ?>
            <span class="close-menu-nav"><i class="fa-solid fa-xmark"></i></span>
        </div>

        <hr class="sep">

        <!-- Menu principal do hambúrguer -->
        <ul class="menu-options main-menu">
            <li class="menu-item-nav">
                <a href="#" class="toggle-departamentos">
                    <img src="/Tweeb-2025/PI/public/assets/img/icone-departamento.png" alt="">
                    <span class="item-description-nav">Departamentos</span>
                    <i class="arrow fa-solid fa-chevron-right"></i>
                </a>
            </li>

            <?php if ($is_logged_in): ?>
                <!-- Opções para usuário LOGADO -->
                <li class="menu-item-nav"><a href="/Tweeb-2025/PI/App/user/View/pages/perfil-usuario.php"><img src="/Tweeb-2025/PI/public/assets/img/editar.png" alt=""><span class="item-description-nav">Editar Perfil</span></a></li>
                <li class="menu-item-nav"><a href="/Tweeb-2025/PI/App/user/View/pages/meus-enderecos.php"><img src="/Tweeb-2025/PI/public/assets/img/Calendar.png" alt=""><span class="item-description-nav">Meus Endereços</span></a></li>
                <li class="menu-item-nav">
                    <a href="#" class="toggle-pedidos">
                        <img src="/Tweeb-2025/PI/public/assets/img/Inbox.png" alt="">
                        <span class="item-description-nav">Meus Pedidos</span>
                        <i class="arrow fa-solid fa-chevron-right"></i>
                    </a>
                    <ul class="segundomenu-nav">
                        <li><a href="/Tweeb-2025/PI/App/user/View/pages/rastreio-pedidos.php"><span class="item-description-nav">Pedidos Enviados</span></a></li>
                        <li><a href="/Tweeb-2025/PI/App/user/View/pages/Pedidos-cancelados.php"><span class="item-description-nav">Pedidos Cancelados</span></a></li>
                    </ul>
                </li>
                <li class="menu-item-nav"><a href="/Tweeb-2025/PI/App/user/View/pages/favoritos.php"><img src="/Tweeb-2025/PI/public/assets/img/Like.png" alt=""><span class="item-description-nav">Favoritos</span></a></li>
                <li class="menu-item-nav"><a href="/Tweeb-2025/PI/App/user/View/pages/alterar-senha.php"><img src="/Tweeb-2025/PI/public/assets/img/alterar.png" alt=""><span class="item-description-nav">Alterar Senha</span></a></li>
                <li class="menu-item-nav"><a href="/Tweeb-2025/PI/app/user/Controllers/LogoutController.php"><img src="/Tweeb-2025/PI/public/assets/img/sair.png" alt=""><span class="item-description-nav">Sair</span></a></li>
            <?php else: ?>
                <!-- Opções para usuário DESLOGADO -->
                <div class="auth-buttons">
                    <a href="/Tweeb-2025/PI/app/user/view/pages/login.php" class="btn-login">Entrar</a>
                    <a href="/Tweeb-2025/PI/app/user/View/pages/cadastro.php" class="btn-register">Cadastrar</a>
                </div>
            <?php endif; ?>
        </ul>

        <!-- Submenu de Departamentos (comum para ambos os estados) -->
        <div class="departamentos-menu">
            <button class="voltar-menu">← Voltar</button>
            <ul class="sub-departamentos">
                <li><a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Hardwares.php"><span class="item-description-nav">Hardwares</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Computadores.php"><span class="item-description-nav">Computadores</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Perifericos.php"><span class="item-description-nav">Periféricos</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Energia.php"><span class="item-description-nav">Energia</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Audio.php"><span class="item-description-nav">Áudio</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Games.php"><span class="item-description-nav">Jogos</span></a></li>
            </ul>
        </div>
    </div>
</header>

<!-- Barra de departamentos (comum para ambos os estados) -->
<section id="departaments" class="departments-bar">
    <div class="department">
        <img src="/Tweeb-2025/PI/public/assets/img/Hardwares.png" alt="Hardwares">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Hardwares.php">Hardwares</a>
    </div>
    <span class="separator">|</span>
    <div class="department">
        <img src="/Tweeb-2025/PI/public/assets/img/Computadores.png" alt="Computadores">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Computadores.php">Computadores</a>
    </div>
    <span class="separator">|</span>
    <div class="department">
        <img src="/Tweeb-2025/PI/public/assets/img/Perifericos.png" alt="Periféricos">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Perifericos.php">Periféricos</a>
    </div>
    <span class="separator">|</span>
    <div class="department">
        <img src="/Tweeb-2025/PI/public/assets/img/Energia.png" alt="Energia">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Energia.php">Energia</a>
    </div>
    <span class="separator">|</span>
    <div class="department">
        <img src="/Tweeb-2025/PI/public/assets/img/Audio.png" alt="Áudio">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Audio.php">Áudio</a>
    </div>
    <span class="separator">|</span>
    <div class="department">
        <img src="/Tweeb-2025/PI/public/assets/img/Jogos.png" alt="Jogos">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Games.php">Jogos</a>
    </div>
</section>

<!-- Scripts unificados -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const menuHamburguer = document.querySelector(".hamburger-menu");
    const closeMenuBtn = document.querySelector(".close-menu-nav");
    const openMenuBtn = document.querySelector(".hamburguer");

    const departamentosLink = document.querySelector(".toggle-departamentos");
    const departamentosMenu = document.querySelector(".departamentos-menu");
    const voltarMenuButton = document.querySelector(".voltar-menu");
    const mainMenu = document.querySelector(".main-menu");
    
    // Lógica para abrir e fechar o menu principal
    if (openMenuBtn) {
        openMenuBtn.addEventListener("click", function () {
            menuHamburguer.classList.add("active");
        });
    }

    if (closeMenuBtn) {
        closeMenuBtn.addEventListener("click", function () {
            menuHamburguer.classList.remove("active");
        });
    }

    // Lógica para o submenu de departamentos
    if (departamentosLink) {
        departamentosLink.addEventListener("click", function (e) {
            e.preventDefault();
            if (mainMenu) mainMenu.style.display = "none";
            if (departamentosMenu) departamentosMenu.classList.add("active");
        });
    }

    if (voltarMenuButton) {
        voltarMenuButton.addEventListener("click", function () {
            if (departamentosMenu) departamentosMenu.classList.remove("active");
            if (mainMenu) mainMenu.style.display = "block";
        });
    }

    // Lógica para o submenu de pedidos (só existe para usuário logado)
    const pedidosLink = document.querySelector('.toggle-pedidos');
    if (pedidosLink) {
        const arrow = pedidosLink.querySelector('.arrow');
        const menuItem = pedidosLink.closest('.menu-item-nav');
        
        pedidosLink.addEventListener('click', function(event) {
            event.preventDefault();
            menuItem.classList.toggle('open');
            if (arrow) arrow.classList.toggle('rotate');
        });

        document.addEventListener('click', function(event) {
            if (menuItem && !menuItem.contains(event.target)) {
                menuItem.classList.remove('open');
                if (arrow) arrow.classList.remove('rotate');
            }
        });
    }
});
</script>
<!-- Se você tiver um arquivo JS externo, pode remover o script acima e usar o link -->
<!-- <script src="/Tweeb-2025/PI/public/js/navbar.js"></script> -->

</body>
</html>
