<?php 
require_once __DIR__.'/App/adm/Controllers/Banner.php';
require_once __DIR__.'/App/adm/Controllers/Produto.php';

$produtos = Produto::buscar(null, 'id_produto DESC', 8);


?>



<?php
session_start(); 


$produtoController = new Produto();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="public/assets/img/tentativa2 (1).png">
    <title>Home</title>
    <link rel="stylesheet" href="../PI/public/css/navbar.css">
    <link rel="stylesheet" href="../PI/public/css/home.css">
    <link rel="stylesheet" href="../PI/public/css/footer.css">
    <link rel="stylesheet" href="../PI/public/css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script defer src="../PI/public/js/home.js"></script>
    <script defer src="../PI/public/js/sidebar.js"></script>
    
</head>
<body>
    <?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../PI/includes/navbar.php'; 
        include __DIR__.'/../PI/includes/sidebar-User.php'; 
    } else {
        include __DIR__.'/../PI/includes/navbar.php';
       
    }

    $banner = new Banner();


    $bannerPrincipalPosicao1 = $banner->getBannerForPosicao('banners_principais',1);
    $bannerPrincipalPosicao2 = $banner->getBannerForPosicao('banners_principais',2);
    $bannerPrincipalPosicao3 = $banner->getBannerForPosicao('banners_principais',3);

    $bannerSecundarioPosicao1 = $banner->getBannerForPosicao('banners_secundarios',1);

    $bannerPromocionalPosicao1  = $banner->getBannerForPosicao('banners_promocionais',1);
    $bannerPromocionalPosicao2  = $banner->getBannerForPosicao('banners_promocionais',2);
    $bannerPromocionalPosicao3  = $banner->getBannerForPosicao('banners_promocionais',3);
    $bannerPromocionalPosicao4  = $banner->getBannerForPosicao('banners_promocionais',4);

    ?>
    
    <section class="slider">
        <div class="slider-content">
            <input type="radio" name="btn-radio" id="radio1">
            <input type="radio" name="btn-radio" id="radio2">
            <input type="radio" name="btn-radio" id="radio3">
        

        <div class="slide-box primeiro">
        <a href="#">
            <img src="/Tweeb-2025/PI/public/Banners/bannersPrincipais/<?= basename($bannerPrincipalPosicao1->caminho) ?>" alt="Banner principal" class="img-desktop">
        </a>
    </div>

        <div class="slide-box">
            <a href="#">
                 <img src="/Tweeb-2025/PI/public/Banners/bannersPrincipais/<?= basename($bannerPrincipalPosicao2->caminho) ?>" alt="Banner principal" class="img-desktop">
        </div>
        <div class="slide-box">
            <a href="#">
                 <img src="/Tweeb-2025/PI/public/Banners/bannersPrincipais/<?= basename($bannerPrincipalPosicao3->caminho) ?>" alt="Banner principal" class="img-desktop">
        </a>
        </div>


        <!-- .nav-auto>.auto-btn1*3 -->
        <div class="nav-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
        </div>

        <!-- .nav-manual>label.manual-btn*3 -->
        <div class="nav-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>

        </div>
    </section>

    <!-- <img id="ad-produto" src="public/assets/img/ad-produtos.png" alt=""> -->
     <img id='ad-produto' src="/Tweeb-2025/PI/public/Banners/bannersSecundarios/<?= basename($bannerSecundarioPosicao1->caminho) ?>" alt="Banner secundario"  class="img-desktop">


    <div class="categorias">
        <div class="categorias-content">
            <div class="categorias-text">
                <div class="text">
                    <h1>Categorias</h1>
                </div>
            </div>
            <div class="categorias-card">
                <a href="App/user/Controllers/ControllerProd/Departamento_Hardwares.php" class="card card1">
                    <img src="public/assets/img/phone-icon.png" alt="hardware">
                    <p>Hardwares</p>
                </a>
                <a href="App/user/Controllers/ControllerProd/Departamento_Perifericos.php" class="card card2">
                    <img src="public/assets/img/perifericos-icon.png" alt="periféricos">
                    <p>Periféricos</p>
                </a>
                <a href="App/user/Controllers/ControllerProd/Departamento_Energia.php" class="card card3">
                    <img src="public/assets/img/energia-icon.png" alt="periféricos">
                    <p>Energia</p>
                </a>
                <a href="App/user/Controllers/ControllerProd/Departamento_Audio.php" class="card card4">
                    <img src="public/assets/img/audio-icon.png" alt="periféricos">
                    <p>Aúdio</p>
                </a>
                <a href="App/user/Controllers/ControllerProd/Departamento_Computadores.php" class="card card5">
                    <img src="public/assets/img/computadores-icon.png" alt="periféricos">
                    <p>Computadores</p>
                </a>
                <a href="App/user/Controllers/ControllerProd/Departamento_Games.php" class="card card6">
                    <img src="public/assets/img/jogos-icon.png" alt="periféricos">
                    <p>Jogos</p>
                </a>
            </div>
        </div>
    </div>

    <section class="produtos">
        <div class="tabs">
            <button class="tab-button tab-button1">Novos Produtos</button>
        </div>

        
        <div class="produtos-grid" id="container-cards">
        <?php 
            $contador = 0;
            foreach ($produtos as $produto): 
                if ($contador >= 12) break;
                $contador++;
        ?>
            <div class="produtos-card">
            
                <img class="heart" src="/Tweeb-2025/PI/public/assets/img/heart_disabled.png" data-produto-id="<?= $produto['id_produto'] ?>" alt="Favoritar" onclick="AtivarCoracao(this)">
                
                <button class="add-carrinho-btn" data-id="<?= $produto['id_produto'] ?>" title="Adicionar ao carrinho">
                  <img class="add-carrinho" src="public/assets/img/carrinho-card.png" alt="Adicionar ao carrinho">
                </button>

                
                <img class="image-produto" src="/Tweeb-2025/PI/public/uploads/<?= htmlspecialchars(basename($produto['imagem_produto'])) ?>" alt="Imagem do Produto" style="width: 160px; height: 160px;">

                

                <p><?= htmlspecialchars($produto['nome_produto']) ?></p>
                <p><?= htmlspecialchars($produto['marca_modelo']) ?></p>
                <h1>R$<?= number_format($produto['preco_unid'], 2, ',', '.') ?></h1>

            <div class="card-rate">
                <?php
                    $media = $produtoController->getMediaNotasPorProduto($produto['id_produto']);
                    $estrelasCheias = floor($media);
                    $estrelaMeia = ($media - $estrelasCheias) >= 0.5;
                    $totalEstrelas = 5;

                    for ($i = 0; $i < $estrelasCheias; $i++) {
                        echo '<i class="fa-solid fa-star"></i>';
                    }

                    if ($estrelaMeia) {
                        echo '<i class="fa-solid fa-star-half-stroke"></i>';
                        $estrelasCheias++;
                    }

                    for ($i = $estrelasCheias; $i < $totalEstrelas; $i++) {
                        echo '<i class="fa-regular fa-star"></i>';
                    }
                ?>
                <span class="qnt-avaliacoes">(<?= $media ?>)</span>
            </div>

                <a href="App/user/View/pages/descproduto.php?id_produto=<?= $produto['id_produto'] ?>">

                    <button class="card-botao">Comprar Agora</button>
                </a>
         </div>
        <?php endforeach; ?>
        </div>

    </section>

    </div>

      <div class="anuncios">
        <a href="App/user/Controllers/ControllerProd/KitSetupController.php" class="img-responsiva" >
            <img src="/Tweeb-2025/PI/public/Banners/bannersPromocionais/<?= basename($bannerPromocionalPosicao2->caminho) ?>" alt="Banner promocionais"  class="img-desktop">
    </a>
        <!-- <a href="App/user/View/pages/do-seu-jeito.php" class="img-responsiva">
            <img src="/Tweeb-2025/PI/public/Banners/bannersPromocionais/<?= basename($bannerPromocionalPosicao3->caminho) ?>" alt="Banner promocionais"  class="img-desktop">
        </a> -->
        <a href="App/user/View/pages/corporativo.php" class="img-responsiva">
            <img src="/Tweeb-2025/PI/public/Banners/bannersPromocionais/<?= basename($bannerPromocionalPosicao4->caminho) ?>" alt="Banner promocionais"  class="img-desktop">
        </a>
      </div>
      <br>

      <section class="produtos">
    <div class="produtos-grid" id="container-cards-2">
        <?php 
            $contador = 0;
            $limite = 0;
            foreach ($produtos as $produto): 
                $contador++;
                if ($contador <= 12) continue; // pula os 12 primeiros
                if ($limite >= 12) break;      // mostra só os 12 seguintes
                $limite++;
        ?>
        <div class="produtos-card">

             <img class="heart" src="/Tweeb-2025/PI/public/assets/img/heart_disabled.png" data-produto-id="<?= $produto['id_produto'] ?>" alt="Favoritar" onclick="AtivarCoracao(this)">
            
            <button class="add-carrinho-btn" data-id="<?= $produto['id_produto'] ?>" title="Adicionar ao carrinho">
              <img class="add-carrinho" src="public/assets/img/carrinho-card.png" alt="Adicionar ao carrinho">
            </button>

            <img class="image-produto" src="/Tweeb-2025/PI/public/uploads/<?= htmlspecialchars(basename($produto['imagem_produto'])) ?>" alt="Imagem do Produto" style="width: 160px; height: 160px;">

            <p><?= htmlspecialchars($produto['nome_produto']) ?></p>
            <p><?= htmlspecialchars($produto['marca_modelo']) ?></p>
            <h1>R$<?= number_format($produto['preco_unid'], 2, ',', '.') ?></h1>

                <a href="App/user/View/pages/descproduto.php?id_produto=<?= $produto['id_produto'] ?>">

                    <button class="card-botao">Comprar Agora</button>
                </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>
        
    </div>
</section>

        <br>
       

      <div class="img-anuncio">
        <a href="#">
            <img src="/Tweeb-2025/PI/public/Banners/bannersPromocionais/<?= basename($bannerPromocionalPosicao1->caminho) ?>" alt="Banner promocionais"  class="img-desktop">
    </a>
      </div>


    <?php include __DIR__.'/includes/voltar-ao-topo.php'; ?>
    <?php include __DIR__.'/includes/footer-home.php'; ?>
</body>
<script src="/Tweeb-2025/PI/public/js/favoritos.js"></script>
</html>