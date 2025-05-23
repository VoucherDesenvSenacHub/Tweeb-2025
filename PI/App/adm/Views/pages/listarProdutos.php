<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR PRODUTOS</title>
</head>
<body class="listarP">
    
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

    <div class="listarP-titulo-contain">
        <a href="estoqueok.php">
            <div class="listarP-titulo">Novo Produto</div>
        </a>
        
        <div class="listarP-titulo2">Cadastrados</div>
    </div>

    <div class="listarP-search-box">
        <div class="listarP-search-contain">
            <button type="submit" class="listarP-search-btn">
                <i class="bx bx-search"></i>
            </button>
            <input type="text" id="searchInput" class="listarP-srch" placeholder="Buscar">
        </div>
    </div>


    <div class="listarP-filtro-box">
        <img src="../../../../public/assets/img/Icon-filtro.png" alt="Ícone Filtro" class="listarP-filtro-icon">
        <span class="listarP-filtro-text">Filtro</span>
    </div>


    <section class="listarP-section">
        <div class="listarP-contain">
            <table class="listarP-table">
                <thead class="thead-listarP">
                    <tr class="tr-listarP">
                        <th class="th-listarP">Foto</th>
                        <th class="th-listarP">Nome do Produto</th>
                        <th class="th-listarP">Valor</th>
                        <th class="th-listarP">Alterar</th>
                        <th class="th-listarP">Quantidade</th>
                    </tr>
                </thead>
                <tbody class="tbody-listarP">
                        <tr class="tr-tr-listarP">
                            <td class="td-listarP"><img src="../../../../public/assets/img/notebook-gamer-dell-g15-i1300-a45p-intel-core-i5-16gb-nvidia-rtx-4050-ssd-512gb-15-6-fhd-windows-11-preto-210-bkyg_1707334557_gg 1.png" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>
                            <td class="td-listarP">Notebook Gamer Dell g15-i1300</td>
                            <td class="td-listarP">R$5.500,00</td>
                            <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            <td class="td-listarP">40</td>
                            </div>
                        </tr>
                </tbody>
                
                <tbody class="tbody-listarP">
                        <tr class="tr-tr-listarP">
                            <td class="td-listarP"><img src="../../../../public/assets/img/image 56.png" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>
                            <td class="td-listarP">Placa de video Gamer</td>
                            <td class="td-listarP">R$1.200,00</td>
                            <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            <td class="td-listarP">50</td>
                            </div>
                        </tr>
                </tbody>

                <tbody class="tbody-listarP">
                        <tr class="tr-tr-listarP">
                            <td class="td-listarP"><img src="../../../../public/assets/img/image 56 (2).png" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>
                            <td class="td-listarP">SSD NVMe, M.2 Samsung 4TB,</td>
                            <td class="td-listarP">R$2.849,90</td>
                            <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            <td class="td-listarP">20</td>
                            </div>
                        </tr>
                </tbody>

                <tbody class="tbody-listarP">
                        <tr class="tr-tr-listarP">
                            <td class="td-listarP"><img src="../../../../public/assets/img/image 56 (1).png" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>
                            <td class="td-listarP">Monitor Samsung 27''</td>
                            <td class="td-listarP">R$999,00</td>
                            <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            <td class="td-listarP">35</td>
                            </div>
                        </tr>
                </tbody>
            </table>
        </div>
    </section>
    
<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

</body>
</html>
