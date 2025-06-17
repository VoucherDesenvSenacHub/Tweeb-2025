
<?php
require '../../Controllers/Produto.php';

$id_produto = $_GET['id_produto'] ?? null;

$status_produto = 0;

if ($id_produto === null) {
    die("ID do produto não informado.");
}

$produto = new Produto();
$produto->id_produto = $id_produto;
$produto->status_produto = $status_produto;

if ($produto->update2()) {
    echo '<script>alert("Status atualizado com sucesso!");</script>';
    echo "<meta http-equiv='refresh' content='0.5;url=listarProdutos.php'>";
} else {
    echo '<script>alert("Erro ao atualizar status!");</script>';
}
?>




