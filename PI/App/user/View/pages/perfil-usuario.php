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
        <button class="perfil-tweeb-editar">Oi Igor, 👋🏼 </button>
        
        <div class="perfil-tweeb-header">
            <div class="perfil-tweeb-imagem">
                <img src="../../../../public/assets/img/foto-perfil-comentarios.jpg" alt="Foto de perfil">
                <button class="perfil-tweeb-editar-foto"><i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i></button>
            </div>
            <div class="perfil-tweeb-info">
                <h1>Igor Medeiros</h1>
                <p class="perfil-tweeb-email">igormedeiros@gmail.com</p>
                <div class="fio"></div>
            </div>
        </div>

        <form class="perfil-tweeb-form">
            <div class="perfil-tweeb-input-group">
                <label for="primeiro-nome">Primeiro nome</label>
                <input type="text" id="primeiro-nome" value="Igor">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome2" value="Medeiros">
            </div>
            <div class="perfil-tweeb-input-group">
                <label for="cpf">CPF*</label>
                <input type="text" id="cpf" disabled value="123456789-12">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="igormedeiros@gmail.com">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" value="67 9 456789">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" value="Rua Capitão">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" value="Centro">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" value="798255-12">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="estado">Estado</label>
                <input type="text" id="estado" value="Mato Grosso do Sul">
            </div>

            <div class="perfil-tweeb-botoes">
                <button type="button" class="perfil-tweeb-cancelar">Cancelar</button>
                <button type="submit" class="perfil-tweeb-salvar">Salvar alteração</button>
            </div>

        </form>
    </div>
</div>

<script src="perfil-usuario.js"></script>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
