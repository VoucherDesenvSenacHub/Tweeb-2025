<?php

session_start();

require_once __DIR__ . '/../Produto.php';

require_once __DIR__ . '/../../Models/Categoria.php';


if (!isset($_SESSION['montagem'])) {
    $_SESSION['montagem'] = [];
}

$tipo_ativo_id = isset($_GET['tipo']) ? (int)$_GET['tipo'] : 1; 

if (isset($_GET['add'])) {
    $produto_id_adicionado = (int)$_GET['add'];
    $_SESSION['montagem'][$tipo_ativo_id] = $produto_id_adicionado;
}

$categorias = Categoria::buscarTodos();
$produtos = Produto::buscarPorTipoComponente($tipo_ativo_id);

// --- NOVA LÓGICA PARA ENCONTRAR A PRÓXIMA CATEGORIA ---
$proxima_categoria_id = null;
$indice_atual = null;

// Encontra o índice da categoria ativa no array de categorias
foreach ($categorias as $indice => $categoria) {
    if ($categoria['id_tipo_componente'] == $tipo_ativo_id) {
        $indice_atual = $indice;
        break;
    }
}

// Se encontrou a categoria atual e não é a última da lista, pega o ID da próxima
if ($indice_atual !== null && isset($categorias[$indice_atual + 1])) {
    $proxima_categoria_id = $categorias[$indice_atual + 1]['id_tipo_componente'];
}
// --- FIM DA NOVA LÓGICA ---

require_once __DIR__ . '/../../View/pages/do-seu-jeito.php';
?>