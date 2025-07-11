<?php
// rastreio-pedidos.php
// Este é o arquivo de front-end que exibe a tela de rastreio de pedidos.

// Inicia a sessão se ainda não estiver ativa
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Verifica se o usuário está logado. Se não estiver, redireciona para a página de login.
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}


include __DIR__ . '/../../Controllers/PedidoController.php';


$usuario_id = $_SESSION['usuario']['id'];
$pedidos = []; 

try {

    $pedidoController = new PedidoController($usuario_id);
    $pedidos = $pedidoController->getPedidosDoUsuario();
} catch (Exception $e) {

    echo '<p class="container-rastreio" style="text-align: center; padding: 20px; color: red;">' . htmlspecialchars($e->getMessage()) . '</p>';
    $pedidos = [];
}

/**

 * @param string 
 * @return string 
 */
function formatarData($data) {

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
    return strftime('%a, %d de %B', strtotime($data));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreio de Pedidos</title>
    <!-- Inclui o Font Awesome para os ícones, se ainda não estiver no headernavb.php -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link para o seu arquivo CSS externo -->
    <link rel="stylesheet" href="../../../../public/assets/css/rastreio.css">
</head>
<body class="body-rastreio">
    <?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
    <?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

    <h1 class="pedidosenviadostitulo">Pedidos Enviados</h1>

    <?php if (empty($pedidos)): ?>
        <p class="container-rastreio" style="text-align: center; padding: 20px;">Nenhum pedido encontrado.</p>
    <?php else: ?>
        <?php foreach ($pedidos as $pedido): ?>
            <div class="container-rastreio">
                <div class="pedido-rastreio">
                    <div class="header-rastreio">
                        <p class="id-rastreio">Ordem ID: <?php echo htmlspecialchars($pedido['id_pedido']); ?></p>
                        <div class="rastreio-botoes">
                            <button class="rastreio-icone2">
                                <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone Nota Fiscal" onerror="this.onerror=null;this.src='https://placehold.co/24x24/cccccc/333333?text=NF';">
                            </button>
                            <!-- O onclick agora chama a função JS global -->
                            <button class="rastreio-botao" onclick="toggleDetalhes(this)">Acompanhar Pedido <i class="fa-solid fa-location-dot"></i></button>
                        </div>
                    </div>
                    
                    <div class="rastreio-info-entrega">
                        <p class="data-rastreio">Data: <?php echo formatarData($pedido['data_pedido']); ?></p>
                        <?php if ($pedido['status_pedido'] === 'entregue'): ?>
                            <img src="../../../../public/assets/img/avaliar-vetor.png" alt="Ícone Avaliar" class="rastreio-truck" onerror="this.onerror=null;this.src='https://placehold.co/30x30/cccccc/333333?text=Avaliar';">
                            <p class="entrega-prevista-rastreio-avaliar">Avalie sua compra!</p>
                        <?php else: ?>
                            <img src="../../../../public/assets/img/truck-tick.png" alt="Ícone Caminhão" class="rastreio-truck" onerror="this.onerror=null;this.src='https://placehold.co/30x30/cccccc/333333?text=Caminhão';">
                            <p class="entrega-prevista-rastreio verde">Entrega prevista: <?php echo formatarData($pedido['data_entrega_estimada']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- div do rastreio (barra de progresso) -->
                <?php
                // Mapeamento dos status do DB para os status de exibição e seus ícones
                $display_status_map = [
                    'Pagamento' => [
                        'text' => 'Pagamento',
                        'icon' => 'fas fa-credit-card',
                        'db_status_trigger' => 'pago' // Status no DB que ativa esta etapa
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
                    ]
                ];

                // Ordem de progressão dos status no banco de dados (completa, incluindo 'pendente')
                $db_status_progression_order = ['pendente', 'pago', 'preparando', 'enviado', 'entregue', 'cancelado'];
                $current_db_status_index = array_search($pedido['status_pedido'], $db_status_progression_order);
                $active_steps_count = 0; // Contador para passos ativos na barra de progresso
                ?>
                <div class="rastreio-status">
                    <?php foreach ($display_status_map as $display_key => $display_info):
                        $is_active = false;
                        $status_date = '';
                        $trigger_index = array_search($display_info['db_status_trigger'], $db_status_progression_order);

                        // Se o status atual do pedido é igual ou "passou" por este status de gatilho, ele está ativo
                        if ($current_db_status_index >= $trigger_index) {
                            $is_active = true;
                            $active_steps_count++;

                            // Tenta encontrar a data do status no histórico
                            foreach ($pedido['historico_status'] as $hist_status) {
                                if ($hist_status['status_novo'] === $display_info['db_status_trigger']) {
                                    $status_date = formatarData($hist_status['data_mudanca']);
                                    break;
                                }
                            }
                        }
                        ?>
                        <div class="rastreio-etapa <?php echo $is_active ? 'ativo' : ''; ?>">
                            <p class="rastreio-status-texto"><?php echo $display_info['text']; ?></p>
                            <i class="<?php echo $display_info['icon']; ?> rastreio-icone"></i>
                            <p class="rastreio-data"><?php echo $status_date; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- div do item pedido -->
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
                <?php else: ?>
                    <div class="rastreio-item">
                        <p style="text-align: center; width: 100%; padding: 10px;">Nenhum item encontrado para este pedido.</p>
                    </div>
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
                    <!-- Imposto estimado e Cupons não estão diretamente na tabela 'pedidos' fornecida, usando 0.00 -->
                    <p>Imposto estimado <span>R$ <?php echo number_format(0.00, 2, ',', '.'); ?></span></p>
                    <p>Frete <span><?php echo ($pedido['valor_frete'] == 0) ? 'Grátis' : 'R$ ' . number_format($pedido['valor_frete'], 2, ',', '.'); ?></span></p>
                    <p>Cupons <span>R$ <?php echo number_format(0.00, 2, ',', '.'); ?></span></p>
                    <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ <?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></strong></span></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Inclui o arquivo JavaScript para a interatividade da página -->
    <script src="../../../../public/assets/js/rastreio.js"></script>
</body>
</html>
