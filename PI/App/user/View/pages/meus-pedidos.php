<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../../Models/Pedido.php';

$id_usuario = $_SESSION['usuario']['id'];
$pedidos = Pedido::obterPedidosUsuario($id_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos - Tweeb</title>
    <link rel="stylesheet" href="../../../../public/css/meus-pedidos.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>

<div class="container">
    <div class="page-header">
        <h1>Meus Pedidos</h1>
        <p>Acompanhe o status de todos os seus pedidos</p>
    </div>

    <?php if (empty($pedidos)): ?>
    <div class="empty-state">
        <div class="empty-icon">
            <i class="fa fa-shopping-bag"></i>
        </div>
        <h3>Nenhum pedido encontrado</h3>
        <p>Você ainda não fez nenhum pedido. Que tal começar a comprar?</p>
        <a href="/Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php" class="btn-comprar">
            <i class="fa fa-shopping-cart"></i>
            Fazer Primeira Compra
        </a>
    </div>
    <?php else: ?>
    
    <div class="pedidos-grid">
        <?php foreach ($pedidos as $pedido): ?>
        <div class="pedido-card">
            <div class="pedido-header">
                <div class="pedido-info">
                    <h3>Pedido #<?php echo $pedido['id_pedido']; ?></h3>
                    <p class="pedido-data">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('d/m/Y H:i', strtotime($pedido['data_pedido'])); ?>
                    </p>
                </div>
                <div class="pedido-status">
                    <span class="status-badge status-<?php echo $pedido['status_pedido']; ?>">
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
            </div>
            
            <div class="pedido-details">
                <div class="detail-item">
                    <span class="label">Total:</span>
                    <span class="value">R$ <?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Método de Envio:</span>
                    <span class="value"><?php echo $pedido['metodo_envio']; ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Endereço:</span>
                    <span class="value"><?php echo $pedido['nome_endereco'] ? $pedido['nome_endereco'] . ' - ' : ''; ?>
                    <?php echo $pedido['cidade'] . ' - ' . $pedido['estado']; ?></span>
                </div>
                <?php if ($pedido['data_entrega_estimada']): ?>
                <div class="detail-item">
                    <span class="label">Entrega Estimada:</span>
                    <span class="value"><?php echo date('d/m/Y', strtotime($pedido['data_entrega_estimada'])); ?></span>
                </div>
                <?php endif; ?>
                <?php if ($pedido['codigo_rastreio']): ?>
                <div class="detail-item">
                    <span class="label">Código de Rastreio:</span>
                    <span class="value rastreio"><?php echo $pedido['codigo_rastreio']; ?></span>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="pedido-actions">
                <button class="btn-detalhes" onclick="verDetalhesPedido(<?php echo $pedido['id_pedido']; ?>)">
                    <i class="fa fa-eye"></i>
                    Ver Detalhes
                </button>
                <?php if ($pedido['status_pedido'] === 'pendente'): ?>
                <button class="btn-cancelar" onclick="cancelarPedido(<?php echo $pedido['id_pedido']; ?>)">
                    <i class="fa fa-times"></i>
                    Cancelar
                </button>
                <?php endif; ?>
                <?php if ($pedido['status_pedido'] === 'enviado' && $pedido['codigo_rastreio']): ?>
                <button class="btn-rastrear" onclick="rastrearPedido('<?php echo $pedido['codigo_rastreio']; ?>')">
                    <i class="fa fa-truck"></i>
                    Rastrear
                </button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<!-- Modal de detalhes do pedido -->
<div id="modal-detalhes" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal-content">
            <!-- Conteúdo será carregado dinamicamente -->
        </div>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<script>
function verDetalhesPedido(idPedido) {
    fetch(`/Tweeb-2025/PI/App/user/Controllers/PedidoController.php?action=obter_pedido&id_pedido=${idPedido}`)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            mostrarModalDetalhes(data);
        } else {
            alert('Erro ao carregar detalhes do pedido: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao carregar detalhes do pedido');
    });
}

function mostrarModalDetalhes(data) {
    const modal = document.getElementById('modal-detalhes');
    const content = document.getElementById('modal-content');
    
    let html = `
        <h2>Detalhes do Pedido #${data.pedido.id_pedido}</h2>
        
        <div class="modal-section">
            <h3>Informações do Pedido</h3>
            <div class="info-grid">
                <div class="info-item">
                    <span class="label">Data:</span>
                    <span class="value">${new Date(data.pedido.data_pedido).toLocaleDateString('pt-BR')}</span>
                </div>
                <div class="info-item">
                    <span class="label">Status:</span>
                    <span class="value status-${data.pedido.status_pedido}">${data.pedido.status_pedido}</span>
                </div>
                <div class="info-item">
                    <span class="label">Total:</span>
                    <span class="value">R$ ${parseFloat(data.pedido.valor_total).toFixed(2).replace('.', ',')}</span>
                </div>
                <div class="info-item">
                    <span class="label">Frete:</span>
                    <span class="value">${data.pedido.valor_frete > 0 ? 'R$ ' + parseFloat(data.pedido.valor_frete).toFixed(2).replace('.', ',') : 'Grátis'}</span>
                </div>
            </div>
        </div>
        
        <div class="modal-section">
            <h3>Produtos</h3>
            <div class="produtos-lista">
    `;
    
    data.itens.forEach(item => {
        html += `
            <div class="produto-item">
                <img src="/Tweeb-2025/PI/public/assets/img/${item.imagem_produto}" alt="${item.nome_produto}">
                <div class="produto-info">
                    <h4>${item.nome_produto}</h4>
                    <p>${item.marca_modelo}</p>
                    <p>Quantidade: ${item.quantidade}</p>
                    <p>Preço: R$ ${parseFloat(item.preco_unitario).toFixed(2).replace('.', ',')}</p>
                </div>
                <div class="produto-subtotal">
                    R$ ${parseFloat(item.subtotal).toFixed(2).replace('.', ',')}
                </div>
            </div>
        `;
    });
    
    html += `
            </div>
        </div>
        
        <div class="modal-section">
            <h3>Histórico do Pedido</h3>
            <div class="historico">
    `;
    
    data.historico.forEach(hist => {
        html += `
            <div class="historico-item">
                <div class="historico-data">
                    ${new Date(hist.data_mudanca).toLocaleDateString('pt-BR')} ${new Date(hist.data_mudanca).toLocaleTimeString('pt-BR')}
                </div>
                <div class="historico-status">
                    ${hist.status_novo}
                </div>
                ${hist.observacao ? `<div class="historico-obs">${hist.observacao}</div>` : ''}
            </div>
        `;
    });
    
    html += `
            </div>
        </div>
    `;
    
    content.innerHTML = html;
    modal.style.display = 'block';
}

function cancelarPedido(idPedido) {
    if (!confirm('Tem certeza que deseja cancelar este pedido?')) {
        return;
    }
    
    const motivo = prompt('Motivo do cancelamento (opcional):');
    
    fetch('/Tweeb-2025/PI/App/user/Controllers/PedidoController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=cancelar_pedido&id_pedido=${idPedido}&motivo=${encodeURIComponent(motivo || '')}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Pedido cancelado com sucesso');
            location.reload();
        } else {
            alert('Erro ao cancelar pedido: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao cancelar pedido');
    });
}

function rastrearPedido(codigoRastreio) {
    // Abrir em nova aba o site de rastreamento (exemplo com Correios)
    window.open(`https://rastreamento.correios.com.br/app/index.php?objeto=${codigoRastreio}`, '_blank');
}

// Fechar modal
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('modal-detalhes').style.display = 'none';
});

window.addEventListener('click', function(event) {
    const modal = document.getElementById('modal-detalhes');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
</script>
</body>
</html> 