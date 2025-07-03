<?php
session_start();
?>
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
    <style>
        .painel-flex-wrapper {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .painel-container {
            flex: 2;
            min-width: 400px;
        }

        .painel-bottom-card.painel-bottom-estoque {
            flex: 1;
            min-width: 300px;
        }
    </style>
</head>
<body class="painel-adm-body">
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
                    <p>Envio Semanal</p>
                    <img src="../../../../public/assets/img/icone-enviosemanal-adm.png" alt="">
                </div>
                <div class="ui-pedidos-label">
                    <h1 class="numero-item-minicard">132</h1>
                    <p><span>28</span> Entregues</p>
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
                    <p>Pedidos</p>
                    <img src="../../../../public/assets/img/plus-circle.png" alt="">
                </div>
                <div class="ui-pedidos-label">
                    <h1 class="numero-item-minicard">37</h1>
                    <p><span>5%</span> incompletos</p>
                </div>
            </div>
        </div>
    </div>

    <h1 class="titulo-painel">Manutenções</h1>

    <div class="painel-flex-wrapper"> <!-- NOVO AGRUPADOR -->

        <div class="painel-container">
            <div class="painel-tabela-wrapper">
                <table class="painel-tabela">
                    <thead class="painel-tabela-header">
                        <tr>
                            <th class="painel-servico">Ordem de Serviço</th>
                            <th class="painel-numero">Número</th>
                            <th class="painel-prioridade">Prioridade</th>
                            <th class="painel-tecnicos">Técnicos</th>
                        </tr>
                    </thead>
                    <tbody id="painel-corpo-tabela">
                        <!-- As linhas serão inseridas dinamicamente pelo JavaScript -->
                    </tbody>
                </table>
            </div>
            <button class="painel-botao" onclick="atualizarProgresso()">Atualizar</button>
        </div>

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
                    <span><img src="../../../../public/assets/img/icone-grafico1.png" alt=""></span>
                    <p>76%<br>Completo</p>
                </div>
                <div class="painel-bottom-status-item painel-bottom-alerta">
                    <span><img src="../../../../public/assets/img/icone-grafico2.png" alt=""></span>
                    <p>32%<br>Alerta</p>
                </div>
                <div class="painel-bottom-status-item painel-bottom-falta">
                    <span><img src="../../../../public/assets/img/icone-grafico3.png" alt=""></span>
                    <p>13%<br>Em falta</p>
                </div>
            </div>
        </div>

    </div> <!-- FIM DO FLEX WRAPPER -->

</div>

<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 
</body>
</html>
