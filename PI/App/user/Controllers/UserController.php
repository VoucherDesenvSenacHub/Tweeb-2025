<?php

require __DIR__.'/../Models/CadastroUsuario.php';


if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
    $client = new CadastroUsuario;
    $client->nome = $_POST['nome'];
    $client->email = $_POST['email'];
    $client->senha = $_POST['senha'];

 
    
    if ($client->cadastrar()){
        header('location: ../../../home.php?status=sucess');
        exit();
    } else {
        header('location: ../cadastro.php?status=error');
        exit();
    }
}
?>