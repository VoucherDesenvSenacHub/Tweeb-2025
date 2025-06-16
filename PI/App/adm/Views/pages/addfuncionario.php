<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Funcionário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="adicionar-funcionario.css"> 
</head>
<body>

<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="funcionario-form-container">
    <div class="funcionario-form-box">
        <button class="funcionario-form-saudacao">👋🏼 Novo Funcionário</button>

        <div class="funcionario-form-header">
            <div class="funcionario-form-foto">
                <img src="../../../../public/assets/img/Avatar.png" alt="Foto de perfil">
                <button class="funcionario-form-editar-foto">
                    <i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i>
                </button>
            </div>
            <div class="funcionario-form-info">
                <h1 class="funcionario-form-nome">Novo Funcionário</h1>
                <p class="funcionario-form-email">email@empresa.com</p>
                <div class="funcionario-form-divider"></div>
            </div>
        </div>

        <form class="funcionario-form">
            <div class="funcionario-form-group">
                <label for="primeiro-nome">Primeiro nome</label>
                <input type="text" id="primeiro-nome" name="primeiro-nome">
            </div>

            <div class="funcionario-form-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome">
            </div>

            <div class="funcionario-form-group">
                <label for="matricula">Matrícula*</label>
                <input type="text" id="matricula" name="matricula">
            </div>

            <div class="funcionario-form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="funcionario-form-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone">
            </div>

            <div class="funcionario-form-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco">
            </div>
        </form>

        <div class="funcionario-form-group">
            <h2>Alterar Senha</h2>
            <label for="senha-atual">Senha Atual</label>
            <input type="password" id="senha-atual" name="senha-atual" placeholder="Digite a senha atual">
        </div>

        <div class="funcionario-form-group">
            <label for="nova-senha">Nova Senha</label>
            <input type="password" id="nova-senha" name="nova-senha" placeholder="Digite a nova senha">
        </div>

        <div class="funcionario-form-group">
            <label for="confirmar-senha">Confirmar Nova Senha</label>
            <input type="password" id="confirmar-senha" name="confirmar-senha" placeholder="Confirme a nova senha">
        </div>

        <div class="funcionario-form-botoes">
            <button type="button" class="funcionario-form-cancelar">Cancelar</button>
            <button type="submit" class="funcionario-form-salvar">Salvar Funcionário</button>
        </div>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
