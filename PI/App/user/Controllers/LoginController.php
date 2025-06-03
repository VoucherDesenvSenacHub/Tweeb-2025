<?php

require_once __DIR__ . '/../Models/Usuario.php';

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


    if (!password_verify($senha, $usuario['senha'])) {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'Senha incorreta.'
        ]);
        exit;
    }
    $_SESSION['usuario'] = [
        'id' => $usuario['id'],
        'nome' => $usuario['nome'],
        'email' => $usuario['email']
    ];
    
    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Login realizado com sucesso!',
        'usuario' => [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email']
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
