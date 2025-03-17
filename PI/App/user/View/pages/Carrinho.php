
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Carrinho</title>
</head>
<body class="Carrinho">
  <?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
  <div class="container">
    <div class="cart-items">
      <h1>Carrinho de compras</h1>
      <div class="item">
        <img src="../../../../public/assets/img/image 56.png" alt="Placa de video">
        <div class="detalhe">
          <p>Placa de Vídeo<br><span>MANCER GTX 1660 SUPER HEIMDAL</span></p>
          <p class="code">#25139526913984</p>
        </div>
        <div class="quantidade">
          <span class="minus"><i class="bi bi-dash-lg"></i></span>
          <span class="number" >1</span>
          <span class="plus"><i class="bi bi-plus-lg"></i></span>
        </div>
        
        <p class="preco">R$ 3.299,99</p>
        <button class="remover"> <i class="bi bi-x-lg"></i></button>
       
        
      </div>
      <div class="item">
        <img src="../../../../public/assets/img/image 56 (1).png" alt="Monitor">
        <div class="detalhe">
          <p>MONITOR SMART<br><spa>SAMSUNG M5, 27 POL. VA, FHD, 4MS</spa></p>
          <p class="code">#53459358345</p>
        </div>
        <div class="quantidade">
          <span class="minus"><i class="bi bi-dash-lg"></i></span>
          <span class="number" >1</span>
          <span class="plus"><i class="bi bi-plus-lg"></i></span>
        </div>
        <p class="preco">R$ 3.299,99</p>
        <button class="remover"> <i class="bi bi-x-lg"></i> </button>
      </div>
      <div class="item " id="item3">
        <img src="../../../../public/assets/img/image 56 (2).png" alt="SSD">
        <div class="detalhe">
          <p><span>SSD SAMSUNG 990 PRO, 4TB, M.2 2280, PCIE NVME</span></p>
          <p class="code">#63632324</p>
        </div>
        <div class="quantidade">
          <span class="minus"><i class="bi bi-dash-lg"></i></span>
          <span class="number" >1</span>
          <span class="plus"><i class="bi bi-plus-lg"></i></span>
        </div>
        <p class="preco">R$ 3.299,99</p>
        <button class="remover"><i class="bi bi-x-lg"></i></i> </button>
      </div>
      <button class="continuar"><a href="#">Continuar comprando</a></button>
    </div>
    <div class="revisao-itens">
      <div class="cod-promo">
        <label for="codigo">Código de desconto / Código promocional</label>
        <div class="input-group">
          <input type="text" id="codigo" placeholder="Digite o código">
          <button class="aplicar-btn">Aplicar</button>
        </div>
      </div>
     
      <div class="resumo-pedido">
        <div class="line1">
          <span>Subtotal</span>
          <span>R$ 6.599,99</span>
        </div>
        <div class="line-carrinho">
          <span>Imposto estimado</span>
          <span>R$50</span>
        </div>
        <div class="line-carrinho">
          <span>Frete</span>
          <span>Grátis</span>
        </div>
        <div class="line-carrinho">
          <span>Cupons</span>
          <span>R$0,00</span>
        </div>
        <div class="line1">
          <span>Total</span>
          <span>R$ 6.649,97</span>
        </div>
      </div>

      <button class="desconto"><a href="#">Continuar </a></button>
    </div>
  </div>
  
</body>
</html>