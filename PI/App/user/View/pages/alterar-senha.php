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
                <!-- <button class="perfil-tweeb-editar-foto"><i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i></button> -->
            </div>
            <div class="perfil-tweeb-info">
                <h1>Igor Medeiros</h1>
                <p class="perfil-tweeb-email">igormedeiros@gmail.com</p>
                <div class="fio"></div>
            </div>
        </div>

    
               <!-- Campos para alterar senha -->
               <div class="perfil-tweeb-input-group">
                <h2>Alterar Senha</h2>
                <label for="senha-atual">Senha Atual</label>
                <input type="password" id="senha-atual" placeholder="Digite a senha atual">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="nova-senha">Nova Senha</label>
                <input type="password" id="nova-senha" placeholder="Digite a nova senha">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="confirmar-senha">Confirmar Nova Senha</label>
                <input type="password" id="confirmar-senha" placeholder="Confirme a nova senha">
            </div>  


            <div class="alterar-senha-botoes">
                <button class="botao-alterar-senha" type="button" class="alterar-senha-cancelar">Cancelar</button>
                <button class="botao-alterar-senha" type="submit" class="alterar-senha-salvar">Salvar alteração</button>
            </div>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
