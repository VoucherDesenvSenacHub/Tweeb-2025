<?php

require __DIR__.'/../../DB/Database.php';

class LoginUsuario {
    public $email;
    public $senha;
    private static $chave = 'PROTECT-TWEEB'; 

    public function autenticar() {
        $db = new Database('usuarios');

        $query = "SELECT id, nome, email, senha FROM usuarios WHERE email = ?";
        $stmt = $db->execute($query, [$this->email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($this->senha, $usuario['senha'])) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                ini_set('session.cookie_httponly', 1);
                ini_set('session.cookie_secure', isset($_SERVER['HTTPS']) ? 1 : 0);
                ini_set('session.use_strict_mode', 1);
                session_start();
            }

            session_regenerate_id(true);

            // Criptografa os dados
            $dados = json_encode([
                'id' => $usuario['id'],
                'nome' => $usuario['nome'],
                'email' => $usuario['email']
            ]);

            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $criptografado = openssl_encrypt($dados, 'aes-256-cbc', self::$chave, 0, $iv);
            $_SESSION['usuario'] = base64_encode($criptografado . '::' . $iv);

            return true;
        }

        return false;
    }

    public static function estaLogado() {
        return isset($_SESSION['usuario']);
    }

    public static function getUsuario() {
        if (!self::estaLogado()) return null;

        $dadosCriptografados = base64_decode($_SESSION['usuario']);
        list($cripto, $iv) = explode('::', $dadosCriptografados);
        $json = openssl_decrypt($cripto, 'aes-256-cbc', self::$chave, 0, $iv);
        return json_decode($json, true);
    }

    public static function logout() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        session_destroy();
    }
}
