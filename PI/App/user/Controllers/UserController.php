<?php

require_once __DIR__ . '/../Models/Usuario.php';

// Função para validar CPF
function validarCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    // Verifica se tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }
    
    // Verifica se todos os dígitos são iguais
    if (preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }
    
    // Calcula os dígitos verificadores
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    
    return true;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $dados = json_decode(file_get_contents('php://input'), true);

    // Verificar se é uma requisição para verificar CPF
    if (isset($dados['verificar_cpf']) && $dados['verificar_cpf'] === true) {
        $cpf = trim($dados['cpf'] ?? '');
        
        if (empty($cpf)) {
            echo json_encode(['existe' => false]);
            exit;
        }

        // Validar CPF antes de verificar se existe
        if (!validarCPF($cpf)) {
            echo json_encode(['existe' => false, 'invalido' => true]);
            exit;
        }

        $usuario = new Usuario();
        $cpfExistente = $usuario->buscarPorCpf($cpf);
        
        echo json_encode(['existe' => !empty($cpfExistente)]);
        exit;
    }

    $nome = trim($dados['nome'] ?? '');
    $email = trim($dados['email'] ?? '');
    $cpf = trim($dados['cpf'] ?? '');
    $senha = $dados['senha'] ?? '';
    $confirmacao = $dados['confirmar_senha'] ?? '';

    if (empty($nome) || empty($cpf) || empty($email) || empty($senha) || empty($confirmacao)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos']);
        exit;
    }

    // Validar CPF
    if (!validarCPF($cpf)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'CPF inválido']);
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

    // Verificar se o CPF já está cadastrado
    $cpfExistente = $usuario->buscarPorCpf($cpf);
    if ($cpfExistente) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'CPF já cadastrado']);
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
