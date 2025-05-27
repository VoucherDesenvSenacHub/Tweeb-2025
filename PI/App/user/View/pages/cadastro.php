<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Cadastro</title> 
    <link rel="stylesheet" href="../../../../public/css/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Estilo do modal */
        .Task2a-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            pointer-events: none;
        }

        .Task2a-modal-content {
            background-color: #fefefe;
            margin: 2% auto; /* Mantido em 2% para ficar bem alto na tela */
            padding: 15px;
            border: 1px solid #888;
            width: 60%;
            max-width: 300px;
            border-radius: 8px;
            text-align: center;
            position: relative;
        }

        .Task2a-sucesso-icon {
            font-size: 36px;
            color: #4CAF50;
            margin-bottom: 15px;
        }

        .Task2a-sucesso-mensagem {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
        }

        .Task2a-progress-bar {
            width: 100%;
            height: 4px;
            background-color: #f0f0f0;
            border-radius: 2px;
            margin-top: 10px;
            overflow: hidden;
        }

        .Task2a-progress {
            width: 0%;
            height: 100%;
            background-color: #4CAF50;
            transition: width 1s linear;
        }
    </style>
</head> 
<body class="Task2a-body"> 
    <div class="Task2a-container"> 
        <div class="Task2a-card">
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
            <form method="post" action="../../Controllers/UserController.php" class="cadastro-form" id="formCadastro">
                <input name='nome' type="text" placeholder="Nome" class="Task2a-input" required> 
                <input name='email' type="email" placeholder="Email" class="Task2a-input" required> 
                <input name='senha' type="password" placeholder="Digite sua senha" class="Task2a-input" required> 
                <input name='confirmacao' type="password" placeholder="Confirme sua senha" class="Task2a-input" required>
                <button type="submit" onclick="mostrarModal()" class="Task2a-btn-email">Cadastre-se</button>
            </form>
            <p class="Task2a-terms">Ao clicar em continuar, você concorda com nossos <a href="#">Termos de Serviço</a> e <a href="#">Política de Privacidade</a></p>
        </div> 
    </div> 

    <!-- Modal de Sucesso -->
    <div id="modalSucesso" class="Task2a-modal">
        <div class="Task2a-modal-content">
            <div class="Task2a-sucesso-icon">✓</div>
            <div class="Task2a-sucesso-mensagem">Cadastrado com Sucesso!</div>
            <div class="Task2a-progress-bar">
                <div class="Task2a-progress" id="progress"></div>
            </div>
        </div>
    </div>

   
   <script src="../../../../public/js/Modal_cadastroUsuario.js"></script>
</body> 
</html>


<?php 

