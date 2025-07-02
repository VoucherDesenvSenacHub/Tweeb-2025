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
    $funcionario = Funcionario::buscarPorEmail($email);

    if (!$funcionario) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não encontrado']);
        exit;
    }

    // ⚠️ Exceção para adm geral (senha sem hash)
    if ($funcionario['email'] === 'admgeral@empresa.com') {
        if ($senha !== $funcionario['senha']) {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Senha incorreta']);
            exit;
        }
    } else {
        // Verificação com password_verify para os demais
        if (!password_verify($senha, $funcionario['senha'])) {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Senha incorreta']);
            exit;
        }
    }

    // Inicia sessão
    $_SESSION['funcionario'] = [
        'id' => $funcionario['id'],
        'nome' => $funcionario['nome'],
        'sobrenome' => $funcionario['sobrenome'],
        'email' => $funcionario['email'],
        'telefone' => $funcionario['telefone'],
        'tipo' => $funcionario['tipo'],
        'matricula' => $funcionario['matricula'],
        'cargo' => $funcionario['cargo'],
        'foto_perfil' => $funcionario['foto_perfil'] ?? 'imagem_padrao.png'
    ];

    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Login realizado com sucesso!',
        'funcionario' => [
            'id' => $funcionario['id'],
            'nome' => $funcionario['nome'],
            'email' => $funcionario['email'],
            'tipo' => $funcionario['tipo']
        ]
    ]);

} catch (Exception $e) {
    error_log('Erro no login: ' . $e->getMessage());
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao fazer login.']);
}
