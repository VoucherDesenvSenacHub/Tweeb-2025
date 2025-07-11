<?php
require_once __DIR__ . '/../Models/Endereco.php';

header('Content-Type: application/json');


$id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'ID do endereço inválido.'
    ]);
    exit;
}


if (Endereco::excluir((int)$id)) {
    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Endereço excluído com sucesso.'
    ]);
} else {
    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Erro ao excluir endereço. Verifique se o ID existe.'
    ]);
}
