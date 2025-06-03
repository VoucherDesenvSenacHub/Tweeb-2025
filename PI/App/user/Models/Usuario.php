<?php
require_once __DIR__ . '/../../DB/Database.php';

class Usuario {
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public string $cpf;
    public string $tipo;
    public string $foto_perfil = 'imagem_padrao.png';

    public function inserir() {
        $db = new Database('usuarios');
        $idUsuario = $db->insert([
        'nome' => $this->nome,
        'email' => $this->email,
        'senha' => $this->senha,
        'tipo' => $this->tipo,
        // 'foto_perfil' => $this->foto_perfil
    ]);

    if ($idUsuario) {
        $dbClientes = new Database('clientes');
        $dbClientes->insert([
            'id_usuario' => $idUsuario,
            'cpf' => $this->cpf
        ]);
    }

    return $idUsuario;
    }

    public function atualizar() {
        $db = new Database('usuarios');
        return $db->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'tipo' => $this->tipo,
            'foto_perfil' => $this->foto_perfil
        ], "id = $this->id");
    }

    public static function buscarTodos() {
        $db = new Database('usuarios');
        return $db->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        $db = new Database('usuarios');
        return $db->select("id = $id")->fetchObject(self::class);
    }

    public static function buscarPorEmail($email) {
        $db2 = new Database(); 
        $dados = $db2->buscarUsuarioComCpfPorEmail($email);

        if ($dados) {
            return new Usuario($dados);
        }
        return null;
    }

    public function excluir($id) {
        $db = new Database('usuarios');
        return $db->delete("id = $id");
    }
}
