<?php

require_once(__DIR__ . '/../../../adm/Controllers/Banner.php');

$banner = new Banner();


$bannerSobreMimPosicao1 = $banner->getBannerForPosicao('sobre_mim',1);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/Games.css">
    <title>Tweeb - Games</title>
</head>
<body class="Games">
<?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../../../../includes/navbar.php'; 
        include __DIR__.'/../../../../includes/sidebar-User.php'; 
    } else {
        include __DIR__.'/../../../../includes/navbar.php'; 
    }
?>

<div class="Games-container_banner">
    <img src="/Tweeb-2025/PI/public/Banners/bannersPromocionais/<?= basename($bannerSobreMimPosicao1->caminho) ?>" alt="Banner-Games" class="Games-banner">

</div>

<div class="Games-container_titles">
    <h1 class="Games-h1">Games</h1>
    <p class="Games-p">Escolha a oferta que mais combina com você.</p>
</div>

<!-- LAYOUT COM FILTRO + CARDS -->
<div class="Games-layout">
    <!-- Filtro lateral -->
   <aside class="Games-filtro">
    <h3>Filtros</h3>
    <form method="GET" action="">
        <fieldset>
            <legend>Ordenar Por</legend>
            <select name="ordenar" class="Perifericos-filtro-select">
                <option value="">Padrão</option>
                <option value="preco_asc">Menor Preço</option>
                <option value="preco_desc">Maior Preço</option>
                <option value="nome_asc">Nome (A-Z)</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Marcas</legend>
            <div>
                <input type="checkbox" name="marca[]" value="Sony" id="marca_sony">
                <label for="marca_sony">Sony</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="Microsoft" id="marca_microsoft">
                <label for="marca_microsoft">Microsoft</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="Nintendo" id="marca_nintendo">
                <label for="marca_nintendo">Nintendo</label>
            </div>
             </fieldset>

        <fieldset>
            <legend>Faixa de Preço</legend>
            <div class="filtro-preco">
                <input type="number" name="preco_min" placeholder="Mínimo">
                <span>-</span>
                <input type="number" name="preco_max" placeholder="Máximo">
            </div>
        </fieldset>

        <fieldset>
            <legend>Características</legend>
            <div>
                <input type="checkbox" name="em_estoque" value="1" id="filtro_estoque">
                <label for="filtro_estoque">Em estoque</label>
            </div>
            <div>
                <input type="checkbox" name="entrega_gratis" value="1" id="filtro_entrega">
                <label for="filtro_entrega">Entrega Grátis</label>
            </div>
             <div>
                <input type="checkbox" name="garantia" value="1" id="filtro_garantia">
                <label for="filtro_garantia">Com Garantia</label>
            </div>
        </fieldset>
        
        
            <button type="submit" class="filtro-aplicar">Aplicar Filtros</button>
            <a href="sua-pagina-de-games.php" class="filtro-limpar">Limpar Filtros</a>
        </form>
    </aside>

    <!-- Grid de cards -->
    <div class="g-container-favoritos-depto">
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="g-produtos-card">
                    <img class="g-heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" data-produto-id="<?= $produto['id_produto'] ?>" onclick="AtivarCoracao(this)">
                    <button class="add-carrinho-btn" data-id="<?= $produto['id_produto'] ?>" title="Adicionar ao carrinho">
                        <img class="g-add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt="Adicionar ao carrinho">
                    </button>
                   <img class="image-produto" src="/Tweeb-2025/PI/public/uploads/<?= htmlspecialchars(basename($produto['imagem_produto'])) ?>" alt="Imagem do Produto" style="width: 160px; height: 160px;">
                    <div class="card-rate">
                        <?php for ($i = 0; $i < 5; $i++): ?><i class="fa-solid fa-star"></i><?php endfor; ?>
                        <span class="qnt-avaliacoes">(<?= rand(200, 800) ?>+)</span>
                    </div>
                    <p><?= htmlspecialchars($produto['nome_produto']) ?></p>
                    <p><?= htmlspecialchars($produto['marca_modelo']) ?></p>
                    <h1>R$<?= number_format($produto['preco_unid'], 2, ',', '.') ?></h1>
                    <button class="g-card-botao">Comprar Agora</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; font-size: 1.2rem;">Nenhum produto disponível neste departamento.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Paginação -->
<div class="Games-pages-container">
    <div class="Games-pages">
        <?php
        $adjacents = 2;
        if ($total_paginas > 1):
            if ($pagina_atual > 1): ?>
                <a href="?page=<?= $pagina_atual - 1 ?>" class="Games-page2-button">&laquo; Anterior</a>
            <?php endif;
            if ($pagina_atual < ($adjacents + 3)) {
                for ($i = 1; $i < ($adjacents + 4) && $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Games-page1-button' : 'Games-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Games-page-number' : 'Games-page2-number') . '">' . $i . '</span></a>';
                }
                if ($total_paginas > ($adjacents + 3)) {
                    echo '<span class="Games-page2-number">...</span>';
                    echo '<a href="?page=' . $total_paginas . '" class="Games-page2-button"><span class="Games-page2-number">' . $total_paginas . '</span></a>';
                }
            }
            elseif ($pagina_atual >= ($adjacents + 3) && $pagina_atual < ($total_paginas - ($adjacents + 1))) {
                echo '<a href="?page=1" class="Games-page2-button"><span class="Games-page2-number">1</span></a>';
                echo '<span class="Games-page2-number">...</span>';
                for ($i = $pagina_atual - $adjacents; $i <= $pagina_atual + $adjacents; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Games-page1-button' : 'Games-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Games-page-number' : 'Games-page2-number') . '">' . $i . '</span></a>';
                }
                echo '<span class="Games-page2-number">...</span>';
                echo '<a href="?page=' . $total_paginas . '" class="Games-page2-button"><span class="Games-page2-number">' . $total_paginas . '</span></a>';
            }
            else {
                echo '<a href="?page=1" class="Games-page2-button"><span class="Games-page2-number">1</span></a>';
                echo '<span class="Games-page2-number">...</span>';
                for ($i = $total_paginas - ($adjacents + 2); $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Games-page1-button' : 'Games-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Games-page-number' : 'Games-page2-number') . '">' . $i . '</span></a>';
                }
            }
            if ($pagina_atual < $total_paginas): ?>
                <a href="?page=<?= $pagina_atual + 1 ?>" class="Games-page2-button">Próximo &raquo;</a>
            <?php endif;
        endif;
        ?>
    </div>
</div>

<script src="../../../../public/js/task20-modal.js"></script>
<script src="../../../../public/js/favoritos.js"></script>
</body>
<?php include __DIR__.'/../../../../includes/voltar-ao-topo.php'; ?>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</html>
