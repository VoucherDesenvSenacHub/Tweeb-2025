<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="Task2a-body">
    <div class="Task2a-container">
        <div class="Task2a-card">
            <a href="../../../../home.php">
                <img src="../../../../public/assets/img/logo_img.png" alt="Logo" class="Task2a-logo">
            </a>
            <h2 class="Task2a-title">Crie sua conta</h2>
            <p class="Task2a-description">Digite seu e-mail para criar sua conta</p>

            <?php if (isset($_GET['erro'])): ?>
                <p class="error-message" style="color: red;"><?php echo htmlspecialchars($_GET['erro']); ?></p>
            <?php endif; ?>

            <form method="post" action="#" class="cadastro-form" id="form-cadastro">
                <div class="input-group">
                    <input name='nome' type="text" placeholder="Nome" class="Task2a-input" required>
                </div>
                <div class="input-group">
                    <input name='email' type="email" placeholder="Email" class="Task2a-input" required>
                </div>
                <div class="input-group">
                    <input name='cpf' type="text" id="cpf" placeholder="CPF" class="Task2a-input" maxlength="14" required>
                </div>
                <div class="input-group">
                    <input name='senha' type="password" placeholder="Digite sua senha" class="Task2a-input" required>
                </div>
                <div class="input-group">
                    <input name='confirmar_senha' type="password" placeholder="Confirme sua senha" class="Task2a-input" required>
                </div>
                <button type="submit" class="Task2a-btn-email">Cadastre-se</button>
            </form>

            <div id="modalCadastroSucesso" class="modal-cadastro" style="display:none;">
                <div class="modal-conteudo_cadastro">
                    <div class="modal-navbar-cadastro">
                        <img src="../../../../public/assets/img/logo_img copy.png" alt="Logo Tweeb" class="modal-logo-cadastro">
                    </div>
                    <p class="modal-msg-cadastro">Cadastrado com sucesso!</p>
                    <div class="Task2a-botoes-cadastro">
                        <button class="Task2abtn-cadastroOk" onclick="irParaLoginCadastro()">OK</button>
                    </div>
                </div>
            </div>

            <p class="Task2a-terms">
                Ao clicar em continuar, você concorda com nossos 
                <a href="#">Termos de Serviço</a> e 
                <a href="#">Política de Privacidade</a>
            </p>

            <p class="login-link">
                Já tem uma conta? <a href="login.php">Faça login</a>
            </p>
        </div>
    </div>

    <script src="../../../../public/js/validacao-cpf.js"></script>
    <script src="../../../../public/js/cadastro_usuario.js"></script>
    <script src="../../../../public/js/modal_cadastro_usuario.js"></script>
    <script>
document.getElementById('form-cadastro').addEventListener('submit', function(e) {
    if (!this.checkValidity()) {
        // Se o formulário não for válido, deixa o navegador mostrar os erros
        return;
    }
    e.preventDefault();
    document.getElementById('modalCadastroSucesso').style.display = 'flex';
});
function fecharModalCadastroSucesso() {
    document.getElementById('modalCadastroSucesso').style.display = 'none';
}
function irParaLoginCadastro() {
    window.location.href = 'login.php';
}
</script>
</body>
</html>


<?php 

