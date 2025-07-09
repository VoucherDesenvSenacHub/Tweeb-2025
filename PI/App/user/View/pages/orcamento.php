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

<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>

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
            <form class="orcamento-form" id="formulario_orcamento" action="#" method="post">
                <div class="orcamento-input-group">
                    <input class="orcamento-input" type="text" name="nome" placeholder="Nome Completo *" required>
                    <input class="orcamento-input" type="email" name="email" placeholder="Email *" required>
                    <input class="orcamento-input" type="tel" name="telefone" placeholder="Telefone *" required>
                </div>


                <div class="orcamento-input-group">
                    <input class="orcamento-input" type="date" name="prazo-estimado" placeholder="Prazo Estimado *" required>

                    

                    <select class="orcamento-select" name="tipo-solicitacao" required>
                        <option value="" disabled selected>Tipo de Solicitação *</option>
                        <option value="Formatação">Formatação</option>
                        <option value="Manutencão">Manutenção</option>
                        <option value="atualização de firmware">Atualização</option>
                        <option value="backup e recuperação">Backup e Recuperação</option>
                        <option value="configuração de sistema">Configuração de Sistema</option>
                        <option value="limpeza e manutenção preventiva">Limpeza e Manutenção preventiva</option>
                        <option value="serviços de software: instalação, configuração e atualização">Instalação, configuração e atualização de Software</option>
                        <option value="substituição peças">Substituição de peças</option>
                    </select>

                    <!-- <select class="orcamento-select" name="prazo-estimado" required>
                        <option value="" disabled selected>Prazo estimado *</option>
                        <option value="2025-06-20">48 horas</option>
                        <option value="prazo2">Conforme demanda</option>
                    </select> -->
                    <button class="orcamento-botao-media" type="button" onclick="document.getElementById('imageInput').click()">Adicionar Imagem</button>
                    <input type="file" name="imagem[]" id="imageInput" accept="image/*" multiple style="display: none" onchange="previewImages(event)" enctype="multipart/form-data">
                </div>

                
                <div class="orcamento-input-group">
                    <input class="orcamento-input" type="text" name="tipo_equipamento" placeholder="Tipo Equipamento *" required>
                </div>

                <!-- PRÉVIA DAS IMAGENS -->
                <div id="imagePreviewContainer" style="margin-top: 10px; display: flex; gap: 10px;"></div>

                <input type="text" class="orcamento-textarea" name="descricao" placeholder="Descreva sua solicitação de orçamento"></textarea>
                <button class="orcamento-botao-enviar" type="submit">Enviar</button>
            </form>
        </div>
</div>

    </div>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
