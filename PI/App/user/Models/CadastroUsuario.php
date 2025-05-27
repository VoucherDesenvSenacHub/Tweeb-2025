<?php

require __DIR__.'/../../DB/Database.php';

class CadastroUsuario {
    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $senha;
    public $confirmacao; 

    public function __construct($nome, $email, $cpf, $senha, $confirmacao) {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = preg_replace('/[^0-9]/', '', $cpf); // Remove tudo que não é número
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

        // Validação do CPF
        if (strlen($this->cpf) !== 11) {
            return 'CPF deve conter 11 dígitos';
        }

        if (preg_match('/^(\d)\1{10}$/', $this->cpf)) {
            return 'CPF inválido: todos os dígitos são iguais';
        }

        // Validação dos dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($c = 0; $c < $t; $c++) {
                $soma += $this->cpf[$c] * (($t + 1) - $c);
            }
            $digito = ((10 * $soma) % 11) % 10;
            if ($this->cpf[$c] != $digito) {
                return 'CPF inválido';
            }
        }

        return true;
    }

    public function cadastrar() {
        $validacao = $this->validarCampos();
        if ($validacao !== true) {
            return $validacao;
        }

        $db = new Database('usuarios');
        
        // Verifica se o email já existe
        $verificaEmail = $db->select("email = '" . $this->email . "'");
        if ($verificaEmail->rowCount() > 0) {
            return 'Este email já está cadastrado';
        }

        // Verifica se o CPF já existe
        $dbClientes = new Database('clientes');
        $verificaCPF = $dbClientes->select("cpf = '" . $this->cpf . "'");
        if ($verificaCPF->rowCount() > 0) {
            return 'Este CPF já está cadastrado';
        }

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
                'cpf'   => $this->cpf
            ];

            return true;
        }

        return 'Erro ao cadastrar, tente novamente';
    }    
}

?>
