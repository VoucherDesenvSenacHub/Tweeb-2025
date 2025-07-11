<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR CLIENTES E ITENS COMPRADOS</title>
</head>
<body class="listarP">
    
    <?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
    <?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

    <div class="listarC-titulo-contain3">
        <div class="listarC-titulo3">Clientes Cadastrados</div>
    </div>

    <form class="filtro-formulario">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" placeholder="Digite O id">

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="Nome do cliente">

    <button type="submit" class="form-botao-buscar">Buscar</button>
    <button type="reset" class="form-botao-limpar">Limpar</button>
  </form>


 

    <section class="listarC-section">
        <div class="listarP-contain">
            <table class="listarP-table">
                <thead class="thead-listarP">
                    <tr class="tr-listarP">
                        <th class="th-listarP">ID</th>
                        <th class="th-listarP">Nome</th>
                        <th class="th-listarP">Email</th>
                        <th class="th-listarP">CPF</th>
                        <th class="th-listarP">Endereço</th>
                        <th class="th-listarP">Foto</th>
                        <th class="th-listarP">Ações</th>
                        
                    </tr>
                </thead>
                <tbody class="tbody-listarP">
                    <tr class="tr-tr-listarP">
                      
                        <td class="td-listarP">1</td>
                        <td class="td-listarP">João Silva</td>
                        <td class="td-listarP">joão@gmail.com</td>
                        <td class="td-listarP">099321333-11</td>
                        <td class="td-listarP">Rua A, 123 - São Paulo, SP</td>
                        <td class="td-listarP">
                            <img src="../../../../public/assets/img/foto-perfil-comentarios.jpg" id="userAdm_avatar" alt="Cliente 1" class="listarP-produto-img">
                        </td>
                        <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>

                <tbody class="tbody-listarP">
                    <tr class="tr-tr-listarP">
                      
                        <td class="td-listarP">1</td>
                        <td class="td-listarP">João Silva</td>
                        <td class="td-listarP">joão@gmail.com</td>
                        <td class="td-listarP">099321333-11</td>
                        <td class="td-listarP">Rua A, 123 - São Paulo, SP</td>
                        <td class="td-listarP">
                            <img src="../../../../public/assets/img/foto-perfil-comentarios.jpg" id="userAdm_avatar" alt="Cliente 1" class="listarP-produto-img">
                        </td>
                        <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>

                <tbody class="tbody-listarP">
                    <tr class="tr-tr-listarP">
                      
                        <td class="td-listarP">1</td>
                        <td class="td-listarP">João Silva</td>
                        <td class="td-listarP">joão@gmail.com</td>
                        <td class="td-listarP">099321333-11</td>
                        <td class="td-listarP">Rua A, 123 - São Paulo, SP</td>
                        <td class="td-listarP">
                            <img src="../../../../public/assets/img/foto-perfil-comentarios.jpg" id="userAdm_avatar" alt="Cliente 1" class="listarP-produto-img">
                        </td>
                        <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>

                <tbody class="tbody-listarP">
                    <tr class="tr-tr-listarP">
                      
                        <td class="td-listarP">1</td>
                        <td class="td-listarP">João Silva</td>
                        <td class="td-listarP">joão@gmail.com</td>
                        <td class="td-listarP">099321333-11</td>
                        <td class="td-listarP">Rua A, 123 - São Paulo, SP</td>
                        <td class="td-listarP">
                            <img src="../../../../public/assets/img/foto-perfil-comentarios.jpg" id="userAdm_avatar" alt="Cliente 1" class="listarP-produto-img">
                        </td>
                        <td class="td-listarP">
                            <div class="td_botao">
                                <form action="" method="get" class="form-listarP_editar">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-listarP">
                                    <button type="submit" class="listarP-edit-btn">
                                        <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
                                    </button>
                                </form>

                                <form action="" method="post" class="form-excluir">
                                    <input type="hidden" name="id_cliente" value="' . $cliente['id_cliente'] . '" class="input-hidden">
                                    <button type="submit" class="listarP-delete-btn">
                                        <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </section>

    <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

</body>
</html>
