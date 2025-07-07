<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
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
</head>
<body class="body-pcancelados">

<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
    <div class="container-pcancelados" id="container-pedidos-cancelados">
        <!-- Os pedidos cancelados serão carregados dinamicamente aqui -->
    </div>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('/Tweeb-2025/PI/App/user/Controllers/PedidoController.php?action=obter_pedidos')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const pedidos = data.pedidos.filter(p => p.status_pedido === 'cancelado');
                renderizarPedidosCancelados(pedidos);
            } else {
                document.getElementById('container-pedidos-cancelados').innerHTML = '<p>Erro ao carregar pedidos cancelados.</p>';
            }
        });
});

function renderizarPedidosCancelados(pedidos) {
    const container = document.getElementById('container-pedidos-cancelados');
    if (!pedidos.length) {
        container.innerHTML = '<p>Você não possui pedidos cancelados.</p>';
        return;
    }
    container.innerHTML = '';
    pedidos.forEach(pedido => {
        container.innerHTML += `
        <div class="pedido-pcancelados" data-id="${pedido.id_pedido}">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/pedido-enviado1.png" alt="Produto" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Pedido #${pedido.id_pedido}</p>
                    <p class="codigo-produto-pcancelados">${pedido.data_pedido ? new Date(pedido.data_pedido).toLocaleDateString() : ''}</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>
            <div class="detalhes-pcancelados" style="display: none;"></div>
            <p class="data-cancelamento-pcancelados">Pedido Cancelado</p>
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        `;
    });
    // Adiciona evento de toggle para cada botão
    document.querySelectorAll('.toggle-pcancelados').forEach(btn => {
        btn.addEventListener('click', function() {
            const pedidoDiv = btn.closest('.pedido-pcancelados');
            const detalhes = pedidoDiv.querySelector('.detalhes-pcancelados');
            if (detalhes.style.display === 'none' || detalhes.style.display === '') {
                // Fecha todos os outros detalhes
                document.querySelectorAll('.detalhes-pcancelados').forEach(d => d.style.display = 'none');
                detalhes.style.display = 'block';
                // Carrega os itens do pedido dinamicamente
                const idPedido = pedidoDiv.getAttribute('data-id');
                fetch(`/Tweeb-2025/PI/App/user/Controllers/PedidoController.php?action=obter_pedido&id_pedido=${idPedido}`)
                    .then(resp => resp.json())
                    .then(data => {
                        if (data.success && data.itens.length) {
                            detalhes.innerHTML = data.itens.map(item => `
                                <div class='rastreio-item'>
                                    <img src='../../../../public/assets/img/${item.imagem_produto}' alt='${item.nome_produto}' class='imagem-pcancelados'>
                                    <div class='rastreio-info-preco'>
                                        <div class='rastreio-info'>
                                            <p class='rastreio-nome'>${item.nome_produto}</p>
                                            <p class='rastreio-detalhes'>${item.marca_modelo || ''}</p>
                                        </div>
                                        <div class='rastreio-preco'>
                                            <h3 class='rastreio-valor'><strong>R$ ${(item.subtotal).toLocaleString('pt-BR', {minimumFractionDigits:2})}</strong></h3>
                                            <h3 class='rastreio-quantidade'>Quantidade: ${item.quantidade}</h3>
                                        </div>
                                    </div>
                                </div>
                            `).join('');
                        } else {
                            detalhes.innerHTML = '<p>Nenhum item encontrado.</p>';
                        }
                    });
            } else {
                detalhes.style.display = 'none';
            }
        });
    });
}
</script>
</body>
</html>
