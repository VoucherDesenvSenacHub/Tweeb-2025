<?php 
require_once(__DIR__ . '/../../Controllers/Produto.php');

$dados_produto = new Produto();
$produto_banco = $dados_produto->buscar();

if(isset($_POST['cadastrar'])){
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
    $valor_total = $_POST['valor_total'];
    $fornecedor = $_POST['fornecedor'];
    $status = $_POST['status'];
    $nf = $_POST['nf'];

    // Upload da imagem
    $arquivo = $_FILES['imagem_produto'];
    if ($arquivo['error']) die("Falha ao enviar a foto");
    $pasta = '../../../../public/uploads/';
    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
    if ($extensao != 'png' && $extensao != 'jpg') die('Formato inválido');
    $caminho = $pasta . $novo_nome . '.' . $extensao;
    move_uploaded_file($arquivo['tmp_name'], $caminho);

    // Criação do produto
    $produto = new Produto();
    $produto->nome_produto = $nome_produto;
    $produto->marca_modelo = $marca_modelo;
    $produto->quantidade_produto = $quantidade_produto;
    $produto->imagem_produto = $caminho;
    $produto->numero_serie = $numero_serie;
    $produto->custo_produto = $custo_produto;
    $produto->cor_produto  = $cor_produto;
    $produto->preco_unid = $preco_unid;
    $produto->descricao_produto = $descricao_produto;
    $produto->detalhes_produto = $detalhes_produto;
    $produto->id_departamento = $id_departamento;
    $produto->entrega_gratis = $entrega_gratis;
    $produto->em_estoque = $em_estoque;
    $produto->garantia = $garantia;
    $produto->valor_total = $valor_total;
    $produto->fornecedor = $fornecedor;
    $produto->status = $status;
    $produto->nf = $nf;

    $result = $produto->cadastrar();
    echo $result ? '<script>alert("Produto cadastrado com sucesso!")</script>' : 'Erro ao cadastrar.';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/estoqueok.css" />
    <title>Cadastro de Produto</title>
   
</head>
<body>
    <?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
    <?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

    <div class="cadastrando-products-pai">
        <div class="cadastrando-products">

        <div class="pedidos-categoria-selecionado">
            <div class="categorias-adm-enviados">
                <a href="adm-estoque.php"><p>Visão Geral</p></a>
                <a href="adm-pedidos.php"><p>Pedidos</p></a>
                <a href="adm-enviados.php"><p>Enviados</p></a>
                <a href="estoqueok.php"><span><p>Novo Produto</p></span></a>
            </div>
        </div>
            <h2>Cadastro de Produto</h2>
            <form action="estoqueok.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>ID Produto</label>
                    <input type="text" name="numero_serie" required>
                    <label>Imagem</label>
                    <input type="file" name="imagem_produto" required>
                </div>

                <div class="form-group">
                    <label>Produto</label>
                    <input type="text" name="nome_produto" required>
                    <label>Departamento</label>
                    <select name="id_departamento" required>
                        <option value="1">Hardwares</option>
                        <option value="2">Computadores</option>
                        <option value="3">Periféricos</option>
                        <option value="4">Energia</option>
                        <option value="5">Áudio</option>
                        <option value="6">Jogos</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>QTD Entrada</label>
                    <input type="number" name="quantidade_produto" id="quantidade_produto" required>
                    <label>Valor UND</label>
                    <input type="number" name="preco_unid" id="preco_unid" step="0.01" required>
                </div>

                <div class="form-group">
                    <label>Valor Total</label>
                    <input type="number" name="valor_total" id="valor_total" step="0.01" readonly>
                 
                </div>

                <div class="form-group">
                    <label>Fornecedor</label>
                    <input type="text" name="fornecedor">
                    <label>Status</label>
                    <select name="status">
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nota Fiscal (NF)</label>
                    <input type="file" name="nf" required>
                    <label>Marca/Modelo</label>
                    <input type="text" name="marca_modelo" required>
                </div>

                <div class="form-group">
                    <label>Custo</label>
                    <input type="number" name="custo_produto" step="0.01" required>
                    <label>Cor</label>
                    <input type="text" name="cor_produto" required>
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao_produto" maxlength="1000"></textarea>
                </div>

                <div class="form-group">
                    <label>Detalhes do Produto</label>
                    <textarea name="detalhes_produto" maxlength="1000"></textarea>
                </div>

                <div class="icons">
                    <label><input type="checkbox" name="garantia" value="1"> 🔒 Garantia 1 ano</label>
                    <label><input type="checkbox" name="entrega_gratis" value="1"> 🚚 Entrega Grátis</label>
                </div>

                <button type="submit" name="cadastrar" id="save-button">Salvar</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const qtd = document.getElementById('quantidade_produto');
            const preco = document.getElementById('preco_unid');
            const total = document.getElementById('valor_total');

            function calcularTotal() {
                const quantidade = parseFloat(qtd.value) || 0;
                const precoUnit = parseFloat(preco.value) || 0;
                total.value = (quantidade * precoUnit).toFixed(2);
            }

            qtd.addEventListener('input', calcularTotal);
            preco.addEventListener('input', calcularTotal);
        });
    </script>
</body>
</html>
