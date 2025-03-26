<?php
require __DIR__ '/../../../DB/Database.php';
    $db = new Database ('usuarios');
class Login {
    public static function login($email,$senha){
        

        $query = "SELECT id,nome,email,senha, FROM usuarios WHERE email = ?";

        $stmt = $db->execute($query,[$email]);
        $usuario= $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])){
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_senha'] = $usuario['senha'];
            return true;
        }else {
            return false;
        }
    }

    public static function islogged() {
        return isset($_SESSION['usuario_id']);
    }

    public static function requireLogin(){
        if (!self::islogged()) {
            header('location: login.php');
            exit;
        }
    }
 
    public static function  requireLogout(){
        session_destroy();
        header('Location:login.php');
        exit;
    }
}
?>