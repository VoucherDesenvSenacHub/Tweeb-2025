<?php
require_once __DIR__ . '/../Models/Endereco.php';

session_start();
header('Content-Type: application/json');

$idCliente = $_SESSION['usuario']['id'] ?? null;

if (!$idCliente) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado.']);
    exit;
}

try {
    $enderecos = Endereco::buscarPorClienteId($idCliente);
    echo json_encode(['sucesso' => true, 'enderecos' => $enderecos]);
} catch (Exception $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao buscar endereços.']);
}
