<?php
require_once __DIR__ . '/../../DB/Database.php';

class Funcionario {
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public ?string $sobrenome = null;
    public string $tipo;
    public ?string $telefone = null;
    public string $matricula;
    public string $cargo;
    public string $foto_perfil = 'imagem_padrao.png';

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id = $dados['id'] ?? 0;
            $this->nome = $dados['nome'] ?? '';
            $this->email = $dados['email'] ?? '';
            $this->senha = $dados['senha'] ?? '';
            $this->matricula = $dados['matricula'] ?? '';
            $this->cargo = $dados['cargo'] ?? '';
            $this->foto_perfil = $dados['foto_perfil'] ?? 'imagem_padrao.png';
        }
    }

    // public function inserirFunc() {
    //     $db = new Database('usuarios');
    //     $idUsuario = $db->insert([
    //         'nome' => $this->nome,
    //         'email' => $this->email,
    //         'senha' => $this->senha,
    //         'tipo' => 'funcionario',
    //         'foto_perfil' => $this->foto_perfil
    //     ]);

    //     if ($idUsuario) {
    //         $dbfuncionario = new Database('funcionarios');
    //         $dbfuncionario->insert([
    //             'id_usuario' => $idUsuario,
    //             'matricula' => $this->matricula,
    //             'cargo' =>$this-> cargo
    //         ]);
    //     }

    //     return $idUsuario;
    // }

    public function inserirADM() {
        $db = new Database('usuarios');
        $idUsuario = $db->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'tipo' => 'administrador',
            'foto_perfil' => $this->foto_perfil
        ]);

        if ($idUsuario) {
            $dbadm = new Database('administrador');
            $dbadm->insert([
                'id_usuario' => $idUsuario,
                'matricula' => $this->matricula,
                'cargo' => $this->cargo
            ]);
        }

        return $idUsuario;
    }

    public function atualizarFoto($novoNome) {
        $db = new Database('usuarios');
        return $db->update(['foto_perfil' => $novoNome], "id = {$this->id}");
    }
    
    
    public static function cadastrar($dados)
    {
        // 1. Inserir na tabela `usuarios`
        $dbUsuario = new Database('usuarios');
        $idUsuario = $dbUsuario->insert([
            'nome'        => $dados['nome'],
            'sobrenome'   => $dados['sobrenome'],
            'email'       => $dados['email'],
            'telefone'    => $dados['telefone'],
            'senha'       => $dados['senha'],
            'tipo'        => 'funcionario',
            'foto_perfil' => 'imagem_padrao.png' // ou outra imagem padrão
        ]);



        // 2. Inserir na tabela `funcionarios`
        $dbFuncionario = new Database('funcionarios');
        return $dbFuncionario->insert_by([
            'id_usuario' => $idUsuario,
            'matricula'  => $dados['matricula'],
            'cargo' => 'Funcionario'
        ]);
    }
    



    public function atualizar() {
        // Atualiza tabela usuarios
        $dbUsuarios = new Database('usuarios');
        $dbUsuarios->update([
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'foto_perfil' => $this->foto_perfil
        ], "id = {$this->id}");

        // Atualiza tabela administrador
        $dbAdm = new Database('administrador');
        $dbAdm->update([
            'matricula' => $this->matricula,
            'cargo' => $this->cargo
        ], "id_usuario = {$this->id}");

        return true;
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
        $dados = $db2->buscarAdmPorEmail($email);
        return $dados;
    }

    public function excluir($id) {
        $db = new Database('usuarios');
        return $db->delete("id = $id");
    }

    public static function buscarAdministradorPorEmail($email) {
        $db2 = new \Database();
        $dados = $db2->buscarAdministradorPorEmail($email);
        return $dados;
    }
}
