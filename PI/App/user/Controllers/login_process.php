<?php
require __DIR__.'/../../DB/Database.php';
session_start();

class Login {
    public static function login($email, $senha) {
        $db = new Database('usuarios');

        $query = "SELECT id, nome, email, senha FROM usuarios WHERE email = ?";
        $stmt = $db->execute($query, [$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            return true;
        }

        return false;
    }

    public static function isLogged() {
        return isset($_SESSION['usuario_id']);
    }

    public static function requireLogin() {
        if (!self::isLogged()) {
            header('Location: login.php');
            exit;
        }
    }

    public static function requireLogout() {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        echo "<script>alert('Preencha todos os campos!'); window.location.href='login.php';</script>";
        exit;
    }

    if (Login::login($email, $senha)) {
        header('Location: /Tweeb-2025/PI/home.php');
        exit;
    } else {
        echo "<script>alert('Email ou senha incorretos!'); window.location.href='login.php';</script>";
        exit;
    }
}
?>
