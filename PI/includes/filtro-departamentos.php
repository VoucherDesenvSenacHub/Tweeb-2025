<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Filtro de Produtos</title>
    <style>
        .filtrodept-container-geral {
        position: absolute;
        top: 855px;
        left: 190px;
        height: auto; /* Mantém o filtro visível enquanto a página rola */
        overflow-y: auto; /* Permite rolagem interna se os filtros forem longos */
        background-color: white;
        padding: 20px;
        /* box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); */
        z-index: 1000;
        width: 350px;
        /* overflow-y: auto; */
}
        .filtrodept-group {
            border-bottom: 2px solid #ddd;
            padding: 20px;
            margin-bottom: 10px;
            width: 300px;
        }
        .filtrodept-group label {
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }
        .filtrodept-options {
            display: none;
            margin-top: 5px;
        }
        .filtrodept-slider-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
            width: 300px;
        }
        .filtrodept-range-container {
            position: relative;
            width: 100%;

        }
        .filtrodept-range {
            position: absolute;
            width: 100%;
            appearance: none;
            pointer-events: none;
            height: 4px;
            background: #ddd;
            border-radius: 4px;
            margin-bottom: 50px;
        }
        .filtrodept-range::-webkit-slider-thumb {
            appearance: none;
            width: 15px;
            height: 15px;
            background: #291E40;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid white;
            pointer-events: auto;
            position: relative;
            z-index: 2;
        }
        .filtrodept-values {
            display: flex;
            justify-content: space-between;
            width: 100%;
            font-size: 16px;
            margin-top: 30px;
            margin-bottom: 20px;
        }



        input[type="checkbox" i]{
            appearance: none; /* Remove o estilo padrão */
            width: 12px;
            height: 12px;
            border: 1px solid #D3D3D3; /* Cor do contorno */
            border-radius: 2px;
            cursor: pointer;
            position: relative;
            background-color: white;
        }
        input[type="checkbox"]:checked {
            background-color: #291E40; /* Cor de fundo quando marcado */
            border-color: #291E40;
        }
        input[type="checkbox"]::after {
            content: "";
            position: absolute;
            width: 1px;
            height: 2px;
            border: solid white;
            border-width: 0 1px 1px 0;
            transform: rotate(45deg);
            display: none;
            align-items: center;
            padding: 2px;
            left: 1.5px;
        }   
        input[type="checkbox"]:checked::after {
            display: block;
        }
        
        
.filtrodept-range {
    -webkit-appearance: none; /* Remove o estilo padrão */
    width: 100%;
    height: 4px; /* Espessura da barra */
    background: #291E40; /* Cor da barra */
    border-radius: 4px;
    outline: none;
}

/* Estiliza o controle deslizante (a bolinha) */
.filtrodept-range::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 15px;
    height: 15px;
    background: #291E40; /* Cor da bolinha */
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

/* Firefox */
.filtrodept-range::-moz-range-track {
    height: 8px;
    background: #291E40;
    border-radius: 4px;
}

.filtrodept-range::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: #291E40;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid white;
}

#filtrodept-brandList{
    margin-bottom: 10px;
}
        
        .filtrodept-values {
            display: flex;
            justify-content: space-between;
            width: 100%;
            font-size: 16px;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .filtrodept-search {
            width: 90%;
            padding: 5px;
            margin-top: 10px;
            box-sizing: border-box;
            border-radius: 6px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            height: 40px;
            border: transparent;
        }
        .filtrodept-list {
            margin-top: 20px;
            
        }
        .filtrodept-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 5px 0;
        
        }
        .filtrodept-arrow {
            transition: transform 0.3s !important;
        }
        .expanded .filtrodept-arrow {
            transform: rotate(180deg) !important;
        }

        
        .brand-name {
        color: #000000; /* Cor desejada para o nome */
        font-weight: 600;
        }

        .brand-count {
        color: #888; /* Cor desejada para o número */
        }

        .filtros {
            display: none; /* Começa escondido */
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
        }

        .filtrar-departamentos{
            background-color: #291E40;
            border-radius: 5px;
            width: 100px;
            height: 40px;
            color: #d5d5d5 ;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .filtrodept-container-geral {
            scrollbar-width: thin; /* Para Firefox */
            scrollbar-color: #888 #f1f1f1; /* Cor do thumb e do track */
        }

        /* Para navegadores baseados em WebKit (Chrome, Edge, Safari) */
        .filtrodept-container-geral::-webkit-scrollbar {
            width: 1px; /* Largura da barra de rolagem */
            background: #000000;
        }

        .filtrodept-container-geral::-webkit-scrollbar-track {
            background: #000000; /* Cor do fundo */
            border-radius: 10px; /* Borda arredondada */
        }

        .filtrodept-container-geral::-webkit-scrollbar-thumb {
            background: #888; /* Cor do botão da barra de rolagem */
            border-radius: 10px;
        }

        .filtrodept-container-geral::-webkit-scrollbar-thumb:hover {
            background: #555; /* Cor ao passar o mouse */
        }

    
        .filtrodept-container-geral {
            position: absolute;
            top: 855px;
            left: 190px;
            background-color: white;
            padding: 20px;
            z-index: 1000;
            width: 350px;
            display: block; 
        }

        .filtrodept-group {
            border-bottom: 2px solid #ddd;
            padding: 20px;
            margin-bottom: 10px;
            width: 300px;
        }

        .filtrodept-options {
            display: none;
            margin-top: 5px;
        }

        .filtrodept-arrow {
            transition: transform 0.3s;
        }

        .expanded .filtrodept-arrow {
            transform: rotate(180deg);
        }



        /* Personalização da barra de rolagem */
        .filtrodept-container-geral {
            scrollbar-width: thin; /* Para Firefox */
            scrollbar-color: #888 #f1f1f1; /* Cor do thumb e do track */
        }

        /* Para navegadores baseados em WebKit (Chrome, Edge, Safari) */
        .filtrodept-container-geral::-webkit-scrollbar {
            width: 1px;
            background: #000000;
        }

        .filtrodept-container-geral::-webkit-scrollbar-track {
            background: #000000;
            border-radius: 10px;
        }

        .filtrodept-container-geral::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .filtrodept-container-geral::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .filtrodept-container-geral {
        position: absolute;
        top: 855px;
        left: 190px;
        height: auto; /* Mantém o filtro visível enquanto a página rola */
        overflow-y: auto; /* Permite rolagem interna se os filtros forem longos */
        background-color: white;
        padding: 20px;
        z-index: 1000;
        width: 350px;
}

/* Ajustes do grupo do filtro */
.filtrodept-group {
    border-bottom: 2px solid #ddd;
    padding: 20px;
    margin-bottom: 10px;
    width: 300px;
}


/* Para telas pequenas (até 400px) */
@media (max-width: 400px) {
    .filtrodept-container-geral {
        position: relative; /* Ajusta a posição para o mobile */
        top: auto; /* Não precisa de top absoluto */
        left: auto; /* Remover a posição fixa */
        width: 100%; /* Filtro ocupa 100% da largura */
        padding: 10px; /* Reduz o padding no mobile */
    }

    .filtrodept-group {
        width: 100%; /* Cada grupo ocupa a largura total da tela */
        padding: 8px; /* Reduz o padding para o mobile */
    }

    .filtrodept-slider-container,
    .filtrodept-range {
        width: 100%; /* Ajuste a largura para 100% no mobile */
    }

    /* Ajusta a barra de rolagem */
    .filtrodept-container-geral::-webkit-scrollbar {
        width: 5px; /* Aumenta a largura da barra de rolagem */
    }

    .filtrodept-container-geral::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 5px;
    }

    /* Exibe o filtro com um botão para dispositivos móveis */
    .filtrar-departamentos {
        background-color: #291E40;
        border-radius: 5px;
        width: 100%;
        height: 40px;
        color: #d5d5d5;
        margin-top: 10px;
        display: block;
    }

    /* Mostrar filtro quando o botão for clicado */
    .filtrodept-container-geral.show {
        display: block;
    }
}

/* Para telas médias pequenas (até 600px) */
@media (max-width: 600px) {
    .filtrodept-container-geral {
        position: relative; /* Ajusta a posição para o mobile */
        top: auto; /* Não precisa de top absoluto */
        left: auto; /* Remover a posição fixa */
        width: 100%; /* Filtro ocupa 100% da largura */
        padding: 15px; /* Reduz o padding no mobile */
    }

    .filtrodept-group {
        width: 100%; /* Cada grupo ocupa a largura total da tela */
        padding: 12px; /* Reduz o padding para o mobile */
    }

    .filtrodept-slider-container,
    .filtrodept-range {
        width: 100%; /* Ajuste a largura para 100% no mobile */
    }

    /* Ajusta a barra de rolagem */
    .filtrodept-container-geral::-webkit-scrollbar {
        width: 5px; /* Aumenta a largura da barra de rolagem */
    }

    .filtrodept-container-geral::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 5px;
    }

    /* Exibe o filtro com um botão para dispositivos móveis */
    .filtrar-departamentos {
        background-color: #291E40;
        border-radius: 5px;
        width: 100%;
        height: 40px;
        color: #d5d5d5;
        margin-top: 10px;
        display: block;
    }

    /* Mostrar filtro quando o botão for clicado */
    .filtrodept-container-geral.show {
        display: block;
    }
}

@media (max-width: 669px) {
    .filtrodept-container-geral {
        position: relative; /* Ajusta a posição para o tablet */
        top: auto; /* Não precisa de top absoluto */
        left: auto; /* Remover a posição fixa */
        width: 100%; /* Filtro ocupa 100% da largura */
        padding: 15px; /* Ajusta o padding para tablet */
    }

    .filtrodept-group {
        width: 100%; /* Cada grupo ocupa a largura total da tela */
    }

    .filtrodept-slider-container,
    .filtrodept-range {
        width: 100%; /* Ajuste a largura para 100% no tablet */
    }

    .filtrar-departamentos {
        display: block;
    }

    .filtrodept-container-geral.show {
        display: block;
    }
}

@media (max-width: 779px) {
    .filtrodept-container-geral {
        position: relative; 
        top: 100%; /* Não precisa de top absoluto */
        left: auto; /* Remover a posição fixa */
        width: 100%; /* Filtro ocupa 100% da largura */
        padding: 15px; /* Ajusta o padding para tablet */
        justify-content: center;
    }

    .filtrodept-group {
        width: 100%; /* Cada grupo ocupa a largura total da tela */
    }

    .filtrodept-slider-container,
    .filtrodept-range {
        width: 100%; /* Ajuste a largura para 100% no tablet */
    }

    .filtrar-departamentos {
        display: block;
    }

    .filtrodept-container-geral.show {
        display: block;
    }
}

/* Para tablets pequenos (601px a 768px) */
@media (max-width: 768px) {
    .filtrodept-container-geral {
        position: relative; /* Ajusta a posição para o tablet */
        top: auto; /* Não precisa de top absoluto */
        left: auto; /* Remover a posição fixa */
        width: 100%; /* Filtro ocupa 100% da largura */
        padding: 15px; /* Ajusta o padding para tablet */
    }

    .filtrodept-group {
        width: 100%; /* Cada grupo ocupa a largura total da tela */
    }

    .filtrodept-slider-container,
    .filtrodept-range {
        width: 100%; /* Ajuste a largura para 100% no tablet */
    }

    .filtrar-departamentos {
        display: block;
    }

    .filtrodept-container-geral.show {
        display: block;
    }
}

/* Para tablets grandes e dispositivos com tela média (769px a 1024px) */
@media (max-width: 1024px) {
    .filtrodept-container-geral {
        position: relative;
        width: 100%;
        top:0%;
    }

    .filtrodept-group {
        width: 100%;
    }

    .filtrodept-slider-container,
    .filtrodept-range {
        width: 100%;
    }

    .filtrar-departamentos {
        display: block;
    }

    .filtrodept-container-geral.show {
        display: block;
    }
}

/* Filtro no desktop (continua igual ao seu código original) */
@media (min-width: 1025px) {
    .filtrodept-container-geral {
        position: absolute;
        margin-top: 20px;
        justify-content: center;
        margin-left: 5px;
        width: 350px;
    }

    .filtrodept-group {
        width: 300px;
    }

    .filtrodept-slider-container,
    .filtrodept-range {
        width: 300px;
    }
    
}



.filtrodept-container-geral {
    scrollbar-width: thin; /* Para Firefox */
    scrollbar-color: #888 #f1f1f1; /* Cor do thumb e do track */
}

/* Para navegadores baseados em WebKit (Chrome, Edge, Safari) */
.filtrodept-container-geral::-webkit-scrollbar {
    width: 5px;
    background: #000000;
}

.filtrodept-container-geral::-webkit-scrollbar-track {
    background: #000000;
    border-radius: 10px;
}

.filtrodept-container-geral::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

.filtrodept-container-geral::-webkit-scrollbar-thumb:hover {
    background: #555;
}

       



    </style>
</head>
<body-filtros>

    <!-- <h2>Filtrar Produtos</h2> -->
    <div class="filtrodept-container-geral">
    <div class="filtrodept-container">
        <div class="filtrodept-group">
            <label onclick="toggleOptions('filtrodept-priceOptions', this)">
                Preço <span class="filtrodept-arrow"><img src="../../../../public/assets/img/arrow-prabaixo-filtro.png" alt=""></span>
            </label>
            <div id="filtrodept-priceOptions" class="filtrodept-options">
                <div class="filtrodept-values">
                    <span id="filtrodept-minPrice">299</span>
                    <span id="filtrodept-maxPrice">16000</span>
                </div>
                <div class="filtrodept-range-container">
                    <input type="range" id="filtrodept-minRange" class="filtrodept-range" min="299" max="7000" step="1" value="299" oninput="updatePrice()">
                    <input type="range" id="filtrodept-maxRange" class="filtrodept-range" min="299" max="7000" step="1" value="7000" oninput="updatePrice()">
                </div>
            </div>
        </div>

        <div class="filtrodept-group">
            <label onclick="toggleOptions('filtrodept-brandOptions', this)">
                Marca <span class="filtrodept-arrow"><img src="../../../../public/assets/img/arrow-prabaixo-filtro.png" alt=""></span>
            </label>
            <div id="filtrodept-brandOptions" class="filtrodept-options">
                <input type="text" id="filtrodept-brandSearch" class="filtrodept-search" placeholder="Buscar" onkeyup="filterBrands()">
                <div id="filtrodept-brandList">
                    <input type="checkbox" class="filtrodept-brand" value="Samsung"> 
                    <span class="brand-name">Samsung</span> <span class="brand-count">(110)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="Lenovo"> 
                    <span class="brand-name">Lenovo</span> <span class="brand-count">(125)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="Xiaomi"> 
                    <span class="brand-name">Xiaomi</span> <span class="brand-count">(68)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="AOC"> 
                    <span class="brand-name">AOC</span> <span class="brand-count">(44)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="OPPO"> 
                    <span class="brand-name">OPPO</span> <span class="brand-count">(36)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="Asus"> 
                    <span class="brand-name">Asus</span> <span class="brand-count">(10)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="Dell"> 
                    <span class="brand-name">Dell</span> <span class="brand-count">(34)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="HP"> 
                    <span class="brand-name">HP</span> <span class="brand-count">(22)</span><br>
                    <input type="checkbox" class="filtrodept-brand" value="Multilaser"> 
                    <span class="brand-name">Multilaser</span> <span class="brand-count">(35)</span><br>
                </div>
            </div>
        </div>

        <div class="filtrodept-group">
            <label onclick="toggleOptions('filtrodept-memoryOptions', this)">
                Memória <span class="filtrodept-arrow"><img src="../../../../public/assets/img/arrow-prabaixo-filtro.png" alt=""></span>
            </label>
            <div id="filtrodept-memoryOptions" class="filtrodept-options">
                <input type="checkbox" class="filtrodept-memory" value="16GB"> 
                <span class="brand-name">16GB</span> <span class="brand-count">(65)</span><br>
                <input type="checkbox" class="filtrodept-memory" value="32GB"> 
                <span class="brand-name">32GB</span> <span class="brand-count">(123)</span><br>
                <input type="checkbox" class="filtrodept-memory" value="64GB"> 
                <span class="brand-name">64GB</span> <span class="brand-count">(48)</span><br>
                <input type="checkbox" class="filtrodept-memory" value="128GB"> 
                <span class="brand-name">128GB</span> <span class="brand-count">(50)</span><br>
                <input type="checkbox" class="filtrodept-memory" value="256GB"> 
                <span class="brand-name">256GB</span> <span class="brand-count">(24)</span><br>
                <input type="checkbox" class="filtrodept-memory" value="512GB"> 
                <span class="brand-name">512GB</span> <span class="brand-count">(8)</span><br>
            </div>
        </div>

        <div class="filtrodept-group">
            <label onclick="toggleOptions('filtrodept-modelo', this)">
                Modelo <span class="filtrodept-arrow"><img src="../../../../public/assets/img/arrow-prabaixo-filtro.png" alt=""></span>
            </label>
            <div id="filtrodept-modelo" class="filtrodept-options">
                <input type="checkbox" class="filtrodept-modelo" value="Notebook"> 
                <span class="brand-name">Notebook</span> <span class="brand-count">(85)</span><br>
                <input type="checkbox" class="filtrodept-modelo" value="Desktop"> 
                <span class="brand-name">Desktop</span> <span class="brand-count">(45)</span><br>
                <input type="checkbox" class="filtrodept-modelo" value="All-in-One"> 
                <span class="brand-name">All-in-One</span> <span class="brand-count">(30)</span><br>
                <input type="checkbox" class="filtrodept-modelo" value="Ultrabook"> 
                <span class="brand-name">Ultrabook</span> <span class="brand-count">(12)</span><br>
                <input type="checkbox" class="filtrodept-modelo" value="Gaming"> 
                <span class="brand-name">Gaming</span> <span class="brand-count">(58)</span><br>
            </div>
        </div>

        <div class="filtrodept-group">
            <label onclick="toggleOptions('filtrodept-cor', this)">
                Cor <span class="filtrodept-arrow"><img src="../../../../public/assets/img/arrow-prabaixo-filtro.png" alt=""></span>
            </label>
            <div id="filtrodept-cor" class="filtrodept-options">
                <input type="checkbox" class="filtrodept-cor" value="Preto"> 
                <span class="brand-name">Preto</span> <span class="brand-count">(120)</span><br>
                <input type="checkbox" class="filtrodept-cor" value="Prata"> 
                <span class="brand-name">Prata</span> <span class="brand-count">(98)</span><br>
                <input type="checkbox" class="filtrodept-cor" value="Cinza"> 
                <span class="brand-name">Cinza</span> <span class="brand-count">(73)</span><br>
                <input type="checkbox" class="filtrodept-cor" value="Azul"> 
                <span class="brand-name">Azul</span> <span class="brand-count">(36)</span><br>
                <input type="checkbox" class="filtrodept-cor" value="Branco"> 
                <span class="brand-name">Branco</span> <span class="brand-count">(45)</span><br>
            </div>
        </div>

        <div class="filtrodept-group">
            <label onclick="toggleOptions('filtrodept-telaOptions', this)">
                Tela <span class="filtrodept-arrow"><img src="../../../../public/assets/img/arrow-prabaixo-filtro.png" alt=""></span>
            </label>
            <div id="filtrodept-telaOptions" class="filtrodept-options">
                <input type="checkbox" class="filtrodept-tela" value="13 polegadas"> 
                <span class="brand-name">13 polegadas</span> <span class="brand-count">(60)</span><br>
                <input type="checkbox" class="filtrodept-tela" value="15 polegadas"> 
                <span class="brand-name">15 polegadas</span> <span class="brand-count">(150)</span><br>
                <input type="checkbox" class="filtrodept-tela" value="17 polegadas"> 
                <span class="brand-name">17 polegadas</span> <span class="brand-count">(22)</span><br>
                <input type="checkbox" class="filtrodept-tela" value="14 polegadas"> 
                <span class="brand-name">14 polegadas</span> <span class="brand-count">(45)</span><br>
                <input type="checkbox" class="filtrodept-tela" value="18 polegadas"> 
                <span class="brand-name">18 polegadas</span> <span class="brand-count">(8)</span><br>
            </div>
        </div>

        <div class="filtrodept-group">
            <label onclick="toggleOptions('filtrodept-bateriaOptions', this)">
                Bateria <span class="filtrodept-arrow"><img src="../../../../public/assets/img/arrow-prabaixo-filtro.png" alt=""></span>
            </label>
            <div id="filtrodept-bateriaOptions" class="filtrodept-options">
                <input type="checkbox" class="filtrodept-bateria" value="3000mAh"> 
                <span class="brand-name">3000mAh</span> <span class="brand-count">(35)</span><br>
                <input type="checkbox" class="filtrodept-bateria" value="4000mAh"> 
                <span class="brand-name">4000mAh</span> <span class="brand-count">(75)</span><br>
                <input type="checkbox" class="filtrodept-bateria" value="5000mAh"> 
                <span class="brand-name">5000mAh</span> <span class="brand-count">(120)</span><br>
                <input type="checkbox" class="filtrodept-bateria" value="6000mAh"> 
                <span class="brand-name">6000mAh</span> <span class="brand-count">(60)</span><br>
                <input type="checkbox" class="filtrodept-bateria" value="7000mAh"> 
                <span class="brand-name">7000mAh</span> <span class="brand-count">(30)</span><br>
            </div>
        </div>

        <button class="filtrar-departamentos">Filtrar</button>

    </div>
</div>
  

    

</div>
    

    <!-- <h3>Resultados:</h3>
    <div id="filtrodept-products" class="filtrodept-list">
        <div class="filtrodept-item" data-price="299" data-brand="Samsung" data-memory="16GB">Samsung - 16GB - R$299</div>
        <div class="filtrodept-item" data-price="7000" data-brand="Lenovo" data-memory="512GB">Lenovo - 512GB - R$7000</div>
        <div class="filtrodept-item" data-price="1500" data-brand="Xiaomi" data-memory="32GB">Xiaomi - 32GB - R$1500</div>
        <div class="filtrodept-item" data-price="2000" data-brand="Dell" data-memory="128GB">Dell - 128GB - R$2000</div>
    </div> -->

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    // Oculta todas as opções de filtro ao carregar a página
    document.querySelectorAll(".filtrodept-options").forEach(function (opcao) {
        opcao.style.display = "none";
    });
});

// Função para alternar a exibição do filtro ao clicar na seta
function toggleOptions(id, element) {
    let opcoes = document.getElementById(id);

    if (opcoes) {
        let isVisible = opcoes.style.display === "block";

        // Alterna a visibilidade do filtro clicado
        opcoes.style.display = isVisible ? "none" : "block";
    }
}


        function updatePrice() {
            let minRange = document.getElementById("filtrodept-minRange");
            let maxRange = document.getElementById("filtrodept-maxRange");
            let minPrice = document.getElementById("filtrodept-minPrice");
            let maxPrice = document.getElementById("filtrodept-maxPrice");

            let minValue = parseInt(minRange.value);
            let maxValue = parseInt(maxRange.value);

            if (minValue > maxValue) {
                let temp = minValue;
                minValue = maxValue;
                maxValue = temp;
            }

            minPrice.textContent = minValue;
            maxPrice.textContent = maxValue;
        }

        function filterProducts() {
            let maxPrice = document.getElementById("filtrodept-priceRange").value;
            let products = document.querySelectorAll(".filtrodept-item");

            products.forEach(product => {
                let price = parseInt(product.getAttribute("data-price"));
                let show = price <= maxPrice;
                product.style.display = show ? "block" : "none";
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector('.filtro-toggle-btn');
    const filtroContainer = document.querySelector('.filtrodept-container-geral');
    const filtroArrow = document.querySelector('.filtrodept-arrow');
    const filtroOptions = document.querySelector('.filtrodept-options');

    toggleButton.addEventListener('click', function() {
        filtroContainer.classList.toggle('show'); // Alterna a visibilidade do filtro
        
        if (filtroContainer.classList.contains('show')) {
            filtroArrow.classList.add('expanded'); // Gira a seta
        } else {
            filtroArrow.classList.remove('expanded'); // Retorna a seta
        }
    });

    // Alterna a visibilidade do filtro no grupo específico
    const filtroGroup = document.querySelector('.filtrodept-group');
    filtroGroup.addEventListener('click', function() {
        if (filtroOptions.style.display === 'block') {
            filtroOptions.style.display = 'none';
            filtroArrow.classList.remove('expanded');
        } else {
            filtroOptions.style.display = 'block';
            filtroArrow.classList.add('expanded');
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector('.filtro-toggle-btn');
    const filtroContainer = document.querySelector('.filtrodept-container-geral');
    const filtroArrow = document.querySelector('.filtrodept-arrow');
    const filtroOptions = document.querySelector('.filtrodept-options');

    toggleButton.addEventListener('click', function() {
        filtroContainer.classList.toggle('show'); // Alterna a visibilidade do filtro
        
        if (filtroContainer.classList.contains('show')) {
            filtroArrow.classList.add('expanded'); // Gira a seta
        } else {
            filtroArrow.classList.remove('expanded'); // Retorna a seta
        }
    });
});

function showFilter() {
    const filtroContainer = document.querySelector('.filtrodept-container-geral');
    filtroContainer.classList.add('show'); // Exibe o filtro inteiro
}







    </script>

</body>
</html>
