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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../../public/css/escolha-endereco.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>

<div class="container">
    <div class="step-indicator">
        <span class="" id="step-ativo">
            <i class="fa-solid fa-magnifying-glass-location"></i>
            <div class="span-information">
                <p id="step-passo">Passo 1</p>
                <p>Endereço</p>
            </div>
        </span>
        
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="">
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
        <h1 class="metodoh1">Selecione Endereço</h1>
        <div class="endereco-card">
            <label>
                <input type="radio" id="endereco" name="endereco" value="casa" checked>
                <label class="endereco-label" for="endereco">Casa</label>
                <div class="endereco-details">
                    <p>240 Rua Capiatá, Novos Estados, Campo Grande MS 79034331</p>
                    <p>(209) 555-0104</p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>

        <div class="endereco-card">
            <label>
                <input type="radio" id="endereco" name="endereco" value="trabalho">
                <label class="endereco-label" for="endereco">Trabalho <span class="default-tag">PADRÃO</span></label>
                <div class="endereco-details">
                    <p>2715 RUA Dr Jose, Caranda Bosque, Campo Grande MS 79034331</p>
                    <p>(67) 555-0127</p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa-solid fa-xmark"></i></button>
                
            </div>
        </div>
    </div>

  
    
    <div id="new-endereco-form" style="display: none;">
        <h2>Adicionar Novo Endereço</h2>
        <form id="form-novo-endereco">
            <label for="nome-endereco">Nome (ex: Casa, Trabalho):</label>
            <input type="text" id="nome-endereco" required>
    
            <label for="endereco-detalhes">Endereço Completo:</label>
            <input type="text" id="endereco-detalhes" required>
    
            <label for="telefone-endereco">Telefone:</label>
            <input type="text" id="telefone-endereco" required>
    
            <button type="submit" class="btoes-endereco">Salvar Endereço</button>


        </form>
    </div>
    
    <div class="enderecos" id="enderecos-list">
        <!-- Endereços existentes estarão aqui -->
    </div>

    <div class="add-new-endereco" id="add-new-endereco-btn">
        <i class="fa-solid fa-circle-plus"></i>
        <p>Adicionar novo endereço</p>
    </div>


    <div class="endereco-botoes">
        <a href="../../../../home.php"><button class="botao-sair">Sair</button></a>
        <a href="metodo-envio.php"><button class="botao-avancar">Avançar</button></a>
    </div>

  


</div>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>

</html>















