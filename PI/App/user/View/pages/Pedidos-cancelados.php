<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}
include __DIR__ . '/../../Controllers/PedidoController.php';
$usuario_id = $_SESSION['usuario']['id'];
$pedidos_cancelados = [];
try {
    $pedidoController = new PedidoController($usuario_id);
    $todos_pedidos = $pedidoController->getPedidosDoUsuario();
    // Filtra apenas os cancelados
    foreach ($todos_pedidos as $pedido) {
        if ($pedido['status_pedido'] === 'cancelado') {
            $pedidos_cancelados[] = $pedido;
        }
    }
} catch (Exception $e) {
    echo '<p class="container-pcancelados" style="text-align: center; padding: 20px; color: red;">' . htmlspecialchars($e->getMessage()) . '</p>';
    $pedidos_cancelados = [];
}
function formatarDataCancelamento($historico) {
    foreach (array_reverse($historico) as $h) {
        if ($h['status_novo'] === 'cancelado') {
            return date('d/m/Y H:i', strtotime($h['data_mudanca']));
        }
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Cancelados</title>
    <link rel="stylesheet" href="../../../../public/css/rastreio-pedidos.css">
    <link rel="stylesheet" href="../../../../public/css/modal-cancelar-pedido.css">
    <style>
    /* Barra de progresso e ícones em vermelho só nesta tela */
    .container-rastreio .rastreio-status {
        --progress-color: #d9534f !important;
    }
    .container-rastreio .rastreio-etapa.ativo .rastreio-icone,
    .container-rastreio .rastreio-etapa.ativo {
        color: #d9534f !important;
        border-color: #d9534f !important;
    }
    .container-rastreio .rastreio-status::after {
        background: #d9534f !important;
    }
    .container-rastreio .rastreio-etapa.ativo {
        border-color: #d9534f !important;
    }
    .container-rastreio .rastreio-etapa.ativo .rastreio-icone {
        border: 2px solid #d9534f !important;
        color: #d9534f !important;
    }
    /* Esconde as datas do fluxo */
    .container-rastreio .rastreio-status .rastreio-data {
        display: none !important;
    }
    </style>
</head>
<body class="body-rastreio pedidos-cancelados">
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
    <div class="container-rastreio">
        <h2 class="pedidosenviadostitulo">Pedidos Cancelados</h2>
        <?php if (empty($pedidos_cancelados)): ?>
            <p style="text-align:center;">Nenhum pedido cancelado encontrado.</p>
        <?php else: ?>
            <?php foreach ($pedidos_cancelados as $pedido): ?>
                <div class="container-rastreio">
                    <div class="pedido-rastreio">
                        <div class="header-rastreio">
                            <p class="id-rastreio">Ordem ID: <?php echo htmlspecialchars($pedido['id_pedido']); ?></p>
                            <div class="rastreio-botoes">
                                <button class="rastreio-icone2" disabled>
                                    <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone Nota Fiscal" onerror="this.onerror=null;this.src='https://placehold.co/24x24/cccccc/333333?text=NF';">
                                </button>
                                <button class="rastreio-botao" onclick="toggleDetalhes(this)">Ver Detalhes <i class="fa-solid fa-chevron-down"></i></button>
                            </div>
                        </div>
                        <div class="rastreio-info-entrega">
                            <p class="data-rastreio">Cancelado em: <?php echo formatarDataCancelamento($pedido['historico_status']); ?></p>
                            <img src="../../../../public/assets/img/avaliar-vetor.png" alt="Cancelado" class="rastreio-truck" onerror="this.onerror=null;this.src='https://placehold.co/30x30/cccccc/333333?text=Cancelado';">
                            <p class="entrega-prevista-rastreio" style="color: #d9534f;">Pedido Cancelado</p>
                        </div>
                        <div class="rastreio-status">
                            <?php
                            $display_status_map = [
                                'Pagamento' => [
                                    'text' => 'Pagamento',
                                    'icon' => 'fas fa-credit-card',
                                    'db_status_trigger' => 'pago'
                                ],
                                'Preparando' => [
                                    'text' => 'Preparando',
                                    'icon' => 'fas fa-box',
                                    'db_status_trigger' => 'preparando'
                                ],
                                'A Caminho' => [
                                    'text' => 'A Caminho',
                                    'icon' => 'fas fa-truck',
                                    'db_status_trigger' => 'enviado'
                                ],
                                'Entregue' => [
                                    'text' => 'Entregue',
                                    'icon' => 'fas fa-check-circle',
                                    'db_status_trigger' => 'entregue'
                                ],
                                'Cancelado' => [
                                    'text' => 'Cancelado',
                                    'icon' => 'fas fa-times-circle',
                                    'db_status_trigger' => 'cancelado'
                                ]
                            ];
                            $db_status_progression_order = ['pendente', 'pago', 'preparando', 'enviado', 'entregue', 'cancelado'];
                            $current_db_status_index = array_search($pedido['status_pedido'], $db_status_progression_order);
                            foreach ($display_status_map as $display_key => $display_info):
                                $is_active = false;
                                $trigger_index = array_search($display_info['db_status_trigger'], $db_status_progression_order);
                                if ($current_db_status_index >= $trigger_index) {
                                    $is_active = true;
                                }
                            ?>
                                <div class="rastreio-etapa <?php echo $is_active ? 'ativo' : ''; ?>">
                                    <p class="rastreio-status-texto"><?php echo $display_info['text']; ?></p>
                                    <i class="<?php echo $display_info['icon']; ?> rastreio-icone"></i>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (!empty($pedido['itens'])): ?>
                            <?php foreach ($pedido['itens'] as $item): ?>
                                <div class="rastreio-item">
                                    <img src="../../../../public/assets/img/<?php echo htmlspecialchars($item['imagem_produto']); ?>" alt="<?php echo htmlspecialchars($item['nome_produto']); ?>" class="rastreio-img" onerror="this.onerror=null;this.src='https://placehold.co/80x80/cccccc/333333?text=Sem+Imagem';">
                                    <div class="rastreio-info-preco">
                                        <div class="rastreio-info">
                                            <p class="rastreio-nome"><?php echo htmlspecialchars($item['nome_produto']); ?></p>
                                            <p class="rastreio-detalhes"><?php echo htmlspecialchars($item['detalhes_produto']); ?></p>
                                        </div>
                                        <div class="rastreio-preco">
                                            <h3 class="rastreio-valor"><strong>R$ <?php echo number_format($item['preco_unitario'], 2, ',', '.'); ?></strong></h3>
                                            <h3 class="rastreio-quantidade">Quantidade: <?php echo htmlspecialchars($item['quantidade']); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="rastreio-pagamento-entrega">
                            <div class="rastreio-pagamento-entrega-flex">
                                <div class="rastreio-pagamento">
                                    <h3>Pagamento</h3>
                                    <p class="rastreio-metodo-pagamento"><?php echo htmlspecialchars($pedido['metodo_pagamento']); ?></p>
                                </div>
                                <div class="rastreio-entrega">
                                    <h3>Entrega</h3>
                                    <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                                    <p class="rastreio-endereco"><?php echo htmlspecialchars($pedido['rua'] . ', nº ' . $pedido['numero']); ?></p>
                                    <p class="rastreio-bairro-cidade"><?php echo htmlspecialchars($pedido['bairro'] . ', ' . $pedido['cidade'] . ' - ' . $pedido['estado']); ?></p>
                                    <p class="rastreio-cep">CEP <?php echo htmlspecialchars($pedido['cep']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="rastreio-resumo">
                            <p>Subtotal <span>R$ <?php echo number_format($pedido['subtotal_calculado'], 2, ',', '.'); ?></span></p>
                            <p>Imposto estimado <span>R$ <?php echo number_format(0.00, 2, ',', '.'); ?></span></p>
                            <p>Frete <span><?php echo ($pedido['valor_frete'] == 0) ? 'Grátis' : 'R$ ' . number_format($pedido['valor_frete'], 2, ',', '.'); ?></span></p>
                            <p>Cupons <span>R$ <?php echo number_format(0.00, 2, ',', '.'); ?></span></p>
                            <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ <?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></strong></span></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <script src="../../../../public/js/rastreio.js"></script>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>