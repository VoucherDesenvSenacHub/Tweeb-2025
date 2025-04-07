<?php

require __DIR__.'/../Models/CadastroUsuario.php';
session_start();

if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
    $client = new CadastroUsuario;
    $client->nome = $_POST['nome'];
    $client->email = $_POST['email'];
    $client->senha = $_POST['senha'];
    $confirmacao = $_POST['confirmacao'];

    if (empty($client->nome) || empty($client->email) || empty($client->senha) || empty($confirmacao)) {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=campos_vazios');
        exit();
    }
    
    if($client->senha != $confirmacao){
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=senha_diferente');
        exit();
    }
    
    if ($client->cadastrar()){
        $_SESSION['user_id'] = $client->id;
        header('location: /Tweeb-2025/PI/App/user/View/pages/pagina_1_pesquisa_cadastro.php');
        exit();
    } else {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=error');
        exit();
    }
}
?>