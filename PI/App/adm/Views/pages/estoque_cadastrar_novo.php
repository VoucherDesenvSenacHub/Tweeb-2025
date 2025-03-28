<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>

<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

    <!-- Conteúdo Principal -->
        <!-- Formulário de Cadastro -->
        <form class="form-container-adm">
            <div class="form-title">
                <h1 class="new-product">Novo Produto</h1>
                <div class="barrinha"></div>
            </div>
            <h1 class="cadastrados-title">Cadastrados</h1>

            <fieldset class="product-details">
                <legend>Detalhes do Produto</legend>
                <label class="product-name">Nome do Produto: <input type="text" name="nome"></label>
                <label class="brand-model">Marca/Modelo: <input type="text" name="marca"></label>
                <label class="quantity">Quantidade: <input type="number" name="quantidade"></label>
                <label class="department">Departamento:
                    <select name="departamento">
                        <option value="">Selecione</option>
                    </select>
                </label>
                <label class="image">Imagem: <input type="file" name="imagem"></label>
                <label class="invoice">Nota Fiscal: <input type="file" name="nota_fiscal"></label>
                <label class="serial-number">Número de série <input type="number" name="numero-serie"></label>
                <label class="cost">Custo <input type="number" name="custo"></label>
                <label class="min-stock">Estoque mínimo <input type="number" name="Estoque-minimo"></label>
                <label class="product-name-label">Nome: <input type="text" name="nome_produto"></label>
                <label class="information">Informação: <input type="text" name="informacao"></label>
                <label class="choose-icon"> <input type="file" name="informacao" placeholder="Escolher icone"></label>
                <label class="color">Cor: <input type="text" name="cor"></label>
                <label class="code">Código: <input type="text" name="codigo"></label>
                <label class="choose-icon"> <input type="file" name="informacao" placeholder="Escolher icone"></label>
                <label class="description">Descrição <input type="text" name="desc"><span class="counter">0/1000</span></label>
            </fieldset>
            
            

            <fieldset class="promotional-specifications">
                <legend class="promo-legend">Especificações Promocionais</legend>
                <label class="value">Valor: <input type="text" name="valor"></label>
                <label class="discount">Desconto Promocional: <input type="text" name="desconto"></label>
                <label class="related-products">Produtos Relacionados:
                    <select name="produtos_relacionados">
                        <option value="">Selecione</option>
                    </select>
                </label>
            </fieldset>

            <button class="save-button" type="submit">Salvar</button>
        </form>
 

    <div class="container-icons">
        <div class="container-box1-icon">
            <div class="box1-icon">
                <img src="../../../../public/assets/img/shop-2-svgrepo-com 2.png" alt="">
            </div>
            <p class="text-icon1">
                Em estoque Hoje 
            </p>
        </div>

        <div class="container-box1-icon">
            <div class="box1-icon">
                <img src="../../../../public/assets/img/Vector.png" alt="">
            </div>
            <p class="text-icon1">
                Em estoque 1 ano
            </p>
        </div>

        <div class="container-box1-icon">
            <div class="box1-icon">
                <img src="../../../../public/assets/img/Delivery Truck.png" alt="">
            </div>
            <p class="text-icon1">
                Em estoque 1-2 dias
            </p>
        </div>
    </div>

    <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

</body>
</html>
