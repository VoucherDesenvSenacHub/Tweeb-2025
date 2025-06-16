<?php

require_once __DIR__ . '/../Models/Usuario.php';

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
    $usuario = Usuario::buscarPorEmail($email);

    if (!$usuario) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não encontrado']);
        exit;
    }

    if (!password_verify($senha, $usuario['senha'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Senha incorreta']);
        exit;
    }

    $_SESSION['usuario'] = [
        'id'           => $usuario['id'],
        'nome'         => $usuario['nome'],
        'sobrenome'    => $usuario['sobrenome'] ?? '',
        'email'        => $usuario['email'],
        'telefone'     => $usuario['telefone'] ?? '',
        'tipo'         => $usuario['tipo'],
        'cpf'          => $cliente['cpf'] ?? '',
        'foto_perfil'  => $usuario['foto_perfil'] ?? 'imagem_padrao.png'
    ];

    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Login realizado com sucesso!',
        'usuario' => [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email'],
            'tipo' => $usuario['tipo']
        ]
    ]);

} catch (Exception $e) {
    error_log('Erro no login: ' . $e->getMessage());
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao fazer login. Por favor, tente novamente.']);
}
