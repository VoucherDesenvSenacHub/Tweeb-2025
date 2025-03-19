
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div class="container">
    <div class="step-indicator">
        <span class="">
            <i class="fa-solid fa-magnifying-glass-location"></i>
            <div class="span-information">
                <p id="step-passo">Passo 1</p>
                <p>Endereço</p>
            </div>
        </span>
        
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="" id="step-ativo">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="">
            <i class="fa-solid fa-credit-card"></i>
            <div class="span-information">
                <p id="step-passo">Passo 3</p>
                <p>Pagamento</p>
            </div>
        </span>
      
    </div>

    <div class="enderecos">
    <h1>Método de Envio</h1>
    
    <div class="endereco-card">
        <label class="envio-descricao">
            <input type="radio" id="envio1" name="envio" value="envio1">
            <label class="endereco-label" for="envio1">Grátis</label>
            <div class="endereco-details">
                <p>Envio Comum</p>
            </div>
        </label>
        <div class="endereco-actions">
            <p>28 julho, 2024</p>
        </div>
    </div>

    <div class="endereco-card">
        <label class="envio-descricao">
            <input type="radio" id="envio2" name="envio" value="envio2">
            <label class="endereco-label" for="envio2">R$8.50</label>
            <div class="endereco-details">
                <p>Receba sua entrega o mais rápido possível</p>
            </div>
        </label>
        <div class="endereco-actions">
            <p>26 julho, 2024</p>
        </div>
    </div>

    <div class="endereco-card">
        <label class="envio-descricao">
            <input type="radio" id="envio2" name="envio" value="envio2">
            <label class="endereco-label" for="envio2">Data</label>
        </label>
        <div class="endereco-actions">
            <form action="">
                <select name="" id="selecionar-data">
                    <option value="">Selecionar data</option>
                    <option value="">19/03</option>
                    <option value="">20/04</option>
                    <option value="">21/05</option>
                </select>
            </form>
        </div>
    </div>

</div>

    <div class="endereco-botoes">
        <a href="escolha-endereco.php"><button class="botao-sair">Sair</button></a>
        <a href=""><button class="botao-avancar">Avançar</button></a>
    </div>

  


</div>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>

</html>