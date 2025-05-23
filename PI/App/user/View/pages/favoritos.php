<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Favoritos</title>
</head>
<body class="favoritos-usuario">

<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div class="container-favoritos-5">
<div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

  </div>

<div class="container-favoritos-5">
<div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>
  


</div>
   

<div class="container-favoritos-5">
<div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

    <div class="produtos-card">
        <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

        <a href="../PI/App/user/View/pages/Carrinho.php"><img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt=""></a>

        <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
        <div class="card-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span class="qnt-avaliacoes">(500+)</span>
        </div>
        <p>Monitor Gamer Curvo</p>
        <p>GAMING MG700 27</p>
        <h1>R$2535,99</h1>
        <button class="card-botao">Comprar Agora</button>
    </div>

        


</div>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
