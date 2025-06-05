<?php
// require '../../Controllers/Produto.php';


require_once(__DIR__ . '/../../Controllers/Produto.php');

$dados_produto = new Produto();
$produto_banco = $dados_produto->buscar();

if(isset($_POST['cadastrar'])){
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
    $entrega_gratis = $_POST['entrega_gratis'];
    $em_estoque = $_POST['em_estoque'];
    $garantia = $_POST['garantia'];

    
     
    ###Código para cadastrar foto no servidor de banco de dados###
    $arquivo =$_FILES['imagem_produto'];
    if ($arquivo['error'])die("Falha ao enviar a foto");
    $pasta ='../../../../public/uploads/';
    $nome_foto =$arquivo['name'];
    $novo_nome = uniqid();
    // echo $novo_nome;
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
    if ($extensao != 'png' && $extensao !='jpg') die('Falha ao enviar a foto');
    $caminho = $pasta . $novo_nome . '.' . $extensao;
    $foto =move_uploaded_file($arquivo['tmp_name'], $caminho);

    // echo '<br>CAMINHO ' . $caminho;
    ###Código para cadastrar foto no servidor de banco de dados###

    $produto = new Produto();
    // $produto->id_produto = $id_produto;
    $produto->nome_produto = $nome_produto;
    $produto->marca_modelo = $marca_modelo;
    $produto->quantidade_produto = $quantidade_produto;
    $produto->imagem_produto = $caminho;
    $produto->numero_serie = $numero_serie;
    $produto->custo_produto = $custo_produto;
    $produto->cor_produto  = $cor_produto;
    $produto->preco_unid = $preco_unid;
    $produto->descricao_produto = $descricao_produto;
    $produto->detalhes_produto= $detalhes_produto;

    $produto->id_departamento = $id_departamento;
    $produto->entrega_gratis = $entrega_gratis;
    $produto->em_estoque = $em_estoque;
    $produto->garantia = $garantia;

   
    

    $result = $produto->cadastrar();
    if($result){
        echo '<script> alert("Produto cadastrado com sucesso!!") </script>';
    }else{
        echo 'Error';
    }
}

$id_produto = $_POST['id_produto'] ?? null;

$em_estoque = isset($_POST['em_estoque']) ? 1 : 0;
$garantia = isset($_POST['garantia']) ? 1 : 0;
$entrega_gratis = isset($_POST['entrega_gratis']) ? 1 : 0;

if ($id_produto !== null) {
    $produto = new Produto();
    $produto->atualizarFlags($id_produto, $em_estoque, $garantia, $entrega_gratis);
    exit;
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
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            <h2>Detalhes do Produto</h2>
            <form action="estoqueok.php" method="POST" enctype="multipart/form-data" id="product-form">
    <div class="form-group">
        <label for="product-name">Nome do Produto</label>
        <input autocomplete="off" type="text" name="nome_produto" class="form_field" placeholder="" id="nome_produto" required>

        <label for="product-brand">Marca/Modelo</label>
        <input autocomplete="off" type="text" name="marca_modelo" class="form_field" placeholder="" id="marca_modelo" required>
    </div>

    <div class="form-group">
        <label for="product-quantity">Quantidade</label>
        <input autocomplete="off" type="number" name="quantidade_produto" class="form_field" placeholder="" id="quantidade_produto" required>

        <label for="product-department">Departamento</label>
        <select name="id_departamento" id="id_departamento">
            <option value="1">hardwares</option>
            <option value="2">computadores</option>
            <option value="3">periféricos</option>
            <option value="4">energia</option>
            <option value="5">áudio</option>
            <option value="6">jogos</option>
        </select>
    </div>

    <div class="form-group">
        <label for="product-image">Imagem</label>
        <input autocomplete="off" type="file" name="imagem_produto" class="form_field" placeholder="" id="imagem_produto" required>
    </div>

    <div class="form-group">
        <label for="serial-number">Número de Série</label>
        <input autocomplete="off" type="number" name="numero_serie" class="form_field" placeholder="" id="numero_serie" required>

        <label for="product-cost">Custo</label>
        <input autocomplete="off" type="number" name="custo_produto" class="form_field" placeholder="" id="custo_produto" required>
    </div>

    <div class="form-group">
        <label for="product-color">Cor</label>
        <input autocomplete="off" type="text" name="cor_produto" class="form_field" placeholder="" id="cor_produto" required>
    </div>

    <div class="form-group">
        <label for="product-description">Descrição</label>
        <textarea name="descricao_produto" id="descricao_produto" maxlength="1000"></textarea>
    </div>
    
    <div class="form-group">
        <label for="product-description">Detalhes produto</label>
        <textarea name="detalhes_produto" id="detalhes_produto" maxlength="1000"></textarea>
    </div>

    <h3>Especificações Promocionais</h3>
    <div class="form-group">
        <label for="promo-value">Valor</label>
        <input autocomplete="off" type="number" name="preco_unid" class="form_field" placeholder="" id="preco_unid" required>
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
            <input type="checkbox" name="em_estoque" value="1" <?= !empty($produto_banco['em_estoque']) ? "checked" : "" ?>>
            📦 Em estoque Hoje
        </label><br>

        <label>
            <input type="checkbox" name="garantia" value="1" <?= !empty($produto_banco['garantia']) ? "checked" : "" ?>>
            🔒 Garantia 1 ano
        </label><br>

        <label>
            <input type="checkbox" name="entrega_gratis" value="1" <?= !empty($produto_banco['entrega_gratis']) ? "checked" : "" ?>>
            🚚 Entrega Grátis 1-2 dias
        </label>
    </div>

    <button type="submit" name="cadastrar" value="cadastrar" id="save-button">Salvar</button>
</form>

<!-- <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?>  -->
</body>
</html>
