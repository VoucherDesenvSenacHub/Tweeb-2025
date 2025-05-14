<?php

require __DIR__.'/../../DB/Database.php';

class CadastroUsuario {
    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $senha;
    public $confirmacao; 

    public function __construct($nome, $email, $cpf , $senha, $confirmacao) {
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

        return true;

        $cpf = preg_replace('/[^0-9]/', '', $this->cpf);

        if (
            strlen($cpf) != 11 ||
            preg_match('/^(\d)\1{10}$/', $cpf) ||
            (
                (function($cpf) {
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
                })($cpf) === false
            )
        ) {
            return 'CPF inválido';
        }
    
        return true;
    }

    

    // public function verificarEmailExistente() {
    //     // Consulta para verificar se o email já existe no banco
    //     $db = new Database('usuarios');
    //     // Passando a condição corretamente, sem 'WHERE' no parâmetro
    //     $result = $db->select("email = ?", [$this->email]);
    
    //     // Se o resultado contiver registros, o email já existe
    //     if (count($result) > 0) {
    //         return false; // Email já existe
    //     }
    
    //     return true; // Email não existe
    // }
    
    

    public function cadastrar() {

        $validacao = $this->validarCampos();
        if ($validacao !== true) {
            return $validacao;
        }


        // $emailVerificacao = $this->verificarEmailExistente();
        // if ($emailVerificacao !== true) {
        //     return $emailVerificacao;
        // }

        $db = new Database('usuarios');
        $this->id = $db->insert([
            'nome'   => $this->nome,
            'email'  => $this->email,
            'senha'  => password_hash($this->senha, PASSWORD_DEFAULT),
            'tipo'   => 'cliente' 
        ]);

        if ($this->id) {
            
            $clienteDB = new Database('clientes');
            $clienteDB->insert([
                'id_usuario' => $this->id,
                'cpf' => $this->cpf
            ]);

            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start(); 
            }

            $_SESSION['usuario'] = [
                'id'    => $this->id,
                'nome'  => $this->nome,
                'email' => $this->email,
                'cpf' => $this->cpf
            ];

            return true;
        }

        return 'Erro ao cadastrar, tente novamente';
    }    
}

?>
