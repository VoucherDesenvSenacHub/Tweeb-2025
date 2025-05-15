<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/../../Controllers/AlterarSenhaProcess.php';

$mensagem = AlterarSenhaController::processarFormulario();
$mensagemModal = $_GET['status'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar senha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<!-- Contêiner do Perfil -->
<div class="perfil-tweeb">
    <div class="perfil-tweeb-container">
        <button class="perfil-tweeb-editar">Oi <?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?>, 👋🏼 </button>
        
        <div class="perfil-tweeb-header">
            <div class="perfil-tweeb-imagem">
                <img src="../../../../public/assets/img/foto-perfil-comentarios.jpg" alt="Foto de perfil">
            </div>
            <div class="perfil-tweeb-info">
                <h1><?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?></h1>
                <p class="perfil-tweeb-email"><?php echo htmlspecialchars($_SESSION['usuario']['email']); ?></p>
                <div class="fio"></div>
            </div>
        </div>

    
               <!-- Campos para alterar senha -->
                <?php if (!empty($mensagem)): ?>
                    <div style="color: red; font-weight: bold; margin-bottom: 10px;">
                        <?= htmlspecialchars($mensagem); ?>
                    </div>
                <?php endif; ?>
            <form action="" method="POST">
                <div class="perfil-tweeb-input-group">
                    <h2>Alterar Senha</h2>
                    <label for="senha-atual">Senha Atual</label>
                    <input type="password" id="senha-atual" name="senha_atual" placeholder="Digite a senha atual">
                </div>

                <div class="perfil-tweeb-input-group">
                    <label for="nova-senha">Nova Senha</label>
                    <input type="password" id="nova-senha" name="nova_senha" placeholder="Digite a nova senha">
                </div>

                <div class="perfil-tweeb-input-group">
                    <label for="confirmar-senha">Confirmar Nova Senha</label>
                    <input type="password" id="confirmar-senha" name="confirmar_senha" placeholder="Confirme a nova senha">
                </div>  

                <div class="alterar-senha-botoes">
                    <button class="botao-alterar-senha" type="reset">Cancelar</button>
                    <button class="botao-alterar-senha" type="submit">Salvar alteração</button>
                </div>
            </form>
    </div>
</div>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
<script src="../../../../public/js/ModalAltSenha.js"></script>
</body>
</html>