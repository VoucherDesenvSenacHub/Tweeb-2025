<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/Audio.css">
    <title>Tweeb - Áudio</title>
</head>
<body class="Audio">
<?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../../../../includes/navbar.php'; 
        include __DIR__.'/../../../../includes/sidebar-User.php'; 
    } else {
        include __DIR__.'/../../../../includes/navbar.php'; 
    }
    ?>

<div class="Audio-container_banner">
    <img src="../../../../public/assets/img/banner-departamento-computador.png" alt="banner-Games" class="Games-banner">
</div>

<div class="Audio-container_titles">
    <h1 class="Audio-h1">Áudio</h1>
    <p class="Audio-p">Escolha a oferta que mais combina com você.</p>
</div>

<div class="container-favoritos-depto">
<?php if (!empty($produtos)): ?>
    <?php foreach ($produtos as $produto): ?>
        <div class="produtos-card">
            <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">
            <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>
            <img class="image-produto" src="../../../../public/assets/img/<?= htmlspecialchars($produto['imagem_produto']) ?>" alt="<?= htmlspecialchars($produto['nome_produto']) ?>">
            <div class="card-rate">
                <?php for ($i = 0; $i < 5; $i++): ?><i class="fa-solid fa-star"></i><?php endfor; ?>
                <span class="qnt-avaliacoes">(<?= rand(200, 800) ?>+)</span>
            </div>
            <p><?= htmlspecialchars($produto['nome_produto']) ?></p>
            <p><?= htmlspecialchars($produto['marca_modelo']) ?></p>
            <h1>R$<?= number_format($produto['preco_unid'], 2, ',', '.') ?></h1>
            <button class="card-botao">Comprar Agora</button>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p style="text-align: center; font-size: 1.2rem;">Nenhum produto disponível neste departamento.</p>
<?php endif; ?>
</div>

<div class="Audio-pages-container">
    <div class="Audio-pages">
        <?php
        $adjacents = 2;
        if ($total_paginas > 1):
            if ($pagina_atual > 1): ?>
                <a href="?page=<?= $pagina_atual - 1 ?>" class="Audio-page2-button">&laquo; Anterior</a>
            <?php endif;
            if ($pagina_atual < ($adjacents + 3)) {
                for ($i = 1; $i < ($adjacents + 4) && $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Audio-page1-button' : 'Audio-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Audio-page-number' : 'Audio-page2-number') . '">' . $i . '</span></a>';
                }
                if ($total_paginas > ($adjacents + 3)) {
                    echo '<span class="Audio-page2-number">...</span>';
                    echo '<a href="?page=' . $total_paginas . '" class="Audio-page2-button"><span class="Audio-page2-number">' . $total_paginas . '</span></a>';
                }
            }
            elseif ($pagina_atual >= ($adjacents + 3) && $pagina_atual < ($total_paginas - ($adjacents + 1))) {
                echo '<a href="?page=1" class="Audio-page2-button"><span class="Audio-page2-number">1</span></a>';
                echo '<span class="Audio-page2-number">...</span>';
                for ($i = $pagina_atual - $adjacents; $i <= $pagina_atual + $adjacents; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Audio-page1-button' : 'Audio-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Audio-page-number' : 'Audio-page2-number') . '">' . $i . '</span></a>';
                }
                echo '<span class="Audio-page2-number">...</span>';
                echo '<a href="?page=' . $total_paginas . '" class="Audio-page2-button"><span class="Audio-page2-number">' . $total_paginas . '</span></a>';
            }
            else {
                echo '<a href="?page=1" class="Audio-page2-button"><span class="Audio-page2-number">1</span></a>';
                echo '<span class="Audio-page2-number">...</span>';
                for ($i = $total_paginas - ($adjacents + 2); $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Audio-page1-button' : 'Audio-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Audio-page-number' : 'Audio-page2-number') . '">' . $i . '</span></a>';
                }
            }
            if ($pagina_atual < $total_paginas): ?>
                <a href="?page=<?= $pagina_atual + 1 ?>" class="Audio-page2-button">Próximo &raquo;</a>
            <?php endif;
        endif;
        ?>
    </div>
</div>
<script src="../../../../public/js/task20-modal.js"></script>
</body>
<?php include __DIR__.'/../../../../includes/voltar-ao-topo.php'; ?>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</html>