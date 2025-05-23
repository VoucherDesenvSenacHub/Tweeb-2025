<?php
require_once __DIR__ . '/../../DB/Database.php';
class Cep {
    private $db;

    public function __construct() {
        $this->db = new Database('cep');
    }

    public function atualizarPorUsuario($usuario_id, $dados) {
        return $this->db->update($dados, "endereco_id = $usuario_id");
    }

    public function buscarPorId($id) {
        $result = $this->db->select("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorUsuario($usuario_id) {
        $result = $this->db->select("endereco_id = $usuario_id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function inserirParaUsuario($usuario_id, $dados) {
        $dados['endereco_id'] = $usuario_id;
        return $this->db->insert($dados);
    }
    
}
?>