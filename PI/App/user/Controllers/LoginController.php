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

// Valida os dados
if (empty($email) || empty($senha)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Email e senha são obrigatórios']);
    exit;
}

try {
    // Conecta ao banco de dados
    $pdo = new PDO(
        'mysql:host=192.168.22.9;dbname=140p2',
        'devwebp2',
        'voucher@140'
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca o usuário
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se encontrou o usuário
    if (!$usuario) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não encontrado']);
        exit;
    }

    // Verifica a senha
    if (!password_verify($senha, $usuario['senha'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Senha incorreta']);
        exit;
    }

    // Busca o CPF do usuário na tabela clientes
    $stmt = $pdo->prepare('SELECT cpf FROM clientes WHERE id_usuario = ?');
    $stmt->execute([$usuario['id']]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cria a sessão
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

    // Retorna sucesso
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

} catch (PDOException $e) {
    error_log('Erro no login: ' . $e->getMessage());
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao fazer login. Por favor, tente novamente.']);
}
