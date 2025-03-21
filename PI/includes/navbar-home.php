<body class="navBody">
<header class="headNav">
        <div class="hamburguer">
            <i class='bx bx-menu'></i>
        </div>
        <div class="logo">
            <a href="home.php"><img src="public/assets/img/Ativo 2.png" alt="logo tweeb"></a>
        </div>
        <div class="search-box">
            <form action="">
                <button class="srch-home" type="submit"><i class='bx bx-search'></i></button>
                <input type="text" name="search" class="srch" placeholder="Buscar">
            </form>
        </div>
        <div class="responsive-menu">
            <a href="app/user/View/pages/quemsomos.php">Sobre</a>
            <a href="app/user/View/pages/orcamento.php">Orçamento</a>
        </div>
        <nav class="navb">
            <ul>
                <li><a class="op" href="home.php">Home</a></li>
                <li><a class="op" href="app/user/View/pages/quemsomos.php">Sobre</a></li>
                <li><a class="op" href="app/user/View/pages/orcamento.php">Orçamento</a></li>
                <li><a class="op" href="app/user/View/pages/cadastro.php">Cadastre-se</a></li>
                <li>
                    <a class="op" href="app/user/View/pages/Carrinho.php"><i class='bx bx-cart-alt'></i></a>
                    <a class="op" href="app/user/view/pages/login.php"><i class='bx bx-user'></i></a>
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
                <a href="app/user/view/pages/login.php" class="btn-login">Entrar</a>
                <a href="app/user/View/pages/cadastro.php" class="btn-register">Cadastrar</a>
            </div>
        </ul>

        <!-- Submenu de Departamentos (começa oculto) -->
        <div class="departamentos-menu">
            <button class="voltar-menu">← Voltar</button>
            <ul class="sub-departamentos">
                <li><a href="#"><span class="item-description-nav">Hardwares</span></a></li>
                <li><a href="#"><span class="item-description-nav">Computadores</span></a></li>
                <li><a href="#"><span class="item-description-nav">Perifericos</span></a></li>
                <li><a href="#"><span class="item-description-nav">Energia</span></a></li>
                <li><a href="#"><span class="item-description-nav">Audio</span></a></li>
                <li><a href="#"><span class="item-description-nav">Jogos</span></a></li>
            </ul>
        </div>
    </div>
    </header>

    <!-- Barra de departamentos -->
    <section id="departaments" class="departments-bar">
        <div class="department">
            <img src="public/assets/img/Hardwares.png" alt="Hardwares">
            <span>Hardwares <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#" class="linkn-submenu-h">Placa Mãe <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Placa Mae Gigabyte B550M Aorus</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Placa Mae ASRock B450M Steel Legend</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Placa Mae Gigabyte B550M K</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Placa Mae Mancer A520M DX</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Placa Mae Gigabyte B760M Aorus</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="linkn-submenu-h">Placa de Video <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">NVIDIA GeForce</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">AMD Radeon</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Intel Arc</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Ver Todos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Memorias <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Memória DDR 2</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Memória DDR 3</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Memória DDR 4</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Memória DDR 5</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Coolers e WaterCoolers <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Acessórios para Cooler</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Air Cooler</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Almofada Térmica</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">FAN</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Pasta Térmica</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Water Cooler</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Fonte de Alimentação <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 200W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 230W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 300W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 350W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 400W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 450W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 500W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 550W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 600W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 650W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 700W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 750W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 800W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 850W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 900W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 1000W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 1050W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 1200W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 1300W</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fonte 1600W</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="public/assets/img/Computadores.png" alt="Computadores">
            <span>Computadores <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Desktop<i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Computador AMD</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Computador Intel</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">PC Gamer</a></li>
                    </ul>
                
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Notebook <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Acessórios para Notebook</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook LG</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook Acer</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook Asus</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook Dell</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook Gamer</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook Gigabyte</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook Lenovo</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Notebook Positivo</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="public/assets/img/Perifericos.png" alt="Periféricos">
            <span>Periféricos <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Teclados <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Teclado com Fio</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Teclado sem Fio</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Teclado Gamer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Mouses <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Mouse com Fio</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Mouse sem Fio</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Mouse Gamer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Headsets <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Acessórios para Headset Gamer</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Com Fio</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Sem Fio</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="public/assets/img/Energia.png" alt="Energia">
            <span>Energia <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Cabos e Adaptadores de Energia <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Cabos de Alimentação para PC</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Adaptadores de Energia para Notebooks</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Extensores e T's de Energia</a></li>
                    </ul>
                
                </li>
                <li>
                    <a href="app/user/View/pages/descproduto.php"class="linkn-submenu-h">No-Breaks <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">No-Breaks para PCs e Estações de Trabalho</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">No-Breaks para Home Office</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">No-Breaks para Servidores e Data Centers</a></li>
                    </ul>
                
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="public/assets/img/audio.png" alt="Áudio">
            <span>Áudio <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Caixas de Som <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Caixas de Som Bluetooth</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Caixas de Som para PC</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Caixas de Som Surround</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Caixas de Som Portáteis</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Caixas de Som Smart</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Caixas de Som de Estúdio</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Fones de Ouvido <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fones de Ouvido Bluetooth</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fones de Ouvido Gamer</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fones de Ouvido com Cancelamento de Ruído</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fones de Ouvido com Microfone Removível</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Fones de Ouvido Intra-auriculares</a></li>
                        
                    </ul>
                
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="public/assets/img/Jogos.png" alt="Jogos">
            <span>Jogos <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Jogos Para PC <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Jogos de Ação</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Jogos de Estratégia</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Jogos de Simulação</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Jogos de RPG</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Jogos de Corrida</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Jogos de Luta</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Acessórios Para Games <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Controles de Console</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Teclados e Mouses Gamer</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Headsets para Games</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Cadeiras Gamer</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Mousepads Gamer</a></li>
                        <li><a class="submenu-sub-link" href="app/user/View/pages/descproduto.php">Webcams para Streaming</a></li>
                    </ul>
                </li>
            </ul>
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
                    <a href="app/user/view/pages/login.php"><i class='bx bx-user'></i></a>
                    <a href="#" class="user-icon">
                        <img src="../../../../public/assets/img/Avatar.png" alt="teste">
                    </a>
                </li> -->