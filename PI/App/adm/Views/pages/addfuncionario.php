
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Funcionário</title>
    <link rel="stylesheet" href="../../../../public/css/adicionar-funcionario.css" />
    <script src="../../../../public/js/foto-funcionario.js"></script>

   

 
</head>
<body>

<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="funcionario-form-container">
    <div class="funcionario-form-box">
        <button class="funcionario-form-saudacao">👋🏼 Novo Colaborador</button>

        <div class="funcionario-form-header">
            <div class="funcionario-form-foto">
                <img src="../../../../public/assets/img/transferir.png" alt="Foto de perfil">
                <button type="button" class="funcionario-form-editar-foto" onclick="document.getElementById('input-foto').click();">
                    <i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i>
                </button>
                <input type="file" id="input-foto" accept="image/*" style="display: none;">

            </div>
            <div class="funcionario-form-info">
                <h1 class="funcionario-form-nome">Novo Colaborador</h1>
                <p class="funcionario-form-email">email@empresa.com</p>
                <div class="funcionario-form-divider"></div>
            </div>
        </div>

        <form class="funcionario-form" method="post">

            <div class="funcionario-form-row">
                <div class="funcionario-form-group">
                    <label for="primeiro-nome">Primeiro nome</label>
                    <input type="text" id="primeiro-nome" name="primeiro-nome">
                </div>

                <div class="funcionario-form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" id="sobrenome" name="sobrenome">
                </div>
            </div>

            <div class="funcionario-form-row">
                <div class="funcionario-form-group">
                    <label for="matricula">Matrícula*</label>
                    <input type="text" id="matricula" name="matricula">
                </div>

                <div class="funcionario-form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
            </div>

            <div class="funcionario-form-row">
                <div class="funcionario-form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone">
                </div>

                <div class="funcionario-form-group">
                <label for="cargo">Cargo</label>
                <select id="cargo" name="cargo">
                    <option value="">Selecione um cargo</option>
                    <option value="vendedor">Vendedor</option>
                    <option value="tecnico">Técnico</option>
                </select>
            </div>

            </div>
            

            <div class="funcionario-form-row">
                <div class="funcionario-form-group">
                    <label for="senha-funcionario">Senha Funcionário</label>
                    <input type="password" id="senha-funcionario" name="senha-funcionario" placeholder="Senha Novo Funcionario">
                </div>
            </div>


            <div class="funcionario-form-group">
                <label for="confirmar-senha">Confirmar Senha Funcionário</label>
                <input type="password" id="confirmar-senha" name="confirmar-senha" placeholder="Confirme a nova senha">
            </div>

            <div class="funcionario-form-botoes">
                <button type="button" class="funcionario-form-cancelar">Limpar</button>
                <button type="submit" class="funcionario-form-salvar">Salvar Funcionário</button>
            </div>
        </form>
    </div>
</div>
<script src="../../../../public/js/adicionar-funcionario.js"></script>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>