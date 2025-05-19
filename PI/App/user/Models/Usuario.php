<?php
require_once __DIR__ . '/../../DB/Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database('usuarios'); // Nome da sua tabela
    }

    public function buscarPorId($id) {
        $result = $this->db->select("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $dados) {
        return $this->db->update($dados, "id = $id");
    }

    public function excluir($id) {
        $result = $this->db->delete("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}
