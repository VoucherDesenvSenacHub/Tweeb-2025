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
    <link rel="stylesheet" href="../../../../public/css/pedidos-cancelados.css">
</head>
<body class="body-pcancelados">
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
    <div class="container-pcancelados">
        <h2 class="titulo-pcancelados">Pedidos Cancelados</h2>
        <?php if (empty($pedidos_cancelados)): ?>
            <p style="text-align:center;">Nenhum pedido cancelado encontrado.</p>
        <?php else: ?>
            <?php foreach ($pedidos_cancelados as $pedido): ?>
                <div class="pedido-pcancelados">
                    <?php foreach ($pedido['itens'] as $item): ?>
                    <div class="info-produto-pcancelados">
                        <img src="../../../../public/assets/img/<?php echo htmlspecialchars($item['imagem_produto']); ?>" alt="<?php echo htmlspecialchars($item['nome_produto']); ?>" class="imagem-pcancelados" onerror="this.onerror=null;this.src='https://placehold.co/80x80/cccccc/333333?text=Sem+Imagem';">
                        <div>
                            <p class="nome-produto-pcancelados"><?php echo htmlspecialchars($item['nome_produto']); ?></p>
                            <p class="codigo-produto-pcancelados">#<?php echo htmlspecialchars($pedido['id_pedido']); ?></p>
                        </div>
                        <input type="number" class="quantidade-pcancelados" value="<?php echo htmlspecialchars($item['quantidade']); ?>" readonly>
                    </div>
                    <?php endforeach; ?>
                    <div class="detalhes-pcancelados" style="display: none;">
                        <p>Imposto estimado: <strong>R$0,00</strong></p>
                        <p>Frete: <strong><?php echo ($pedido['valor_frete'] == 0) ? 'Grátis' : 'R$ ' . number_format($pedido['valor_frete'], 2, ',', '.'); ?></strong></p>
                        <p>Cupons: <strong>R$0,00</strong></p>
                        <p class="total-pcancelados">Total: <strong>R$<?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></strong></p>
                    </div>
                    <p class="data-cancelamento-pcancelados">Pedido Cancelado em <?php echo formatarDataCancelamento($pedido['historico_status']); ?></p>
                    <button class="toggle-pcancelados">
                        <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
                    </button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <script>
    document.querySelectorAll('.toggle-pcancelados').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var detalhes = this.parentElement.querySelector('.detalhes-pcancelados');
            if (detalhes.style.display === 'none' || detalhes.style.display === '') {
                detalhes.style.display = 'block';
            } else {
                detalhes.style.display = 'none';
            }
        });
    });
    </script>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>