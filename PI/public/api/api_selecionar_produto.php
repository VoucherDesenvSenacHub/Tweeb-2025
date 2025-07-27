<?php

session_start();

// O caminho para o seu Model Produto.php
require_once __DIR__ . '/../../App/user/Controllers/Produto.php'; 

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Erro desconhecido.'];

if (!isset($_SESSION['usuario'])) {
    $response['message'] = 'Usuário não autenticado.';
    echo json_encode($response);
    exit();
}

if (isset($_POST['tipo_id']) && isset($_POST['produto_id']) && isset($_POST['quantidade'])) {
    $tipo_id = (int)$_POST['tipo_id'];
    $produto_id = (int)$_POST['produto_id'];
    $quantidade = (int)$_POST['quantidade'];

    // MUDANÇA 1: Usando o método que já existe no seu Model: "buscar_by_id"
    $produto = Produto::buscar_by_id($produto_id);

    if (!$produto) {
        $response['message'] = 'Produto não encontrado.';
    // MUDANÇA 2: Acessando a propriedade do objeto com "->" e usando a coluna "quantidade_produto"
    } else if ($quantidade > $produto->quantidade_produto) { 
        $response['message'] = 'Estoque insuficiente! Apenas ' . $produto->quantidade_produto . ' unidades disponíveis.';
    } else {
        // Tudo certo, podemos salvar na sessão
        if (!isset($_SESSION['montagem'])) {
            $_SESSION['montagem'] = [];
        }

        // Lógica para RAM (salva com quantidade)
        if ($tipo_id == 3) { // ID da Memória RAM
            if ($quantidade > 0) {
                $_SESSION['montagem'][$tipo_id] = ['id_produto' => $produto_id, 'quantidade' => $quantidade];
            } else {
                unset($_SESSION['montagem'][$tipo_id]);
            }
        } else { // Lógica para outras peças
            $_SESSION['montagem'][$tipo_id] = $produto_id;
        }

        $response = ['success' => true, 'message' => 'Seleção atualizada!'];
    }
} else {
    $response['message'] = 'Dados incompletos.';
}

echo json_encode($response);