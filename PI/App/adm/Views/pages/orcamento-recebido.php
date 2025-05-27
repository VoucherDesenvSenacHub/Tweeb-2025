<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviados</title>
    <link rel="stylesheet" href="../../../../public/css/adm-enviados.css">
    <link rel="stylesheet" href="../../../../public/css/orcamento-recebido.css">
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
      <div class="responder-orcamento-title">
        <p class="responder-orcamento-p1">Título</p>
        <input type="text" placeholder="Enter title" class="responder-orcamento-input">
      </div>
      <div class="responder-orcamento-enviado_por">
        <p class="responder-orcamento-p2">Enviada por</p>
        <input type="text" placeholder="Enter name" class="responder-orcamento-input">
      </div>
      <div class="responder-orcamento-responder_para">
        <p class="responder-orcamento-p3">Responder para</p>
        <input type="email" placeholder="Enter email" class="responder-orcamento-input">
      </div>
    </div>

    <div class="responder-orcamento-container2">
      <div class="responder-orcamento-data">
        <p class="responder-orcamento-p4">Data</p>
        <input type="date" class="responder-orcamento-input">
      </div>
      <div class="responder-orcamento-resposta">
        <p class="responder-orcamento-p5">Resposta</p>
        <textarea placeholder="Detalhe ao máximo a solicitação" class="responder-orcamento-input"></textarea>
      </div>
    </div>

    <button class="orcamento-recebido-negacao">
    <button type="button" class="orcamento-recebido-negacao">Enviar</button>
    </button>

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

    <div class="orcamento-recebido-container">

    <div class="orcamento-recebido-header">
        <span>Solicitação (1)</span>
        <span>18/07/2024 11:50</span>
    </div>
    <form class="orcamento-recebido-form">
        <div class="orcamento-recebido-row">
            <input type="text" value="Igor" readonly>
            <input type="email" value="Igor@gmail.com" readonly>
            <input type="tel" value="67 12234-5678" readonly>
        </div>
        <div class="orcamento-recebido-row">
            <input type="text" value="Concerto" readonly>
            <input type="text" value="Até 10/10/2024" readonly>
            <button class="foto-orcamento-jpeg" type="button" readonly> <i class="fa-regular fa-circle-down"></i></button>
       
            
        </div>
        <textarea readonly>Formatação do Notebook</textarea>
        <div class="orcamento-recebido-buttons">
            <button type="button" class="orcamento-recebido-negacao">Negar</button>
            <button type="button" class="orcamento-recebido-responder open-modal-resposta">Responder</button>



        </div>
    </form>
    </div>

    <div class="orcamento-recebido-container">

    <div class="orcamento-recebido-header">
        <span>Solicitação (1)</span>
        <span>18/07/2024 11:50</span>
    </div>
    <form class="orcamento-recebido-form">
        <div class="orcamento-recebido-row">
            <input type="text" value="Igor" readonly>
            <input type="email" value="Igor@gmail.com" readonly>
            <input type="tel" value="67 12234-5678" readonly>
        </div>
        <div class="orcamento-recebido-row">
            <input type="text" value="Concerto" readonly>
            <input type="text" value="Até 10/10/2024" readonly>
            <button class="foto-orcamento-jpeg" type="button" readonly> <i class="fa-regular fa-circle-down"></i></button>
       
            
        </div>
        <textarea readonly>Formatação do Notebook</textarea>
        <div class="orcamento-recebido-buttons">
            <button type="button" class="orcamento-recebido-negacao">Negar</button>
            <button type="button" class="orcamento-recebido-responder open-modal-resposta">Responder</button>


        </div>
    </form>
    </div>

    
</div>

    
    
<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 
</body>


<script>
  document.querySelectorAll('.open-modal-resposta').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('modal-responder-orcamento').style.display = 'flex';
    });
  });

  document.querySelectorAll('.close-modal').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('modal-responder-orcamento').style.display = 'none';
    });
  });
</script>






</html>