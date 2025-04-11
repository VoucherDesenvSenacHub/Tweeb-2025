<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site_PI</title>
    <link rel="stylesheet" href="../../../../public/css/pagina_3_pesquisa_cadastro.css">


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

<body class="pesquisa3-cadastro-body">
    <header class="pesquisa3-cadastro-header">
        <img src="../../../../public/assets/img/logo_img.png" alt="image-1" class="pesquisa3-cadastro-logo-tweeb">
        <div class="pesquisa3-cadastro-container-input">
            <img src="../../../../public/assets/img/Search (1).png" alt="search-icon" class="pesquisa3-cadastro-search-icon">
            <input type="search" placeholder="Busca" class="pesquisa3-cadastro-input">
        </div>
        <div class="pesquisa3-cadastro-links-header-container">
            <a href="./cadastro.php" class="pesquisa3-cadastro-header-p-cadastro">
                Cadastro
            </a>
            <a href="./quemsomos.php" class="pesquisa3-cadastro-header-p-sobre">
                Sobre
            </a>
        </div>
    </header>
    <div class="pesquisa3-cadastro-barra-roxa"></div>
    <div class="pesquisa3-cadastro-voltar-button">
        <a href="../pages/pagina_2_pesquisa_cadastro.php" class="pesquisa3-cadastro-link-voltar-button">
            <img src="../../../../public/assets/img/Icon_voltar (1).png" alt="voltar_icon" class="pesquisa3-cadastro-voltar-icon">
            Voltar
        </a>
    </div>
    <div class="pesquisa3-cadastro-titles-container">
        <h1 class="pesquisa3-cadastro-h1-title">
            Deseja fazer uma compra pessoal ou corporativa?
        </h1>
        <h2 class="pesquisa3-cadastro-h2-title">
            Não esqueça de dar uma espiadinha em nossos planos promocionais.
        </h2>
    </div>
    <div class="pesquisa3-cadastro-cards-container">
        <div class="pesquisa3-cadastro-card1">
            <img src="../../../../public/assets/img/fone 1.png" alt="" class="pesquisa3-cadastro-img-card1">
            <h1 class="pesquisa3-cadastro-h1-card1">
                Uma compra pessoal.
            </h1>
            <h2 class="pesquisa3-cadastro-h2-card1">
                Estou procurando algo que atenda às minhas necessidades individuais e ao meu gosto pessoal. 
            </h2>
        </div>

        <div class="pesquisa3-cadastro-card2">
            <img src="../../../../public/assets/img/Instagram Post Dia Internacional do Gamer Tech Preto e Rosa (5) 1.png" alt="" class="pesquisa3-cadastro-img-card2">
            <h1 class="pesquisa3-cadastro-h1-card2">
                Uma compra corporativa.
            </h1>
            <h2 class="pesquisa3-cadastro-h2-card2">
                Precisamos de produtos ou serviços que possam atender às demandas da nossa empresa e que sejam adequados para um ambiente corporativo.
            </h2>
        </div>
    </div>
    <div class="pesquisa3-cadastro-continuar-button-container">
        <button class="pesquisa3-cadastro-button" onclick="window.location.href='../../../../home.php'">Continuar</button>
    </div>
    <footer class="pesquisa3-cadastro-footer">
        <div class="pesquisa3-cadastro-barra-roxa-footer"></div>
    </footer>
    <form id="respostaFinal" action="/Tweeb-2025/PI/App/user/controllers/salvar_respostas.php" method="POST" style="display:none;">
    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
    <input type="hidden" name="resposta1" id="resposta1">
    <input type="hidden" name="resposta2" id="resposta2">
    <input type="hidden" name="resposta3" id="resposta3">
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Armazena a resposta da escolha entre pessoal e corporativo
        document.querySelector('.pesquisa3-cadastro-card1').addEventListener('click', function () {
            localStorage.setItem('resposta3', 'pessoal');
        });

        document.querySelector('.pesquisa3-cadastro-card2').addEventListener('click', function () {
            localStorage.setItem('resposta3', 'corporativo');
        });

        // Envia as respostas ao clicar no botão
        document.getElementById('finalizar').addEventListener('click', function () {
            const r1 = localStorage.getItem('resposta1') || '';
            const r2 = localStorage.getItem('resposta2') || '';
            const r3 = localStorage.getItem('resposta3') || '';

            // (Opcional) Validação: impede envio com campos vazios
            if (!r1 || !r2 || !r3) {
                alert('Por favor, responda todas as perguntas antes de continuar.');
                return;
            }

            // Preenche os inputs do formulário oculto
            document.getElementById('resposta1').value = r1;
            document.getElementById('resposta2').value = r2;
            document.getElementById('resposta3').value = r3;

            // Envia o formulário
            document.getElementById('respostaFinal').submit();
        });
    });
</script>


    <script src="../../../../public/js/pesquisa3.js"></script>
</body>
</html>
