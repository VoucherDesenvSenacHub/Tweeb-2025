<?php
// Inicia a sessão se não estiver ativa
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
  <nav class="adm_sidebar" id="sidebar">

        <div class="sidebar_contentAdm">
            <div class="adm_user">
                <?php 
                    // Verifica se há sessão ativa antes de acessar
                    if (isset($_SESSION['adm']) || isset($_SESSION['funcionario'])) {
                        // Define qual sessão usar (admin tem prioridade)
                        $usuario = isset($_SESSION['adm']) ? $_SESSION['adm'] : $_SESSION['funcionario'];
                        
                        // Define a foto do perfil
                        $foto_perfil = !empty($usuario['foto_perfil']) ? $usuario['foto_perfil'] : 'imagem_padrao.png';
                        
                        // Verifica se é a imagem padrão ou uma foto personalizada
                        if ($foto_perfil === 'imagem_padrao.png' || empty($foto_perfil) || $foto_perfil === null) {
                            $caminho_foto = '/Tweeb-2025/PI/public/uploads/imagem_padrao.png';
                        } else {
                            $caminho_foto = '/Tweeb-2025/PI/public/uploads/' . $foto_perfil;
                        }
                        
                        $nome_usuario = htmlspecialchars($usuario['nome']);
                        $cargo_usuario = htmlspecialchars($usuario['cargo'] ?? '');
                    } else {
                        // Valores padrão se não houver sessão
                        $caminho_foto = '/Tweeb-2025/PI/public/uploads/imagem_padrao.png';
                        $nome_usuario = 'Usuário';
                        $cargo_usuario = 'Cargo';
                    }
                    
                    // Debug: verificar se a sessão tem os dados corretos
                    // error_log("Sidebar - Usuario: " . print_r($usuario, true));
                    // error_log("Sidebar - Foto perfil: " . $foto_perfil);
                    // error_log("Sidebar - Caminho foto: " . $caminho_foto);
                ?>
                <a href="../pages/perfil-adm.php">
                    <img class="foto-adm" src="<?php echo htmlspecialchars($caminho_foto); ?>" id="userAdm_avatar" alt="Avatar">
                </a>
    
                <p class="userAdm_infos">
                    <span class="itemAdm-descricao">
                      <?php echo $nome_usuario; ?>
                    </span>
                    <span class="itemAdm-descricao">
                      <small><?php echo $cargo_usuario; ?></small>
                    </span>
                </p>
            </div>
            <div class="linha"></div>
            <ul class="menu_sidebarAdm">
                <li class="sidebarAdm-item">
                  <a href="../pages/painel-adm.php"><img src="../../../../public/assets/img/analytics 1.png" alt=""><span class="itemAdm-descricao">Painel</span></a>
                </li>
                <li class="sidebarAdm-item" id="Favoritos">
                  <a href="../pages/adm-manutencao.php"><img src="../../../../public/assets/img/Calendar.png" alt=""><span class="itemAdm-descricao">Manutenções</span></a>
                </li>
                <li class="sidebarAdm-item">
                  <a href="../pages/orcamento-recebido.php"><img src="../../../../public/assets/img/Inbox.png" alt=""><span class="itemAdm-descricao">Orçamentos</span></a>
                </li>
                <li class="sidebarAdm-item has-submenu_sidbarAdm" id="toggle">
                  <a href="../pages/listarProdutos.php"><img src="../../../../public/assets/img/Reports.png" alt=""><span class="itemAdm-descricao">Produtos</span> <i class="fa-solid fa-angle-down" id="arrow"></i></a>
                  <ul class="submenu_sidbarAdm">
                    <li><a href="#"><span class="itemAdm-descricao">Cadastro</span></a></li>
                    <li><a href="../pages/adm-estoque.php"><span class="itemAdm-descricao">Estoque</span></a></li>
                  </ul>
                </li>
                <li class="sidebarAdm-item">
                  <a href="../pages/ListarClientescopy.php"><img src="../../../../public/assets/img/Vector (4).png" alt=""><span class="itemAdm-descricao">Clientes</span></a>
                </li>


                <?php if (isset($_SESSION['adm'])): ?>
                    <li class="sidebarAdm-item">
                        <a href="addfuncionario.php"><img src="../../../../public/assets/img/addfun.png" alt=""><span class="itemAdm-descricao">Add funcionario</span></a>
                    </li>
                <?php endif; ?>



                <li class="sidebarAdm-item">
                  <a href="../pages/aparencia.php"><img src="../../../../public/assets/img/Vector (5).png" alt=""><span class="itemAdm-descricao">Aparência</span></a>
                </li>
                <li class="sidebarAdm-item">
                  <a href="/Tweeb-2025/PI/app/adm/Controllers/FuncionarioLogout.php"><img src="../../../../public/assets/img/sair.png" alt=""><span class="itemAdm-descricao">Sair</span></a>
                </li>
               
                
            
            </ul>
              <button id="open_btn">
                <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
       
        <div id="logout">
            <!-- <button id="logout_btn">
                <a href="#"><span class="itemAdm-descricao"></span></a>
            </button> -->
            <!-- <button id="logout_btn">
                <a href="#"><img src="../../../../public/assets/img/sair.png" alt=""> <span class="itemAdm-descricao">Sair</span></a>
            </button> -->
        </div>
    </nav>