<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<body class="navBody">
<header class="headNav">
        <div class="hamburguer">
            <i class='bx bx-menu'></i>
        </div>
        <div class="logo">
            <a href="/Tweeb-2025/PI/home.php"><img src="/Tweeb-2025/PI/public/assets/img/Ativo 2.png" alt="logo tweeb"></a>
        </div>
        <div class="search-box">
            <form  action="">
                <button class="srch-logada"type="submit"><i class='bx bx-search'></i></button>
                <input type="text" name="search" class="srch-log" placeholder="Buscar">
            </form>
        </div>
        <div class="responsive-menu">
            <a href="/Tweeb-2025/PI/App/user/View/pages/quemsomos.php">Sobre</a>
            <a href="/Tweeb-2025/PI/App/user/View/pages/orcamento.php">Orçamento</a>
        </div>
        <nav class="navb">
            <ul>
                <li><a class="op" href="/Tweeb-2025/PI/home.php">Home</a></li>
                <li><a class="op" href="/Tweeb-2025/PI/App/user/View/pages/quemsomos.php">Sobre</a></li>
                <li><a class="op" href="/Tweeb-2025/PI/App/user/View/pages/orcamento.php">Orçamento</a></li>
                <li><a class="op" href="/Tweeb-2025/PI/app/user/Controllers/LogoutController.php">Sair</a></li>
                <li>
                    <a class="op"href="/Tweeb-2025/PI/App/user/View/pages/carrinho.php"><i class='bx bx-cart-alt'></i></a>
                    <a href="../../../Tweeb-2025/PI/App/user/View/pages/perfil-usuario.php" class="user-icon">
                        <?php 
                        $foto_perfil = !empty($_SESSION['usuario']['foto_perfil']) ? $_SESSION['usuario']['foto_perfil'] : 'imagem_padrao.png';
                        $caminho_foto = '/Tweeb-2025/PI/public/uploads/' . $foto_perfil;
                        ?>
                        <img src="<?php echo htmlspecialchars($caminho_foto); ?>" 
                             alt="Foto de Perfil">
                    </a>
                </li>
            </ul>
        </nav>

    <div class="hamburger-menu">
        <div class="user-info">
            <?php 
            $foto_perfil = !empty($_SESSION['usuario']['foto_perfil']) ? $_SESSION['usuario']['foto_perfil'] : 'imagem_padrao.png';
            $caminho_foto = '/Tweeb-2025/PI/public/uploads/' . $foto_perfil;
            ?>
            <img src="<?php echo htmlspecialchars($caminho_foto); ?>" 
                 alt="Foto do Usuário">
            <p class="hi-user">Olá, <?php echo htmlspecialchars($_SESSION['usuario']['nome'] ?? 'Usuário'); ?></p>
            <span class="close-menu-nav"><i class="fa-solid fa-xmark"></i></span>
        </div>

        <hr class="sep"> 

        <!-- Menu principal -->
        <ul class="menu-options main-menu">
            <li class="menu-item-nav">
                <a href="#" class="toggle-departamentos">
                    <img src="/Tweeb-2025/PI/public/assets/img/icone-departamento.png" alt="">
                    <span class="item-description-nav">Departamentos</span>
                    <i class="arrow fa-solid fa-chevron-right"></i>
                </a>
            </li>
            <li class="menu-item-nav">
                <a href="perfil-usuario.php"><img src="/Tweeb-2025/PI/public/assets/img/editar.png" alt=""><span class="item-description-nav">Editar Perfil</span></a>
            </li>
            <li class="menu-item-nav">
                <a href="meus-enderecos.php"><img src="/Tweeb-2025/PI/public/assets/img/Calendar.png" alt=""><span class="item-description-nav">Meus Endereços</span></a>
            </li>
            <li class="menu-item-nav">
                <a href="#" class="toggle-pedidos">
                    <img src="/Tweeb-2025/PI/public/assets/img/Inbox.png" alt="">
                    <span class="item-description-nav">Meus Pedidos</span>
                    <i class="arrow fa-solid fa-chevron-right"></i> 
                </a>
                <ul class="segundomenu-nav">
                    <li><a href="rastreio-pedidos.php"><span class="item-description-nav">Pedidos Enviados</span></a></li>
                    <li><a href="Pedidos-cancelados.php"><span class="item-description-nav">Pedidos Cancelados</span></a></li>
                </ul>
            </li>
            <li class="menu-item-nav">
                <a href="favoritos.php"><img src="/Tweeb-2025/PI/public/assets/img/Like.png" alt=""><span class="item-description-nav">Favoritos</span></a>
            </li>
            <li class="menu-item-nav">
                <a href="alterar-senha.php"><img src="/Tweeb-2025/PI/public/assets/img/alterar.png" alt=""><span class="item-description-nav">Alterar Senha</span></a>
            </li>
            <li class="menu-item-nav">
                <a href="/Tweeb-2025/PI/app/user/Controllers/LogoutController.php"><img src="/Tweeb-2025/PI/public/assets/img/sair.png" alt=""><span class="item-description-nav">Sair</span></a>
            </li>
        </ul>

        <!-- Submenu de Departamentos (começa oculto) -->
        <div class="departamentos-menu">
            <button class="voltar-menu">← Voltar</button>
            <ul class="sub-departamentos">
                <li><a href="departamento01.php"><span class="item-description-nav">Hardwares</span></a></li>
                <li><a href="departamento01.php"><span class="item-description-nav">Computadores</span></a></li>
                <li><a href="departamento01.php"><span class="item-description-nav">Perifericos</span></a></li>
                <li><a href="departamento01.php"><span class="item-description-nav">Energia</span></a></li>
                <li><a href="departamento01.php"><span class="item-description-nav">Audio</span></a></li>
                <li><a href="departamento01.php"><span class="item-description-nav">Jogos</span></a></li>
            </ul>
        </div>
    </div>
</header> 
    <!-- Barra de departamentos -->
    <section id="departaments" class="departments-bar">
    <div class="department">
        <img src="public/assets/img/Hardwares.png" alt="Hardwares">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Hardwares.php">Hardwares</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Computadores.png" alt="Computadores">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Computadores.php">Computadores</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Perifericos.png" alt="Periféricos">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Perifericos.php">Periféricos</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Energia.png" alt="Energia">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Energia.php">Energia</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Audio.png" alt="Áudio">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Audio.php">Áudio</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Jogos.png" alt="Jogos">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Games.php">Jogos</a>
    </div>
</section>
    <script>
const pedidosLink = document.querySelector('.toggle-pedidos');
const arrow = pedidosLink.querySelector('.arrow');
const menuItem = pedidosLink.closest('.menu-item-nav');
const secondMenu = menuItem.querySelector('.segundomenu-nav');


pedidosLink.addEventListener('click', function(event) {
    event.preventDefault();

    
    menuItem.classList.toggle('open');
    arrow.classList.toggle('rotate');
});


document.addEventListener('click', function(event) {
    if (!menuItem.contains(event.target)) {
       
        menuItem.classList.remove('open');
        arrow.classList.remove('rotate');
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const departamentosLink = document.querySelector(".toggle-departamentos");
    const departamentosMenu = document.querySelector(".departamentos-menu");
    const voltarMenuButton = document.querySelector(".voltar-menu");
    const mainMenu = document.querySelector(".main-menu");

   
    departamentosLink.addEventListener("click", function (e) {
        e.preventDefault(); 

       
        mainMenu.style.display = "none";
        departamentosMenu.classList.add("active");
    });

    voltarMenuButton.addEventListener("click", function () {
        departamentosMenu.classList.remove("active"); 
        mainMenu.style.display = "block"; 
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const menuHamburguer = document.querySelector(".hamburger-menu");
    const closeMenuBtn = document.querySelector(".close-menu-nav");

    closeMenuBtn.addEventListener("click", function () {
        menuHamburguer.classList.remove("active"); 
    });
});

</script>
    <script src="/Tweeb-2025/PI/public/js/navbar.js"></script>
</html>