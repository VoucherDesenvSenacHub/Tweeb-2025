<?php
require __DIR__.'/../Models/loginUsuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = new LoginUsuario();
    $login->email = $_POST['email'] ?? '';
    $login->senha = $_POST['senha'] ?? '';

    if (empty($login->email) || empty($login->senha)) {
        echo "<script>alert('Preencha todos os campos!'); window.location.href='../view/pages/login.php';</script>";
        exit;
    }

    if ($login->autenticar()) {
        header('Location: /Tweeb-2025/PI/home.php');
        exit;
    } else {
        echo "<script>alert('Email ou senha incorretos!'); window.location.href='../view/pages/login.php';</script>";
        exit;
    }
}
