<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location:/Tweeb-2025/PI/app/user/View/Pages/login.php");
    exit;
}else{
    include __DIR__.'/../../../../includes/navbar.php'; 
    include __DIR__.'/../../../../includes/sidebar-User.php'; 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="caminho/para/seu/Task19.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Tweeb - Monte seu PC</title>
</head>
<body class="do-seu-jeito-body">

    <img src="../../../../public/assets/img/banner-do-seu-jeito.png" alt="Banner" class="do-seu-jeito-banner1">

    <div class="do-seu-jeito-countainer-components">
        <div class="do-seu-jeito-components">
            <ul class="do-seu-jeito-ul-components">
                <?php foreach ($categorias as $categoria): ?>
                    <?php
                        $classe_ativa = ($categoria['id_tipo_componente'] == $tipo_ativo_id) ? 'active' : '';
                        $tem_selecao = isset($_SESSION['montagem'][$categoria['id_tipo_componente']]) ? 'com-selecao' : '';
                    ?>
                    <li class="<?php echo $classe_ativa; ?> <?php echo $tem_selecao; ?>">
                        <a href="CategoriaController.php?tipo=<?php echo $categoria['id_tipo_componente']; ?>">
                            <?php echo htmlspecialchars($categoria['nome_componente']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="do-seu-jeito-revisao"><a href="RevisaoController.php">Revisão</a></li>
            </ul>
        </div>
    </div>

    <div class="do-seu-jeito-countainer-products" id="lista-produtos">
        <?php if (count($produtos) > 0): ?>
            <?php foreach ($produtos as $produto): ?>
                <?php
                    $esta_selecionado = false;
                    if (isset($_SESSION['montagem'][$tipo_ativo_id])) {
                        $item_selecionado_na_sessao = $_SESSION['montagem'][$tipo_ativo_id];
                        if (is_array($item_selecionado_na_sessao)) {
                            $esta_selecionado = ($item_selecionado_na_sessao['id_produto'] == $produto['id_produto']);
                        } else {
                            $esta_selecionado = ($item_selecionado_na_sessao == $produto['id_produto']);
                        }
                    }
                ?>
                <div class="produto-container">
                    <div class="do-seu-jeito-product <?php if($esta_selecionado) echo 'selecionado'; ?>" id="produto-<?php echo $produto['id_produto']; ?>">
                        
                        <img src="../../../../public/assets/img/<?php echo htmlspecialchars($produto['imagem_produto']); ?>" alt="<?php echo htmlspecialchars($produto['nome_produto']); ?>" class="do-seu-jeito-img-product">
                        <p class="do-seu-jeito-name"><?php echo htmlspecialchars($produto['nome_produto']); ?></p>
                        <p class="do-seu-jeito-value">R$ <?php echo number_format($produto['preco_unid'], 2, ',', '.'); ?></p>
                        
                        <div class="container-selecao">
                            <?php 
                            if ($tipo_ativo_id == 3): 
                                
                                $quantidade_selecionada = 0;
                                if ($esta_selecionado && isset($_SESSION['montagem'][$tipo_ativo_id]) && is_array($_SESSION['montagem'][$tipo_ativo_id])) {
                                    $quantidade_selecionada = $_SESSION['montagem'][$tipo_ativo_id]['quantidade'];
                                }
                            ?>
                                <div class="seletor-quantidade" data-produto-id="<?php echo $produto['id_produto']; ?>" data-tipo-id="<?php echo $tipo_ativo_id; ?>">
                                    <button class="btn-qty-decrease" <?php if($quantidade_selecionada == 0) echo 'disabled';?>>-</button>
                                    <span class="qty-value"><?php echo $quantidade_selecionada; ?></span>
                                    <button class="btn-qty-increase">+</button>
                                </div>

                            <?php else: ?>
                                <?php if ($esta_selecionado): ?>
                                    <div class="indicador-selecionado">
                                        <i class='bx bx-check-circle'></i>
                                        <span>Selecionado</span>
                                    </div>
                                <?php else: ?>
                                    <button class="botao-selecionar" 
                                            data-produto-id="<?php echo $produto['id_produto']; ?>" 
                                            data-tipo-id="<?php echo $tipo_ativo_id; ?>">
                                        Selecionar
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        
                        <div class="do-seu-jeito-product-bottom">
                            <div class="do-seu-jeito-sub-bottom"><img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow"></div>
                        </div>
                    </div>
                    
                    <div class="produto-ver-mais">
                        <div class="ver-mais-image-details">
                            <h1><?php echo htmlspecialchars($produto['nome_produto']); ?></h1>
                            <p><?php echo htmlspecialchars($produto['descricao_produto']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; padding: 40px;">Nenhum produto encontrado nesta categoria.</p>
        <?php endif; ?>
    </div>

    <?php 
    if (isset($total_produtos) && isset($limite_por_pagina) && $total_produtos > $limite_por_pagina): 
    ?>
    <div class="ver-mais-container">
        <button id="btn-ver-mais" 
                class="do-seu-jeito-nav-button-voltar" 
                data-proxima-pagina="2" 
                data-tipo-id="<?php echo $tipo_ativo_id; ?>"
                data-total-produtos="<?php echo $total_produtos; ?>">
            Ver Mais
        </button>
    </div>
    <?php endif; ?>

    <div class="do-seu-jeito-navigation-buttons">
        <?php if ($categoria_anterior_id !== null): ?>
            <a href="CategoriaController.php?tipo=<?php echo $categoria_anterior_id; ?>" class="do-seu-jeito-nav-button-voltar">VOLTAR</a>
        <?php endif; ?>
        <?php if ($proxima_categoria_id !== null): ?>
            <a href="CategoriaController.php?tipo=<?php echo $proxima_categoria_id; ?>" class="do-seu-jeito-nav-button-avancar">AVANÇAR</a>
        <?php else: ?>
            <a href="RevisaoController.php" class="do-seu-jeito-nav-button-avancar">IR PARA REVISÃO</a>
        <?php endif; ?>
    </div>

    <?php include __DIR__.'/../../../../includes/voltar-ao-topo.php'; ?>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
    
    <script>
        // SCRIPT COMPLETO E FINAL
    </script>
</body>
</html>