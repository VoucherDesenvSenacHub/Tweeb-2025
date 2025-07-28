<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Inclui navbar e sidebar conforme usuário logado
if (!isset($_SESSION['usuario'])) {
    include __DIR__.'/../../../../includes/navbar.php'; 
} else {
    include __DIR__.'/../../../../includes/navbar.php'; 
    include __DIR__.'/../../../../includes/sidebar-User.php'; 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../../../../public/css/task20.css" />
    <title>Tweeb - Kit Setup</title>
</head>
<body class="kitsetup-body">
    <div class="kitsetup-container_banner">
        <img src="../../../../public/assets/img/banner setup.png" alt="banner-kit_setup" class="kitsetup-banner" />
    </div>
    <main class="kitsetup-main-content">
        <div class="kitsetup-container_titles">
            <h1 class="kitsetup-h1">KIT SETUP</h1>
            <p class="kitsetup-p">Produtos selecionados e combinados cuidadosamente por nossos especialistas para você.</p>
        </div>

        <div class="kitsetup-layout">
            <aside class="kitsetup-filtro">
                <h3>Filtros</h3>
                <form method="GET" action="">
                    <fieldset>
                        <legend>Ordenar Por</legend>
                        <select name="ordenar">
                            <option value="" <?= (empty($ordenar) ? 'selected' : '') ?>>Padrão</option>
                            <option value="preco_asc" <?= ($ordenar === 'preco_asc' ? 'selected' : '') ?>>Menor Preço</option>
                            <option value="preco_desc" <?= ($ordenar === 'preco_desc' ? 'selected' : '') ?>>Maior Preço</option>
                            <option value="nome_asc" <?= ($ordenar === 'nome_asc' ? 'selected' : '') ?>>Nome (A-Z)</option>
                        </select>
                    </fieldset>

                    <fieldset>
                        <legend>Finalidade</legend>
                        <div>
                            <input type="checkbox" name="finalidade[]" value="games" id="finalidade_games" <?= (isset($finalidades) && in_array('games', $finalidades) ? 'checked' : '') ?> />
                            <label for="finalidade_games">PC Gamer</label>
                        </div>
                        <div>
                            <input type="checkbox" name="finalidade[]" value="estudos" id="finalidade_estudos" <?= (isset($finalidades) && in_array('estudos', $finalidades) ? 'checked' : '') ?> />
                            <label for="finalidade_estudos">PC para Estudos</label>
                        </div>
                        <div>
                            <input type="checkbox" name="finalidade[]" value="trabalho" id="finalidade_trabalho" <?= (isset($finalidades) && in_array('trabalho', $finalidades) ? 'checked' : '') ?> />
                            <label for="finalidade_trabalho">Workstation</label>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Faixa de Preço</legend>
                        <div class="filtro-preco">
                            <input type="number" name="preco_min" placeholder="Mínimo" value="<?= isset($preco_min) ? htmlspecialchars($preco_min) : '' ?>" />
                            <span>-</span>
                            <input type="number" name="preco_max" placeholder="Máximo" value="<?= isset($preco_max) ? htmlspecialchars($preco_max) : '' ?>" />
                        </div>
                    </fieldset>

                    <button type="submit" class="filtro-aplicar">Aplicar Filtros</button>
                    <a href="KitSetupController.php" class="filtro-limpar">Limpar Filtros</a>
                </form>
            </aside>

            <div class="kitsetup-grid-container">
                <?php if (!empty($kits)): ?>
                    <?php foreach ($kits as $kit): ?>
                        <div class="kitsetup-products_box">
                            <div class="kitsetup-header-product-box">
                                <div class="kitsetup-config-box">
                                    <p class="kitsetup-config-box-p">Configuração</p>
                                    <div class="kitsetup-info-box">
                                        <img src="../../../../public/assets/img/info_icon.png" alt="Info" />
                                    </div>
                                </div>
                                <div class="kitsetup-heart-icon-box">
                                    <img src="../../../../public/assets/img/heart_disabled.png" alt="Favoritar" />
                                </div>
                            </div>
                            <div class="kitsetup-main-product-contant">
                                <div class="kitsetup-product-image">
                                    <img src="../../../../public/assets/img/<?= htmlspecialchars($kit['imagem_kit']); ?>" alt="<?= htmlspecialchars($kit['nome_kit']); ?>" />
                                </div>
                                <div class="kitsetup-product-name-box">
                                    <h1 class="kitsetup-product-name"><?= htmlspecialchars($kit['nome_kit']); ?></h1>
                                </div>
                                <div class="kitsetup-product-price-box">
                                    <h1 class="kitsetup-product-price">R$<?= number_format($kit['preco_kit'], 2, ',', '.'); ?></h1>
                                </div>
                                <a href="#" class="kitsetup-buy-now">
                                    <div class="kitsetup-buy-product-button">
                                        <p class="kitsetup-buy-product-text">Comprar agora</p>
                                    </div>
                                </a>
                            </div>
                            <div class="kitsetup-config-details">
                                <h1>CONFIGURAÇÕES</h1>
                                <p><img src="../../../../public/assets/img/modal_cpu.png" class="kitsetup-icons-model" /> <?= htmlspecialchars($kit['config_processador']); ?></p>
                                <p><img src="../../../../public/assets/img/modal1.png" class="kitsetup-icons-model" /> <?= htmlspecialchars($kit['config_placa_mae']); ?></p>
                                <p><img src="../../../../public/assets/img/modal3.png" class="kitsetup-icons-model" /> <?= htmlspecialchars($kit['config_memoria']); ?></p>
                                <p><img src="../../../../public/assets/img/modal2.png" class="kitsetup-icons-model" /> <?= htmlspecialchars($kit['config_video']); ?></p>
                                <p><img src="../../../../public/assets/img/modal_ssd.png" class="kitsetup-icons-model" /> <?= htmlspecialchars($kit['config_armazenamento']); ?></p>
                                <p><img src="../../../../public/assets/img/modal4.png" class="kitsetup-icons-model" /> <?= htmlspecialchars($kit['config_fonte']); ?></p>
                                <p><img src="../../../../public/assets/img/modal5.png" class="kitsetup-icons-model" /> <?= htmlspecialchars($kit['config_gabinete']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; font-size: 1.2rem; grid-column: 1 / -1;">Nenhum kit encontrado.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="kitsetup-pages-container">
            <div class="kitsetup-pages">
                <?php
                $adjacents = 2;
                if (isset($total_paginas) && isset($pagina_atual) && $total_paginas > 1):
                    if ($pagina_atual > 1): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $pagina_atual - 1])) ?>" class="kitsetup-page2-button">&laquo; Anterior</a>
                    <?php endif;

                    if ($pagina_atual < ($adjacents + 3)) {
                        for ($i = 1; $i < ($adjacents + 4) && $i <= $total_paginas; $i++) {
                            $classe = ($i == $pagina_atual) ? 'kitsetup-page1-button' : 'kitsetup-page2-button';
                            $query = http_build_query(array_merge($_GET, ['page' => $i]));
                            echo "<a href=\"?$query\" class=\"$classe\"><span class=\"" . ($i == $pagina_atual ? 'kitsetup-page-number' : 'kitsetup-page2-number') . "\">$i</span></a>";
                        }
                        if ($total_paginas > ($adjacents + 3)) {
                            echo '<span class="kitsetup-page2-number">...</span>';
                            $query = http_build_query(array_merge($_GET, ['page' => $total_paginas]));
                            echo "<a href=\"?$query\" class=\"kitsetup-page2-button\"><span class=\"kitsetup-page2-number\">$total_paginas</span></a>";
                        }
                    } elseif ($pagina_atual >= ($adjacents + 3) && $pagina_atual < ($total_paginas - ($adjacents + 1))) {
                        $query1 = http_build_query(array_merge($_GET, ['page' => 1]));
                        echo "<a href=\"?$query1\" class=\"kitsetup-page2-button\"><span class=\"kitsetup-page2-number\">1</span></a>";
                        echo '<span class="kitsetup-page2-number">...</span>';
                        for ($i = $pagina_atual - $adjacents; $i <= $pagina_atual + $adjacents; $i++) {
                            $classe = ($i == $pagina_atual) ? 'kitsetup-page1-button' : 'kitsetup-page2-button';
                            $query = http_build_query(array_merge($_GET, ['page' => $i]));
                            echo "<a href=\"?$query\" class=\"$classe\"><span class=\"" . ($i == $pagina_atual ? 'kitsetup-page-number' : 'kitsetup-page2-number') . "\">$i</span></a>";
                        }
                        $queryLast = http_build_query(array_merge($_GET, ['page' => $total_paginas]));
                        echo '<span class="kitsetup-page2-number">...</span>';
                        echo "<a href=\"?$queryLast\" class=\"kitsetup-page2-button\"><span class=\"kitsetup-page2-number\">$total_paginas</span></a>";
                    } else {
                        $query1 = http_build_query(array_merge($_GET, ['page' => 1]));
                        echo "<a href=\"?$query1\" class=\"kitsetup-page2-button\"><span class=\"kitsetup-page2-number\">1</span></a>";
                        echo '<span class="kitsetup-page2-number">...</span>';
                        for ($i = $total_paginas - ($adjacents + 2); $i <= $total_paginas; $i++) {
                            $classe = ($i == $pagina_atual) ? 'kitsetup-page1-button' : 'kitsetup-page2-button';
                            $query = http_build_query(array_merge($_GET, ['page' => $i]));
                            echo "<a href=\"?$query\" class=\"$classe\"><span class=\"" . ($i == $pagina_atual ? 'kitsetup-page-number' : 'kitsetup-page2-number') . "\">$i</span></a>";
                        }
                    }

                    if ($pagina_atual < $total_paginas): 
                        $queryNext = http_build_query(array_merge($_GET, ['page' => $pagina_atual + 1]));
                        ?>
                        <a href="?<?= $queryNext ?>" class="kitsetup-page2-button">Próximo &raquo;</a>
                    <?php endif;
                endif;
                ?>
            </div>
        </div>
    </main>

    <?php include __DIR__.'/../../../../includes/voltar-ao-topo.php'; ?>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>

    <script src="../../../../public/js/task20-modal.js"></script>
</body>
</html>
