<?php
require_once 'Produto.php';

$produtos = Produto::buscarEmOferta(['preco_unid <' => 800], 'preco_unid ASC');

header('Content-Type: application/json');
echo json_encode($produtos);
exit;
