<?php
require_once __DIR__ . '/../Models/Usuario.php';
session_start();
header('Content-Type: application/json');

// Verifica se o método é DELETE
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método inválido. Use DELETE.']);
    exit;
}

// Lê o corpo da requisição
parse_str(file_get_contents("php://input"), $dados);

// Verifica o ID do usuário via sessão ou corpo da requisição
$idUsuario = $_SESSION['usuario']['id'] ?? $dados['id'] ?? null;
if (!$idUsuario) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado ou ID ausente']);
    exit;
}

// Instancia e executa a exclusão
$usuario = new Usuario();
$usuario->id = $idUsuario;
$sucesso = $usuario->excluir(); // Sua model deve ter esse método

if ($sucesso) {
    session_destroy(); // Destrói a sessão
    echo json_encode(['sucesso' => true, 'mensagem' => 'Conta excluída com sucesso']);
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao excluir a conta']);
}
exit;
