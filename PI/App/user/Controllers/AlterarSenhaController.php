<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido']);
    exit;
}

require_once __DIR__ . '../../Models/Usuario.php';

$dados = json_decode(file_get_contents('php://input'), true);
$idUsuario = $_SESSION['usuario']['id'] ?? null;

if (!$idUsuario || empty($dados['senha_atual']) || empty($dados['nova_senha']) || empty($dados['confirmar_senha'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Todos os campos são obrigatórios']);
    exit;
}

if ($dados['nova_senha'] !== $dados['confirmar_senha']) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'A nova senha e a confirmação não coincidem.']);
    exit;
}

$usuario = Usuario::buscarPorId($idUsuario);
if (!$usuario || !password_verify($dados['senha_atual'], $usuario->senha)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Senha atual incorreta.']);
    exit;
}

$usuario->senha = password_hash($dados['nova_senha'], PASSWORD_DEFAULT);
$sucesso = $usuario->atualizarSenha();

if ($sucesso) {
    echo json_encode(['sucesso' => true, 'mensagem' => 'Senha alterada com sucesso!']);
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao alterar a senha.']);
}