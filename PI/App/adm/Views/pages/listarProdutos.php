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
        <a href="estoque_cadastrar_novo.html">
            <div class="listarP-titulo">Novo Produto</div>
        </a>
        
        <div class="listarP-titulo2">Cadastrados</div>
    </div>

    <div class="listarP-search-box">
        <form action="" onsubmit="event.preventDefault(); filterTable();">
            <div class="listarP-search-contain">
                <button type="submit" class="listarP-search-btn">
                    <i class="bx bx-search"></i>
                </button>
                <input type="text" id="searchInput" class="listarP-srch" placeholder="Buscar">
            </div>
        </form>
    </div>

        <div class="listarP-filtro-box">
            <img src="../../../../public/assets/img/Icon-filtro.png" alt="Ícone Filtro" class="listarP-filtro-icon">
            <span>Filtro</span>
        </div>


    <section class="listarP-section">
        <div class="listarP-contain">
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
                        <tr>
                            <td><img src="../../../../public/assets/img/notebook-gamer-dell-g15-i1300-a45p-intel-core-i5-16gb-nvidia-rtx-4050-ssd-512gb-15-6-fhd-windows-11-preto-210-bkyg_1707334557_gg 1.png" id="userAdm_avatar" alt="Avatar"></td>
                            <td>Notebook Gamer Dell g15-i1300</td>
                            <td>R$5.000,00</td>
                            <td>
                                <div class="td_botao">
                                    <form action="estoque_cadastrar_novo.html" method="get">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarP-edit-btn">
                                            <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                        </button>
                                    </form>
                    
                                    <form action="excluirProduto.php" method="post">
                                        <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                                        <button type="submit" class="listarP-delete-btn">
                                            <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>100</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </section>
    
<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

</body>
</html>
