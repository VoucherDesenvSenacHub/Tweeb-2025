<?php
require_once __DIR__ . '../../../DB/Database.php';

class Usuario {
    public int $id;
    public string $nome;
    public ?string $sobrenome = null;
    public string $email;
    public string $senha;
    public string $cpf;
    public string $tipo;
    public ?string $telefone = null;
    public string $foto_perfil = 'imagem_padrao.png';

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id           = $dados['id'] ?? 0;
            $this->nome         = $dados['nome'] ?? '';
            $this->sobrenome    = $dados['sobrenome'] ?? null; 
            $this->email        = $dados['email'] ?? '';
            $this->senha        = $dados['senha'] ?? '';
            $this->cpf          = $dados['cpf'] ?? '';
            $this->tipo         = $dados['tipo'] ?? 'cliente';
            $this->telefone     = $dados['telefone'] ?? null;
            $this->foto_perfil  = $dados['foto_perfil'] ?? 'imagem_padrao.png';
        }
    }

    public function inserir() {
        $db = new Database('usuarios');
        $idUsuario = $db->insert([
            'nome'         => $this->nome,
            'sobrenome'    => $this->sobrenome,
            'email'        => $this->email,
            'senha'        => $this->senha,
            'tipo'         => $this->tipo,
            'foto_perfil'  => $this->foto_perfil
        ]);

        if ($idUsuario) {
            $dbClientes = new Database('clientes');
            $dbClientes->insert([
                'id_usuario' => $idUsuario,
                'cpf'        => $this->cpf
            ]);
        }

        return $idUsuario;
    }

    public function atualizar() {
        $db = new Database('usuarios');
        return $db->update([
            'nome'         => $this->nome,
            'sobrenome'    => $this->sobrenome,
            'telefone'     => $this->telefone,
            'email'        => $this->email,
            'foto_perfil'  => $this->foto_perfil
        ], "id = {$this->id}");
    }

    public function atualizarFoto($novoNome) {
        $db = new Database('usuarios');
        return $db->update(['foto_perfil' => $novoNome], "id = {$this->id}");
    }

    public static function buscarTodos() {
        $db = new Database('usuarios');
        return $db->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        $db = new Database('usuarios');
        return $db->select("id = $id")->fetchObject(self::class);
    }

    public static function buscarPorEmail(string $email) {
        try {
          
            $db = new Database();
            return $db->buscarUsuarioComCpfPorEmail($email);

        } catch (Exception $e) {
            
            error_log("Erro no Model Usuario ao buscar por email: " . $e->getMessage());
            
            return false;
        }
    }

    public function excluir($id) {
        $db = new Database('usuarios');
        return $db->delete("id = $id");
    }

    public function atualizarSenha() {
        $db = new Database('usuarios');
        return $db->update(['senha' => $this->senha], "id = {$this->id}");
    }
    
    
}