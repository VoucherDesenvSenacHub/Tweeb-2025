<?php

require_once __DIR__ . '/../../../user/Models/Usuario.php';

$usuario = new Usuario();
$clientes = $usuario->listarClientes();

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

    <div class="listarC-titulo-contain3" style="text-align: center; margin-top: 30px;">
    <div class="listarC-titulo3" style="font-size: 32px; font-weight: bold;">Clientes Cadastrados</div>
</div>

   



    <div class="listarC-filtro-box">
        <img src="../../../../public/assets/img/Icon-filtro.png" alt="Ícone Filtro" class="listarC-filtro-icon">
        <span class="listarC-filtro-text">Filtro</span>
    </div>

    <section class="listarC-section">
        <div class="listarP-contain">
            <table class="listarP-table">
                <thead class="thead-listarP">
                    <tr class="tr-listarP">
                        <th class="th-listarP">Id</th>
                        <th class="th-listarP">Nome do Cliente</th>
                        <th class="th-listarP">Email</th>
                        <th class="th-listarP">Telefone</th>
                        <th class="th-listarP">Endereço</th>
                        <th class="th-listarP">Número</th>
                        <th class="th-listarP">CEP</th>
                        
                    </tr>
                </thead>
                <tbody class="tbody-listarP">
                    <?php foreach ($clientes as $cliente): ?>
                        <tr class="tr-tr-listarP">
                            <td class="td-listarP"><?= htmlspecialchars($cliente['id']) ?></td>
                            <td class="td-listarP"><?= htmlspecialchars($cliente['nome']) ?></td>
                            <td class="td-listarP"><?= htmlspecialchars($cliente['email']) ?></td>
                            <td class="td-listarP"><?= htmlspecialchars($cliente['telefone']) ?></td>
                            <td class="td-listarP"><?= htmlspecialchars($cliente['endereco']) ?></td>
                            <td class="td-listarP"><?= htmlspecialchars($cliente['endereco2']) ?></td>
                            <td class="td-listarP"><?= htmlspecialchars($cliente['endereco3']) ?></td>
                            <td class="td-listarP">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </section>

    <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

</body>
</html>
