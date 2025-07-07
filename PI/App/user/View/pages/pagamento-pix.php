<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}

// Verificar se há dados de envio
if (!isset($_SESSION['dados_envio'])) {
    header('Location: escolha-endereco.php');
    exit();
}

require_once __DIR__ . '/../../Models/Carrinho.php';
require_once __DIR__ . '/../../Models/Pedido.php';

$id_usuario = $_SESSION['usuario']['id'];
$itens_carrinho = Carrinho::obterCarrinho($id_usuario);
$dados_envio = $_SESSION['dados_envio'];
$endereco_selecionado = $_SESSION['endereco_selecionado'] ?? null;

if (empty($itens_carrinho)) {
    header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
    exit();
}

$valor_subtotal = Carrinho::calcularTotal($id_usuario);
$valor_frete = $dados_envio['valor'];
$valor_total = $valor_subtotal + $valor_frete;

// Gerar número do pedido
$numero_pedido = 'PED' . date('Ymd') . rand(1000, 9999);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento PIX - Tweeb</title>
    <link rel="stylesheet" href="../../../../public/css/pagamento-pix.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
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
        
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="" id="">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
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
                <img src="../../../../public/assets/img/<?php echo $item['imagem_produto']; ?>" alt="<?php echo $item['nome_produto']; ?>">
                <span class="nome-produto-pix"><?php echo strtoupper($item['nome_produto']); ?></span>
                <span>R$ <?php echo number_format($item['preco_unitario'] * $item['quantidade'], 2, ',', '.'); ?></span>
            </div>
            <?php endforeach; ?>
            
            <?php if ($endereco_selecionado): ?>
            <p class="pix-pago-endereco">
                Endereço: <?php echo $endereco_selecionado['endereco_completo']; ?>
            </p>
            <?php endif; ?>
            
            <p class="pix-pago-envio">
                Método de envio: <?php echo $dados_envio['metodo']; ?>
                <?php if ($dados_envio['data_agendada']): ?>
                    - Data: <?php echo $dados_envio['data_agendada']; ?>
                <?php endif; ?>
            </p>
            
            <div class="pix-pago-total">
                <p class="pix-resumo-compra">Subtotal: R$ <?php echo number_format($valor_subtotal, 2, ',', '.'); ?></p>
                <p class="pix-resumo-compra">
                    Frete: <?php echo $valor_frete > 0 ? 'R$ ' . number_format($valor_frete, 2, ',', '.') : 'Grátis'; ?>
                </p>
                <h3 class="pix-resumo-compra">Total: R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></h3>
            </div>
        </div>
        
        <div class="pix-pago-pagamento">
            <h2 class="pix-pago-titulo">Pagamento via PIX</h2>
            <img src="../../../../public/assets/img/qrcode.png" alt="QR Code Pix" class="pix-pago-qrcode">
            <p class="pix-pago-fatura">Pedido #<?php echo $numero_pedido; ?></p>
            <p class="pix-pago-valor">Valor: R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></p>
            
            <div class="pix-pago-instrucoes">
                <p><strong>Passo a passo para pagamento via Pix:</strong></p>
                <p>1. Abra o app do seu banco ou instituição financeira.</p>
                <p>2. Entre no ambiente Pix.</p>
                <p>3. Escolha a opção de QR Code e escaneie a imagem ao lado.</p>
                <p>4. Confirme as informações e finalize o pagamento.</p>
            </div>
            
            <button class="pix-pago-botao" onclick="copiarChavePix()">COPIAR CHAVE PIX</button>
            
            <div class="pix-pago-status">
                <p id="status-pagamento">Aguardando pagamento...</p>
                <div class="loading-spinner" id="loading-spinner" style="display: none;">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="endereco-botoes">
        <a href="metodo-envio.php">
            <button class="botao-sair">Voltar</button>
        </a>
        <button class="botao-finalizar" id="btn-finalizar" style="display: none;">Finalizar Compra</button>
        <button class="botao-cancelar" id="btn-cancelar-pedido" style="background:#d9534f;color:#fff;margin-left:10px;">Cancelar Pedido</button>
    </div>

    <!-- Modal de cancelamento -->
    <div id="modal-cancelamento" class="modal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
        <div style="background:#fff;padding:30px 40px;border-radius:8px;max-width:400px;text-align:center;">
            <h2>Cancelar Pedido</h2>
            <p>Tem certeza que deseja cancelar este pedido?<br>O estorno do pagamento será realizado automaticamente.</p>
            <button id="confirmar-cancelamento" style="background:#d9534f;color:#fff;padding:10px 20px;border:none;border-radius:4px;margin:10px 5px;">Sim, cancelar</button>
            <button id="fechar-modal-cancelamento" style="background:#ccc;padding:10px 20px;border:none;border-radius:4px;margin:10px 5px;">Não</button>
        </div>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<script>
let pedidoCriado = false;
let pagamentoVerificado = false;

// Criar pedido quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    criarPedido();
});

function criarPedido() {
    fetch('/Tweeb-2025/PI/App/user/Controllers/PedidoController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=criar_pedido'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            pedidoCriado = true;
            console.log('Pedido criado:', data.id_pedido);
            // Iniciar verificação de pagamento
            iniciarVerificacaoPagamento();
        } else {
            alert('Erro ao criar pedido: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao criar pedido');
    });
}

function iniciarVerificacaoPagamento() {
    // Simular verificação de pagamento (em produção, isso seria integrado com a API do banco)
    setTimeout(() => {
        verificarPagamento();
    }, 5000); // Verificar após 5 segundos
}

function verificarPagamento() {
    if (!pedidoCriado) return;
    
    // Simular pagamento aprovado (em produção, verificar status real)
    const statusElement = document.getElementById('status-pagamento');
    const loadingElement = document.getElementById('loading-spinner');
    const btnFinalizar = document.getElementById('btn-finalizar');
    
    loadingElement.style.display = 'block';
    statusElement.textContent = 'Verificando pagamento...';
    
    setTimeout(() => {
        // Simular pagamento aprovado
        statusElement.textContent = 'Pagamento aprovado!';
        statusElement.style.color = '#28a745';
        loadingElement.style.display = 'none';
        btnFinalizar.style.display = 'block';
        pagamentoVerificado = true;
    }, 3000);
}

function copiarChavePix() {
    // Chave PIX fictícia para demonstração
    const chavePix = 'tweeb@empresa.com';
    
    navigator.clipboard.writeText(chavePix).then(function() {
        alert('Chave PIX copiada: ' + chavePix);
    }).catch(function(err) {
        console.error('Erro ao copiar chave PIX:', err);
        alert('Erro ao copiar chave PIX');
    });
}

// Finalizar compra
document.getElementById('btn-finalizar').addEventListener('click', function() {
    if (!pagamentoVerificado) {
        alert('Aguarde a confirmação do pagamento');
        return;
    }
    
    fetch('/Tweeb-2025/PI/App/user/Controllers/PedidoController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=finalizar_compra'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Compra finalizada com sucesso! Seu pedido foi confirmado.');
            window.location.href = 'confirmacao-compra.php?id_pedido=' + data.id_pedido;
        } else {
            alert('Erro ao finalizar compra: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao finalizar compra');
    });
});

// Verificação automática a cada 10 segundos
setInterval(() => {
    if (pedidoCriado && !pagamentoVerificado) {
        verificarPagamento();
    }
}, 10000);

// Botão cancelar pedido
const btnCancelarPedido = document.getElementById('btn-cancelar-pedido');
const modalCancelamento = document.getElementById('modal-cancelamento');
const btnConfirmarCancelamento = document.getElementById('confirmar-cancelamento');
const btnFecharModalCancelamento = document.getElementById('fechar-modal-cancelamento');

btnCancelarPedido.addEventListener('click', function() {
    modalCancelamento.style.display = 'flex';
});

btnFecharModalCancelamento.addEventListener('click', function() {
    modalCancelamento.style.display = 'none';
});

btnConfirmarCancelamento.addEventListener('click', function() {
    // Pega o id do pedido atual da sessão PHP via AJAX
    fetch('/Tweeb-2025/PI/App/user/Controllers/PedidoController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=cancelar_pedido'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Pedido cancelado com sucesso! O estorno será realizado automaticamente.');
            window.location.href = 'pedidos-cancelados.php';
        } else {
            alert('Erro ao cancelar pedido: ' + data.message);
        }
    })
    .catch(error => {
        alert('Erro ao cancelar pedido.');
    });
});
</script>
</body>
</html>