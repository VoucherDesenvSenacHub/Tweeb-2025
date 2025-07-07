<body class="navBody">
<header class="headNav">
        <div class="hamburguer">
            <i class='bx bx-menu'></i>
        </div>
        <div class="logo">
            <a href="home.php"><img src="/Tweeb-2025/PI/public/assets/img/Ativo 2.png" alt="logo tweeb"></a>
        </div>
        <div class="search-box">
            <form action="">
                <button class="srch-home" type="submit"><i class='bx bx-search'></i></button>
                <input type="text" name="search" class="srch" placeholder="Buscar">
            </form>
        </div>
        <div class="responsive-menu">
            <a href="/Tweeb-2025/PI/app/user/View/pages/quemsomos.php">Sobre</a>
            <a href="/Tweeb-2025/PI/app/user/View/pages/orcamento.php">Orçamento</a>
        </div>
        <nav class="navb">
            <ul>
                <li><a class="op" href="home.php">Home</a></li>
                <li><a class="op" href="/Tweeb-2025/PI/app/user/View/pages/quemsomos.php">Sobre</a></li>
                <li><a class="op" href="/Tweeb-2025/PI/app/user/View/pages/orcamento.php">Orçamento</a></li>
                <li><a class="op" href="/Tweeb-2025/PI/app/user/View/pages/cadastro.php">Cadastre-se</a></li>
                <li>
                    <a class="op" href="/Tweeb-2025/PI/app/user/View/pages/Carrinho.php"><i class='bx bx-cart-alt'></i></a>
                    <a class="op" href="/Tweeb-2025/PI/app/user/view/pages/login.php"><i class='bx bx-user'></i></a>
                </li>
            </ul>
        </nav>

        <!-- Menu hamburguer (começa escondido) -->
        <div class="hamburger-menu">
            <div class="user-info">
                <img src="public/assets/img/User Pic.png" alt="Foto do Usuário">
                <p class="hi-user">Olá, visitante!</p>
                <span class="close-menu-nav"><i class="fa-solid fa-xmark"></i></span>
            </div>

            <hr class="sep"> 

            <ul class="menu-options main-menu">
            <li class="menu-item-nav">
                <a href="#" class="toggle-departamentos">
                    <img src="public/assets/img/icone-departamento.png" alt="">
                    <span class="item-description-nav">Departamentos</span>
                    <i class="arrow fa-solid fa-chevron-right"></i>
                </a>
            </li>
            <div class="auth-buttons">
                <a href="/Tweeb-2025/PI/app/user/view/pages/login.php" class="btn-login">Entrar</a>
                <a href="/Tweeb-2025/PI/app/user/View/pages/cadastro.php" class="btn-register">Cadastrar</a>
            </div>
        </ul>

        <!-- Submenu de Departamentos (começa oculto) -->
        <div class="departamentos-menu">
            <button class="voltar-menu">← Voltar</button>
            <ul class="sub-departamentos">
                <li><a href="/Tweeb-2025/PI/app/user/View/pages/departamento01.php"><span class="item-description-nav">Hardwares</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/View/pages/departamento01.php"><span class="item-description-nav">Computadores</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/View/pages/departamento01.php"><span class="item-description-nav">Perifericos</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/View/pages/departamento01.php"><span class="item-description-nav">Energia</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/View/pages/departamento01.php"><span class="item-description-nav">Audio</span></a></li>
                <li><a href="/Tweeb-2025/PI/app/user/View/pages/departamento01.php"><span class="item-description-nav">Jogos</span></a></li>
            </ul>
        </div>
    </div>
    </header>
<section id="departaments" class="departments-bar">
    <div class="department">
        <img src="public/assets/img/Hardwares.png" alt="Hardwares">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd">Hardwares</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Computadores.png" alt="Computadores">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd">Computadores</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Perifericos.png" alt="Periféricos">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd">Periféricos</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Energia.png" alt="Energia">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd">Energia</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Audio.png" alt="Áudio">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd">Áudio</a>
    </div>

    <span class="separator">|</span>
    <div class="department">
        <img src="public/assets/img/Jogos.png" alt="Jogos">
        <a href="/Tweeb-2025/PI/app/user/Controllers/ControllerProd/Departamento_Games.php">Jogos</a>
    </div>

</section>
    <script>
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
    <script src="public/js/navbar.js"></script>

</html>
<!-- <li>
                    <a class="op"href="#"><i class='bx bx-cart-alt'></i></a>
                    <a href="/Tweeb-2025/PI/app/user/view/pages/login.php"><i class='bx bx-user'></i></a>
                    <a href="#" class="user-icon">
                        <img src="../../../../public/assets/img/Avatar.png" alt="teste">
                    </a>
                </li> -->