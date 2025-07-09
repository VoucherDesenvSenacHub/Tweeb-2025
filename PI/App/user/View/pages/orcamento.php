<?php

require_once __DIR__ . '../../../Models/Usuario.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <title>Orçamento</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="orcamento-body">

<?php include __DIR__.'/../../../../includes/navbar.php'; ?>

<div class="orcamento-geral">

<div class="orcamento-container">
        <div class="orcamento-contact-info">
            <div class="orcamento-info-section">
                <img src="../../../../public/assets/img/telefone-laranja.png" alt="icone-telefone-laranja"> 
                <h3 class="orcamento-titulo">Telefone</h3>
                <p class="orcamento-texto">O prazo para resposta do orçamento é de 48 horas.</p>
                <p class="orcamento-texto">67 1234-5678</p>
            </div>
            <div class="orcamento-info-section">
                <img src="../../../../public/assets/img/email-laranja.png" alt="icone-email-laranja">
                <h3 class="orcamento-titulo">Email</h3>
                <p class="orcamento-texto">Emails: orcamentotweeb@gmail.com</p>
                <p class="orcamento-texto">Emails: suportetweeb@gmail.com</p>
            </div>
        </div>

        <div class="orcamento-form-section">
            <h1 class="orcamento-titulo">Solicitação de Orçamento</h1>
            <form class="orcamento-form" action="#" method="post">
                <div class="orcamento-input-group">
                    <input class="orcamento-input" type="text" name="nome" placeholder="Nome Completo *" required>
                    <input class="orcamento-input" type="email" name="email" placeholder="Email *" required>
                    <input class="orcamento-input" type="tel" name="telefone" placeholder="Telefone *" required>
                </div>
                <div class="orcamento-input-group">
                    <select class="orcamento-select" name="tipo-solicitacao" required>
                        <option value="" disabled selected>Tipo de Solicitação *</option>
                        <option value="opcao1">Manutenção</option>
                        <option value="opcao2">Formatação</option>
                    </select>
                    <select class="orcamento-select" name="prazo-estimado" required>
                        <option value="" disabled selected>Prazo estimado *</option>
                        <option value="prazo1">48 horas</option>
                        <option value="prazo2">Conforme demanda</option>
                    </select>
                    <button class="orcamento-botao-media" type="button" onclick="document.getElementById('imageInput').click()">Adicionar Imagem</button>
                    <input type="file" id="imageInput" accept="image/*" style="display: none" multiple onchange="previewImages(event)">
                </div>

                <!-- PRÉVIA DAS IMAGENS -->
                <div id="imagePreviewContainer" style="margin-top: 10px; display: flex; gap: 10px;"></div>

                <textarea class="orcamento-textarea" name="descricao" placeholder="Descreva sua solicitação de orçamento"></textarea>
                <button class="orcamento-botao-enviar" type="submit">Enviar</button>
            </form>
        </div>
</div>

    </div>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
