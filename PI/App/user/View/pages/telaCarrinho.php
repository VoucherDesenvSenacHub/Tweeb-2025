<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../../Models/Carrinho.php';

$id_usuario = $_SESSION['usuario']['id'];
$itens_carrinho = Carrinho::obterCarrinho($id_usuario);
$total_carrinho = Carrinho::calcularTotal($id_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/Tweeb-2025/PI/public/css/Carrinho.css">
  <title>Carrinho</title>
</head>
<body class="Carrinho">
  <?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
  <?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>
  <div class="container">
    <div class="cart-items">
      <h1>Carrinho de compras</h1>
      <?php if (empty($itens_carrinho)): ?>
        <div class="carrinho-vazio">
          <p>Seu carrinho está vazio</p>
          <a href="/Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php" class="btn-continuar-comprando">Continuar comprando</a>
        </div>
      <?php else: ?>
        <?php foreach ($itens_carrinho as $item): ?>
          <div class="item" data-produto-id="<?= $item['id_produto'] ?>">
            <img src="../../../../public/assets/img/<?= htmlspecialchars($item['imagem_produto']) ?>" alt="<?= htmlspecialchars($item['nome_produto']) ?>">
            <div class="detalhe">
              <p><?= htmlspecialchars($item['nome_produto']) ?><br><span><?= htmlspecialchars($item['marca_modelo']) ?></span></p>
              <p class="code">#<?= $item['id_produto'] ?></p>
            </div>
            <div class="quantidade">
              <span class="minus" onclick="alterarQuantidade(<?= $item['id_produto'] ?>, -1)"><i class="bi bi-dash-lg"></i></span>
              <span class="number"><?= $item['quantidade'] ?></span>
              <span class="plus" onclick="alterarQuantidade(<?= $item['id_produto'] ?>, 1)"><i class="bi bi-plus-lg"></i></span>
            </div>
            
            <p class="preco" data-preco-unitario="<?= $item['preco_unitario'] ?>">R$ <?= number_format($item['preco_unitario'], 2, ',', '.') ?></p>
            <button class="remover" onclick="removerProduto(<?= $item['id_produto'] ?>)"> <i class="bi bi-x-lg"></i></button>
          </div>
        <?php endforeach; ?>
        <button class="continuar"><a href="/Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php">Continuar comprando</a></button>
      <?php endif; ?>
    </div>
    <div class="revisao-itens">
      <div class="cod-promo">
        <label for="codigo">Código de desconto / Código promocional</label>
        <div class="input-group">
          <input type="text" id="codigo" placeholder="Digite o código">
          <button class="aplicar-btn">Aplicar</button>
        </div>
      </div>
     
      <div class="resumo-pedido">
        <div class="line1">
          <span>Subtotal</span>
          <span id="subtotal-valor">R$ <?= number_format($total_carrinho, 2, ',', '.') ?></span>
        </div>
        <div class="line-carrinho">
          <span>Imposto estimado</span>
          <span id="imposto-valor">R$ <?= number_format($total_carrinho * 0.05, 2, ',', '.') ?></span>
        </div>
        <div class="line-carrinho">
          <span>Frete</span>
          <span>Grátis</span>
        </div>
        <div class="line-carrinho">
          <span>Cupons</span>
          <span>R$0,00</span>
        </div>
        <div class="line1">
          <span>Total</span>
          <span id="total-valor">R$ <?= number_format($total_carrinho * 1.05, 2, ',', '.') ?></span>
        </div>
      </div>

      <button class="desconto" <?= empty($itens_carrinho) ? 'disabled' : '' ?>><a href="escolha-endereco.php">Continuar </a></button>
    </div>
  </div>
  <?php include __DIR__.'/../../../../includes/footer.php'; ?> 
  
  <script>
  // Função para alterar quantidade
  function alterarQuantidade(idProduto, delta) {
    const itemElement = document.querySelector(`[data-produto-id="${idProduto}"]`);
    const quantidadeElement = itemElement.querySelector('.number');
    const precoElement = itemElement.querySelector('.preco');
    const quantidadeAtual = parseInt(quantidadeElement.textContent);
    const novaQuantidade = quantidadeAtual + delta;
    
    if (novaQuantidade <= 0) {
      removerProduto(idProduto);
      return;
    }
    
    fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'action=atualizar_quantidade&id_produto=' + idProduto + '&quantidade=' + novaQuantidade
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        quantidadeElement.textContent = novaQuantidade;
        
        // O preço unitário não deve alterar, apenas a quantidade
        // O preço mostrado é sempre o preço unitário
        
        atualizarTotal();
      } else {
        alert('Erro ao atualizar quantidade: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Erro:', error);
      alert('Erro ao atualizar quantidade');
    });
  }
  
  // Função para remover produto
  function removerProduto(idProduto) {
    if (!confirm('Tem certeza que deseja remover este produto do carrinho?')) {
      return;
    }
    
    fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'action=remover&id_produto=' + idProduto
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const itemElement = document.querySelector(`[data-produto-id="${idProduto}"]`);
        itemElement.remove();
        
        // Verificar se o carrinho ficou vazio
        const itens = document.querySelectorAll('.item');
        if (itens.length === 0) {
          location.reload(); // Recarregar para mostrar mensagem de carrinho vazio
        } else {
          // Se ainda há itens, atualizar o total
          atualizarTotal();
        }
      } else {
        alert('Erro ao remover produto: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Erro:', error);
      alert('Erro ao remover produto');
    });
  }
  
  // Função para atualizar total
  function atualizarTotal() {
    fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php?action=obter_carrinho')
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const subtotal = data.total;
        const imposto = subtotal * 0.05;
        const total = subtotal + imposto;
        
        // Atualizar valores usando IDs específicos
        const subtotalElement = document.getElementById('subtotal-valor');
        const impostoElement = document.getElementById('imposto-valor');
        const totalElement = document.getElementById('total-valor');
        
        if (subtotalElement) {
          subtotalElement.textContent = 'R$ ' + subtotal.toFixed(2).replace('.', ',');
        }
        if (impostoElement) {
          impostoElement.textContent = 'R$ ' + imposto.toFixed(2).replace('.', ',');
        }
        if (totalElement) {
          totalElement.textContent = 'R$ ' + total.toFixed(2).replace('.', ',');
        }
        
        // Atualizar contador na navbar
        atualizarContadorCarrinho();
      }
    })
    .catch(error => {
      console.error('Erro ao atualizar total:', error);
    });
  }
  
  // Função para atualizar contador do carrinho na navbar
  function atualizarContadorCarrinho() {
    fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php?action=contar_itens')
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const contador = document.querySelector('.carrinho-contador');
        if (contador) {
          contador.textContent = data.contagem;
          contador.style.display = data.contagem > 0 ? 'flex' : 'none';
        }
      }
    })
    .catch(error => {
      console.error('Erro ao atualizar contador:', error);
    });
  }
  
  // Carregar contador do carrinho quando a página carregar
  document.addEventListener('DOMContentLoaded', function() {
    atualizarContadorCarrinho();
  });
  </script>
</body>
</html> 