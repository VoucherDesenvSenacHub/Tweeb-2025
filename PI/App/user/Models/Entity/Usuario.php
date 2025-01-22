<?php
require 'C:/xampp/htdocs/tweeb/DB/Database.php'; // ALTERE SEU DIRETORIO CONFORME SALVO NO SEU LOCAL

class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $rg;
    private $cep;
    private $endereco;
    private $perfil;
    private $avatar;

    public function __construct($dados) {
        $this->nome = $dados['nome'];
        $this->email = $dados['email'];
        $this->senha = password_hash($dados['senha'], PASSWORD_BCRYPT);;
    }

    public function cadastrar() {
        $db = new Database('usuario');
        return $db->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
        ]);
    }

    public static function listar() {
        $db = new Database('usuario');
        return $db->select();
    }

    public static function buscarPorId($id) {
        $db = new Database('usuario');
        $result = $db->select("id_usuario = {$id}");
        return $result ? $result[0] : null;
    }

    public static function excluir($id) {
        $db = new Database('usuario');
        return $db->delete("id_usuario = {$id}");
    }

    public static function atualizar($id, $dados) {
        $db = new Database('usuario');
        return $db->update($dados, "id_usuario = {$id}");
    }

    public static function autenticar($email, $senha) {
        $db = new Database('usuario');
        $usuario = $db->select("email = '{$email}'")->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }

        return null;
    }
}
?>
