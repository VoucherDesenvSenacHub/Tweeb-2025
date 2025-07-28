<?php
require_once __DIR__ . '/../Produto.php'; 

$filtros = $_GET;
$filtros['departamento_id'] = 2;

$dados_iniciais = Produto::buscarComFiltros($filtros);

$produtos = $dados_iniciais['produtos'];
$total_paginas = $dados_iniciais['total_paginas'];
$pagina_atual = $dados_iniciais['pagina_atual'];

$marcas_filtro = $filtros['marca'] ?? [];
$preco_min_filtro = $filtros['preco_min'] ?? '';
$preco_max_filtro = $filtros['preco_max'] ?? '';
$em_estoque_filtro = isset($filtros['em_estoque']);
$entrega_gratis_filtro = isset($filtros['entrega_gratis']);
$garantia_filtro = isset($filtros['garantia']);
$ordenar_filtro = $filtros['ordenar'] ?? '';

$query_params = $_GET;
unset($query_params['page']);
$query_string = http_build_query($query_params);


include __DIR__ . '/../../View/pages/Computadores.php';