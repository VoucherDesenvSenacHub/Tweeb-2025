<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site_PI</title>
    <link rel="stylesheet" href="../../../../public/css/pagina_1_pesquisa_cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        .modal-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            z-index: 1001;
            min-width: 300px;
        }

        .modal-icon {
            font-size: 50px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
        }
    </style>
</head>

<body class="pesquisa1-cadastro-body">
    <!-- Modal de Sucesso -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-container">
            <div class="modal-icon">✓</div>
            <div class="modal-title">Cadastrado com Sucesso!</div>
        </div>
    </div>

    <header class="pesquisa1-cadastro-header">
        <?php
        if (isset($_SESSION['mostrar_modal']) && $_SESSION['mostrar_modal']) {
            echo "<script>
                window.onload = function() {
                    document.getElementById('modalOverlay').style.display = 'block';
                    setTimeout(function() {
                        document.getElementById('modalOverlay').style.display = 'none';
                    }, 2000);
                }
            </script>";
            unset($_SESSION['mostrar_modal']); // Remove a flag da sessão
        }
        ?>
        <img src="../../../../public/assets/img/logo_img.png" alt="image-1" class="pesquisa1-cadastro-logo-tweeb">
        <div class="pesquisa1-cadastro-container-input">
            <img src="../../../../public/assets/img/Search (1).png" alt="search-icon" class="pesquisa1-cadastro-search-icon">
            <input type="search" placeholder="Busca" class="pesquisa1-cadastro-input">
        </div>
        <div class="pesquisa1-cadastro-links-header-container">
            <a href="./cadastro.php" class="pesquisa1-cadastro-header-p-cadastro">Cadastro</a>
            <a href="./quemsomos.php" class="pesquisa1-cadastro-header-p-sobre">Sobre</a>
        </div>
    </header>
    
    <div class="pesquisa1-cadastro-barra-roxa"></div>
    
    <div class="pesquisa1-cadastro-voltar-button">
        <a href="../pages/cadastro.php" class="pesquisa1-cadastro-link-voltar-button">
            <img src="../../../../public/assets/img/Icon_voltar (1).png" alt="voltar_icon" class="pesquisa1-cadastro-voltar-icon">
            Voltar
        </a>
    </div>
    
    <div class="pesquisa1-cadastro-titles-container">
        <h1 class="pesquisa1-cadastro-h1-title">Qual seu conhecimento sobre tecnologia?</h1>
        <h2 class="pesquisa1-cadastro-h2-title">Queremos te conhecer melhor, conte um pouco mais sobre você.</h2>
    </div>
    
    <!-- Formulário de Preferências -->
    <form action="../../controllers/processar_preferencia.php" method="POST">
        <div class="pesquisa1-cadastro-cards-container">
            <div class="pesquisa1-cadastro-card1">
                <img src="../../../../public/assets/img/img1-cadastro2 (1).png" alt="" class="pesquisa1-cadastro-img-card1">
                <h1 class="pesquisa1-cadastro-h1-card1">
                    <input type="radio" name="conhecimento" value="pouco" id="pouco"> Tenho pouco conhecimento sobre tecnologia.
                </h1>
                <h2 class="pesquisa1-cadastro-h2-card1">
                    Consigo usar o básico, mas frequentemente preciso de ajuda com configurações e problemas mais complexos.
                </h2>
            </div>

            <div class="pesquisa1-cadastro-card2">
                <img src="../../../../public/assets/img/img2-cadastro2 (1).png" alt="" class="pesquisa1-cadastro-img-card2">
                <h1 class="pesquisa1-cadastro-h1-card2">
                    <input type="radio" name="conhecimento" value="muito" id="muito"> Tenho conhecimento sobre tecnologia.
                </h1>
                <h2 class="pesquisa1-cadastro-h2-card2">
                    Tenho facilidade em usar e configurar dispositivos, explorar novos aplicativos, produtos e suas especificações.
                </h2>
            </div>
        </div>

        <div class="pesquisa1-cadastro-continuar-button-container">
            <button type="submit" class="pesquisa1-cadastro-button">Continuar</button>
        </div>
    </form>

    <footer class="pesquisa1-cadastro-footer">
        <button class="pesquisa1-cadastro-barra-roxa-footer"></button>
    </footer>

    <script src="../../../../public/js/pesquisa1.js"></script>
</body>

</html>
