<?php
// Arquivo: RevisaoController.php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// 1. Segurança: Garante que o usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php'); // Redireciona para o login se não estiver logado
    exit();
}

// 2. Inclui os Models necessários
require_once __DIR__ . '/../../Models/Carrinho.php';
require_once __DIR__ . '/../../Models/Produto.php'; // Pode ser necessário para pegar detalhes

// 3. Verifica se existe uma montagem na sessão
if (!isset($_SESSION['montagem']) || empty($_SESSION['montagem'])) {
    // Se não há nada para revisar, redireciona de volta para o início da montagem
    header('Location: CategoriaController.php?tipo=1');
    exit();
}

$id_usuario = $_SESSION['usuario']['id'];
$montagem = $_SESSION['montagem'];

// 4. Limpa o carrinho atual do usuário no banco de dados
Carrinho::limparCarrinho($id_usuario);

// 5. Itera sobre cada peça da montagem e adiciona ao carrinho
foreach ($montagem as $tipo_id => $item) {
    $id_produto = null;
    $quantidade = 1;


    if (is_array($item)) {
        $id_produto = $item['id_produto'];
        $quantidade = $item['quantidade'];
    } else {
        $id_produto = $item;
    }

    if ($id_produto) {
        Carrinho::adicionarItem($id_usuario, $id_produto, $quantidade);
    }
}

unset($_SESSION['montagem']);

header('Location: /Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php');
exit();