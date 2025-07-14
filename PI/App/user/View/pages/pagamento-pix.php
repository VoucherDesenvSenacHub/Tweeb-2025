<?php
// pagamento-pix.php
// Página de pagamento PIX (Front-end).

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}

// Inclui o Controller para obter os dados necessários
include_once __DIR__ . '/../../Controllers/PagamentoPixController.php';

$id_usuario = $_SESSION['usuario']['id'];
$pagamentoPixController = new PagamentoPixController($id_usuario);

try {
    $dados_pagina = $pagamentoPixController->prepararDadosPagina();

    $itens_carrinho = $dados_pagina['itens_carrinho'];
    $dados_envio = $dados_pagina['dados_envio'];
    $endereco_selecionado = $dados_pagina['endereco_selecionado'];
    $valor_subtotal = $dados_pagina['valor_subtotal'];
    $valor_frete = $dados_pagina['valor_frete'];
    $valor_total = $dados_pagina['valor_total'];
    $numero_pedido = $dados_pagina['numero_pedido'];

} catch (Exception $e) {
    // Em caso de erro, exibe uma mensagem e redireciona ou lida de forma apropriada
    error_log("Erro ao carregar dados da página de pagamento PIX: " . $e->getMessage());
    // Você pode exibir uma mensagem de erro amigável ao usuário aqui
    // ou redirecionar para uma página de erro.
    die("Erro ao carregar a página de pagamento: " . htmlspecialchars($e->getMessage()));
}

// Função auxiliar para formatar valores monetários
function formatarMoeda($valor) {
    return number_format($valor, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento PIX - Tweeb</title>
    <!-- Inclui o CSS principal da página -->
    <link rel="stylesheet" href="../../../../public/css/pagamento-pix.css">
    <link rel="stylesheet" href="../../../../public/css/modal-cancelar-pedido.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <!-- Inclui ícones Boxicons e Font Awesome -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div class="container">
    <div class="step-indicator">
        <span class="">
            <i class="fa-solid fa-magnifying-glass-location"></i>
            <div class="span-information">
                <p id="step-passo">Passo 1</p>
                <p>Endereço</p>
            </div>
        </span>
        
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="Linha pontilhada">
        <span class="">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="Linha pontilhada">
        <span class="" id="step-ativo">
            <i class="fa-solid fa-credit-card"></i>
            <div class="span-information">
                <p id="step-passo">Passo 3</p>
                <p>Pagamento</p>
            </div>
        </span>
    </div>

    <div class="pix-pago-container">
        <div class="pix-pago-resumo">
            <h2 class="pix-pago-titulo">Resumo da Compra</h2>
            
            <?php foreach ($itens_carrinho as $item): ?>
            <div class="pix-pago-item">
                <img src="../../../../public/assets/img/<?php echo htmlspecialchars($item['imagem_produto']); ?>" alt="<?php echo htmlspecialchars($item['nome_produto']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/50x50/cccccc/333333?text=Produto';">
                <span class="nome-produto-pix"><?php echo strtoupper(htmlspecialchars($item['nome_produto'])); ?></span>
                <span>R$ <?php echo formatarMoeda($item['preco_unitario'] * $item['quantidade']); ?></span>
            </div>
            <?php endforeach; ?>
            
            <?php if ($endereco_selecionado): ?>
            <p class="pix-pago-endereco">
                Endereço: <?php echo htmlspecialchars($endereco_selecionado['endereco_completo'] ?? 'Endereço não disponível'); ?>
            </p>
            <?php endif; ?>
            
            <p class="pix-pago-envio">
                Método de envio: <?php echo htmlspecialchars($dados_envio['metodo']); ?>
                <?php if (!empty($dados_envio['data_agendada'])): ?>
                    - Data: <?php echo htmlspecialchars($dados_envio['data_agendada']); ?>
                <?php endif; ?>
            </p>
            
            <div class="pix-pago-total">
                <p class="pix-resumo-compra">Subtotal: R$ <?php echo formatarMoeda($valor_subtotal); ?></p>
                <p class="pix-resumo-compra">
                    Frete: <?php echo $valor_frete > 0 ? 'R$ ' . formatarMoeda($valor_frete) : 'Grátis'; ?>
                </p>
                <h3 class="pix-resumo-compra">Total: R$ <?php echo formatarMoeda($valor_total); ?></h3>
            </div>
        </div>
        
        <div class="pix-pago-pagamento">
            <h2 class="pix-pago-titulo">Pagamento via PIX</h2>
            <!-- Imagem de QR Code de placeholder padrão -->
            <img src="../../../../public/assets/img/qrcode.png" alt="QR Code Pix" class="pix-pago-qrcode" onerror="this.onerror=null;this.src='https://placehold.co/150x150/cccccc/333333?text=QR+Code';">
            <p class="pix-pago-fatura">Pedido #<?php echo htmlspecialchars($numero_pedido); ?></p>
            <!-- Exibe o valor total real da compra -->
            <p class="pix-pago-valor">Valor: R$ <?php echo formatarMoeda($valor_total); ?></p>
            
            <div class="pix-pago-instrucoes">
                <p><strong>Passo a passo para pagamento via Pix:</strong></p>
                <p>1. Abra o app do seu banco ou instituição financeira.</p>
                <p>2. Entre no ambiente Pix.</p>
                <p>3. Escolha a opção de QR Code e escaneie a imagem ao lado.</p>
                <p>4. Confirme as informações e finalize o pagamento.</p>
            </div>
            
            <button class="pix-pago-botao" id="btn-copiar-pix">COPIAR CHAVE PIX</button>
            
            <div class="pix-pago-status">
                <p id="status-pagamento">Aguardando pagamento...</p>
                <div class="loading-spinner" id="loading-spinner" style="display: none;">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
                <!-- O botão de confirmação manual foi removido daqui -->
            </div>
        </div>
    </div>

    <div class="endereco-botoes">
        <a href="metodo-envio.php">
            <button class="botao-sair">Voltar</button>
        </a>
        <!-- O botão de finalizar só aparece após a aprovação do pagamento (controlado via JS) -->
        <button class="botao-finalizar" id="btn-finalizar" style="display: none;">Finalizar Compra</button>
        <button class="botao-cancelar" id="btn-cancelar-pedido">Cancelar Pedido</button>
    </div>

    <!-- Modal de cancelamento exclusivo para pagamento-pix -->
    <div id="modal-cancelamento-pix" class="modal">
        <div class="modal-content">
            <h2>Cancelar Pedido</h2>
            <p>Tem certeza que deseja cancelar este pedido?<br>O estorno do pagamento será realizado automaticamente.</p>
            <div class="modal-buttons">
                <button id="confirmar-cancelamento-pix" class="btn-confirmar">Sim, cancelar</button>
                <button id="fechar-modal-cancelamento-pix" class="btn-cancelar">Não</button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>
<?php include __DIR__.'/../../../../includes/ModalCancelarPedido.php'; ?>

<!-- Inclui o arquivo JavaScript da página -->
<script src="../../../../public/js/pagamento-pix.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnCancelarPedido = document.getElementById('btn-cancelar-pedido');
    const modalCancelamento = document.getElementById('modal-cancelamento-pix');
    const btnConfirmarCancelamento = document.getElementById('confirmar-cancelamento-pix');
    const btnFecharModalCancelamento = document.getElementById('fechar-modal-cancelamento-pix');

    btnCancelarPedido.addEventListener('click', function() {
        modalCancelamento.classList.add('show');
    });
    btnFecharModalCancelamento.addEventListener('click', function() {
        modalCancelamento.classList.remove('show');
    });
    btnConfirmarCancelamento.addEventListener('click', function() {
        modalCancelamento.classList.remove('show');
        // Lógica AJAX de cancelamento com logs
        var idPedido = <?php echo json_encode($numero_pedido); ?>;
        console.log('ID do pedido para cancelar:', idPedido);
        fetch('../../Controllers/PedidoController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=cancelar_pedido&id_pedido=' + encodeURIComponent(idPedido)
        })
        .then(response => {a
            console.log('Resposta bruta:', response);
            return response.json();
        })
        .then(data => {
            console.log('Dados recebidos:', data);
            if (data.success) {
                alert('Pedido cancelado com sucesso!');
                window.location.href = 'Pedidos-cancelados.php';
            } else {
                alert('Erro ao cancelar pedido: ' + (data.message || 'Erro desconhecido'));
            }
        })
        .catch(error => {
            console.error('Erro no fetch:', error);
            alert('Erro ao cancelar pedido. Por favor, tente novamente mais tarde.');
        });
    });
});
</script>
</body>
</html>
