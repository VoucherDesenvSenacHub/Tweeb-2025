<body class="navBody">
<header class="headNav">
        <div class="hamburguer">
            <i class='bx bx-menu'></i>
        </div>
        <div class="logo">
            <a href="home.php"><img src="../../../../public/assets/img/Ativo 2.png" alt="logo tweeb"></a>
        </div>
        <div class="search-box">
            <form action="">
                <button type="submit"><i class='bx bx-search'></i></button>
                <input type="text" name="search" class="srch" placeholder="Buscar">
            </form>
        </div>
        <nav class="navb">
            <ul>
                <li><a class="op" href="home.php">Home</a></li>
                <li><a class="op" href="#">Sobre</a></li>
                <li><a class="op" href="#">Orçamento</a></li>
                <li><a class="op" href="../../../../app/user/View/pages/cadastro.php">Sair</a></li>
                <li>
                    <a class="op"href="#"><i class='bx bx-cart-alt'></i></a>
                    <!-- <a href="app/user/view/pages/login.php"><i class='bx bx-user'></i></a> -->
                    <a href="#" class="user-icon">
                        <img src="../../../../public/assets/img/Avatar.png" alt="teste">
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Menu hamburguer (começa escondido) -->
        <div class="hamburger-menu">
            <div class="user-info">
                <img src="../../../../public/assets/img/Hardwares.png" alt="Foto do Usuário">
                <p class="hi-user">Olá, Usuário</p>
            </div>

            <a href="#" class="department-link">Departamentos</a>

            <hr class="sep"> <!-- Linha separadora -->

            <ul class="menu-options">
                <li><a href="#">Minha Conta</a></li>
                <li><a href="#">Meus Dados</a></li>
                <li><a href="#">Meus Pedidos</a></li>
                <li><a href="#">Carteira</a></li>
            </ul>

            <div class="auth-buttons">
                <a href="../../../../app/user/view/pages/login.php" class="btn-login">Entrar</a>
                <a href="../../../../app/user/View/pages/cadastro.php" class="btn-register">Cadastrar</a>
            </div>
        </div>
    </header>

    <!-- Barra de departamentos -->
    <section id="departaments" class="departments-bar">
        <div class="department">
            <img src="../../../../public/assets/img/Hardwares.png" alt="Hardwares">
            <span>Hardwares <i class='bx bx-chevron-right'></i></span>
            <ul class="submenu">
                <li>
                    <a href="#" class="linkn-submenu-h">Placa Mãe <i class='bx bx-chevron-right'></i></a>
                    <ul class="submenu-sub">
                        <li><a class="submenu-sub-link" href="#">Placa Mae Gigabyte B550M Aorus</a></li>
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
            <img src="../../../../public/assets/img/Computadores.png" alt="Computadores">
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
            <img src="../../../../public/assets/img/Perifericos.png" alt="Periféricos">
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
            <img src="../../../../public/assets/img/Energia.png" alt="Energia">
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
            <img src="../../../../public/assets/img/audio.png" alt="Áudio">
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
            <img src="../../../../public/assets/img/Jogos.png" alt="Jogos">
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
    <script src="../../../../public/js/navbar.js"></script>
</html>