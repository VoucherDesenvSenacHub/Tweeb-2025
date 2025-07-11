<?php
// metodo-envio.php
// Página de seleção de método de envio (Front-end).

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}

// Inclui o Controller para obter os dados necessários
include_once __DIR__ . '/../../Controllers/MetodoEnvioController.php';

$id_usuario = $_SESSION['usuario']['id'];
$metodoEnvioController = new MetodoEnvioController($id_usuario);

try {
    $dados_pagina = $metodoEnvioController->prepararDadosPagina($id_usuario);

    $itens_carrinho = $dados_pagina['itens_carrinho'];
    $endereco_selecionado = $dados_pagina['endereco_selecionado'];
    $configuracoes_frete = $dados_pagina['configuracoes_frete'];
    $valor_subtotal = $dados_pagina['valor_subtotal'];

} catch (Exception $e) {
    // Em caso de erro, exibe uma mensagem e redireciona ou lida de forma apropriada
    error_log("Erro ao carregar dados da página de método de envio: " . $e->getMessage());
    // Você pode exibir uma mensagem de erro amigável ao usuário aqui
    // ou redirecionar para uma página de erro.
    die("Erro ao carregar a página de envio: " . htmlspecialchars($e->getMessage()));
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
    <title>Método de Envio - Tweeb</title>
    <!-- Inclui o CSS principal da página -->
    <link rel="stylesheet" href="../../../../public/css/metodo-envio.CSS">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <!-- Inclui ícones Boxicons e Font Awesome -->
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
        
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="Linha pontilhada">
        <span class="" id="step-ativo">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="Linha pontilhada">
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
            <p><strong>Endereço:</strong> <?php echo htmlspecialchars($endereco_selecionado['endereco_completo'] ?? 'Endereço não selecionado'); ?></p>
            <p><strong>Subtotal:</strong> R$ <span id="valor-subtotal-php" data-value="<?php echo $valor_subtotal; ?>"><?php echo formatarMoeda($valor_subtotal); ?></span></p>
        </div>
        
        <div id="opcoes-envio">
            <?php foreach ($configuracoes_frete as $index => $frete): ?>
                <div class="endereco-card">
                    <label class="envio-descricao">
                        <input type="radio" id="envio<?php echo $index; ?>" name="envio" value="<?php echo htmlspecialchars($frete['nome_servico']); ?>" 
                               data-valor="<?php echo htmlspecialchars($frete['valor_frete']); ?>" data-prazo="<?php echo htmlspecialchars($frete['prazo_entrega_dias']); ?>"
                               <?php echo $index === 0 ? 'checked' : ''; ?>>
                        <label class="endereco-label" for="envio<?php echo $index; ?>">
                            <?php echo $frete['valor_frete'] > 0 ? 'R$ ' . formatarMoeda($frete['valor_frete']) : 'Grátis'; ?>
                        </label>
                        <div class="endereco-details">
                            <p><?php echo htmlspecialchars($frete['descricao']); ?></p>
                        </div>
                    </label>
                    <div class="endereco-actions">
                        <p>Entrega em até <?php echo htmlspecialchars($frete['prazo_entrega_dias']); ?> dias úteis</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Opção de envio agendado (inicialmente oculta) -->
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
                        // Gera opções de data para os próximos 30 dias
                        for ($i = 1; $i <= 30; $i++) {
                            $data_futura = date('d/m/Y', strtotime('+' . $i . ' days'));
                            echo "<option value=\"" . htmlspecialchars($data_futura) . "\">" . htmlspecialchars($data_futura) . "</option>";
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
            <span>R$ <?php echo formatarMoeda($valor_subtotal); ?></span>
        </div>
        <div class="total-item">
            <span>Frete:</span>
            <span id="valor-frete">Grátis</span>
        </div>
        <div class="total-item total-final">
            <span>Total:</span>
            <span id="valor-total">R$ <?php echo formatarMoeda($valor_subtotal); ?></span>
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

<!-- Inclui o arquivo JavaScript da página -->
<script src="../../../../public/js/metodo-envio.js"></script>
</body>
</html>
