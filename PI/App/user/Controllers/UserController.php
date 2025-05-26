<?php

require __DIR__.'/../Models/CadastroUsuario.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmacao = $_POST['confirmacao'];


    $client = new CadastroUsuario($nome, $email, $senha, $confirmacao);


    $validacao = $client->validarCampos();
    if ($validacao !== true) {
     
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=' . urlencode($validacao));
        exit();
    }


    // $emailVerificacao = $client->verificarEmailExistente();
    // if ($emailVerificacao !== true) {

    //     header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=email_ja_cadastrado');
    //     exit();
    // }

    if ($client->cadastrar()) {
        header('location: /Tweeb-2025/PI/App/user/View/pages/pagina_1_pesquisa_cadastro.php');
        exit();
    } else {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=erro_cadastro');
        exit();
    }
}
?>
