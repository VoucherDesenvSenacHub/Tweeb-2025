<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Cadastro</title> 
    <link rel="stylesheet" href="../../../../public/css/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head> 
<body class="Task2a-body"> 
    <div class="Task2a-container">
        <div class="Task2a-card">
            <button class="Task2a-botaoVoltar">
                
                <a href="login.php" class="Task2a-text-voltar">
                    <img src="../../../../public/assets/img/left-arrow.png" alt="" class="Task2a-arrow-icon">
                    Voltar
                </a>
            </button> 
            <a href="../../../../home.php"><img src="../../../../public/assets/img/logo_img.png" alt="Logo" class="Task2a-logo"></a>
            <h2 class="Task2a-title">Crie sua conta</h2> 
            <p class="Task2a-description">Digite seu e-mail para criar sua conta</p>  
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] == 'senha_diferente'): ?>
                    <p class="error-message" style="color: red;">As senhas não coincidem. Por favor, tente novamente.</p>
                <?php elseif ($_GET['status'] == 'campos_vazios'): ?>
                    <p class="error-message" style="color: red;">Preencha todos os campos!</p>
                <?php elseif ($_GET['status'] == 'error'): ?>
                    <p class="error-message" style="color: red;">Erro ao cadastrar. Tente novamente mais tarde.</p>
                <?php endif; ?>
            <?php endif; ?>
            <form method="post" action="../../Controllers/UserController.php" class="cadastro-form">
                <input name='nome' type="text" placeholder="Nome" class="Task2a-input"> 
                <input name='email' type="email" placeholder="Email" class="Task2a-input">
                <input name="cpf" type="text" placeholder="CPF" class="Task2a-input">
                <input name='senha' type="password" placeholder="Digite sua senha" class="Task2a-input"> 
                <input name='confirmacao' type="password" placeholder="Confirme sua senha " class="Task2a-input">
                <button type="submit" class="Task2a-btn-email">Cadastre-se</button>
            </form>
            <p class="Task2a-terms">Ao clicar em continuar, você concorda com nossos <a href="#">Termos de Serviço</a> e <a href="#">Política de Privacidade</a></p>
        </div> 
    </div> 
</body> 
</html>