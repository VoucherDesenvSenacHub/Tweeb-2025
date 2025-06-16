<?php
// AlterarSenhaController.php
require_once __DIR__ . '../../Models/Usuario.php';

session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['usuario']['id'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado.']);
    exit;
}

$dados = json_decode(file_get_contents("php://input"), true);

$senhaAtual = $dados['senha_atual'] ?? '';
$novaSenha = $dados['nova_senha'] ?? '';
$confirmarSenha = $dados['confirmar_senha'] ?? '';

if (empty($senhaAtual) || empty($novaSenha) || empty($confirmarSenha)) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Preencha todos os campos.']);
    exit;
}

if ($novaSenha !== $confirmarSenha) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'As novas senhas não coincidem.']);
    exit;
}

$usuario = Usuario::buscarPorId($_SESSION['usuario']['id']);

if (!password_verify($senhaAtual, $usuario->senha)) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Senha atual incorreta.']);
    exit;
}

$usuario->senha = password_hash($novaSenha, PASSWORD_DEFAULT);
if ($usuario->atualizarSenha()) {
    echo json_encode(['status' => 'sucesso', 'mensagem' => 'Senha alterada com sucesso.']);
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao alterar a senha.']);
}
