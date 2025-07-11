<?php
session_start(); // Iniciando a sessão para manipulação das respostas
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site_PI</title>
    <link rel="stylesheet" href="../../../../public/css/pagina_2_pesquisa_cadastro.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body class="pesquisa2-cadastro-body">
    <header class="pesquisa2-cadastro-header">
        <img src="../../../../public/assets/img/logo_img.png" alt="logo" class="pesquisa2-cadastro-logo-tweeb" />
        <div class="pesquisa2-cadastro-container-input">
            <img src="../../../../public/assets/img/Search (1).png" alt="search-icon" class="pesquisa2-cadastro-search-icon" />
            <input type="search" placeholder="Busca" class="pesquisa2-cadastro-input" />
        </div>
        <div class="pesquisa2-cadastro-links-header-container">
            <a href="./cadastro.php" class="pesquisa2-cadastro-header-p-cadastro">Cadastro</a>
            <a href="./quemsomos.php" class="pesquisa2-cadastro-header-p-sobre">Sobre</a>
        </div>
    </header>

    <div class="pesquisa2-cadastro-barra-roxa"></div>

    <div class="pesquisa2-cadastro-voltar-button">
        <a href="../pages/pagina_1_pesquisa_cadastro.php" class="pesquisa2-cadastro-link-voltar-button">
            <img src="../../../../public/assets/img/Icon_voltar (1).png" alt="voltar_icon" class="pesquisa2-cadastro-voltar-icon" />
            Voltar
        </a>
    </div>

    <div class="pesquisa2-cadastro-titles-container">
        <h1 class="pesquisa2-cadastro-h1-title">Quais categorias de produtos mais te interessam?</h1>
        <h2 class="pesquisa2-cadastro-h2-title">Pense nos produtos que você frequentemente tem intenção de comprar.</h2>
    </div>

    <form method="POST" onsubmit="return irParaProximaPagina(event)">
        <div class="pesquisa2-cadastro-cards-container">
            <div class="pesquisa2-cadastro-card1 card-opcao">
                <img src="../../../../public/assets/img/Instagram Post Dia Internacional do Gamer Tech Preto e Rosa (3) 3.png" alt="card 1" class="pesquisa2-cadastro-img-card1" />
                <h1 class="pesquisa2-cadastro-h1-card1">
                    <input type="radio" name="categoria" value="games_computadores_hardwares" id="categoria1" required> Eu me interesso por games, computadores e hardwares.
                </h1>
                <h2 class="pesquisa2-cadastro-h2-card1">
                    Acompanho as novidades de teclados, mouses, monitores e componentes internos. Estou sempre em busca de melhorias para o meu setup.
                </h2>
            </div>

            <div class="pesquisa2-cadastro-card2 card-opcao">
                <img src="../../../../public/assets/img/Instagram Post Dia Internacional do Gamer Tech Preto e Rosa (4) 3.png" alt="card 2" class="pesquisa2-cadastro-img-card2" />
                <h1 class="pesquisa2-cadastro-h1-card2">
                    <input type="radio" name="categoria" value="tecnologia_dia_a_dia" id="categoria2" required> Eu me interesso por tecnologia para o dia a dia.
                </h1>
                <h2 class="pesquisa2-cadastro-h2-card2">
                    Gosto de som de alta qualidade, itens para otimizar energia. Estou sempre buscando formas de aprimorar minha experiência.
                </h2>
            </div>
        </div>

        <div class="pesquisa2-cadastro-continuar-button-container">
            <button type="submit" class="pesquisa2-cadastro-button">Continuar</button>
        </div>
    </form>

    <footer class="pesquisa2-cadastro-footer">
        <div class="pesquisa2-cadastro-barra-roxa-footer"></div>
    </footer>
    
    <script>
    function irParaProximaPagina(event) {
        event.preventDefault();
        const categoria = document.querySelector('input[name="categoria"]:checked');
        if (categoria) {
            // Armazena a resposta no sessionStorage
            sessionStorage.setItem('categoria', categoria.value);
            // Redireciona para a próxima página
            window.location.href = 'pagina_3_pesquisa_cadastro.php';
        } else {
            alert('Por favor, selecione uma opção para continuar.');
        }
        return false;
    }
    </script>
</body>

</html>
