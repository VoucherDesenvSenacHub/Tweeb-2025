<?php
require_once __DIR__ . '/../../DB/Database.php';

class Funcionario {
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
    public string $avatar = 'imagem_padrao.png';

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id = $dados['id_funcionario'] ?? 0;
            $this->nome = $dados['nome'] ?? '';
            $this->email = $dados['email'] ?? '';
            $this->senha = $dados['senha'] ?? '';
            $this->cpf = $dados['cpf'] ?? '';
            $this->tipo = $dados['tipo'] ?? 'funcionario';
            $this->telefone = $dados['telefone'] ?? null;
            $this->cep = $dados['cep'] ?? null;
            $this->rua = $dados['rua'] ?? null;
            $this->bairro = $dados['bairro'] ?? null;
            $this->cidade = $dados['cidade'] ?? null;
            $this->estado = $dados['estado'] ?? null;
            $this->avatar = $dados['avatar'] ?? 'imagem_padrao.png';
        }
    }

    public function inserir() {
        $db = new Database('funcionario');
        $idfuncionario = $db->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'tipo' => $this->tipo,
            'avatar' => $this->avatar
        ]);

        return $idfuncionario;
    }

    public function atualizar() {
        $db = new Database('funcionario');
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
        $db = new Database('funcionario');
        return $db->update([
            'avatar' => $this->foto_perfil
        ], "id = {$this->id}");
    }

    public static function buscarTodos() {
        $db = new Database('funcionario');
        return $db->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        $db = new Database('funcionario');
        return $db->select("id = $id")->fetchObject(self::class);
    }

    public static function buscarPorEmail($email) {
        $db2 = new Database(); 
        $dados = $db2->buscarUsuarioComCpfPorEmail($email);
        return $dados;
    }

    public function excluir($id) {
        $db = new Database('funcionario');
        return $db->delete("id = $id");
    }
}
