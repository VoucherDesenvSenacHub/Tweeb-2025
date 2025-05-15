<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/ModalAlterarSenhaUser.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title></title>
</head>
<body class="ModalAltSenha-body">
    <div class="ModalAltSenha-container">
        <div class="ModalAltSenha-modal">
            <img src="../public/assets/img/logo_tweeb__1_-removebg-preview copy.png" alt="Logo Tweeb" class="ModalAltSenha-img">
            <h2 class="ModalAltSenha-mensagem" id="ModalAltSenha-mensagem" name="ModalAltSenha-mensagem">
                mensagem
            </h2>
            <button class="ModalAltSenha-button" id="ModalAltSenha-button" name="ModalAltSenha-button">
                <h2 class="ModalAltSenha-text-button">Entendi</h2>
            </button>
        </div>
    </div>
    <!-- Modal de mensagem -->
    <div class="ModalAltSenha-container" id="modalAlterarSenha" style="display: none;">
        <div class="ModalAltSenha-modal">
            <img src="../../../../public/assets/img/logo_tweeb__1_-removebg-preview copy.png" alt="Logo Tweeb" class="ModalAltSenha-img">
            <h2 class="ModalAltSenha-mensagem" id="ModalAltSenhaMensagem">mensagem</h2>
            <button class="ModalAltSenha-button" onclick="fecharModal()">
                <h2 class="ModalAltSenha-text-button">Entendi</h2>
            </button>
        </div>
    </div>
</div>
</body>
</html>