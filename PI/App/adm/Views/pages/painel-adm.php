<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="../../../../public/css/adm-enviados.css">
    <link rel="stylesheet" href="../../../../public/css/orcamento-recebido.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="orcamento-recebido">

<div class="quantidade-pedidos2">
    <div class="fundo-roxo">
    <div class="pedidos-ui-card2">

<div class="ui-pedidos-frame">
    <p>Manutenções</p>
    <img src="../../../../public/assets/img/icone-manutencoes-adm.png" alt="">
</div>

<div class="ui-pedidos-label">
    <h1 class="numero-item-minicard">18</h1>
    <p><span>02</span>finalizadas</p>
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
      
    </div>

    <h1 class="titulo-painel">Manutenções</h1>

    <div class="painel-container">
        <table class="painel-tabela">
            <thead class="painel-tabela-header">
                <tr>
                    <th class="painel-check"></th>
                    <th class="painel-servico">Ordem de Serviço</th>
                    <th class="painel-numero">Número</th>
                    <th class="painel-prioridade">Prioridade</th>
                    <th class="painel-tecnicos">Técnicos</th>
                    <th class="painel-progresso">Progresso</th>
                </tr>
            </thead>
            <tbody id="painel-corpo-tabela">
                <!-- As linhas serão inseridas dinamicamente pelo JavaScript -->
            </tbody>
        </table>
        <button class="painel-botao" onclick="atualizarProgresso()">Ver todas</button>
    </div>

    <div class="painel-bottom-container">
        <div class="painel-bottom-card painel-bottom-estoque">
            <div class="painel-bottom-titulo">
                <h3>Estoque</h3>
                <span id="painel-bottom-menuBtn">⋮</span>
            </div>
            <div class="painel-bottom-menu-opcoes" id="painel-bottom-menuOpcoes">
                <p>Mais vendidos</p>
                <p>Últimos itens</p>
            </div>
            <div class="painel-bottom-grafico">
                <canvas id="painel-bottom-graficoEstoque"></canvas>
            </div>
            <div class="painel-bottom-status">
                <div class="painel-bottom-status-item painel-bottom-completo">
                    <span><img src="" alt=""></span>
                    <p>76%<br>Completo</p>
                </div>
                <div class="painel-bottom-status-item painel-bottom-alerta">
                    <span><img src="" alt=""></span>
                    <p>32%<br>Alerta</p>
                </div>
                <div class="painel-bottom-status-item painel-bottom-falta">
                    <span><img src="" alt=""></span>
                    <p>13%<br>Em falta</p>
                </div>
            </div>
        </div>
        <div class="painel-bottom-card painel-bottom-tecnicos">
            <h3>Técnicos</h3>
            <table class="painel-bottom-tecnicos-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Função</th>
                        <th>Última Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="avatar1.jpg" alt="Lauana Souza"> Lauana Souza</td>
                        <td>Técnico de sistemas</td>
                        <td>hoje</td>
                    </tr>
                    <tr>
                        <td><img src="avatar2.jpg" alt="Sandra Costa"> Sandra Costa</td>
                        <td>Técnico de rede</td>
                        <td>hoje</td>
                    </tr>
                    <tr>
                        <td><img src="avatar3.jpg" alt="Amanda Rodrigues"> Amanda Rodrigues</td>
                        <td>Técnico de sistema</td>
                        <td>ontem</td>
                    </tr>
                    <tr>
                        <td><img src="avatar4.jpg" alt="Pietro Meirelles"> Pietro Meirelles</td>
                        <td>Auxiliar Técnico</td>
                        <td>26/07/2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

    
    
<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 
</body>
</html>