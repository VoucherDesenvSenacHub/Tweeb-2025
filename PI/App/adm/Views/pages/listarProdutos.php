
<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR PRODUTOS</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../../../../public/css/SidbarAdm.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400&family=Arimo+Hebrew:wght@400&display=swap" rel="stylesheet">
    <script src="../../../../public/js/SidebarAdm.js" defer></script>
</head>
<body>
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>



    <div class="listarU-titulo-container">
        <a href="estoque_cadastrar_novo.html">
            <div class="listarU-titulo">Novo Produto</div>
        </a>
        
        <div class="listarU-titulo2">Cadastrados</div>
    </div>

    <div class="listarU-search-box">
        <form action="" onsubmit="event.preventDefault(); filterTable();">
            <div class="listarU-search-container">
                <button type="submit" class="listarU-search-btn">
                    <i class="bx bx-search"></i>
                </button>
                <input type="text" id="searchInput" class="listarU-srch" placeholder="Buscar">
            </div>
        </form>
    </div>

    <div class="listarU-filtro-container">
        <div class="listarU-filtro-box">
            <img src="../../../../public/assets/img/Icon-filtro.png" alt="Ícone Filtro" class="listarU-filtro-icon">
            <span>Filtro</span>
        </div>
    </div>

    <section>
        <div class="listarU-container">
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome do Produto</th>
                        <th>Valor</th>
                        <th>Alterar</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                    foreach ($usuarios as $usuario) {
                        echo ' -->
                        <tr>
                            <!-- <td>' . $usuario['id_usuario'] . '</td>
                            <td>' . $usuario['nome'] . '</td>
                            <td>' . $usuario['email'] . '</td> -->
                            <td><img src="../../../../public/assets/img/notebook-gamer-dell-g15-i1300-a45p-intel-core-i5-16gb-nvidia-rtx-4050-ssd-512gb-15-6-fhd-windows-11-preto-210-bkyg_1707334557_gg 1.png" id="userAdm_avatar" alt="Avatar"></td>
                            <td>Notebook Gamer Dell g15-i1300</td>
                            <td>R$5.000,00</td>
                            <td>
                                <div class="td_botao">
                                    <!-- <form action="editarUsuario.php" method="get"> -->
                                    <form action="estoque_cadastrar_novo.html" method="get">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-edit-btn">
                                            <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarU-edit-icon">
                                        </button>
                                    </form>
                    
                                    <!-- <form action="excluirUsuario.php" method="post"> -->
                                    <form action="excluirProduto.php" method="post">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-delete-btn">
                                            <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarU-delete-icon">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <!-- <td>' . $usuario['quantidade'] . '</td> -->
                            <td>100</td>
                        </tr>

                        <tr>
                            <!-- <td>' . $usuario['id_usuario'] . '</td>
                            <td>' . $usuario['nome'] . '</td>
                            <td>' . $usuario['email'] . '</td> -->
                            <td><img src="../../../../public/assets/img/notebook-gamer-dell-g15-i1300-a45p-intel-core-i5-16gb-nvidia-rtx-4050-ssd-512gb-15-6-fhd-windows-11-preto-210-bkyg_1707334557_gg 1.png" id="userAdm_avatar" alt="Avatar"></td>
                            <td>Notebook Gamer Dell g15-i1300</td>
                            <td>R$5.000,00</td>
                            <td>
                                <div class="td_botao">
                                    <!-- <form action="editarUsuario.php" method="get"> -->
                                    <form action="estoque_cadastrar_novo.html" method="get">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-edit-btn">
                                            <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarU-edit-icon">
                                        </button>
                                    </form>
                    
                                    <!-- <form action="excluirUsuario.php" method="post"> -->
                                    <form action="excluirProduto.php" method="post">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-delete-btn">
                                            <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarU-delete-icon">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <!-- <td>' . $usuario['quantidade'] . '</td> -->
                            <td>100</td>
                        </tr>

                        <tr>
                            <!-- <td>' . $usuario['id_usuario'] . '</td>
                            <td>' . $usuario['nome'] . '</td>
                            <td>' . $usuario['email'] . '</td> -->
                            <td><img src="../../../../public/assets/img/notebook-gamer-dell-g15-i1300-a45p-intel-core-i5-16gb-nvidia-rtx-4050-ssd-512gb-15-6-fhd-windows-11-preto-210-bkyg_1707334557_gg 1.png" id="userAdm_avatar" alt="Avatar"></td>
                            <td>Notebook Gamer Dell g15-i1300</td>
                            <td>R$5.000,00</td>
                            <td>
                                <div class="td_botao">
                                    <!-- <form action="editarUsuario.php" method="get"> -->
                                    <form action="estoque_cadastrar_novo.html" method="get">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-edit-btn">
                                            <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarU-edit-icon">
                                        </button>
                                    </form>
                    
                                    <!-- <form action="excluirUsuario.php" method="post"> -->
                                    <form action="excluirProduto.php" method="post">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-delete-btn">
                                            <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarU-delete-icon">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <!-- <td>' . $usuario['quantidade'] . '</td> -->
                            <td>100</td>
                        </tr>

                        <tr>
                            <!-- <td>' . $usuario['id_usuario'] . '</td>
                            <td>' . $usuario['nome'] . '</td>
                            <td>' . $usuario['email'] . '</td> -->
                            <td><img src="../../../../public/assets/img/notebook-gamer-dell-g15-i1300-a45p-intel-core-i5-16gb-nvidia-rtx-4050-ssd-512gb-15-6-fhd-windows-11-preto-210-bkyg_1707334557_gg 1.png" id="userAdm_avatar" alt="Avatar"></td>
                            <td>Notebook Gamer Dell g15-i1300</td>
                            <td>R$5.000,00</td>
                            <td>
                                <div class="td_botao">
                                    <!-- <form action="editarUsuario.php" method="get"> -->
                                    <form action="estoque_cadastrar_novo.html" method="get">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-edit-btn">
                                            <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarU-edit-icon">
                                        </button>
                                    </form>
                    
                                    <!-- <form action="excluirUsuario.php" method="post"> -->
                                    <form action="excluirProduto.php" method="post">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarU-delete-btn">
                                            <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarU-delete-icon">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <!-- <td>' . $usuario['quantidade'] . '</td> -->
                            <td>100</td>
                        </tr>

                        <!-- </tr>';
                        }
                    ?> -->
                </tbody>
            </table>
        </div>
    </section>

    <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 
</body>
</html>
