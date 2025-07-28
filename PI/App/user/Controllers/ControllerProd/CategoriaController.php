<?php
session_start();
require_once __DIR__ . '/../Produto.php';
require_once __DIR__ . '/../../Models/Categoria.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: /login.php');
    exit();
}
if (!isset($_SESSION['montagem'])) {
    $_SESSION['montagem'] = [];
}

$limite_por_pagina = 7;
$pagina_atual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($pagina_atual - 1) * $limite_por_pagina;

$categorias = Categoria::buscarTodos();
$ids_categorias = array_column($categorias, 'id_tipo_componente');
$tipo_ativo_id = 1;
if (isset($_GET['tipo']) && in_array($_GET['tipo'], $ids_categorias)) {
    $tipo_ativo_id = (int)$_GET['tipo'];
} else if (!empty($ids_categorias)) {
    header('Location: CategoriaController.php?tipo=' . $ids_categorias[0]);
    exit();
}

$produtos = Produto::buscarPorTipoComponente($tipo_ativo_id, $limite_por_pagina, $offset);
$total_produtos = Produto::contarPorTipoComponente($tipo_ativo_id);

$indice_atual = array_search($tipo_ativo_id, $ids_categorias);
$proxima_categoria_id = null;
$categoria_anterior_id = null;
if ($indice_atual !== false) {
    if (isset($ids_categorias[$indice_atual + 1])) {
        $proxima_categoria_id = $ids_categorias[$indice_atual + 1];
    }
    if ($indice_atual > 0) {
        $categoria_anterior_id = $ids_categorias[$indice_atual - 1];
    }
}

require_once __DIR__ . '/../../View/pages/do-seu-jeito.php';