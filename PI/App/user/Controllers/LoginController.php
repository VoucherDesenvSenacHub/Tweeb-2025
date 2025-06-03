<?php

require_once __DIR__ . '/../Models/Usuario.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $dados = json_decode(file_get_contents('php://input'), true);

    $email = trim($dados['email'] ?? '');
    $senha = $dados['senha'] ?? '';

    if(empty($email) || empty($senha)) {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'E-mail e senha são obrigatórios.'
        ]);
        exit;
    }

}


// Caso a requisição não seja POST
http_response_code(405);
echo json_encode([
    'sucesso' => false,
    'mensagem' => 'Método não permitido.'
]);