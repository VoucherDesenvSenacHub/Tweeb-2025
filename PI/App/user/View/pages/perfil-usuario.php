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
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
                <img src="../../../../public/uploads/<?php echo htmlspecialchars($_SESSION['usuario']['foto_perfil'] ?? 'foto-perfil-comentarios.jpg'); ?>" alt="Foto de perfil">


                <!-- Input oculto de upload -->
                <input type="file" id="inputFotoPerfil" name="foto_perfil" accept="image/*" style="display: none;">

                <!-- Botão de upload (ícone Bootstrap) -->
                <label for="inputFotoPerfil" class="btn-upload-foto" title="Alterar foto">
                    <i class="bi bi-cloud-arrow-up carregar-foto"></i>
                </label>

                <!-- Botão de editar (ícone lápis) -->
                <button class="perfil-tweeb-editar-foto" title="Editar">
                    <i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i>
                </button>
            </div>
            <div class="perfil-tweeb-info">
                <h1><?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?></h1>
                <p class="perfil-tweeb-email"><?php echo htmlspecialchars($_SESSION['usuario']['email']); ?></p>
                <div class="fio"></div>
            </div>
        </div>

        <form class="perfil-tweeb-form" method="POST" action="../../Controllers/userEdit.php" enctype="multipart/form-data">
            <div class="perfil-tweeb-input-group">
                <label for="primeiro-nome">Primeiro nome</label>
                <input type="text" id="primeiro-nome" name="nome" value="<?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?>">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome2" name="sobrenome" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="cpf">CPF*</label>
                <input type="text" id="cpf" disabled value="<?php echo htmlspecialchars($_SESSION['usuario']['cpf']); ?>">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['usuario']['email']); ?>">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" name="bairro" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" value="">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="estado">Estado</label>
                <input type="text" id="estado" name="estado" value="">
            </div>

            <div class="perfil-tweeb-botoes">
                <button type="button" class="perfil-tweeb-cancelar">Cancelar</button>
                <button type="submit" class="perfil-tweeb-salvar">Salvar alteração</button>
                <button type="submit" class="perfil-tweeb-excluir">Excluir</button>
            </div>
        </form>
    </div>
</div>

<!-- Preview da nova imagem -->
<script>
document.getElementById('inputFotoPerfil').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const preview = document.querySelector('.perfil-tweeb-imagem img');
        preview.src = URL.createObjectURL(file);
    }
});
</script>

<script src="perfil-usuario.js"></script>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
