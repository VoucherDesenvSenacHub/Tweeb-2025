<?php
require_once __DIR__ . '/../../DB/Database.php';

class Usuario {
    private $db;
    private $clienteDB;

    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $senha;
    public $confirmacao;

    public function __construct($nome = '', $email = '', $cpf = '', $senha = '', $confirmacao = '') {
        $this->db = new Database('usuarios');
        $this->clienteDB = new Database('clientes');

        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->confirmacao = $confirmacao;
    }

    public function validarCampos() {
        if (empty($this->nome) || empty($this->email) || empty($this->cpf) || empty($this->senha) || empty($this->confirmacao)) {
            return 'Campos obrigatórios não preenchidos';
        }

        if ($this->senha !== $this->confirmacao) {
            return 'As senhas não coincidem';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return 'Email inválido';
        }

        if (!$this->validarCpf($this->cpf)) {
            return 'CPF inválido';
        }

        return true;
    }

    private function validarCpf($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($c = 0; $c < $t; $c++) {
                $soma += $cpf[$c] * (($t + 1) - $c);
            }
            $digito = ((10 * $soma) % 11) % 10;
            if ($cpf[$c] != $digito) {
                return false;
            }
        }

        return true;
    }

    public function cadastrar() {
        $validacao = $this->validarCampos();
        if ($validacao !== true) {
            return $validacao;
        }

        $this->id = $this->db->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => password_hash($this->senha, PASSWORD_DEFAULT),
            'tipo' => 'cliente'
        ]);

        if ($this->id) {
            $this->clienteDB->insert([
                'id_usuario' => $this->id,
                'cpf' => $this->cpf
            ]);

            if (session_status() !== PHP_SESSION_ACTIVE) session_start();

            $_SESSION['usuario'] = [
                'id' => $this->id,
                'nome' => $this->nome,
                'email' => $this->email,
                'cpf' => $this->cpf
            ];

            return true;
        }

        return 'Erro ao cadastrar, tente novamente';
    }


    public function buscarPorId($id) {
        $result = $this->db->select("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }


    public function atualizar($id, $dados) {
        return $this->db->update($dados, "id = $id");
    }


    public function excluir($id) {
        $this->clienteDB->delete("id_usuario = $id");

        $resposta_preferencia = new Database('respostas_preferencias');
        $resposta_preferencia->delete("user_id = $id");

        return $this->db->delete("id = $id");
    }


    public static function logout() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    }
    public static function login($email, $senha) {
    $db = new Database('usuarios');
    $query = "SELECT u.id, u.nome, u.email, u.senha, c.cpf 
              FROM usuarios u 
              JOIN clientes c ON c.id_usuario = u.id 
              WHERE u.email = ?";
    $stmt = $db->execute($query, [$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email'],
            'cpf' => $usuario['cpf']
        ];

        return true;
    }

    return false;
}


}
