<?php
require_once __DIR__ . '/../../DB/Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database('usuarios'); // Nome da sua tabela
    }
    public function excluir($id){
        $endereco = new Database('enderecos');
        $endeco->delete("id = $id");

        $clientes = new Database('clientes');
        $clientes->delete ("id = $id");

        return $this->db->delete("id = $id");
    }

    public function buscarPorId($id) {
        $result = $this->db->select("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $dados) {
        return $this->db->update($dados, "id = $id");
    }
}
