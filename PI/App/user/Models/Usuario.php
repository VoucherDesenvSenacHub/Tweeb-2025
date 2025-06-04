<?php
require_once __DIR__ . '/../../DB/Database.php';

class Usuario {
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public string $cpf;
    public string $tipo;
    public ?string $telefone = null;
    public ?string $cep = null;
    public ?string $rua = null;
    public ?string $bairro = null;
    public ?string $cidade = null;
    public ?string $estado = null;
    public string $foto_perfil = 'imagem_padrao.png';

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id = $dados['id'] ?? 0;
            $this->nome = $dados['nome'] ?? '';
            $this->email = $dados['email'] ?? '';
            $this->senha = $dados['senha'] ?? '';
            $this->cpf = $dados['cpf'] ?? '';
            $this->tipo = $dados['tipo'] ?? 'cliente';
            $this->telefone = $dados['telefone'] ?? null;
            $this->cep = $dados['cep'] ?? null;
            $this->rua = $dados['rua'] ?? null;
            $this->bairro = $dados['bairro'] ?? null;
            $this->cidade = $dados['cidade'] ?? null;
            $this->estado = $dados['estado'] ?? null;
            $this->foto_perfil = $dados['foto_perfil'] ?? 'imagem_padrao.png';
        }
    }

    public function inserir() {
        $db = new Database('usuarios');
        $idUsuario = $db->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'tipo' => $this->tipo,
            'foto_perfil' => $this->foto_perfil
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
            'telefone' => $this->telefone,
            'cep' => $this->cep,
            'rua' => $this->rua,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado
        ], "id = {$this->id}");
    }

    public function atualizarFoto() {
        try {
            $db = new Database('usuarios');
            return $db->update([
                'foto_perfil' => $this->foto_perfil
            ], "id = {$this->id}");
        } catch (Exception $e) {
            error_log('Erro ao atualizar foto: ' . $e->getMessage());
            return false;
        }
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
        return $dados;
    }

    public function excluir($id) {
        $db = new Database('usuarios');
        return $db->delete("id = $id");
    }
}
