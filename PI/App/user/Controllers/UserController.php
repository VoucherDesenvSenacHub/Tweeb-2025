<?php

require __DIR__.'/../Models/CadastroUsuario.php';


if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
    $client = new CadastroUsuario;
    $client->nome = $_POST['nome'];
    $client->email = $_POST['email'];
    $client->senha = $_POST['senha'];
    $confirmacao = $_POST['confirmacao'];

    
    if($client->senha != $confirmacao){
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=senha_diferente');
        exit();
    }
    
    if ($client->cadastrar()){
        header('location: ../../../home.php?status=sucess');
        exit();
    } else {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=error');
        exit();
    }
}
?>