<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/Departamento.css"> 
    <title>Busca por "<?= htmlspecialchars($searchTerm) ?>"</title>
</head>
<body class="Search"> <?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../../../../includes/navbar.php'; 
        include __DIR__.'/../../../../includes/sidebar-User.php'; 
    } else {
        include __DIR__.'/../../../../includes/navbar.php'; 
    }
    ?>

<div class="Search-container_banner"> <img src="../../../../public/assets/img/banner-departamento-computador.png" alt="banner-busca" class="Search-banner"> </div>

<div class="Search-container_titles"> <?php if (!empty($searchTerm)): ?>
        <h1 class="Search-h1">Resultados para "<?= htmlspecialchars($searchTerm) ?>"</h1> <p class="Search-p"><?= $total_produtos ?> produto(s) encontrado(s).</p> <?php else: ?>
        <h1 class="Search-h1">Faça uma busca</h1> <p class="Search-p">Digite algo na barra de pesquisa para começar.</p> <?php endif; ?>
</div>

<div class="container-favoritos-depto">
<?php if (!empty($produtos)): ?>
    <?php foreach ($produtos as $produto): ?>
        <div class="produtos-card">
            <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">
            <a href="#"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>
            <img class="image-produto" src="../../../../public/uploads/<?= htmlspecialchars($produto['imagem_produto']) ?>" alt="<?= htmlspecialchars($produto['nome_produto']) ?>">
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
    <?php if (!empty($searchTerm)): ?>
        <p style="text-align: center; font-size: 1.2rem;">Nenhum produto encontrado para sua busca.</p>
    <?php endif; ?>
<?php endif; ?>
</div>

<div class="Search-pages-container"> <div class="Search-pages"> <?php
        if ($total_paginas > 1):
            if ($pagina_atual > 1) {
                echo '<a href="?search='.urlencode($searchTerm).'&page='.($pagina_atual - 1).'" class="Search-page-button">&laquo; Anterior</a>';
            }
            for ($i = 1; $i <= $total_paginas; $i++) {
                $classe_botao = ($i == $pagina_atual) ? 'Search-page-active' : 'Search-page-button';
                echo '<a href="?search='.urlencode($searchTerm).'&page='.$i.'" class="'.$classe_botao.'"><span>'.$i.'</span></a>';
            }
            if ($pagina_atual < $total_paginas) {
                echo '<a href="?search='.urlencode($searchTerm).'&page='.($pagina_atual + 1).'" class="Search-page-button">Próximo &raquo;</a>';
            }
        endif;
        ?>
    </div>
</div>
<script src="../../../../public/js/task20-modal.js"></script>
</body>
<?php include __DIR__.'/../../../../includes/voltar-ao-topo.php'; ?>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</html>