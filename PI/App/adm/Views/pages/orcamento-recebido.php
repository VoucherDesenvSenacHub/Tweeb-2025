<?php
session_start();
include_once '../../Models/Orcamento.php';

// $orcamento = new Orcamento();
// $dados = $orcamento->buscar();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviados</title>
    <link rel="stylesheet" href="../../../../public/css/adm-enviados.css">
    <link rel="stylesheet" href="../../../../public/css/orcamento-recebido.css">
    <script defer src="../../js_adm/OrcamentoRecebido.js"></script>
    <script src="../../../../public/js/orcamento-recebido.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>









<!-- Modal de Resposta de Orçamento -->
<div id="modal-responder-orcamento" class="modal-overlay" style="display: none;">
  <div class="modal-content responder-orcamento">
    <div class="container-responder-orcamento-h1">
      <h1 class="responder-orcamento-h1">Responder Orçamento</h1>
      <div class="responder-orcamento-back-page close-modal">
        <img src="../../../../public/assets/img/Vector2.png" alt="Fechar">
      </div>
    </div>

    <div class="responder-orcamento-container1">
      <div class="responder-orcamento-title"><br>
        <p class="responder-orcamento-p1">Título: </p><br>
        <input type="text" placeholder="Enter title" class="responder-orcamento-input">
      </div>
      <div class="responder-orcamento-enviado_por"><br>
        <p class="responder-orcamento-p2">Enviada por: </p><br>
        <input type="text" placeholder="Enter name" class="responder-orcamento-input">
      </div>
      <div class="responder-orcamento-responder_para"><br>
        <p class="responder-orcamento-p3">Responder para: </p><br>
        <input type="email" placeholder="Enter email" class="responder-orcamento-input">
      </div>
    </div>

    <div class="responder-orcamento-container2">
      <div class="responder-orcamento-data"><br>
        <p class="responder-orcamento-p4">Data: </p><br>
        <input type="date" class="responder-orcamento-input">
      </div>
      <div class="responder-orcamento-resposta"><br>
        <p class="responder-orcamento-p5">Resposta: </p><br>
        <textarea placeholder="Detalhe ao máximo a solicitação" class="responder-orcamento-input"></textarea>
      </div>
    </div>

    <button type="button" class="botao-modal-enviar">Enviar</button>


    <!-- Confirmação -->
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
</div>


























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
                <h1 class="numero-item-minicard">12</h1>
                <p><span>1</span> fechado</p>
            </div>
        </div>

        <div class="pedidos-ui-card3">
            <div class="ui-pedidos-frame">
                <p>Aceitos</p>
                <img src="../../../../public/assets/img/project-icon-2.png" alt="">
            </div>
            <div class="ui-pedidos-label">
                <h1 class="numero-item-minicard">37</h1>
                <p><span>1</span> Garantia</p>
            </div>
        </div>
    </div>

    <div class="pedidos-categoria-selecionado">
        <div class="categorias-adm-enviados">
            <span><p>Pendentes</p></span>
            <a href="orcamento-aceitos.php"><p>Aceitos</p></a>
        </div>
    </div>

    <!-- ✅ Adicionamos aqui a div que receberá os orçamentos -->
    <div id="orcamentos-dinamicos"></div>

</div> <!-- fim do .orcamento-recebido -->

<!-- ✅ Footer fora do container -->
<footer class="footer-adm">
    <div class="footer-content-adm">
        <div class="footer-logo-adm">
            <div><img src="../../../../public/assets/img/logo.png" alt="Logo Tweeb" /></div>
            <div class="footer-text-adm">Você faz parte da nossa conexão com o futuro.</div>
        </div>
    </div>
</footer>

</body>
</html>