<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}

// Verificar se há itens no carrinho
require_once __DIR__ . '/../../Models/Carrinho.php';
require_once __DIR__ . '/../../Models/Pedido.php';

$id_usuario = $_SESSION['usuario']['id'];
$itens_carrinho = Carrinho::obterCarrinho($id_usuario);

if (empty($itens_carrinho)) {
    // Se o carrinho estiver vazio, redirecionar para a página de produtos
    header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
    exit();
}

// Verificar se há endereço selecionado
if (!isset($_SESSION['endereco_selecionado'])) {
    header('Location: escolha-endereco.php');
    exit();
}

$endereco_selecionado = $_SESSION['endereco_selecionado'];
$configuracoes_frete = Pedido::obterConfiguracoesFrete();
$valor_subtotal = Carrinho::calcularTotal($id_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Envio - Tweeb</title>
    <link rel="stylesheet" href="../../../../public/css/metodo-envio.CSS">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>

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
        <span class="" id="step-ativo">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="">
            <i class="fa-solid fa-credit-card"></i>
            <div class="span-information">
                <p id="step-passo">Passo 3</p>
                <p>Pagamento</p>
            </div>
        </span>
    </div>

    <div class="enderecos">
        <h1 class="metodoh1">Método de Envio</h1>
        
        <div class="resumo-pedido">
            <h3>Resumo do Pedido</h3>
            <p><strong>Endereço:</strong> <?php echo $endereco_selecionado['endereco_completo']; ?></p>
            <p><strong>Subtotal:</strong> R$ <?php echo number_format($valor_subtotal, 2, ',', '.'); ?></p>
        </div>
        
        <div id="opcoes-envio">
            <?php foreach ($configuracoes_frete as $index => $frete): ?>
                <div class="endereco-card">
                    <label class="envio-descricao">
                        <input type="radio" id="envio<?php echo $index; ?>" name="envio" value="<?php echo $frete['nome_servico']; ?>" 
                               data-valor="<?php echo $frete['valor_frete']; ?>" data-prazo="<?php echo $frete['prazo_entrega_dias']; ?>"
                               <?php echo $index === 0 ? 'checked' : ''; ?>>
                        <label class="endereco-label" for="envio<?php echo $index; ?>">
                            <?php echo $frete['valor_frete'] > 0 ? 'R$ ' . number_format($frete['valor_frete'], 2, ',', '.') : 'Grátis'; ?>
                        </label>
                        <div class="endereco-details">
                            <p><?php echo $frete['descricao']; ?></p>
                        </div>
                    </label>
                    <div class="endereco-actions">
                        <p><?php echo date('d/m/Y', strtotime('+' . $frete['prazo_entrega_dias'] . ' days')); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Opção de envio agendado -->
        <div class="endereco-card" id="envio-agendado" style="display: none;">
            <label class="envio-descricao">
                <input type="radio" id="envio_agendado" name="envio" value="Envio Agendado" data-valor="5.00" data-prazo="10">
                <label class="endereco-label" for="envio_agendado">R$ 5,00</label>
                <div class="endereco-details">
                    <p>Entrega em data específica</p>
                </div>
            </label>
            <div class="endereco-actions">
                <form>
                    <select name="data_agendada" id="selecionar-data">
                        <option value="">Selecionar data</option>
                        <?php 
                        for ($i = 1; $i <= 30; $i++) {
                            $data = date('d/m', strtotime('+' . $i . ' days'));
                            echo "<option value=\"$data\">$data</option>";
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="resumo-total">
        <div class="total-item">
            <span>Subtotal:</span>
            <span>R$ <?php echo number_format($valor_subtotal, 2, ',', '.'); ?></span>
        </div>
        <div class="total-item">
            <span>Frete:</span>
            <span id="valor-frete">Grátis</span>
        </div>
        <div class="total-item total-final">
            <span>Total:</span>
            <span id="valor-total">R$ <?php echo number_format($valor_subtotal, 2, ',', '.'); ?></span>
        </div>
    </div>

    <div class="endereco-botoes">
        <a href="escolha-endereco.php">
            <button class="botao-sair">Voltar</button>
        </a>
        <button class="botao-avancar" id="btn-avancar">Avançar</button>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<script>
let metodoEnvioSelecionado = 'Envio Comum';
let valorFrete = 0.00;
let valorSubtotal = <?php echo $valor_subtotal; ?>;
let dataAgendada = '';

// Atualizar valores quando método de envio for selecionado
document.addEventListener('change', function(e) {
    if (e.target.name === 'envio') {
        metodoEnvioSelecionado = e.target.value;
        valorFrete = parseFloat(e.target.dataset.valor) || 0.00;
        
        // Mostrar/ocultar opção de data agendada
        if (metodoEnvioSelecionado === 'Envio Agendado') {
            document.getElementById('envio-agendado').style.display = 'block';
        } else {
            document.getElementById('envio-agendado').style.display = 'none';
        }
        
        atualizarValores();
    }
});

// Atualizar data agendada
document.getElementById('selecionar-data').addEventListener('change', function(e) {
    dataAgendada = e.target.value;
});

function atualizarValores() {
    const valorFreteElement = document.getElementById('valor-frete');
    const valorTotalElement = document.getElementById('valor-total');
    
    if (valorFrete > 0) {
        valorFreteElement.textContent = `R$ ${valorFrete.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
    } else {
        valorFreteElement.textContent = 'Grátis';
    }
    
    const valorTotal = valorSubtotal + valorFrete;
    valorTotalElement.textContent = `R$ ${valorTotal.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
}

// Avançar para pagamento
document.getElementById('btn-avancar').addEventListener('click', function() {
    if (!metodoEnvioSelecionado) {
        alert('Selecione um método de envio para continuar');
        return;
    }
    
    if (metodoEnvioSelecionado === 'Envio Agendado' && !dataAgendada) {
        alert('Selecione uma data para entrega agendada');
        return;
    }
    
    // Salvar dados do envio na sessão
    const dadosEnvio = {
        metodo: metodoEnvioSelecionado,
        valor: valorFrete,
        data_agendada: dataAgendada
    };
    
    // Enviar dados para o servidor
    fetch('/Tweeb-2025/PI/App/user/Controllers/PedidoController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=salvar_envio&' + new URLSearchParams(dadosEnvio)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'pagamento-pix.php';
        } else {
            alert('Erro ao salvar dados de envio: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao processar dados de envio');
    });
});

// Inicializar valores
atualizarValores();
</script>
</body>
</html>