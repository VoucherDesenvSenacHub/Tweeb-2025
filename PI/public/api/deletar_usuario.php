<?php
require_once __DIR__ . '/../../App/user/Models/Usuario.php';
require_once __DIR__ . '/../../App/DB/Database.php';

// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario']) && !isset($_SESSION['adm']) && !isset($_SESSION['funcionario'])) {
    http_response_code(401);
    echo json_encode(["sucesso" => false, "mensagem" => "Usuário não autenticado"]);
    exit;
}

// Pega o ID do usuário da requisição
parse_str(file_get_contents("php://input"), $_DELETE);
$id = $_DELETE["id"] ?? null;

if (!$id) {
    http_response_code(400);
    echo json_encode(["sucesso" => false, "mensagem" => "ID é obrigatório"]);
    exit;
}

// Verifica se o usuário está tentando deletar sua própria conta
$usuarioAtual = null;
if (isset($_SESSION['usuario'])) {
    $usuarioAtual = $_SESSION['usuario'];
} elseif (isset($_SESSION['adm'])) {
    $usuarioAtual = $_SESSION['adm'];
} elseif (isset($_SESSION['funcionario'])) {
    $usuarioAtual = $_SESSION['funcionario'];
}

if (!$usuarioAtual || $usuarioAtual['id'] != $id) {
    http_response_code(403);
    echo json_encode(["sucesso" => false, "mensagem" => "Você só pode deletar sua própria conta"]);
    exit;
}

// Deleta o usuário
$usuario = new Usuario();

if ($usuario->excluir($id)) {
    // Destrói a sessão
    session_destroy();
    echo json_encode(["sucesso" => true, "mensagem" => "Conta excluída com sucesso"]);
} else {
    http_response_code(500);
    echo json_encode(["sucesso" => false, "mensagem" => "Erro ao excluir conta"]);
}
?> 