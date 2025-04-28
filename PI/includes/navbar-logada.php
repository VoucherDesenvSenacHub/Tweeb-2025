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
            <a href="quemsomos.php">Sobre</a>
            <a href="orcamento.php">Orçamento</a>
        </div>
        <nav class="navb">
            <ul>
                <li><a class="op" href="/Tweeb-2025/PI/home.php">Home</a></li>
                <li><a class="op" href="quemsomos.php">Sobre</a></li>
                <li><a class="op" href="orcamento.php">Orçamento</a></li>
                <li><a class="op" href="/Tweeb-2025/PI/app/user/controllers/logout.php">Sair</a></li>
                <li>
                    <a class="op"href="#"><i class='bx bx-cart-alt'></i></a>
                    <!-- <a href="app/user/view/pages/login.php"><i class='bx bx-user'></i></a> -->
                    <a href="perfil-usuario.php" class="user-icon">
                        <img src="/Tweeb-2025/PI/public/assets/img/foto-perfil-comentarios.jpg" alt="teste">
                    </a>
                </li>
            </ul>
        </nav>

    <div class="hamburger-menu">
        <div class="user-info">
            <img src="/Tweeb-2025/PI/public/assets/img/foto-perfil-comentarios.jpg" alt="Foto do Usuário">
            <p class="hi-user">Olá, Usuário</p>
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
                <a href="cadastro.php"><img src="/Tweeb-2025/PI/public/assets/img/sair.png" alt=""><span class="item-description-nav">Sair</span></a>
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
            <img src="/Tweeb-2025/PI/public/assets/img/Hardwares.png" alt="Hardwares">
            <span>Hardwares <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#" class="linkn-submenu-h">Placa Mãe <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="descproduto.php">Placa Mae Gigabyte B550M Aorus</a></li>
                        <li><a class="submenu-sub-link" href="#">Placa Mae ASRock B450M Steel Legend</a></li>
                        <li><a class="submenu-sub-link" href="#">Placa Mae Gigabyte B550M K</a></li>
                        <li><a class="submenu-sub-link" href="#">Placa Mae Mancer A520M DX</a></li>
                        <li><a class="submenu-sub-link" href="#">Placa Mae Gigabyte B760M Aorus</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="linkn-submenu-h">Placa de Video <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">NVIDIA GeForce</a></li>
                        <li><a class="submenu-sub-link" href="#">AMD Radeon</a></li>
                        <li><a class="submenu-sub-link" href="#">Intel Arc</a></li>
                        <li><a class="submenu-sub-link" href="#">Ver Todos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Memorias <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Memória DDR 2</a></li>
                        <li><a class="submenu-sub-link" href="#">Memória DDR 3</a></li>
                        <li><a class="submenu-sub-link" href="#">Memória DDR 4</a></li>
                        <li><a class="submenu-sub-link" href="#">Memória DDR 5</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Coolers e WaterCoolers <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Acessórios para Cooler</a></li>
                        <li><a class="submenu-sub-link" href="#">Air Cooler</a></li>
                        <li><a class="submenu-sub-link" href="#">Almofada Térmica</a></li>
                        <li><a class="submenu-sub-link" href="#">FAN</a></li>
                        <li><a class="submenu-sub-link" href="#">Pasta Térmica</a></li>
                        <li><a class="submenu-sub-link" href="#">Water Cooler</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Fonte de Alimentação <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Fonte 200W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 230W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 300W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 350W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 400W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 450W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 500W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 550W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 600W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 650W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 700W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 750W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 800W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 850W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 900W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 1000W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 1050W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 1200W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 1300W</a></li>
                        <li><a class="submenu-sub-link" href="#">Fonte 1600W</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="/Tweeb-2025/PI/public/assets/img/Computadores.png" alt="Computadores">
            <span>Computadores <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Desktop<i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Computador AMD</a></li>
                        <li><a class="submenu-sub-link" href="#">Computador Intel</a></li>
                        <li><a class="submenu-sub-link" href="#">PC Gamer</a></li>
                    </ul>
                
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Notebook <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Acessórios para Notebook</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook LG</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook Acer</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook Asus</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook Dell</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook Gamer</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook Gigabyte</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook Lenovo</a></li>
                        <li><a class="submenu-sub-link" href="#">Notebook Positivo</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="/Tweeb-2025/PI/public/assets/img/Perifericos.png" alt="Periféricos">
            <span>Periféricos <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Teclados <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Teclado com Fio</a></li>
                        <li><a class="submenu-sub-link" href="#">Teclado sem Fio</a></li>
                        <li><a class="submenu-sub-link" href="#">Teclado Gamer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Mouses <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Mouse com Fio</a></li>
                        <li><a class="submenu-sub-link" href="#">Mouse sem Fio</a></li>
                        <li><a class="submenu-sub-link" href="#">Mouse Gamer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Headsets <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Acessórios para Headset Gamer</a></li>
                        <li><a class="submenu-sub-link" href="#">Com Fio</a></li>
                        <li><a class="submenu-sub-link" href="#">Sem Fio</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="/Tweeb-2025/PI/public/assets/img/Energia.png" alt="Energia">
            <span>Energia <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Cabos e Adaptadores de Energia <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Cabos de Alimentação para PC</a></li>
                        <li><a class="submenu-sub-link" href="#">Adaptadores de Energia para Notebooks</a></li>
                        <li><a class="submenu-sub-link" href="#">Extensores e T's de Energia</a></li>
                    </ul>
                
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">No-Breaks <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">No-Breaks para PCs e Estações de Trabalho</a></li>
                        <li><a class="submenu-sub-link" href="#">No-Breaks para Home Office</a></li>
                        <li><a class="submenu-sub-link" href="#">No-Breaks para Servidores e Data Centers</a></li>
                    </ul>
                
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="/Tweeb-2025/PI/public/assets/img/audio.png" alt="Áudio">
            <span>Áudio <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Caixas de Som <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Caixas de Som Bluetooth</a></li>
                        <li><a class="submenu-sub-link" href="#">Caixas de Som para PC</a></li>
                        <li><a class="submenu-sub-link" href="#">Caixas de Som Surround</a></li>
                        <li><a class="submenu-sub-link" href="#">Caixas de Som Portáteis</a></li>
                        <li><a class="submenu-sub-link" href="#">Caixas de Som Smart</a></li>
                        <li><a class="submenu-sub-link" href="#">Caixas de Som de Estúdio</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Fones de Ouvido <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Fones de Ouvido Bluetooth</a></li>
                        <li><a class="submenu-sub-link" href="#">Fones de Ouvido Gamer</a></li>
                        <li><a class="submenu-sub-link" href="#">Fones de Ouvido com Cancelamento de Ruído</a></li>
                        <li><a class="submenu-sub-link" href="#">Fones de Ouvido com Microfone Removível</a></li>
                        <li><a class="submenu-sub-link" href="#">Fones de Ouvido Intra-auriculares</a></li>
                        
                    </ul>
                
                </li>
            </ul>
        </div>
        <span class="separator">|</span>
        <div class="department">
            <img src="/Tweeb-2025/PI/public/assets/img/Jogos.png" alt="Jogos">
            <span>Jogos <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#"class="linkn-submenu-h">Jogos Para PC <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Jogos de Ação</a></li>
                        <li><a class="submenu-sub-link" href="#">Jogos de Estratégia</a></li>
                        <li><a class="submenu-sub-link" href="#">Jogos de Simulação</a></li>
                        <li><a class="submenu-sub-link" href="#">Jogos de RPG</a></li>
                        <li><a class="submenu-sub-link" href="#">Jogos de Corrida</a></li>
                        <li><a class="submenu-sub-link" href="#">Jogos de Luta</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"class="linkn-submenu-h">Acessórios Para Games <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Controles de Console</a></li>
                        <li><a class="submenu-sub-link" href="#">Teclados e Mouses Gamer</a></li>
                        <li><a class="submenu-sub-link" href="#">Headsets para Games</a></li>
                        <li><a class="submenu-sub-link" href="#">Cadeiras Gamer</a></li>
                        <li><a class="submenu-sub-link" href="#">Mousepads Gamer</a></li>
                        <li><a class="submenu-sub-link" href="#">Webcams para Streaming</a></li>
                    </ul>
                </li>
            </ul>
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