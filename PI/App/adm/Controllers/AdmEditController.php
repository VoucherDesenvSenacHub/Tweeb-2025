<?php
require_once __DIR__ . '/../Models/Funcionario.php';
require_once __DIR__ . '/../../DB/Database.php';
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Requisição inválida']);
    exit;
}

// Verifica se o usuário está logado como admin ou funcionário
if (!isset($_SESSION['adm']) && !isset($_SESSION['funcionario'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado']);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);
if (!$dados) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Dados ausentes']);
    exit;
}

// Define qual sessão usar
$usuario = isset($_SESSION['adm']) ? $_SESSION['adm'] : $_SESSION['funcionario'];
$tipo_sessao = isset($_SESSION['adm']) ? 'adm' : 'funcionario';
$idUsuario = $usuario['id'];

// Validações
if (empty(trim($dados['nome'] ?? ''))) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Nome é obrigatório']);
    exit;
}

if (empty(trim($dados['email'] ?? ''))) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Email é obrigatório']);
    exit;
}

// Verificar se o email já existe para outro usuário
$db = new Database('usuarios');
$emailExistente = $db->select("email = '" . trim($dados['email']) . "' AND id != $idUsuario")->fetch(PDO::FETCH_ASSOC);
if ($emailExistente) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Este email já está em uso']);
    exit;
}

// Atualizar apenas os campos permitidos (nome, sobrenome, email, telefone)
$dadosAtualizacao = [
    'nome' => trim($dados['nome']),
    'sobrenome' => trim($dados['sobrenome'] ?? ''),
    'email' => trim($dados['email']),
    'telefone' => trim($dados['telefone'] ?? '')
];

$sucesso = $db->update($dadosAtualizacao, "id = $idUsuario");

if ($sucesso) {
    // Buscar dados atualizados do banco
    $db2 = new Database();
    $dadosAtualizados = $db2->buscarDadosCompletosPorId($idUsuario, $usuario['tipo']);
    
    if ($dadosAtualizados) {
        // Atualizar a sessão correta
        $_SESSION[$tipo_sessao] = [
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