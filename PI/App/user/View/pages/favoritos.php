<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../../Models/Favorito.php';

// Buscar favoritos do usuário
$favoritos = Favorito::buscarFavoritosUsuario($_SESSION['usuario']['id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Favoritos</title>
</head>
<body class="favoritos-usuario">

<?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../../../../includes/navbar.php'; 
        include __DIR__.'/../../../../includes/sidebar-User.php'; 
    } else {
        header("Location: login.php");
        exit;
    }
    ?>

<div class="container-favoritos-5">
    <?php if (empty($favoritos)): ?>
        <!-- Estado vazio - manter estrutura original -->
        <div class="produtos-card">
            <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">
            <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
            <div class="card-rate">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <span class="qnt-avaliacoes">(500+)</span>
            </div>
            <p>Nenhum favorito ainda</p>
            <p>Adicione produtos aos seus favoritos</p>
            <h1>R$ 0,00</h1>
            <button class="card-botao" onclick="window.location.href='../../../../home.php'">Explorar Produtos</button>
        </div>
    <?php else: ?>
        <?php foreach ($favoritos as $favorito): ?>
            <div class="produtos-card">
                <img class="heart favorito-ativo" 
                     src="../../../../public/assets/img/heart_enabled.png" 
                     alt="coração" 
                     onclick="toggleFavorito(<?php echo $favorito['id_produto']; ?>, this)">
                <img class="image-produto" 
                     src="../../../../public/assets/img/<?php echo $favorito['imagem_produto']; ?>" 
                     alt="<?php echo htmlspecialchars($favorito['nome_produto']); ?>">
                <div class="card-rate">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span class="qnt-avaliacoes">(500+)</span>
                </div>
                <p><?php echo htmlspecialchars($favorito['nome_produto']); ?></p>
                <p><?php echo htmlspecialchars($favorito['marca_modelo']); ?></p>
                <h1>R$ <?php echo number_format($favorito['preco_unid'], 2, ',', '.'); ?></h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<script>
// Função para alternar favorito (mantém compatibilidade com AtivarCoracao)
function toggleFavorito(idProduto, elemento) {
    fetch('/Tweeb-2025/PI/App/user/Controllers/FavoritoController.php?action=toggle&id_produto=' + idProduto, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (data.favoritado) {
                elemento.src = '../../../../public/assets/img/heart_enabled.png';
                elemento.classList.add('favorito-ativo');
            } else {
                elemento.src = '../../../../public/assets/img/heart_disabled.png';
                elemento.classList.remove('favorito-ativo');
            }
            
            // Mostra notificação simples
            alert(data.message);
        } else {
            // Se a mensagem indicar que o usuário não está autenticado, redireciona para o login
            if (data.message && data.message.toLowerCase().includes('autenticado')) {
                window.location.href = '/Tweeb-2025/PI/App/user/View/pages/login.php';
            } else {
                console.error('Erro:', data.message);
            }
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        // Em caso de erro de rede, também redireciona para login
        window.location.href = '/Tweeb-2025/PI/App/user/View/pages/login.php';
    });
}

// Mantém a função original AtivarCoracao para compatibilidade
function AtivarCoracao(elemento) {
    // Se o elemento tem data-produto-id, usa a nova função
    const idProduto = elemento.getAttribute('data-produto-id');
    if (idProduto) {
        toggleFavorito(idProduto, elemento);
    } else {
        // Comportamento original
        if (elemento.src.includes('heart_disabled')) {
            elemento.src = '../../../../public/assets/img/heart_enabled.png';
        } else {
            elemento.src = '../../../../public/assets/img/heart_disabled.png';
        }
    }
}
</script>

</body>
</html>
