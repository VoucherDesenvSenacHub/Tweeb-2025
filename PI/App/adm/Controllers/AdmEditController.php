<?php
require_once __DIR__ . '/../Models/Funcionario.php';
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

$idUsuario = $_SESSION['funcionario']['id'] ?? null;
if (!$idUsuario) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado']);
    exit;
}

$usuario = new Funcionario();
$usuario->id = $idUsuario;
$usuario->nome = trim($dados['nome'] ?? '');
$usuario->sobrenome = trim($dados['sobrenome'] ?? '');
$usuario->email = trim($dados['email'] ?? '');
$usuario->telefone = trim($dados['telefone'] ?? '');
$usuario->foto_perfil = !empty($dados['foto_perfil']) 
    ? trim($dados['foto_perfil']) 
    : ($_SESSION['funcionario']['foto_perfil'] ?? 'imagem_padrao.png');
$usuario->matricula = trim($dados['matricula'] ?? '');
$usuario->cargo = trim($dados['cargo'] ?? '');

$sucesso = $usuario->atualizar(); 

if ($sucesso) {
    // Buscar dados atualizados do banco (agora usando o método correto para administrador)
    $dadosAtualizados = Funcionario::buscarAdministradorPorEmail($usuario->email);
    if ($dadosAtualizados) {
        $_SESSION['funcionario'] = [
            'id' => $dadosAtualizados['id'],
            'nome' => $dadosAtualizados['nome'],
            'sobrenome' => $dadosAtualizados['sobrenome'],
            'email' => $dadosAtualizados['email'],
            'telefone' => $dadosAtualizados['telefone'],
            'tipo' => $dadosAtualizados['tipo'],
            'matricula' => $dadosAtualizados['matricula'],
            'cargo' => $dadosAtualizados['cargo'],
            'foto_perfil' => $dadosAtualizados['foto_perfil'] ?? 'imagem_padrao.png'
        ];
    }
    echo json_encode(['sucesso' => true, 'mensagem' => 'Dados atualizados com sucesso!']);
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao atualizar dados']);
}
exit;