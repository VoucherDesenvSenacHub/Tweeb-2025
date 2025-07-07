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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreio</title>
</head>
<body class="body-rastreio">
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

    <div class="container-rastreio" id="container-pedidos-rastreio">
        <!-- Os pedidos serão carregados dinamicamente aqui -->
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/Tweeb-2025/PI/App/user/Controllers/PedidoController.php?action=obter_pedidos')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const pedidos = data.pedidos.filter(p => p.status_pedido !== 'cancelado');
                    renderizarPedidosRastreio(pedidos);
                } else {
                    document.getElementById('container-pedidos-rastreio').innerHTML = '<p>Erro ao carregar pedidos.</p>';
                }
            });
    });

    function renderizarPedidosRastreio(pedidos) {
        const container = document.getElementById('container-pedidos-rastreio');
        if (!pedidos.length) {
            container.innerHTML = '<p>Você não possui pedidos em andamento.</p>';
            return;
        }
        container.innerHTML = '';
        pedidos.forEach(pedido => {
            let etapas = [
                {nome: 'Pagamento', icone: 'fa-credit-card'},
                {nome: 'Enviado', icone: 'fa-box'},
                {nome: 'A Caminho', icone: 'fa-truck'},
                {nome: 'Entregue', icone: 'fa-check-circle'}
            ];
            let etapaAtiva = 0;
            if (pedido.status_pedido === 'pago') etapaAtiva = 1;
            if (pedido.status_pedido === 'enviado') etapaAtiva = 2;
            if (pedido.status_pedido === 'entregue') etapaAtiva = 3;
            
            container.innerHTML += `
            <div class="pedido-rastreio" data-id="${pedido.id_pedido}">
                <div class="header-rastreio">
                    <p class="id-rastreio">Ordem ID: ${pedido.id_pedido}</p>
                    <div class="rastreio-botoes">
                        <button class="rastreio-icone2">
                            <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone">
                        </button>
                        <button class="rastreio-botao toggle-detalhes">Acompanhar Pedido  <i class="fa-solid fa-location-dot"></i></button>
                    </div>
                </div>
                <div class="rastreio-detalhes" style="display:none;">
                    <div class="rastreio-info-entrega">
                        <p class="data-rastreio">Data: ${pedido.data_pedido ? new Date(pedido.data_pedido).toLocaleDateString() : ''}</p>
                        <img src="../../../../public/assets/img/truck-tick.png" alt="Ícone Caminhão" class="rastreio-truck">
                        <p class="entrega-prevista-rastreio verde">Entrega prevista: ${pedido.data_entrega_estimada ? new Date(pedido.data_entrega_estimada).toLocaleDateString() : ''}</p>
                    </div>
                    <div class="rastreio-status">
                        ${etapas.map((etapa, idx) => `
                            <div class="rastreio-etapa${idx <= etapaAtiva ? ' ativo' : ''}">
                                <p class="rastreio-status-texto">${etapa.nome}</p>
                                <i class="fas ${etapa.icone} rastreio-icone"></i>
                                <p class="rastreio-data"></p>
                                <div class="line"></div>
                            </div>
                        `).join('')}
                    </div>
                    <div class="rastreio-itens-pedido"></div>
                    <div class="rastreio-pagamento-entrega">
                        <div class="rastreio-pagamento-entrega-flex">
                            <div class="rastreio-pagamento">
                                <h3>Pagamento</h3>
                                <p class="rastreio-metodo-pagamento">${pedido.metodo_pagamento}</p>
                            </div>
                            <div class="rastreio-entrega">
                                <h3>Entrega</h3>
                                <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                                <p class="rastreio-endereco">${pedido.nome_endereco}</p>
                                <p class="rastreio-bairro-cidade">${pedido.cidade} - ${pedido.estado}</p>
                            </div>
                        </div>
                    </div>
                    <div class="rastreio-resumo">
                        <p>Subtotal <span>R$ ${Number(pedido.valor_total).toLocaleString('pt-BR', {minimumFractionDigits:2})}</span></p>
                        <p>Frete <span>R$ ${Number(pedido.valor_frete).toLocaleString('pt-BR', {minimumFractionDigits:2})}</span></p>
                        <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ ${Number(pedido.valor_total).toLocaleString('pt-BR', {minimumFractionDigits:2})}</strong></span></p>
                    </div>
                </div>
            </div>
            `;
        });
        // Adiciona evento de toggle para cada botão
        document.querySelectorAll('.toggle-detalhes').forEach(btn => {
            btn.addEventListener('click', function() {
                const pedidoDiv = btn.closest('.pedido-rastreio');
                const detalhes = pedidoDiv.querySelector('.rastreio-detalhes');
                if (detalhes.style.display === 'none') {
                    // Fecha todos os outros detalhes
                    document.querySelectorAll('.rastreio-detalhes').forEach(d => d.style.display = 'none');
                    detalhes.style.display = 'block';
                    // Carrega os itens do pedido dinamicamente
                    const idPedido = pedidoDiv.getAttribute('data-id');
                    const itensDiv = detalhes.querySelector('.rastreio-itens-pedido');
                    fetch(`/Tweeb-2025/PI/App/user/Controllers/PedidoController.php?action=obter_pedido&id_pedido=${idPedido}`)
                        .then(resp => resp.json())
                        .then(data => {
                            if (data.success && data.itens.length) {
                                itensDiv.innerHTML = data.itens.map(item => `
                                    <div class='rastreio-item'>
                                        <img src='../../../../public/assets/img/${item.imagem_produto}' alt='${item.nome_produto}' class='rastreio-img'>
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
                                itensDiv.innerHTML = '<p>Nenhum item encontrado.</p>';
                            }
                        });
                } else {
                    detalhes.style.display = 'none';
                }
            });
        });
    }
    </script>

    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
