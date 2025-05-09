<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Cadastro</title> 
    <link rel="stylesheet" href="../../../public/css/Cadastro-funcionario.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head> 
<body class="Task3a-body"> 
    <div class="Task3a-container"> 
        <div class="Task3a-card">
            <a href="../../../../home.php"><img src="../../../public/assets/img/logo_img.png" alt="Logo" class="Task3a-logo"></a>
            <h2 class="Task3a-title">Crie sua conta</h2> 
            <p class="Task3a-description">Digite um e-mail para cadastrar o funcionário</p>  
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] == 'senha_diferente'): ?>
                    <p class="error-message" style="color: red;">As senhas não coincidem. Por favor, tente novamente.</p>
                <?php elseif ($_GET['status'] == 'campos_vazios'): ?>
                    <p class="error-message" style="color: red;">Preencha todos os campos!</p>
                <?php elseif ($_GET['status'] == 'error'): ?>
                    <p class="error-message" style="color: red;">Erro ao cadastrar. Tente novamente mais tarde.</p>
                <?php endif; ?>
            <?php endif; ?>
            <form method="post" action="../../Controllers/UserController.php" class="cadastrofunc-form">
                <input name='nome' type="text" placeholder="Nome" class="Task3a-input"> 
                <input name='matricula' type="text" placeholder="Matrícula" class="Task3a-input">
                <input name='senha' type="password" placeholder="Digite sua senha" class="Task3a-input"> 
                <input name='confirmacao' type="password" placeholder="Confirme sua senha " class="Task3a-input">
                <button type="submit" class="Task3a-btn-email">Cadastre-se</button>
            </form>
            <p class="Task3a-terms">Ao clicar em continuar, você concorda com nossos <a href="#">Termos de Serviço</a> e <a href="#">Política de Privacidade</a></p>
        </div> 
    </div> 
</body> 
</html>


<?php 

