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
    <title>Pagamento</title>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
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
        <span class="" id="">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="" id="step-ativo">
            <i class="fa-solid fa-credit-card"></i>
            <div class="span-information">
                <p id="step-passo">Passo 3</p>
                <p>Pagamento</p>
            </div>
        </span>
      
    </div>

   
    <div class="pix-pago-container">
        <div class="pix-pago-resumo">
            <h2 class="pix-pago-titulo">Resumo da Compra</h2>
            <div class="pix-pago-item">
                <img src="../../../../public/assets/img/image 56.png" alt="Placa de vídeo">
                <span class="nome-produto-pix">PLACA DE VÍDEO GTX 1660</span>
                <span>R$1.399,99</span>
            </div>
            <div class="pix-pago-item">
                <img src="../../../../public/assets/img/image 56.png" alt="Monitor Samsung">
                <span class="nome-produto-pix">MONITOR SMART SAMSUNG M5</span>
                <span>R$1.899,99</span>
            </div>
            <div class="pix-pago-item">
                <img src="../../../../public/assets/img/image 56.png" alt="SSD Samsung">
                <span class="nome-produto-pix">SSD SAMSUNG 990 PRO, 4TB</span>
                <span>R$3.239,00</span>
            </div>
            <p class="pix-pago-endereco">Endereço: Rua Capiatá, Novos Estados, 270, Campo Grande - MS</p>
            <p class="pix-pago-envio">Método de envio: Grátis</p>
            <div class="pix-pago-total">
                <p class="pix-resumo-compra">Subtotal: R$6.599,97</p>
                <p class="pix-resumo-compra">Imposto estimado: R$50</p>
                <p class="pix-resumo-compra">Manuseios: R$29</p>
                <h3 class="pix-resumo-compra">Total: R$6.678,97</h3>
            </div>
        </div>
        <div class="pix-pago-pagamento">
            <h2 class="pix-pago-titulo">Pagamento</h2>
            <img src="../../../../public/assets/img/qrcode.png" alt="QR Code Pix" class="pix-pago-qrcode">
            <p class="pix-pago-fatura">Fatura #96418</p>
            <p class="pix-pago-valor">Valor: R$6.678,97</p>
            <div class="pix-pago-instrucoes">
                <p><strong>Passo a passo para pagamento via Pix:</strong></p>
                <p>1. Abra o app do seu banco ou instituição financeira.</p>
                <p>2. Entre no ambiente Pix.</p>
                <p>3. Escolha a opção de QR Code e escaneie a imagem ao lado.</p>
                <p>4. Confirme as informações e finalize o pagamento.</p>
            </div>
            <button class="pix-pago-botao" onclick="copiarChavePix()">COPIAR CHAVE PIX</button>
        </div>
    </div>

</div>

    <div class="endereco-botoes">
        <a href="escolha-endereco.php"><button class="botao-sair">Sair</button></a>
    </div>

  


</div>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>

</html>