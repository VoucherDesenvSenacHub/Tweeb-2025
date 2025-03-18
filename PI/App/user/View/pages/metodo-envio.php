<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../../public/css/ENVIO.CSS">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>



<body>
    <header>
        <div class="logo">
            <img src="../imagens/logo2.png" alt="logo tweeb">
        </div>
        <div class="search-box">
            <form action="">
                <button type="submit"><i class='bx bx-search'></i></button>
                <input type="text" name="search" class="srch" placeholder="Buscar">
            </form>
        </div>
        <nav>
            <ul>
                <li><a href="../index.html/homepage.html">Home</a></li>
                <li><a href="../index.html/QUEMSOMOS.HTML">Sobre</a></li>
                <li><a href="../index.html/ORCAMENTOO.HTML">Orçamento</a></li>
                <li><a href="../index.html/CADASTRO.html">Cadastre-se</a></li>
                <li>
                    <a href="favoritos.html"><i class='bx bx-heart'></i></a>
                    <a href="carrinho.html"><i class='bx bx-cart-alt'></i></a>
                    <a href="EDITARPERFIL.html"><i class='bx bx-user'></i></a>
                </li>
            </ul>
        </nav>
        
    </header>

<body>

    <div class="container">
        <div class="step-indicator">
            <span class=""><i class="fa-solid fa-location-dot"></i> Passo 1 <br> Endereço</span>
            <span class="active"><i class="fa-solid fa-boxes-packing"></i> Passo 2 <br> Entrega </span>
            <span class=""><i class="fa-solid fa-credit-card"></i> Passo 3 <br> Pagamento </span>
          
        </div>
    
        <h1>Metódo de Envio</h1>
    
        <div class="envios">

            <div class="envio-card">
                <label>
                    <input type="radio" name="envio" value="gratis" checked>
                    <div class="envio-details">
                        <p><strong>Gratís</strong></p>
                        <p>Envio comum, prazo de 20 dias úteis.</p>

                    </div>
                </label>       
            </div>
    
            <div class="envio-card">
                <label>
                    <input type="radio" name="envio" value="pago">
                    <div class="envio-details">
                        <p><strong>SEDEX</strong> <span class="default-tag">PADRÃO</span></label><p>
                        Trasportadora, prazo de 5 dias úteis ou agende a melhor data para você.</p>
                        
                    </div>
                </label>
            </div>

            <div class="envio-card">
                <label>
                    <input type="radio" name="envio" value="pago">
                    <div class="envio-details">
                        <p><strong>Agendamento</strong></p>
                        <p>Agende a melhor data para você, escolha o dia da seu produto chegar.</p>
                        <input type="date">
                        <button class="btao-data">Agendar data <i class="fa-solid fa-calendar-days"></i></button>
                    </div>
                </label>
            </div>


        </div>


    
     
    
        <a href="../index.html/descproduto.html" class="btoes-envio">Sair</a>
        <a href="../index.html/pagamento.html" class="btoes-envio">Avançar</a>
    
      
    
    
    </div>

    
   
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    
    
    
    <footer>
        <div class="footer-container">
            <div class="logo">
                <img src="../imagens/logosembg.png" alt="logotweeb">
                
                <p>Sua conexão com o futuro, garantimos hoje.</p>
                
    
    
            <div id="footer_social_midia">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>  
            </div>
    
            </div>
    
      
            <div class="links">
                <div class="departmentos">
                    <h2>Departamentos</h2>
                    <ul>
                        <li><a href="#">Computadores</a></li>
                        <li><a href="#">Hardwares</a></li>
                        <li><a href="#">Periféricos</a></li>
                        <li><a href="#">Energia</a></li>
                        <li><a href="#">Áudio</a></li>
                        <li><a href="#">Games</a></li>
                    </ul>
                </div>
    
                
    
                <div class="institutional">
                    <h2>Institucional</h2>
                    <ul>
                        <li><a href="../index.html/QUEMSOMOS.HTML">Quem somos</a></li>
                        <li><a href="#">Localização</a></li>
                        <li><a href="#">Políticas do Site</a></li>
                    </ul>
                </div>
    
                <div class="contato">
                    <h2>Contatos</h2>
                    <p>Email: <a href="../index.html/FALECONOSCO.html">tweeb@comercial.com</a></p>
                    <p>Telefone: (67) 1234-5678</p>
                   
                </div>
    
        </div>
</footer>
</body>
</html> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../../public/css/metodo-envio.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <script defer src="../../../../public/js/metodo-envio.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar.php'; ?>

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