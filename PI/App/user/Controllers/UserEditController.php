<?php
require_once __DIR__ . '/../Models/Usuario.php';

session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Requisição inválida']);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Dados ausentes']);
    exit;
}

$idUsuario = $_SESSION['usuario']['id'] ?? null;

if (!$idUsuario) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado']);
    exit;
}

$usuario = new Usuario();

$usuario->id = $idUsuario;
$usuario->nome = trim($dados['nome'] ?? '');
$usuario->sobrenome = trim($dados['sobrenome'] ?? '');
$usuario->email = trim($dados['email'] ?? '');
$usuario->telefone = trim($dados['telefone'] ?? '');
$usuario->foto_perfil = trim($dados['foto_perfil'] ?? '');



$sucesso = $usuario->atualizar(); 

if ($sucesso) {
    $_SESSION['usuario']['nome'] = $usuario->nome;
    $_SESSION['usuario']['sobrenome'] = $usuario->sobrenome;
    $_SESSION['usuario']['email'] = $usuario->email;
    $_SESSION['usuario']['telefone'] = $usuario->telefone;
    $_SESSION['usuario']['foto_perfil'] = $usuario->foto_perfil;

    echo json_encode(['sucesso' => true, 'mensagem' => 'Dados atualizados com sucesso!']);
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao atualizar dados']);
}
exit;