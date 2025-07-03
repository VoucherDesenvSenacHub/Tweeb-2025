<?php
require_once __DIR__ . '../../Models/Funcionario.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido']);
    exit;
}

$nome = $_POST['primeiro-nome'] ?? '';
$sobrenome = $_POST['sobrenome'] ?? '';
$matricula = $_POST['matricula'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha-funcionario'] ?? '';
$confirmarSenha = $_POST['confirmar-senha'] ?? '';
$cargo = $_POST['cargo'] ?? '';


if (empty($nome) || empty($matricula) || empty($cargo) ||empty($senha) || $senha !== $confirmarSenha) {
    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Preencha os campos obrigatórios e confirme a senha corretamente.'
    ]);
    exit;
}

try {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $resultado = Funcionario::cadastrar([
        'nome'       => $nome,
        'sobrenome'  => $sobrenome,
        'matricula'  => $matricula,
        'email'      => $email,
        'telefone'   => $telefone,
        'cpf'        => $cpf,
        'cargo'      => $cargo,
        'senha'      => $senhaHash
    ]);

    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Funcionário cadastrado com sucesso!'
    ]);
} catch (Exception $e) {
    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Erro ao salvar funcionário. Tente novamente.',
        'erro' => $e->getMessage() 
    ]);
}
