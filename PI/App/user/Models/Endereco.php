<?php
require_once __DIR__ . '/../../DB/Database.php';

class Endereco {
    private $db;

    public function __construct() {
        $this->db = new Database('enderecos');
    }

    public function atualizarPorUsuario($usuario_id, $dados) {
        return $this->db->update($dados, "id_cliente = $usuario_id");
    }

    public function buscarPorId($id) {
        $result = $this->db->select("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorUsuario($usuario_id) {
        $result = $this->db->select("id_cliente = $usuario_id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function inserirParaUsuario($usuario_id, $dados) {
        $dados['id_cliente'] = $usuario_id;
        $id = $this->db->insert($dados);
        if ($id) {
            return $id;
        }
        return false;
    }
}
