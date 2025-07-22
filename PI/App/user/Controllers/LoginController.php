<?php


require_once __DIR__ . '/../Models/Usuario.php';


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido. Use POST.']);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);
$email = trim($dados['email'] ?? '');
$senha = $dados['senha'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Email e senha são obrigatórios.']);
    exit;
}

try {
    $usuario = Usuario::buscarPorEmail($email);
    if (!$usuario || !password_verify($senha, $usuario['senha'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Email ou senha inválidos.']);
        exit;
    }
    if ($usuario['tipo'] !== 'cliente') {
        echo json_encode([
            'sucesso' => false, 
            'mensagem' => 'Acesso negado. Este login é exclusivo para clientes.'
        ]);
        exit;
    }

    // 9. Se tudo deu certo, cria a Sessão
    $_SESSION['usuario'] = [
        'id'          => $usuario['id'],
        'nome'        => $usuario['nome'],
        'sobrenome'   => $usuario['sobrenome'] ?? '',
        'email'       => $usuario['email'],
        'telefone'    => $usuario['telefone'] ?? '',
        'tipo'        => $usuario['tipo'],
        'cpf'         => $usuario['cpf'] ?? '',
        'foto_perfil' => $usuario['foto_perfil'] ?? 'imagem_padrao.png'
    ];
    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Login realizado com sucesso!'
    ]);

} catch (Exception $e) {
    error_log('Erro crítico no LoginController: ' . $e->getMessage());
    echo json_encode(['sucesso' => false, 'mensagem' => 'Ocorreu um erro inesperado no servidor. Tente novamente mais tarde.']);
}