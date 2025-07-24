<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamentos Aceitos</title>
    <link rel="stylesheet" href="../../../../public/css/adm-enviados.css">
    <link rel="stylesheet" href="../../../../public/css/orcamento-recebido.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="../../js_adm/OrcamentoAceitos.js"></script>
</head>
<body>
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="orcamento-recebido">

    <div class="quantidade-pedidos2">
        <div class="pedidos-ui-card2">
            <div class="ui-pedidos-frame">
                <p>Orçamentos</p>
                <img src="../../../../public/assets/img/project-icon-2.png" alt="">
            </div>
            <div class="ui-pedidos-label">
                <h1 class="numero-item-minicard" id="quantidadeTotal"></h1>
                <p><span>1</span> fechado</p>
            </div>
        </div>

        <div class="pedidos-ui-card3">
            <div class="ui-pedidos-frame">
                <p>Aceitos</p>
                <img src="../../../../public/assets/img/project-icon-2.png" alt="">
            </div>
            <div class="ui-pedidos-label">
                <h1 class="numero-item-minicard" id="quantidadeAceitos"></h1>
                <p><span>1</span> Garantia</p>
            </div>
        </div>
    </div>

    <div class="pedidos-categoria-selecionado">
        <div class="categorias-adm-enviados">
            <a href="orcamento-recebido.php"><p>Pendentes</p></a>
            <span><p>Aceitos</p></span>
        </div>
    </div>

    <!-- Container onde os orçamentos aceitos serão listados -->
    <div id="orcamentos-dinamicos"></div>

</div>

<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 
</body>
</html>
