<?php
require_once __DIR__ . '/../Produto.php';  


$ordenar = $_GET['ordenar'] ?? '';
$finalidades = $_GET['finalidade'] ?? []; 
$preco_min = $_GET['preco_min'] ?? '';
$preco_max = $_GET['preco_max'] ?? '';

$paginaAtual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limite = 12;
$offset = ($paginaAtual - 1) * $limite;

$resultado = Produto::buscarKitsPaginado(
    $limite,
    $offset,
    $ordenar,
    $finalidades,
    $preco_min,
    $preco_max
);

$kits = $resultado['kits'];
$total_paginas = $resultado['total_paginas'];
$pagina_atual = $paginaAtual;

require_once __DIR__ . '/../../View/pages/kitsetup.php';
