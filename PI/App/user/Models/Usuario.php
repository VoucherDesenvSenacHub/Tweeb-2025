<?php
require_once __DIR__ . '/../../DB/Database.php';

class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $tipo;
    private $db;

    public function __construct() {
        $this->db = new Database('usuarios');
    }

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setSenha($senha) {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function setCpf($cpf) {
        $this->cpf = preg_replace('/[^0-9]/', '', $cpf);
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    // Métodos de validação
    private function validarEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email inválido');
        }

        $resultado = $this->db->select("email = '" . $email . "'");
        if ($resultado->rowCount() > 0) {
            throw new Exception('Este email já está cadastrado');
        }

        return true;
    }

    private function validarCPF($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) != 11) {
            throw new Exception('CPF deve conter 11 dígitos');
        }

        if (preg_match('/^(\d)\1+$/', $cpf)) {
            throw new Exception('CPF inválido');
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new Exception('CPF inválido');
            }
        }

        $dbClientes = new Database('clientes');
        $resultado = $dbClientes->select("cpf = '" . $cpf . "'");
        if ($resultado->rowCount() > 0) {
            throw new Exception('Este CPF já está cadastrado');
        }

        return true;
    }

    // Método de cadastro
    public function cadastrar($dados) {
        try {
            // Validações
            if (empty($dados['nome']) || empty($dados['email']) || empty($dados['cpf']) || 
                empty($dados['senha']) || empty($dados['confirmacao'])) {
                throw new Exception('campos_vazios');
            }

            if ($dados['senha'] !== $dados['confirmacao']) {
                throw new Exception('senha_diferente');
            }

            $this->setEmail($dados['email']);
            $this->validarEmail($dados['email']);

            $this->setCpf($dados['cpf']);
            $this->validarCPF($dados['cpf']);

            $this->setNome($dados['nome']);
            $this->setSenha($dados['senha']);

            // Insere na tabela usuarios
            $idUsuario = $this->db->insert([
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha,
                'tipo' => 'cliente'
            ]);

            if ($idUsuario) {
                // Insere na tabela clientes
                $dbClientes = new Database('clientes');
                $dbClientes->insert([
                    'id_usuario' => $idUsuario,
                    'cpf' => $this->cpf
                ]);

                // Inicia a sessão
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }

                $_SESSION['usuario'] = [
                    'id' => $idUsuario,
                    'nome' => $this->nome,
                    'email' => $this->email,
                    'cpf' => $this->cpf
                ];

                return true;
            }

            throw new Exception('error');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Método de login
    public function login($email, $senha) {
        try {
            $query = "SELECT u.*, c.cpf 
                     FROM usuarios u 
                     LEFT JOIN clientes c ON c.id_usuario = u.id 
                     WHERE u.email = ?";
            
            $resultado = $this->db->execute($query, [$email]);
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

            if (!$usuario) {
                throw new Exception('Usuario não encontrado');
            }

            if (!password_verify($senha, $usuario['senha'])) {
                throw new Exception('Senha incorreta');
            }

            // Inicia a sessão
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            // Remove a senha antes de salvar na sessão
            unset($usuario['senha']);
            
            // Define a foto de perfil padrão se não houver uma definida
            if (empty($usuario['foto_perfil'])) {
                $usuario['foto_perfil'] = 'foto-perfil-default.png';
            }
            
            $_SESSION['usuario'] = $usuario;

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function excluir($id) {
        $clientes = new Database('clientes');
        $clientes->delete("id_usuario = $id");

        $resposta_preferencia = new Database('respostas_preferencias');
        $resposta_preferencia->delete("user_id = $id");

        return $this->db->delete("id = $id");
    }

    public function buscarPorId($id) {
        $result = $this->db->select("id = $id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $dados) {
        return $this->db->update($dados, "id = $id");
    }

    public function atualizarFoto($id, $foto) {
        $dados = ['foto_perfil' => $foto];
        return $this->db->update($dados, "id = $id");
    }
}
