<?php
require_once __DIR__ . '/../../DB/Database.php';
class Cep {
    private $db;

    public function __construct() {
        $this->db = new Database('cep');
    }

    public function atualizarPorUsuario($endereco_id, $dados) {
        return $this->db->update($dados, "endereco_id = $endereco_id");
    }

    public function buscarPorId($id) {
        $result = $this->db->select("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorUsuario($endereco_id) {
        $result = $this->db->select("endereco_id = $endereco_id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function inserirParaUsuario($endereco_id, $dados) {
        if (!isset($dados['endereco_id'])) {
            $dados['endereco_id'] = $endereco_id;
        }
        return $this->db->insert($dados);
    }
    
}
?>