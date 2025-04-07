<?php

require __DIR__.'/../../DB/Database.php';

class CadastroUsuario{
    public $id;
    public $nome;
    public $email;
    public $senha;



    public function cadastrar(){
        $db = new Database('usuarios');
        $this->id = $db->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => password_hash($this->senha, PASSWORD_DEFAULT)
        ]);
        return true;
    }
}
?>