<?php

require __DIR__.'/../../DB/Database.php';

class CadastroUsuario {
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $cpf;
    public $senha;

    public function cadastrar() {
        $db = new Database('usuarios');
        $this->id = $db->insert([
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'senha' => password_hash($this->senha, PASSWORD_DEFAULT)
        ]);

        if ($this->id) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start(); 
            }
    
            $_SESSION['usuario'] = [
                'id' => $this->id,
                'nome' => $this->nome,
                'email' => $this->email,
                'cpf' => $this->cpf
            ];

            return true;
        } else {
            return false;
        }
    }    
}

?>