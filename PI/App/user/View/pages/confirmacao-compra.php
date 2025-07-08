<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}

$id_pedido = $_GET['id_pedido'] ?? null;

if (!$id_pedido) {
    header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
    exit();
}

require_once __DIR__ . '/../../Models/Pedido.php';

$pedido = Pedido::obterPedido($id_pedido);
$itens_pedido = Pedido::obterItensPedido($id_pedido);

if (!$pedido) {
    header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Confirmada - Tweeb</title>
    <link rel="stylesheet" href="../../../../public/css/confirmacao-compra.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div class="container">
    <div class="confirmacao-header">
        <div class="success-icon">
            <i class="fa fa-check-circle"></i>
        </div>
        <h1>Compra Confirmada!</h1>
        <p>Seu pedido foi processado com sucesso</p>
    </div>

    <div class="pedido-detalhes">
        <div class="pedido-info">
            <h2>Detalhes do Pedido</h2>
            <div class="info-item">
                <span class="label">Número do Pedido:</span>
                <span class="value">#<?php echo $pedido['id_pedido']; ?></span>
            </div>
            <div class="info-item">
                <span class="label">Data do Pedido:</span>
                <span class="value"><?php echo date('d/m/Y H:i', strtotime($pedido['data_pedido'])); ?></span>
            </div>
            <div class="info-item">
                <span class="label">Status:</span>
                <span class="value status-<?php echo $pedido['status_pedido']; ?>">
                    <?php 
                    $status_labels = [
                        'pendente' => 'Pendente',
                        'pago' => 'Pago',
                        'preparando' => 'Preparando',
                        'enviado' => 'Enviado',
                        'entregue' => 'Entregue',
                        'cancelado' => 'Cancelado'
                    ];
                    echo $status_labels[$pedido['status_pedido']] ?? $pedido['status_pedido'];
                    ?>
                </span>
            </div>
            <div class="info-item">
                <span class="label">Método de Pagamento:</span>
                <span class="value"><?php echo $pedido['metodo_pagamento']; ?></span>
            </div>
            <div class="info-item">
                <span class="label">Método de Envio:</span>
                <span class="value"><?php echo $pedido['metodo_envio']; ?></span>
            </div>
            <?php if ($pedido['data_entrega_estimada']): ?>
            <div class="info-item">
                <span class="label">Entrega Estimada:</span>
                <span class="value"><?php echo date('d/m/Y', strtotime($pedido['data_entrega_estimada'])); ?></span>
            </div>
            <?php endif; ?>
        </div>

        <div class="endereco-entrega">
            <h3>Endereço de Entrega</h3>
            <p><?php echo $pedido['nome_endereco'] ? $pedido['nome_endereco'] . ' - ' : ''; ?>
               <?php echo $pedido['rua'] . ', ' . $pedido['numero']; ?></p>
            <p><?php echo $pedido['bairro'] . ', ' . $pedido['cidade'] . ' - ' . $pedido['estado']; ?></p>
            <p>CEP: <?php echo $pedido['cep']; ?></p>
        </div>
    </div>

    <div class="produtos-comprados">
        <h3>Produtos Comprados</h3>
        <?php foreach ($itens_pedido as $item): ?>
        <div class="produto-item">
            <img src="../../../../public/assets/img/<?php echo $item['imagem_produto']; ?>" 
                 alt="<?php echo $item['nome_produto']; ?>">
            <div class="produto-info">
                <h4><?php echo $item['nome_produto']; ?></h4>
                <p class="produto-marca"><?php echo $item['marca_modelo']; ?></p>
                <p class="produto-quantidade">Quantidade: <?php echo $item['quantidade']; ?></p>
                <p class="produto-preco">R$ <?php echo number_format($item['preco_unitario'], 2, ',', '.'); ?> cada</p>
            </div>
            <div class="produto-subtotal">
                R$ <?php echo number_format($item['subtotal'], 2, ',', '.'); ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="resumo-valores">
        <div class="valor-item">
            <span>Subtotal:</span>
            <span>R$ <?php echo number_format($pedido['valor_total'] - $pedido['valor_frete'], 2, ',', '.'); ?></span>
        </div>
        <div class="valor-item">
            <span>Frete:</span>
            <span><?php echo $pedido['valor_frete'] > 0 ? 'R$ ' . number_format($pedido['valor_frete'], 2, ',', '.') : 'Grátis'; ?></span>
        </div>
        <div class="valor-item total">
            <span>Total:</span>
            <span>R$ <?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></span>
        </div>
    </div>

    <div class="acoes-pedido">
        <a href="/Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php" class="btn-continuar">
            <i class="fa fa-shopping-cart"></i>
            Continuar Comprando
        </a>
        <a href="meus-pedidos.php" class="btn-meus-pedidos">
            <i class="fa fa-list"></i>
            Meus Pedidos
        </a>
    </div>

    <div class="informacoes-adicionais">
        <h3>Próximos Passos</h3>
        <div class="passos">
            <div class="passo">
                <div class="passo-icon">
                    <i class="fa fa-check"></i>
                </div>
                <div class="passo-texto">
                    <h4>Pedido Confirmado</h4>
                    <p>Seu pedido foi recebido e está sendo processado</p>
                </div>
            </div>
            <div class="passo">
                <div class="passo-icon">
                    <i class="fa fa-box"></i>
                </div>
                <div class="passo-texto">
                    <h4>Preparando Envio</h4>
                    <p>Seus produtos estão sendo preparados para envio</p>
                </div>
            </div>
            <div class="passo">
                <div class="passo-icon">
                    <i class="fa fa-truck"></i>
                </div>
                <div class="passo-texto">
                    <h4>Em Transporte</h4>
                    <p>Seu pedido será enviado e você receberá o código de rastreio</p>
                </div>
            </div>
            <div class="passo">
                <div class="passo-icon">
                    <i class="fa fa-home"></i>
                </div>
                <div class="passo-texto">
                    <h4>Entrega</h4>
                    <p>Seu pedido será entregue no endereço informado</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<script>
// Adicionar animação de confete (opcional)
function criarConfete() {
    const cores = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#feca57'];
    
    for (let i = 0; i < 50; i++) {
        setTimeout(() => {
            const confete = document.createElement('div');
            confete.style.position = 'fixed';
            confete.style.left = Math.random() * 100 + 'vw';
            confete.style.top = '-10px';
            confete.style.width = '10px';
            confete.style.height = '10px';
            confete.style.backgroundColor = cores[Math.floor(Math.random() * cores.length)];
            confete.style.borderRadius = '50%';
            confete.style.pointerEvents = 'none';
            confete.style.zIndex = '9999';
            confete.style.animation = 'confeteFall 3s linear forwards';
            
            document.body.appendChild(confete);
            
            setTimeout(() => {
                confete.remove();
            }, 3000);
        }, i * 100);
    }
}

// Executar confete quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(criarConfete, 500);
});
</script>

<style>
@keyframes confeteFall {
    to {
        transform: translateY(100vh) rotate(360deg);
        opacity: 0;
    }
}

.passo-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #28a745;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.passo {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.passo-texto h4 {
    margin: 0 0 5px 0;
    color: #333;
}

.passo-texto p {
    margin: 0;
    color: #666;
    font-size: 14px;
}

.status-pendente { color: #ffc107; }
.status-pago { color: #28a745; }
.status-preparando { color: #17a2b8; }
.status-enviado { color: #007bff; }
.status-entregue { color: #28a745; }
.status-cancelado { color: #dc3545; }
</style>
</body>
</html> 