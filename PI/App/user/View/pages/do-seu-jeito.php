<?php
session_start();
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

    <?php
        if (isset($_SESSION['usuario'])) {
            include __DIR__.'/../../../../includes/navbar.php'; 
            include __DIR__.'/../../../../includes/sidebar-User.php'; 
        } else {
            include __DIR__.'/../../../../includes/navbar.php'; 
        }
    ?>

    <img src="../../../../public/assets/img/banner-do-seu-jeito.png" alt="Banner" class="do-seu-jeito-banner1">

    <div class="do-seu-jeito-countainer-components">
        <div class="do-seu-jeito-components">
            <ul class="do-seu-jeito-ul-components">
                <?php foreach ($categorias as $categoria): ?>
                    <?php
                        $classe_ativa = ($categoria['id_tipo_componente'] == $tipo_ativo_id) ? 'active' : '';
                        $tem_selecao = isset($_SESSION['montagem'][$categoria['id_tipo_componente']]) ? 'com-selecao' : '';
                    ?>
                    <li class="do-seu-jeito-processador <?php echo $classe_ativa; ?> <?php echo $tem_selecao; ?>">
                        <a href="CategoriaController.php?tipo=<?php echo $categoria['id_tipo_componente']; ?>">
                            <?php echo htmlspecialchars($categoria['nome_componente']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="do-seu-jeito-revisao"><a href="#">Revisão</a></li>
            </ul>
        </div>
    </div>

    <div class="do-seu-jeito-countainer-products">
        <div class="do-seu-jeito-titles-countainer">
            <div class="do-seu-jeito-items-information">
                <h2 class="do-seu-jeito-product-name">Nome do produto</h2>
                <h2 class="do-seu-jeito-product-value">Valor</h2>
            </div>
        </div>

        <?php if (count($produtos) > 0): ?>
            <?php foreach ($produtos as $produto): ?>
                <?php
                    $esta_selecionado = (isset($_SESSION['montagem'][$tipo_ativo_id]) && $_SESSION['montagem'][$tipo_ativo_id] == $produto['id_produto']);
                ?>
                <div class="produto-container">
                    <div class="do-seu-jeito-product <?php if($esta_selecionado) echo 'selecionado'; ?>" id="produto-<?php echo $produto['id_produto']; ?>">
                        
                        <img src="../../../../public/assets/img/<?php echo htmlspecialchars($produto['imagem_produto']); ?>" alt="<?php echo htmlspecialchars($produto['nome_produto']); ?>" class="do-seu-jeito-img-product">
                        <p class="do-seu-jeito-name"><?php echo htmlspecialchars($produto['nome_produto']); ?></p>
                        <p class="do-seu-jeito-value">R$ <?php echo number_format($produto['preco_unid'], 2, ',', '.'); ?></p>
                        
                        <div class="container-selecao">
                            <?php if ($esta_selecionado): ?>
                                <div class="indicador-selecionado">
                                    <i class='bx bx-check-circle'></i>
                                    <span>Selecionado</span>
                                </div>
                            <?php else: ?>
                                <a href="CategoriaController.php?tipo=<?php echo $tipo_ativo_id; ?>&add=<?php echo $produto['id_produto']; ?>" class="botao-selecionar">
                                    Selecionar
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="do-seu-jeito-product-bottom">
                            <div class="do-seu-jeito-sub-bottom"><img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow"></div>
                        </div>
                    </div>
                    
                    <div class="produto-ver-mais div-desativado">
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

    <div class="do-seu-jeito-continue-button-countainer">
        <?php if ($proxima_categoria_id !== null): ?>
            <a href="CategoriaController.php?tipo=<?php echo $proxima_categoria_id; ?>" class="do-seu-jeito-continue-button">
                <p class="do-seu-jeito-text-continue-button">AVANÇAR</p>
            </a>
        <?php else: ?>
            <a href="RevisaoController.php" class="do-seu-jeito-continue-button">
                <p class="do-seu-jeito-text-continue-button">IR PARA REVISÃO</p>
            </a>
        <?php endif; ?>
    </div>

    <?php include __DIR__.'/../../../../includes/voltar-ao-topo.php'; ?>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>