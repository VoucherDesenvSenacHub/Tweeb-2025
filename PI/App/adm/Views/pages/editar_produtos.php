<?php
require '../../Controllers/Produto.php';

$id_recebido = $_GET['id_produto'];
//echo "ID RECEBIDO :" .$id_recebido;

if(!isset($id_recebido) or !is_numeric($id_recebido)){
    header('location: editar_produtos.php');
    exit;
}
$produto = Produto::buscar_by_id($id_recebido);
$nome_produto = $produto->nome_produto;
$marca_modelo = $produto->marca_modelo;
$quantidade_produto = $produto->quantidade_produto;
$imagem_produto =$produto->imagem_produto;
$numero_serie = $produto->numero_serie;
$custo_produto = $produto->custo_produto;
$cor_produto = $produto->cor_produto;
$preco_unid = $produto->preco_unid;
$descricao_produto = $produto->descricao_produto;
$detalhes_produto = $produto->detalhes_produto;

$id_departamento = $produto->id_departamento;
$entrega_gratis = $produto->entrega_gratis;
$em_estoque = $produto->em_estoque;
$garantia = $produto->garantia;


if(isset($_POST['editar'])){
   
    // $id_produto = $_POST['id_produto'];
    $nome_produto = $_POST['nome_produto'];
    $marca_modelo = $_POST['marca_modelo'];
    $quantidade_produto = $_POST['quantidade_produto'];    
    $imagem_produto = $_FILES['imagem_produto'];
    $numero_serie = $_POST['numero_serie'];
    $custo_produto = $_POST['custo_produto'];
    $cor_produto = $_POST['cor_produto'];
    $preco_unid = $_POST['preco_unid'];
    $descricao_produto = $_POST['descricao_produto'];
    $detalhes_produto = $_POST['detalhes_produto'];

    $id_departamento= $_POST['id_departamento'];
    $entrega_gratis = isset($_POST['entrega_gratis']) ? 1 : 0;
    $em_estoque = isset($_POST['em_estoque']) ? 1 : 0;
    $garantia = isset($_POST['garantia']) ? 1 : 0;

    $pro_editado = new Produto();
    $pro_editado->id_produto = $id_recebido;
    $pro_editado->nome_produto = $nome_produto;
    $pro_editado->marca_modelo = $marca_modelo;
    $pro_editado->quantidade_produto = $quantidade_produto;
    $pro_editado->imagem_produto = $imagem_produto;
    $pro_editado->numero_serie = $numero_serie;
    $pro_editado->custo_produto = $custo_produto;
    $pro_editado->cor_produto = $cor_produto;
    $pro_editado->preco_unid = $preco_unid;
    $pro_editado->descricao_produto = $descricao_produto;
    $pro_editado->detalhes_produto = $detalhes_produto;

    $pro_editado->id_departamento = $id_departamento;
    $pro_editado->entrega_gratis = $entrega_gratis;
    $pro_editado->em_estoque = $em_estoque;
    $pro_editado->garantia = $garantia;

    $result = $pro_editado->atualizar();
    if($result){
        echo '<script> alert("Atualizado com sucesso!") </script>' ;
    }else{
        echo 'Erro ao atualizar';
    }

    echo $result;
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap');
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }
       
        .cadastrando-products {
            width: 90%;
            max-width: 1100px;
            /* background: #fff; */
            padding: 20px;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            margin-top: 20px;
            
        }

        .cadastrando-products-pai{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        nav {
            display: flex;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }
        nav a {
            text-decoration: none;
            padding: 10px 15px;
            color: #333;
        }
        nav a.active {
            border-bottom: 2px solid #ff6600;
        }
        h2, h3 {
            margin-bottom: 35px;
        }
        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 25px;
        }
        .form-group label {
            flex: 1 1 30%;
        }
        .form-group input, .form-group select, .form-group textarea {
            flex: 2 1 65%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            height: 80px;
        }
        .icons {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
        #save-button {
            width: 150px;
            padding: 10px;
            background: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 30px;
        }
        #save-button:hover {
            background: #e05500;
        }
    </style>
</head>
<body>
    <?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
    <?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>
    <div class="cadastrando-products-pai">
        <div class="cadastrando-products">
            <nav>
                <a href="#" class="active">Novo Produto</a>
                <a href="listarProdutos.php">Cadastrados</a>
            </nav>
            <h2 id='titulo-cadastro-produto'>Editar Produto</h2>
            <form action="estoqueok.php" method="POST" enctype="multipart/form-data" id="product-form">
    <div class="form-group">
        <label for="product-name">Nome do Produto</label>
        <input autocomplete="off" type="text" name="nome_produto" class="form_field" placeholder="" id="nome_produto" value="<?=$produto->nome_produto;?>" required>

        <label for="product-brand">Marca/Modelo</label>
    <input autocomplete="off" type="text" name="marca_modelo" class="form_field" placeholder="" id="marca_modelo" value="<?=$produto->marca_modelo;?>"  required>
    </div>

    <div class="form-group">
        <label for="product-quantity">Quantidade</label>
        <input autocomplete="off" type="number" name="quantidade_produto" class="form_field" placeholder="" id="quantidade_produto" value="<?=$produto->quantidade_produto;?>"  required>

        <label for="product-department">Departamento</label>
        <select name="id_departamento" id="id_departamento" >
        <option value="1" <?= ($produto->id_departamento == 1) ? 'selected' : '' ?>>hardwares</option>
        <option value="2" <?= ($produto->id_departamento == 2) ? 'selected' : '' ?>>computadores</option>
        <option value="3" <?= ($produto->id_departamento == 3) ? 'selected' : '' ?>>periféricos</option>
        <option value="4" <?= ($produto->id_departamento == 4) ? 'selected' : '' ?>>energia</option>
        <option value="5" <?= ($produto->id_departamento == 5) ? 'selected' : '' ?>>áudio</option>
        <option value="6" <?= ($produto->id_departamento == 6) ? 'selected' : '' ?>>jogos</option>
        </select>
    </div>
   
<div class="form-group">

<label>Imagem atual:</label>
<?php if (!empty($produto->imagem_produto)) : ?>
    <img src="<?= htmlspecialchars($produto->imagem_produto) ?>" style="max-width:50px;" alt="Imagem do Produto"><br>
<?php endif; ?>
</div>

<div>
<label>Alterar imagem:</label>
<input type="file" name="imagem_produto">

</div>


    <div class="form-group">
        <label for="serial-number">Número de Série</label>
        <input autocomplete="off" type="number" name="numero_serie" class="form_field" placeholder="" id="numero_serie" value="<?=htmlspecialchars($produto->numero_serie ?? '')?>" required>



        <label for="product-cost">Custo</label>
        <input autocomplete="off" type="number" name="custo_produto" step="0.01" class="form_field" placeholder="" id="custo_produto" value="<?=$produto->custo_produto;?>" required>
    </div>

    <div class="form-group">
        <label for="product-color">Cor</label>
        <input autocomplete="off" type="text" name="cor_produto" class="form_field" placeholder="" id="cor_produto" value="<?=$produto->cor_produto;?>" required>

    </div>

    <div class="form-group">
        <label for="product-description">Descrição</label>
        <textarea name="descricao_produto"  id="descricao_produto" maxlength="1000"><?=htmlspecialchars($produto->descricao_produto ?? '')?></textarea>
    </div> 
    
    <div class="form-group">
        <label for="product-description">Detalhes produto</label>
        <textarea name="detalhes_produto" id="detalhes_produto" maxlength="1000"><?=htmlspecialchars($produto->detalhes_produto ?? '')?></textarea>
    </div>

    <h3>Especificações Promocionais</h3>
    <div class="form-group">
        <label for="promo-value">Valor</label>
        <input autocomplete="off" type="number" name="preco_unid" step="0.01" class="form_field" placeholder="" id="preco_unid" value="<?=$produto->preco_unid;?>" required>
    </div>

    <div class="form-group">
        <label for="related-products">Produtos Relacionados</label>
        <select name="related-products" id="related-products">
            <option value="">hardwares</option>
            <option value="">computadores</option>
            <option value="">periféricos</option>
            <option value="">energia</option>
            <option value="">áudio</option>
            <option value="">jogos</option>
        </select>
    </div>

    <div class="icons">
    <label>
        <input type="checkbox" name="em_estoque" value="1" <?= ($produto->em_estoque == 1) ? 'checked' : '' ?>>
        📦 Em estoque Hoje
    </label><br>

    <label>
        <input type="checkbox" name="garantia" value="1" <?= ($produto->garantia == 1) ? 'checked' : '' ?>>
        🔒 Garantia 1 ano
    </label><br>

    <label>
        <input type="checkbox" name="entrega_gratis" value="1" <?= ($produto->entrega_gratis == 1) ? 'checked' : '' ?>>
        🚚 Entrega Grátis 1-2 dias
    </label>
</div>


    <button type="submit" name="editar" value="editar" id="save-button">Salvar</button>
</form>

<!-- <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?>  -->
</body>
</html>
