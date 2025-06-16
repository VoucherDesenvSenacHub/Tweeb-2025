<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar senha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../../../public/css/ModalAlterarSenhaUser.css">
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
                    <?php 
                    $foto_perfil = !empty($_SESSION['usuario']['foto_perfil']) ? $_SESSION['usuario']['foto_perfil'] : 'imagem_padrao.png';
                    $caminho_foto = '/Tweeb-2025/PI/public/uploads/' . $foto_perfil;
                    ?>
                    <img src="<?php echo htmlspecialchars($caminho_foto); ?>" alt="Foto de perfil">
                </div>
                <div class="perfil-tweeb-info">
                    <h1><?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?></h1>
                    <p class="perfil-tweeb-email"><?php echo htmlspecialchars($_SESSION['usuario']['email']); ?></p>
                    <div class="fio"></div>
                </div>
            </div>

            <!-- Campos para alterar senha -->
            <?php if(isset($_SESSION['mensagem'])): ?>
                <div class="alert <?php echo $_SESSION['mensagem_tipo'] ?? 'alert-info'; ?>">
                    <?php 
                    echo htmlspecialchars($_SESSION['mensagem']); 
                    unset($_SESSION['mensagem']);
                    unset($_SESSION['mensagem_tipo']);
                    ?>
                </div>
            <?php endif; ?>

            <form id="form-alterar-senha">
                <div class="perfil-tweeb-input-group">
                    <h2>Alterar Senha</h2>
                    <label for="senha-atual">Senha Atual</label>
                    <input type="password" id="senha-atual" name="senha_atual" placeholder="Digite a senha atual" required>
                </div>

                <div class="perfil-tweeb-input-group">
                    <label for="nova-senha">Nova Senha</label>
                    <input type="password" id="nova-senha" name="nova_senha" placeholder="Digite a nova senha" required>
                </div>

                <div class="perfil-tweeb-input-group">
                    <label for="confirmar-senha">Confirmar Nova Senha</label>
                    <input type="password" id="confirmar-senha" name="confirmar_senha" placeholder="Confirme a nova senha" required>
                </div>  

                <div class="alterar-senha-botoes">
                    <button class="botao-alterar-senha" type="reset">Cancelar</button>
                    <button class="botao-alterar-senha" id="btnSalvarSenha" type="button">Salvar alteração</button>
                </div>
            </form>

            <div class="ModalAltSenha-container" id="modalAlterarSenha" style="display: none;">
                <div class="ModalAltSenha-modal">
                    <img src="../../../../public/assets/img/logo_tweeb__1_-removebg-preview copy.png" class="ModalAltSenha-img">
                    <h2 class="ModalAltSenha-mensagem" id="ModalAltSenhaMensagem"></h2>
                    <button class="ModalAltSenha-button" id="ModalAltSenha-button">
                        Entendi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__.'../../../../../includes/footer.php'; ?>
    <script src="../../../../public/js/alterar-senha.js"></script>
</body>
</html>