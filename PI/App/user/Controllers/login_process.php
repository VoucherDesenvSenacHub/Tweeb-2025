<?php
require_once __DIR__ . '/../Models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        echo "<script>alert('Preencha todos os campos!'); window.location.href='login.php';</script>";
        exit;
    }

    if (Usuario::login($email, $senha)) {
        header('Location: /Tweeb-2025/PI/home.php');
        exit;
    } else {
        echo "<script>alert('Email ou senha incorretos!'); window.location.href='login.php';</script>";
        exit;
    }
}
?>