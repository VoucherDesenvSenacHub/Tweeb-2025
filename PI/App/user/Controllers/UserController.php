<?php
require __DIR__.'/../Models/Usuario.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmacao = $_POST['confirmacao'] ?? '';

    $usuario = new Usuario($nome, $email, $cpf, $senha, $confirmacao);

    $validacao = $usuario->validarCampos();
    if ($validacao !== true) {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=' . urlencode($validacao));
        exit();
    }

    if ($usuario->cadastrar() === true) {
        header('location: /Tweeb-2025/PI/App/user/View/pages/pagina_1_pesquisa_cadastro.php');
        exit();
    } else {
        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=erro_cadastro');
        exit();
    }
}
