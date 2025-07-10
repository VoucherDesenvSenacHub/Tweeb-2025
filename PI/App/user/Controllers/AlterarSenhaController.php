<?php
// App/user/Controllers/AlterarSenhaController.php

require_once __DIR__ . '/../Models/Usuario.php';

session_start();
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function exibirModal($mensagem, $status = 'erro') {
    echo json_encode([
        'status' => $status,
        'mensagem' => $mensagem,
        'mostrarModal' => true
    ]);
    exit;
}

if (!isset($_SESSION['usuario']['id'])) {
    http_response_code(401);
    exibirModal('Usuário não autenticado.');
}

$input = file_get_contents("php://input");
$dados = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    exibirModal('Dados JSON inválidos.');
}

$senhaAtual = $dados['senha_atual'] ?? '';
$novaSenha = $dados['nova_senha'] ?? '';
$confirmarSenha = $dados['confirmar_senha'] ?? '';

if (empty($senhaAtual) || empty($novaSenha) || empty($confirmarSenha)) {
    exibirModal('Preencha todos os campos.');
}

if ($novaSenha !== $confirmarSenha) {
    exibirModal('As novas senhas não coincidem.');
}

$usuario = Usuario::buscarPorId($_SESSION['usuario']['id']);

if (!$usuario || !password_verify($senhaAtual, $usuario->senha)) {
    exibirModal('Senha atual incorreta.');
}

$usuario->senha = password_hash($novaSenha, PASSWORD_DEFAULT);

if ($usuario->atualizarSenha()) {
    exibirModal('Senha alterada com sucesso.', 'sucesso');
} else {
    http_response_code(500);
    exibirModal('Erro ao atualizar senha.');
}