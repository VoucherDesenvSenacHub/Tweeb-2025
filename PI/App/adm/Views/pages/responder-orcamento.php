<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/responder-orcamento.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Responder orçamentos | Tweeb</title>
</head>
<body class="responder-orcamento-body">
    <div class="responder-orcamento">
        <div class="container-responder-orcamento-h1">
            <h1 class="responder-orcamento-h1">
                Responder Orçamento
            </h1>
            <a href="../../../adm/views/pages/orcamento-recebido.php">
            <div class="responder-orcamento-back-page">
                <img src="../../../../public/assets/img/Vector2.png" alt="">
            </div>
            </a>
        </div>
        <div class="responder-orcamento-container1">
            <div class="responder-orcamento-title">
                <p class="responder-orcamento-p1">
                    Título
                </p>
                <input type="text" placeholder="Enter title" class="responder-orcamento-input">
            </div>
            <div class="responder-orcamento-enviado_por">
                <p class="responder-orcamento-p2">
                    Enviada por
                </p>
                <input type="text" placeholder="Enter name" class="responder-orcamento-input">
            </div>
            <div class="responder-orcamento-responder_para">
                <p class="responder-orcamento-p3">
                        Responder para
                </p>
                <input type="email" placeholder="Enter email" class="responder-orcamento-input">
            </div>
        </div>
        <div class="responder-orcamento-container2">
            <div class="responder-orcamento-data">
                <p class="responder-orcamento-p4">
                        Data
                </p>
                <input type="date" class="responder-orcamento-input">
            </div>
            <div class="responder-orcamento-resposta">
                <p class="responder-orcamento-p5">
                        Resposta
                </p>
                <textarea placeholder="Detalhe ao máximo a solicitação" class="responder-orcamento-input"></textarea>
            </div>
        </div>
        <button class="responder-orcamento-submit">
            <p class="responder-orcamento-submit-text">
                Enviar agora
            </p>
        </button>


            <!-- POP-UP (inicialmente oculto) -->
        <div class="resp-orc-pop_pup-container" style="display: none;">
            <div class="resp-orc-pop_up-box">
                <div class="close-button">
                    <img src="../../../../public/assets/img/vector2.png" alt="close-icon">
                </div>
                <h1 class="resp-orc-pop_up-h1">Você tem certeza?</h1>
                <p class="resp-orc-pop_up-p">
                    Ao confirmar, Jorge irá receber uma mensagem automática informando que não realizamos este serviço.
                </p>
                <div class="container-buttons-pop_up">
                    <button class="pop_up-cancel">Não, Cancelar</button>
                    <button class="pop_up-submit">Sim, Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../../public/js/responder-orcamento.js"></script>
    <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

</body>
</html>