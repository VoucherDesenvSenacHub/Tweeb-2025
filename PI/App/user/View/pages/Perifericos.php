<?php
session_start();
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
    <link rel="stylesheet" href="../../../../public/css/Perifericos.css">
    <title>Tweeb - Periféricos</title>
</head>
<body class="Perifericos">
<?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../../../../includes/navbar.php'; 
        include __DIR__.'/../../../../includes/sidebar-User.php'; 
    } else {
        include __DIR__.'/../../../../includes/navbar.php'; 
    }
?>

<div class="Perifericos-container_banner">
    <img src="/Tweeb-2025/PI/public/Banners/bannersPromocionais/<?= basename($bannerSobreMimPosicao1->caminho) ?>" alt="Banner-Games" class="Games-banner">
</div>

<div class="Perifericos-container_titles">
    <h1 class="Perifericos-h1">Periféricos</h1>
    <p class="Perifericos-p">Escolha a oferta que mais combina com você.</p>
</div>

<!-- LAYOUT COM FILTRO + CARDS -->
<div class="Perifericos-layout">
    <!-- Filtro lateral -->
    <aside class="Perifericos-filtro">
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
                <input type="checkbox" name="marca[]" value="Logitech" id="p-marca_logitech">
                <label for="p-marca_logitech">Logitech</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="Razer" id="p-marca_razer">
                <label for="p-marca_razer">Razer</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="Corsair" id="p-marca_corsair">
                <label for="p-marca_corsair">Corsair</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="HyperX" id="p-marca_hyperx">
                <label for="p-marca_hyperx">HyperX</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="Redragon" id="p-marca_redragon">
                <label for="p-marca_redragon">Redragon</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="Multilaser" id="p-marca_multilaser">
                <label for="p-marca_multilaser">Multilaser</label>
            </div>
        </fieldset>

        <fieldset>
            <legend>Faixa de Preço</legend>
            <div class="Perifericos-filtro-preco">
                <input type="number" name="preco_min" placeholder="Mínimo" class="Perifericos-filtro-input">
                <span>-</span>
                <input type="number" name="preco_max" placeholder="Máximo" class="Perifericos-filtro-input">
            </div>
        </fieldset>

        <fieldset>
            <legend>Características</legend>
            <div>
                <input type="checkbox" name="em_estoque" value="1" id="p-filtro_estoque">
                <label for="p-filtro_estoque">Em estoque</label>
            </div>
            <div>
                <input type="checkbox" name="entrega_gratis" value="1" id="p-filtro_entrega">
                <label for="p-filtro_entrega">Entrega Grátis</label>
            </div>
            <div>
                <input type="checkbox" name="garantia" value="1" id="p-filtro_garantia">
                <label for="p-filtro_garantia">Com Garantia</label>
            </div>
        </fieldset>
        
        <button type="submit" class="Perifericos-filtro-aplicar">Aplicar Filtros</button>
        <a href="#" class="Perifericos-filtro-limpar">Limpar Filtros</a>
    </form>
    </aside>

    <!-- Grid de cards -->
    <div class="p-container-favoritos-depto">
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="p-produtos-card">
                    <img class="p-heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" data-produto-id="<?= $produto['id_produto'] ?>" onclick="AtivarCoracao(this)">
                    <button class="add-carrinho-btn" data-id="<?= $produto['id_produto'] ?>" title="Adicionar ao carrinho">
                        <img class="p-add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt="Adicionar ao carrinho">
                    </button>
                    <img class="image-produto" src="/Tweeb-2025/PI/public/uploads/<?= htmlspecialchars(basename($produto['imagem_produto'])) ?>" alt="Imagem do Produto" style="width: 160px; height: 160px;">
                    <div class="card-rate">
                        <?php for ($i = 0; $i < 5; $i++): ?><i class="fa-solid fa-star"></i><?php endfor; ?>
                        <span class="qnt-avaliacoes">(<?= rand(200, 800) ?>+)</span>
                    </div>
                    <p><?= htmlspecialchars($produto['nome_produto']) ?></p>
                    <p><?= htmlspecialchars($produto['marca_modelo']) ?></p>
                    <h1>R$<?= number_format($produto['preco_unid'], 2, ',', '.') ?></h1>
                    <button class="p-card-botao">Comprar Agora</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; font-size: 1.2rem;">Nenhum produto disponível neste departamento.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Paginação -->
<div class="Perifericos-pages-container">
    <div class="Perifericos-pages">
        <?php
        $adjacents = 2;
        if ($total_paginas > 1):
            if ($pagina_atual > 1): ?>
                <a href="?page=<?= $pagina_atual - 1 ?>" class="Perifericos-page2-button">&laquo; Anterior</a>
            <?php endif;
            if ($pagina_atual < ($adjacents + 3)) {
                for ($i = 1; $i < ($adjacents + 4) && $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Perifericos-page1-button' : 'Perifericos-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Perifericos-page-number' : 'Perifericos-page2-number') . '">' . $i . '</span></a>';
                }
                if ($total_paginas > ($adjacents + 3)) {
                    echo '<span class="Perifericos-page2-number">...</span>';
                    echo '<a href="?page=' . $total_paginas . '" class="Perifericos-page2-button"><span class="Perifericos-page2-number">' . $total_paginas . '</span></a>';
                }
            }
            elseif ($pagina_atual >= ($adjacents + 3) && $pagina_atual < ($total_paginas - ($adjacents + 1))) {
                echo '<a href="?page=1" class="Perifericos-page2-button"><span class="Perifericos-page2-number">1</span></a>';
                echo '<span class="Perifericos-page2-number">...</span>';
                for ($i = $pagina_atual - $adjacents; $i <= $pagina_atual + $adjacents; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Perifericos-page1-button' : 'Perifericos-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Perifericos-page-number' : 'Perifericos-page2-number') . '">' . $i . '</span></a>';
                }
                echo '<span class="Perifericos-page2-number">...</span>';
                echo '<a href="?page=' . $total_paginas . '" class="Perifericos-page2-button"><span class="Perifericos-page2-number">' . $total_paginas . '</span></a>';
            }
            else {
                echo '<a href="?page=1" class="Perifericos-page2-button"><span class="Perifericos-page2-number">1</span></a>';
                echo '<span class="Perifericos-page2-number">...</span>';
                for ($i = $total_paginas - ($adjacents + 2); $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Perifericos-page1-button' : 'Perifericos-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Perifericos-page-number' : 'Perifericos-page2-number') . '">' . $i . '</span></a>';
                }
            }
            if ($pagina_atual < $total_paginas): ?>
                <a href="?page=<?= $pagina_atual + 1 ?>" class="Perifericos-page2-button">Próximo &raquo;</a>
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
