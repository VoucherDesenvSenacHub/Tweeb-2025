<?php

require_once __DIR__ . '/../Models/Usuario.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $dados = json_decode(file_get_contents('php://input'), true);

    $nome = trim($dados['nome'] ?? '');
    $email = trim($dados['email'] ?? '');
    $cpf = trim($dados['cpf'] ?? '');
    $senha = $dados['senha'] ?? '';
    $confirmacao = $dados['confirmar_senha'] ?? '';

    if (empty($nome) || empty($cpf) || empty($email) || empty($senha) || empty($confirmacao)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos']);
        exit;
    }
   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Email inválido']);
        exit;
    }
 
    if ($senha !== $confirmacao) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Senhas não conferem']);
        exit;
    }
 
    $usuario = new Usuario();
    $usuarioExistente = $usuario->buscarPorEmail($email);
    if ($usuarioExistente) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Email já cadastrado']);
        exit;
    }
   
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->cpf = $cpf;
    $usuario->senha = $senhaHash;
    $usuario->tipo = 'cliente';

    $id = $usuario->inserir();

    if ($id) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Usuário cadastrado com sucesso!']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao cadastrar.']);
    }
    exit;
}
