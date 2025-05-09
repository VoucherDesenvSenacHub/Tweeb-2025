<?php
require __DIR__.'/../../DB/Database.php';


class Login {
    public static function login($email, $senha) {
        $db = new Database('usuarios');

        $query = "SELECT id, email, senha FROM usuarios WHERE email = ?";
        $stmt = $db->execute($query, [$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
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