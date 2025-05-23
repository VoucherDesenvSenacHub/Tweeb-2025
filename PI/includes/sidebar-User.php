<body class="sidebar_Produto">
    <nav id="sidebar">
        <div id="sidebar_content">
            <div id="user">
              <?php
              $foto = $_SESSION['usuario']['foto_perfil'] ?? '';
              $caminhoImagem = $foto ? '/Tweeb-2025/PI/public/uploads/' . $foto : '/Tweeb-2025/PI/public/assets/img/foto-perfil-default.png';
              ?>
              <img src="<?php echo $caminhoImagem; ?>" alt="Foto de perfil" class="foto-perfil-navbar">

    
                <p id="user_infos">
                    <span class="item-description">
                    <?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?>
                    </span>
                </p>
            </div>
            <div class="linha"></div>
            <ul class="sidemenu">
                <li class="menu-item">
                  <a href="/Tweeb-2025/PI/app/user/View/pages/perfil-usuario.php"><img src="/Tweeb-2025/PI/public/assets/img/editar.png" alt=""><span class="item-description">Editar Perfil</span></a>
                </li>
                <li class="menu-item">
                  <a href="/Tweeb-2025/PI/app/user/View/pages/meus-enderecos.php"><img src="/Tweeb-2025/PI/public/assets/img/Calendar.png" alt=""><span class="item-description">Meus Endereços</span></a>
                </li>
                <li class="sidemenu-item has-segundomenu" id="toggle">
                  <a href="#"><img src="/Tweeb-2025/PI/public/assets/img/Inbox.png" alt="">
                  <span class="item-description"> Meus Pedidos</span>
                  <i class="fa-solid fa-angle-down" id="arrow"></i></a>
                  <ul class="segundomenu">
                    <li><a href="/Tweeb-2025/PI/app/user/View/pages/rastreio-pedidos.php"><span class="item-description">Pedidos Enviados</span></a></li>
                    <li><a href="/Tweeb-2025/PI/app/user/View/pages/Pedidos-cancelados.php"><span class="item-description">Pedidos Cancelados</span></a></li>
                  </ul>
                </li>
                <li class="menu-item" id="Favoritos">
                  <a href="/Tweeb-2025/PI/app/user/View/pages/favoritos.php"><img src="/Tweeb-2025/PI/public/assets/img/Like.png" alt=""><span class="item-description">Favoritos</span></a>
                </li>
                <li class="menu-item">
                  <a href="/Tweeb-2025/PI/app/user/View/pages/alterar-senha.php"><img src="/Tweeb-2025/PI/public/assets/img/alterar.png" alt=""><span class="item-description"> Alterar Senha</span></a>
                </li>
                <li class="menu-item">
                  <a href="#"><img src="/Tweeb-2025/PI/public/assets/img/sair.png" alt=""><span class="item-description">Sair</span></a>
                </li>
                <!-- <li class="menu-item" >
                  <a href="#"><img src="/Tweeb-2025/PI/public/assets/img/config.png" alt=""><span class="item-description">Configurações</span></a>
                </li> -->
                
            
            </ul>
              <button id="open_btn">
                <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
       
        <div id="logout">
            <!-- <button id="logout_btn">
                <a href="#"><img src="/Tweeb-2025/PI/public/assets/img/Help-circle.png" alt=""> <span class="item-description">Ajuda</span></a>
            </button> -->
            <!-- <button id="logout_btn">
                <a href="#"><img src="/Tweeb-2025/PI/public/assets/img/sair.png" alt=""> <span class="item-description">Sair</span></a>
            </button> -->
        </div>
    </nav>
</body>