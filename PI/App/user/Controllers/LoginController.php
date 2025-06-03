<?php

require_once __DIR__ . '/../Models/Usuario.php';

session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents('php://input'), true);

    $email = trim($dados['email'] ?? '');
    $senha = $dados['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'E-mail e senha são obrigatórios.'
        ]);
        exit;
    }

    $usuarioModel = new Usuario();
    $usuario = $usuarioModel->buscarPorEmail($email);

    if (!$usuario) {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'Usuário não encontrado.'
        ]);
        exit;
    }

    // Verifica se $usuario é um objeto ou array e converte se necessário
    $dadosUsuario = is_object($usuario) ? get_object_vars($usuario) : $usuario;

    if (!password_verify($senha, $dadosUsuario['senha'])) {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'Senha incorreta.'
        ]);
        exit;
    }

    $_SESSION['usuario'] = [
        'id' => $dadosUsuario['id'],
        'nome' => $dadosUsuario['nome'],
        'email' => $dadosUsuario['email'],
        'tipo' => $dadosUsuario['tipo'] ?? 'cliente',
        'cpf' => $dadosUsuario['cpf'] ?? '',
        'foto_perfil' => $dadosUsuario['foto_perfil'] ?? 'foto-perfil-default.png'
    ];
    
    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Login realizado com sucesso!',
        'usuario' => [
            'id' => $dadosUsuario['id'],
            'nome' => $dadosUsuario['nome'],
            'email' => $dadosUsuario['email'],
            'cpf' => $dadosUsuario['cpf'] ?? ''
        ]
    ]);
    exit;
}

http_response_code(405);
echo json_encode([
    'sucesso' => false,
    'mensagem' => 'Método não permitido.'
]);
exit;
