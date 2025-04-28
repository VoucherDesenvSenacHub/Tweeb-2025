<?php

require __DIR__.'/../Models/CadastroUsuario.php';
session_start();

if (isset($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['cpf'], $_POST['senha'])) {
    $client = new CadastroUsuario;
    $client->nome = $_POST['nome'];
    $client->sobrenome = $_POST['sobrenome'];
    $client->email = $_POST['email'];
    $client->cpf = $_POST['cpf'];
    $client->senha = $_POST['senha'];
    $confirmacao = $_POST['confirmacao'];

    // Verifica se os campos estão preenchidos
    if (empty($client->nome) || empty($client->sobrenome) || empty($client->email) || empty($client->cpf) || empty($client->senha) || empty($confirmacao)) {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=campos_vazios');
        exit();
    }
    
    // Verifica se as senhas são iguais
    if ($client->senha != $confirmacao) {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=senha_diferente');
        exit();
    }

    // Tenta cadastrar o usuário
    if ($client->cadastrar()) {
        // Se o cadastro for bem-sucedido, redireciona
        header('location: /Tweeb-2025/PI/App/user/View/pages/pagina_1_pesquisa_cadastro.php');
        exit();
    } else {
        // Se o cadastro falhar devido ao e-mail já existente, redireciona com a mensagem de erro
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=email_ja_cadastrado');
        exit();
    }
}
?>
