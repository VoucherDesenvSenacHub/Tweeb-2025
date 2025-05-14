<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
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
    <title>Meu Perfil</title>
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
                <button class="perfil-tweeb-editar-foto"><i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i></button>
            </div>
            <div class="perfil-tweeb-info">
                <h1><?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?></h1>
                <p class="perfil-tweeb-email"><?php echo htmlspecialchars($_SESSION['usuario']['email']); ?></p>
                <div class="fio"></div>
            </div>
        </div>

        <form class="perfil-tweeb-form" method="POST" action="../../Controllers/userEdit.php">
            <div class="perfil-tweeb-input-group">
                <label for="primeiro-nome">Primeiro nome</label>
                <input type="text" id="primeiro-nome" value="<?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?>">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome2" value="">
            </div>
            <div class="perfil-tweeb-input-group">
                <label for="cpf">CPF*</label>
                <input type="text" id="cpf" disabled value="<?php echo htmlspecialchars($_SESSION['usuario']['cpf']); ?>">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="<?php echo htmlspecialchars($_SESSION['usuario']['email']); ?>">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="estado">Estado</label>
                <input type="text" id="estado" value="">
            </div>

            <div class="perfil-tweeb-botoes">
                <button type="button" class="perfil-tweeb-cancelar">Cancelar</button>
                <button type="submit" class="perfil-tweeb-salvar">Salvar alteração</button>
                <button type="submit" class="perfil-tweeb-excluir">Excluir</button>
            </div>

        </form>
    </div>
</div>

<script src="perfil-usuario.js"></script>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
