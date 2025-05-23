<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}
require __DIR__.'/../../../../public/api/buscar_endereco.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="../../../../public/css/escolha-endereco.css"> -->
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div class="container">
    <div class="enderecos">
    <h1 class="metodoh1">Meus Endereços</h1>

    <?php if ($dadosEndereco): ?>
        <div class="endereco-card">
            <label>
                <input type="radio" id="endereco" name="endereco" value="principal" checked>
                <label class="endereco-label" for="endereco">
                    <?= htmlspecialchars($dadosEndereco['nome'] ?? 'Endereço') ?>
                </label>
                <div class="endereco-details">
                    <p>
                        <?= htmlspecialchars($dadosEndereco['rua'] ?? '') ?>,
                        <?= htmlspecialchars($dadosEndereco['bairro'] ?? '') ?>,
                        <?= htmlspecialchars($dadosEndereco['cidade'] ?? '') ?> -
                        <?= htmlspecialchars($dadosEndereco['estado'] ?? '') ?>
                        <?= htmlspecialchars($dadosEndereco['cep'] ?? '') ?>
                    </p>
                    <p><?= htmlspecialchars($dadosEndereco['telefone'] ?? '') ?></p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="editar-endereco"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
    <?php else: ?>
        <p>Você ainda não cadastrou nenhum endereço.</p>
    <?php endif; ?>
</div>


<!-- Modal de edição de endereço -->
<div id="modal-editar-endereco" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Endereço</h2>
        <form id="form-editar-endereco">
            <label for="nome-endereco">Nome (ex: Casa, Trabalho):</label>
            <input type="text" id="nome-endereco" required>

            <label for="endereco-detalhes">Endereço Completo:</label>
            <input type="text" id="endereco-detalhes" required>

            <label for="telefone-endereco">Telefone:</label>
            <input type="text" id="telefone-endereco" required>

            <label for="tornar-padrao">Tornar Endereço Padrão:</label>
            <select id="tornar-padrao">
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>

            <button type="submit" class="btoes-endereco">Salvar Endereço</button>
        </form>
    </div>
</div>

<!-- <div class="endereco-botoes">
    <a href="../../../../home.php"><button class="botao-sair">Sair</button></a>
    <a href="metodo-envio.php"><button class="botao-avancar">Avançar</button></a>
</div> -->

</div> 



<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>

</html>















