<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/estoque_cadastrar_novo.css">
    <title>Cadastro de Produto</title>
</head>
<body>
     <!-- Cabeçalho -->
    <header class="task marcos-header-container">
        <div class="task marcos-header-logo"><img src="../../../../public/assets/img/Ativo 2.png" alt="Logo Tweeb"></div>
    </header>

    <div class="task marcos-mini-navbar"></div> 

    <!-- Conteúdo Principal -->
    <main class="task marcos-main-container">
        <!-- Formulário de Cadastro -->
        <form class="task marcos-form-container">
            <div class="task marcos-form-title">
                <h1 class="task marcos-new-product">Novo Produto</h1>
                <div class="task marcos-barrinha"></div>
            </div>
            <h1 class="task marcos-cadastrados-title">Cadastrados</h1>

            <fieldset class="task marcos-product-details">
                <legend>Detalhes do Produto</legend>
                <label class="task marcos-product-name">Nome do Produto: <input type="text" name="nome"></label>
                <label class="task marcos-brand-model">Marca/Modelo: <input type="text" name="marca"></label>
                <label class="task marcos-quantity">Quantidade: <input type="number" name="quantidade"></label>
                <label class="task marcos-department">Departamento:
                    <select name="departamento">
                        <option value="">Selecione</option>
                    </select>
                </label>
                <label class="task marcos-image">Imagem: <input type="file" name="imagem"></label>
                <label class="task marcos-invoice">Nota Fiscal: <input type="file" name="nota_fiscal"></label>
                <label class="task marcos-serial-number">Número de série <input type="number" name="numero-serie"></label>
                <label class="task marcos-cost">Custo <input type="number" name="custo"></label>
                <label class="task marcos-min-stock">Estoque mínimo <input type="number" name="Estoque-minimo"></label>
                <label class="task marcos-product-name-label">Nome: <input type="text" name="nome_produto"></label>
                <label class="task marcos-information">Informação: <input type="text" name="informacao"></label>
                <label class="task marcos-choose-icon">Escolher ícone <input type="file" name="informacao" placeholder="Escolher icone"></label>
                <label class="task marcos-color">Cor: <input type="text" name="cor"></label>
                <label class="task marcos-code">Código: <input type="text" name="codigo"></label>
                <label class="task marcos-description">Descrição <input type="text" name="desc"><span class="task marcos-counter">0/1000</span></label>
            </fieldset>

            <fieldset class="task marcos-promotional-specifications">
                <legend class="task marcos-promo-legend">Especificações Promocionais</legend>
                <label class="task marcos-value">Valor: <input type="text" name="valor"></label>
                <label class="task marcos-discount">Desconto Promocional: <input type="text" name="desconto"></label>
                <label class="task marcos-related-products">Produtos Relacionados:
                    <select name="produtos_relacionados">
                        <option value="">Selecione</option>
                    </select>
                </label>
            </fieldset>

            <button class="task marcos-Salvar" type="submit">Salvar</button>
        </form>
    </main>

    <div class="task marcos-container-icons">
        <div class="task marcos-container-box1-icon">
            <div class="task marcos-box1-icon">
                <img src="../../../../public/assets/img/shop-2-svgrepo-com 2.png" alt="">
            </div>
            <p class="task marcos-text-icon1">
                Em estoque Hoje 
            </p>
        </div>

        <div class="task marcos-container-box1-icon">
            <div class="task marcos-box1-icon">
                <img src="../../../../public/assets/img/Vector.png" alt="">
            </div>
            <p class="task marcos-text-icon1">
                Em estoque 1 ano
            </p>
        </div>

        <div class="task marcos-container-box1-icon">
            <div class="task marcos-box1-icon">
                <img src="../../../../public/assets/img/Delivery Truck.png" alt="">
            </div>
            <p class="task marcos-text-icon1">
                Em estoque 1-2 dias
            </p>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="task marcos-footer">
        <div class="task marcos-footer-content">
            <div class="task marcos-footer-logo">
                <div><img src="../../../../public/assets/img/logo.png" alt="Logo Tweeb" /></div>
                <div class="task marcos-footer-text">Você faz parte da nossa conexão com o futuro.</div>
            </div>       
        </div>
    </footer>
</body>
</html>
