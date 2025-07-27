<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../../public/assets/img/tentativa2 (1).png">
    <title>Exemplo de Integração - Sistema de Favoritos</title>
    <link rel="stylesheet" href="../../../../public/css/favoritos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div class="container-favoritos-depto">
    <!-- Exemplo de card de produto com sistema de favoritos integrado -->
    <div class="produtos-card" data-produto-id="1">
        <!-- Coração de favorito - IMPORTANTE: adicionar data-produto-id -->
        <img class="heart" 
             src="../../../../public/assets/img/heart_disabled.png" 
             alt="coração" 
             data-produto-id="1"
             onclick="toggleFavorito(1, this)">
        
        <!-- Ícone de carrinho -->
        <img class="add-carrinho" 
             src="../../../../public/assets/img/carrinho-card.png" 
             alt="Adicionar ao carrinho" 
             onclick="adicionarAoCarrinho(1)">
        
        <!-- Imagem do produto -->
        <img class="image-produto" 
             src="../../../../public/assets/img/card-produto2.png" 
             alt="Produto Exemplo">
        
        <!-- Avaliações -->
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        
        <!-- Informações do produto -->
        <p>Produto Exemplo</p>
        <p>Marca Modelo</p>
        <h1>R$ 299,99</h1>
        
        <!-- Botão de compra -->
        <button class="card-botao" onclick="adicionarAoCarrinho(1)">Adicionar ao Carrinho</button>
        
        <!-- Badges opcionais -->
        <span class="frete-gratis">Frete Grátis</span>
        <span class="garantia">Garantia</span>
    </div>

    <!-- Segundo exemplo -->
    <div class="produtos-card" data-produto-id="2">
        <img class="heart" 
             src="../../../../public/assets/img/heart_disabled.png" 
             alt="coração" 
             data-produto-id="2"
             onclick="toggleFavorito(2, this)">
        
        <img class="add-carrinho" 
             src="../../../../public/assets/img/carrinho-card.png" 
             alt="Adicionar ao carrinho" 
             onclick="adicionarAoCarrinho(2)">
        
        <img class="image-produto" 
             src="../../../../public/assets/img/card-produto3.png" 
             alt="Produto Exemplo 2">
        
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(300+)</span>
        </div>
        
        <p>Produto Exemplo 2</p>
        <p>Outra Marca</p>
        <h1>R$ 199,99</h1>
        
        <button class="card-botao" onclick="adicionarAoCarrinho(2)">Adicionar ao Carrinho</button>
    </div>
</div>

<!-- INSTRUÇÕES DE INTEGRAÇÃO -->
<div style="max-width: 800px; margin: 40px auto; padding: 20px; background: #f8f9fa; border-radius: 10px;">
    <h2>Como Integrar o Sistema de Favoritos</h2>
    
    <h3>1. Estrutura HTML Necessária:</h3>
    <pre><code>&lt;div class="produtos-card" data-produto-id="ID_DO_PRODUTO"&gt;
    &lt;img class="heart" 
         src="../../../../public/assets/img/heart_disabled.png" 
         alt="coração" 
         data-produto-id="ID_DO_PRODUTO"
         onclick="toggleFavorito(ID_DO_PRODUTO, this)"&gt;
    &lt;!-- resto do conteúdo do card --&gt;
&lt;/div&gt;</code></pre>
    
    <h3>2. Incluir CSS:</h3>
    <pre><code>&lt;link rel="stylesheet" href="../../../../public/css/favoritos.css"&gt;</code></pre>
    
    <h3>3. Incluir JavaScript:</h3>
    <pre><code>&lt;script src="../../../../public/js/favoritos.js"&gt;&lt;/script&gt;</code></pre>
    
    <h3>4. Funções Disponíveis:</h3>
    <ul>
        <li><strong>toggleFavorito(idProduto, elemento)</strong> - Alterna favorito (adiciona/remove)</li>
        <li><strong>verificarFavorito(idProduto, elemento)</strong> - Verifica se está nos favoritos</li>
        <li><strong>carregarEstadoFavoritos()</strong> - Carrega estado de todos os favoritos na página</li>
        <li><strong>adicionarFavorito(idProduto, elemento)</strong> - Adiciona aos favoritos</li>
        <li><strong>removerFavorito(idProduto, elemento)</strong> - Remove dos favoritos</li>
        <li><strong>limparFavoritos()</strong> - Remove todos os favoritos</li>
        <li><strong>mostrarNotificacao(mensagem, tipo)</strong> - Mostra notificação</li>
    </ul>
    
    <h3>5. Endpoints da API:</h3>
    <ul>
        <li><strong>GET /FavoritoController.php?action=toggle&id_produto=X</strong> - Alterna favorito</li>
        <li><strong>GET /FavoritoController.php?action=verificar&id_produto=X</strong> - Verifica favorito</li>
        <li><strong>GET /FavoritoController.php?action=listar</strong> - Lista favoritos</li>
        <li><strong>GET /FavoritoController.php?action=limpar</strong> - Limpa todos</li>
    </ul>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<!-- IMPORTANTE: Incluir o JavaScript de favoritos -->
<script src="../../../../public/js/favoritos.js"></script>

<script>
// Exemplo de uso personalizado
document.addEventListener('DOMContentLoaded', function() {
    console.log('Sistema de favoritos carregado!');
    
    // O JavaScript de favoritos já carrega automaticamente o estado dos favoritos
    // e adiciona os event listeners necessários
});
</script>

</body>
</html> 