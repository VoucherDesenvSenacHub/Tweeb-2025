<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/Hardwares.css">
    <link rel="stylesheet" href="../../../../public/css/navbar.css">
    <title>Tweeb - Hardware</title>
</head>
<body class="Hardware">
<?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../../../../includes/navbar.php'; 
        include __DIR__.'/../../../../includes/sidebar-User.php'; 
    } else {
        include __DIR__.'/../../../../includes/navbar.php'; 
    }
?>

<div class="Hardware-container_banner">
    <img src="/Tweeb-2025/PI/public/assets/img/banner-departamento-computador.png" alt="banner-Hardware" class="Hardware-banner">
</div>

<div class="Hardware-container_titles">
    <h1 class="Hardware-h1">Hardware</h1>
    <p class="Hardware-p">Escolha a oferta que mais combina com você.</p>
</div>

<!-- NOVO CONTAINER FLEX COM FILTRO + PRODUTOS -->
<div class="Hardware-layout" data-departamento-id="1">

    <!-- Filtro lateral esquerdo -->
    <aside class="Hardware-filtro">
         <h3>Filtros</h3>
    <form method="GET" action="" id="filtro-form">
        <fieldset>
            <legend>Ordenar Por</legend>
            <select name="ordenar" class="h-filtro-select">
                <option value="">Padrão</option>
                <option value="preco_asc">Menor Preço</option>
                <option value="preco_desc">Maior Preço</option>
                <option value="nome_asc">Nome (A-Z)</option>
            </select>
        </fieldset>

        <fieldset>
            <legend>Marcas</legend>
            <div>
                <input type="checkbox" name="marca[]" value="Intel" id="h-marca_intel">
                <label for="h-marca_intel">Intel</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="AMD" id="h-marca_amd">
                <label for="h-marca_amd">AMD</label>
            </div>
            <div>
                <input type="checkbox" name="marca[]" value="NVIDIA" id="h-marca_nvidia">
                <label for="h-marca_nvidia">NVIDIA</label>
            </div>
             <div>
                <input type="checkbox" name="marca[]" value="Gigabyte" id="h-marca_gigabyte">
                <label for="h-marca_gigabyte">Gigabyte</label>
            </div>
             <div>
                <input type="checkbox" name="marca[]" value="ASUS" id="h-marca_asus">
                <label for="h-marca_asus">ASUS</label>
            </div>
        </fieldset>

        <fieldset>
            <legend>Faixa de Preço</legend>
            <div class="h-filtro-preco">
                <input type="number" name="preco_min" placeholder="Mínimo" class="h-filtro-input">
                <span>-</span>
                <input type="number" name="preco_max" placeholder="Máximo" class="h-filtro-input">
            </div>
        </fieldset>

        <fieldset>
            <legend>Características</legend>
            <div>
                <input type="checkbox" name="em_estoque" value="1" id="h-filtro_estoque">
                <label for="h-filtro_estoque">Em estoque</label>
            </div>
            <div>
                <input type="checkbox" name="entrega_gratis" value="1" id="h-filtro_entrega">
                <label for="h-filtro_entrega">Entrega Grátis</label>
            </div>
            <div>
                <input type="checkbox" name="garantia" value="1" id="h-filtro_garantia">
                <label for="h-filtro_garantia">Com Garantia</label>
            </div>
        </fieldset>
        
        <button type="submit" class="h-filtro-aplicar">Aplicar Filtros</button>
        <a href="#" class="h-filtro-limpar">Limpar Filtros</a>
    </form>
    </aside>

    <!-- Cards de produtos -->
    <div class="h-container-favoritos-depto">
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="h-produtos-card">
                    <img class="h-heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" data-produto-id="<?= $produto['id_produto'] ?>" onclick="AtivarCoracao(this)">
                    <button class="add-carrinho-btn" data-id="<?= $produto['id_produto'] ?>" title="Adicionar ao carrinho">
                        <img class="h-add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt="Adicionar ao carrinho">
                    </button>
                    <img class="image-produto" src="../../../../public/assets/img/<?= htmlspecialchars($produto['imagem_produto']) ?>" alt="<?= htmlspecialchars($produto['nome_produto']) ?>">
                    <div class="card-rate">
                        <?php for ($i = 0; $i < 5; $i++): ?><i class="fa-solid fa-star"></i><?php endfor; ?>
                        <span class="qnt-avaliacoes">(<?= rand(200, 800) ?>+)</span>
                    </div>
                    <p><?= htmlspecialchars($produto['nome_produto']) ?></p>
                    <p><?= htmlspecialchars($produto['marca_modelo']) ?></p>
                    <h1>R$<?= number_format($produto['preco_unid'], 2, ',', '.') ?></h1>
                    <button class="h-card-botao">Comprar Agora</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; font-size: 1.2rem;">Nenhum produto disponível neste departamento.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Paginação -->
<div class="Hardware-pages-container">
    <div class="Hardware-pages">
        <?php
        $adjacents = 2;
        if ($total_paginas > 1):
            if ($pagina_atual > 1): ?>
                <a href="?page=<?= $pagina_atual - 1 ?>" class="Hardware-page2-button">&laquo; Anterior</a>
            <?php endif;
            if ($pagina_atual < ($adjacents + 3)) {
                for ($i = 1; $i < ($adjacents + 4) && $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Hardware-page1-button' : 'Hardware-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Hardware-page-number' : 'Hardware-page2-number') . '">' . $i . '</span></a>';
                }
                if ($total_paginas > ($adjacents + 3)) {
                    echo '<span class="Hardware-page2-number">...</span>';
                    echo '<a href="?page=' . $total_paginas . '" class="Hardware-page2-button"><span class="Hardware-page2-number">' . $total_paginas . '</span></a>';
                }
            }
            elseif ($pagina_atual >= ($adjacents + 3) && $pagina_atual < ($total_paginas - ($adjacents + 1))) {
                echo '<a href="?page=1" class="Hardware-page2-button"><span class="Hardware-page2-number">1</span></a>';
                echo '<span class="Hardware-page2-number">...</span>';
                for ($i = $pagina_atual - $adjacents; $i <= $pagina_atual + $adjacents; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Hardware-page1-button' : 'Hardware-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Hardware-page-number' : 'Hardware-page2-number') . '">' . $i . '</span></a>';
                }
                echo '<span class="Hardware-page2-number">...</span>';
                echo '<a href="?page=' . $total_paginas . '" class="Hardware-page2-button"><span class="Hardware-page2-number">' . $total_paginas . '</span></a>';
            }
            else {
                echo '<a href="?page=1" class="Hardware-page2-button"><span class="Hardware-page2-number">1</span></a>';
                echo '<span class="Hardware-page2-number">...</span>';
                for ($i = $total_paginas - ($adjacents + 2); $i <= $total_paginas; $i++) {
                    echo '<a href="?page=' . $i . '" class="' . ($i == $pagina_atual ? 'Hardware-page1-button' : 'Hardware-page2-button') . '"><span class="' . ($i == $pagina_atual ? 'Hardware-page-number' : 'Hardware-page2-number') . '">' . $i . '</span></a>';
                }
            }
            if ($pagina_atual < $total_paginas): ?>
                <a href="?page=<?= $pagina_atual + 1 ?>" class="Hardware-page2-button">Próximo &raquo;</a>
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
