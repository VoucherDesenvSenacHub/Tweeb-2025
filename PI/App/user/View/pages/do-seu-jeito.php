<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
<?php include __DIR__.'/../../../../includes/navbar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="public/css/navbar.css"> -->
    <!-- <link rel="stylesheet" href="public/css/Task19.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <title>Tweeb</title>
</head>
<body class="do-seu-jeito-body">
    <!--############################################FIM NAV BAR############################################-->

    <img src="../../../../public/assets/img/banner-do-seu-jeito.png" alt="Banner" class="do-seu-jeito-banner1">

    <div class="do-seu-jeito-countainer-components">
        <div class="do-seu-jeito-components">
          <ul class="do-seu-jeito-ul-components">
            <li class="do-seu-jeito-processador active"><a href="#">Processador</a></li>
            <li class="do-seu-jeito-placa-mae"><a href="Task19-placamae.html">Placa Mãe</a></li>
            <li class="do-seu-jeito-ram"><a href="#">RAM</a></li>
            <li class="do-seu-jeito-placa-de-video"><a href="#">Placa de Vídeo</a></li>
            <li class="do-seu-jeito-hd-e-ssd"><a href="#">HD e SSD</a></li>
            <li class="do-seu-jeito-gabinete"><a href="#">Gabinete</a></li>
            <li class="do-seu-jeito-alimentação"><a href="#">Alimentação</a></li>
            <li class="do-seu-jeito-perifericos"><a href="#">Periféricos</a></li>
            <li class="do-seu-jeito-revisao"><a href="#">Revisão</a></li>
          </ul>
        </div>
    </div>

    
    <div class="do-seu-jeito-countainer-products">
        <div class="do-seu-jeito-titles-countainer">
            <div class="do-seu-jeito-items-information">
                <h2 class="do-seu-jeito-product-name">Nome do produto</h2>
                <h2 class="do-seu-jeito-product-value">Valor</h2>
                <h2 class="do-seu-jeito-product-amount">Quantidade</h2>
            </div>
        </div>

        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>


        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>


        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>


        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>


        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>


        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>


        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>


        <div class="produto-container">

            <div class="do-seu-jeito-product" id="do-seu-jeito-product-1">
                <img src="../../../../public/assets/img/imagem-produto-removebg-preview.png" alt="processador" class="do-seu-jeito-img-product" id="do-seu-jeito-img-product">
                <p class="do-seu-jeito-name" id="do-seu-jeito-name">Processador AMD Ryzen 3</p>
                <p class="do-seu-jeito-value" id="do-seu-jeito-value">R$ 458,99</p>
    
                <div class="arrows-prod">
                    <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow" class="do-seu-jeito-left-arrow">
                    <div class="do-seu-jeito-amount-square" id="do-seu-jeito-amount-square"><p class="do-seu-jeito-amount">-</p></div>
                    <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow" class="do-seu-jeito-right-arrow">
                </div>
    
                <div class="do-seu-jeito-product-bottom">
                    <div class="do-seu-jeito-sub-bottom">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
            </div>


            <!-- menu que abre para ver os detalhes do produto -->
            <div class="produto-ver-mais div-desativado" id="produto-ver-mais">
                <div class="do-seu-jeito-product-button">
                    <div class="do-seu-jeito-sub-button">
                        <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="arrow" id="do-seu-jeito-bottom-arrow">
                    </div>
                </div>
                <div class="ver-mais-image-details">
                    <h1>AMD Ryzen 5 5600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler
                    </h1>
                    <img src="../../../../public/assets/img/processadorgrande.png" class="produto-ver-mais-img" alt="">
                </div>
                <!-- <div class="ver-mais-precos">
                    
                </div> -->
                <div class="ver-mais-produto-config">

                    <div class="product-especifications">
            
                        <table class="ver-mais-product-specs">
                            <tr>
                                <td>- Marca</td>
                                <td class="product-right">Mancer</td>
                            </tr>
                            <tr>
                                <td>- Modelo</td>
                                <td class="product-right">MCR-GTX1660S-HDLL</td>
                            </tr>
                            <tr>
                                <td>- Frequência do núcleo</td>
                                <td class="product-right">1530 MHz</td>
                            </tr>
                            <tr>
                                <td>- Núcleos CUDA</td>
                                <td class="product-right">1408</td>
                            </tr>
                            <tr>
                                <td>- Interface</td>
                                <td class="product-right">PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>- Sistema de refrigeração</td>
                                <td class="product-right">Dual Fan</td>
                            </tr>
                            <tr>
                                <td>- GPU</td>
                                <td class="product-right">GeForce GTX 1660 Super</td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>

    <div class="do-seu-jeito-pagination-countainer">
        <img src="../../../../public/assets/img/Arrow copy.png" alt="arrow" id="do-seu-jeito-left-arrow-pagination">
        <div class="do-seu-jeito-page-cube">
            <p class="do-seu-jeito-page-number" id="do-seu-jeito-numero-pagina">1</p>
        </div>
        <img src="../../../../public/assets/img/Arrow.png" alt="right-arrow" id="do-seu-jeito-right-arrow-pagination">
    </div>

    <div class="do-seu-jeito-continue-button-countainer">
        <button class="do-seu-jeito-continue-button">
            <p class="do-seu-jeito-text-continue-button"><a href="#">AVANÇAR</a></p>
        </button>
    </div>


    <?php include __DIR__.'/../../../../includes/footer.php'; ?>

</body>
</html>