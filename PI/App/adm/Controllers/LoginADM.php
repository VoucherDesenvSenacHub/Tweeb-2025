<?php

require_once __DIR__ . '/../Models/Funcionario.php';

session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido']);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);
$email = trim($dados['email'] ?? '');
$senha = $dados['senha'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Email e senha são obrigatórios']);
    exit;
}

try {
    $Administrador = Funcionario::buscarPorEmailADM($email);

    if (!$Administrador) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não encontrado']);
        exit;
    }

    if ($senha !== $Administrador['senha']) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Senha incorreta']);
        exit;
    }

    $_SESSION['adm'] = [
        'id' => $Administrador['id'],
        'nome' => $Administrador['nome'],
        'email' => $Administrador['email'],
        'tipo' => $Administrador['tipo'],
        'matricula' => $Administrador['matricula'],
        'cargo' => $Administrador['cargo'],
        'foto_perfil' => $Administrador['foto_perfil'] ?? 'imagem_padrao.png'
    ];

    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Login realizado com sucesso!',
        'funcionario' => [
            'id' => $Administrador['id'],
            'nome' => $Administrador['nome'],
            'email' => $Administrador['email'],
            'tipo' => $Administrador['tipo']
        ]
    ]);

} catch (Exception $e) {
    error_log('Erro no login: ' . $e->getMessage());
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao fazer login.']);
}
