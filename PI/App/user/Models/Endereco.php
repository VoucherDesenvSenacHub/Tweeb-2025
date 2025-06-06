<?php

class Endereco {
    private $db;

    public function __construct() {
        require_once '../../../DB/Database.php';
        $this->db = new Database('enderecos');
    }

    public function buscarPorUsuario($usuario_id) {
        $result = $this->db->select("id_cliente = $usuario_id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados) {
        if (isset($dados['usuario_id'])) {
            $dados['id_cliente'] = $dados['usuario_id'];
            unset($dados['usuario_id']);
        }
        return $this->db->insert($dados);
    }

    public function atualizar($id, $dados) {
        if (isset($dados['usuario_id'])) {
            $dados['id_cliente'] = $dados['usuario_id'];
            unset($dados['usuario_id']);
        }
        return $this->db->update($dados, "id = $id");
    }

    public function deletar($id) {
        return $this->db->delete("id = $id");
    }
} 