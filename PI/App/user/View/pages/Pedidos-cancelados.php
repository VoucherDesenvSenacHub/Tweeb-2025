<?php
// Inicia a sessão se ainda não estiver ativa
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Redireciona se o usuário não estiver logado
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}

// Inclui o controlador de Pedidos
include __DIR__ . '/../../Controllers/PedidoController.php';

$usuario_id = $_SESSION['usuario']['id'];
$pedidos_cancelados = [];

try {
    $pedidoController = new PedidoController($usuario_id);
    // *** ALTERAÇÃO AQUI: Chamando o novo método que traz TODOS os pedidos ***
    $todos_pedidos = $pedidoController->getTodosPedidosDoUsuario();

    // Filtra APENAS os pedidos com status 'cancelado' (MAIS ROBUSTO)
    foreach ($todos_pedidos as $pedido) {
        // Converte o status para minúsculas e remove espaços extras para uma comparação mais robusta
        $status_normalizado = strtolower(trim($pedido['status_pedido']));

        if ($status_normalizado === 'cancelado') {
            $pedidos_cancelados[] = $pedido;
        }
    }
} catch (Exception $e) {
    // Em um ambiente de produção, você pode querer logar o erro em vez de exibi-lo diretamente
    // error_log('Erro ao buscar pedidos cancelados: ' . $e->getMessage());
    echo '<div class="container-rastreio" style="text-align: center; padding: 20px; color: red;">Erro ao carregar pedidos: ' . htmlspecialchars($e->getMessage()) . '</div>';
    $pedidos_cancelados = []; // Garante que a variável esteja vazia em caso de erro
}

// Função auxiliar para formatar a data de cancelamento
// Esta função busca a data do último status 'cancelado' no histórico
function formatarDataCancelamento($historico) {
    if (!is_array($historico)) {
        return '';
    }
    // Percorre o histórico do mais recente para o mais antigo
    foreach (array_reverse($historico) as $h) {
        // Normaliza o status do histórico para comparação
        $historico_status_normalizado = strtolower(trim($h['status_novo']));
        if ($historico_status_normalizado === 'cancelado') {
            return date('d/m/Y H:i', strtotime($h['data_mudanca']));
        }
    }
    return ''; // Retorna vazio se não encontrar status 'cancelado'
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Cancelados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="../../../../public/css/pedidos-cancelados.css">
    
    <link rel="stylesheet" href="../../../../public/css/modal-cancelar-pedido.css">
</head>
<body class="body-rastreio pedidos-cancelados"> <?php include __DIR__.'/../../../../includes/navbar.php'; ?>
    <?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

    <div class="main-content-wrapper"> <h2 class="pedidosenviadostitulo">Pedidos Cancelados</h2>

        <?php if (empty($pedidos_cancelados)): ?>
            <div class="container-rastreio"> <p style="text-align:center; padding: 20px;">Nenhum pedido cancelado encontrado.</p>
            </div>
        <?php else: ?>
            <?php foreach ($pedidos_cancelados as $pedido): ?>
                <div class="container-rastreio"> <div class="pedido-rastreio"> <div class="header-rastreio"> <p class="id-rastreio">Ordem ID: <?php echo htmlspecialchars($pedido['id_pedido']); ?></p>
                            <div class="rastreio-botoes"> <button class="rastreio-icone2" disabled title="Nota Fiscal não disponível para pedidos cancelados"> <img src="/Tweeb-2025/PI/public/assets/img/nota-rastreio.png" alt="Ícone Nota Fiscal" onerror="this.onerror=null;this.src='https://placehold.co/24x24/cccccc/333333?text=NF';">
                                </button>
                                <button class="rastreio-botao" onclick="toggleDetalhes(this)">Ver Detalhes <i class="fa-solid fa-chevron-down"></i></button>
                            </div>
                        </div>
                        <div class="rastreio-info-entrega"> <p class="data-rastreio">Cancelado em: <?php echo formatarDataCancelamento($pedido['historico_status']); ?></p>
                            <img src="/Tweeb-2025/PI/public/assets/img/avaliar-vetor.png" alt="Status" class="rastreio-truck" onerror="this.onerror=null;this.src='https://placehold.co/30x30/cccccc/333333?text=Cancelado';">
                            <p class="entrega-prevista-rastreio">Pedido Cancelado</p> </div>
                        <div class="rastreio-status"> <?php
                            // Mapeamento dos status para exibição no frontend
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
                                'Cancelado' => [ // Status 'Cancelado' é o foco aqui
                                    'text' => 'Cancelado',
                                    'icon' => 'fas fa-times-circle',
                                    'db_status_trigger' => 'cancelado'
                                ]
                            ];
                            // Ordem de progressão dos status no banco de dados (para calcular ativação)
                            $db_status_progression_order = ['pendente', 'pago', 'preparando', 'enviado', 'entregue', 'cancelado'];
                            // Use o status normalizado do pedido para encontrar o índice
                            $current_db_status_index = array_search(strtolower(trim($pedido['status_pedido'])), $db_status_progression_order);

                            foreach ($display_status_map as $display_key => $display_info):
                                $is_active = false;
                                $trigger_index = array_search($display_info['db_status_trigger'], $db_status_progression_order);
                                
                                // Um status é ativo se o status atual do pedido for igual ou posterior ao seu trigger
                                if ($current_db_status_index >= $trigger_index) {
                                    $is_active = true;
                                }
                                // Se o status atual é 'cancelado', apenas o ícone 'Cancelado' deve ser ativo.
                                // Os outros ícones de progresso normal devem ser desativados.
                                if (strtolower(trim($pedido['status_pedido'])) === 'cancelado' && $display_info['db_status_trigger'] !== 'cancelado') {
                                    $is_active = false; // Desativa outros status se o pedido estiver cancelado
                                } elseif (strtolower(trim($pedido['status_pedido'])) === 'cancelado' && $display_info['db_status_trigger'] === 'cancelado') {
                                    $is_active = true; // Ativa o status de cancelado
                                }
                            ?>
                                <div class="rastreio-etapa <?php echo $is_active ? 'ativo' : ''; ?>">
                                    <p class="rastreio-status-texto"><?php echo $display_info['text']; ?></p>
                                    <i class="<?php echo $display_info['icon']; ?> rastreio-icone"></i>
                                    <p class="rastreio-data"></p> 
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (!empty($pedido['itens'])): ?>
                            <?php foreach ($pedido['itens'] as $item): ?>
                                <div class="rastreio-item"> <img src="<?php echo str_replace('../../../../public/', '/Tweeb-2025/PI/public/', htmlspecialchars($item['imagem_produto'])); ?>" alt="<?php echo htmlspecialchars($item['nome_produto']); ?>" class="rastreio-img" onerror="this.onerror=null;this.src='https://placehold.co/80x80/cccccc/333333?text=Sem+Imagem';">
                                    <div class="rastreio-info-preco"> <div class="rastreio-info"> <p class="rastreio-nome"><?php echo htmlspecialchars($item['nome_produto']); ?></p>
                                            <p class="rastreio-detalhes"><?php echo htmlspecialchars($item['detalhes_produto']); ?></p>
                                        </div>
                                        <div class="rastreio-preco"> <h3 class="rastreio-valor"><strong>R$ <?php echo number_format($item['preco_unitario'], 2, ',', '.'); ?></strong></h3>
                                            <h3 class="rastreio-quantidade">Quantidade: <?php echo htmlspecialchars($item['quantidade']); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="rastreio-pagamento-entrega"> <div class="rastreio-pagamento-entrega-flex"> <div class="rastreio-pagamento"> <h3>Pagamento</h3>
                                    <p class="rastreio-metodo-pagamento"><?php echo htmlspecialchars($pedido['metodo_pagamento']); ?></p>
                                </div>
                                <div class="rastreio-entrega"> <h3>Entrega</h3>
                                    <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                                    <p class="rastreio-endereco"><?php echo htmlspecialchars($pedido['rua'] . ', nº ' . $pedido['numero']); ?></p>
                                    <p class="rastreio-bairro-cidade"><?php echo htmlspecialchars($pedido['bairro'] . ', ' . $pedido['cidade'] . ' - ' . $pedido['estado']); ?></p>
                                    <p class="rastreio-cep">CEP <?php echo htmlspecialchars($pedido['cep']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="rastreio-resumo"> <p>Subtotal <span>R$ <?php echo number_format($pedido['subtotal_calculado'], 2, ',', '.'); ?></span></p>
                            <p>Imposto estimado <span>R$ <?php echo number_format(0.00, 2, ',', '.'); ?></span></p>
                            <p>Frete <span><?php echo ($pedido['valor_frete'] == 0) ? 'Grátis' : 'R$ ' . number_format($pedido['valor_frete'], 2, ',', '.'); ?></span></p>
                            <p>Cupons <span>R$ <?php echo number_format(0.00, 2, ',', '.'); ?></span></p>
                            <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ <?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></strong></span></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div> <script src="../../../../public/js/pedidos-cancelados.js"></script>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>