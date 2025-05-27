<?php

require_once __DIR__ . '/../Models/Usuario.php';

class UserController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function processarCadastro() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php');
            exit();
        }

        // Converte o campo confirmar_senha para confirmacao
        $_POST['confirmacao'] = $_POST['confirmar_senha'] ?? '';

        $resultado = $this->usuario->cadastrar([
            'nome' => $_POST['nome'] ?? '',
            'email' => $_POST['email'] ?? '',
            'cpf' => $_POST['cpf'] ?? '',
            'senha' => $_POST['senha'] ?? '',
            'confirmacao' => $_POST['confirmacao'] ?? ''
        ]);

        if ($resultado === true) {
            header('location: /Tweeb-2025/PI/App/user/View/pages/pagina_1_pesquisa_cadastro.php');
            exit();
        }

        header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=' . urlencode($resultado));
        exit();
    }

    public function processarLogin() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: /Tweeb-2025/PI/App/user/View/pages/login.php');
            exit();
        }

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($this->usuario->login($email, $senha)) {
            header('Location: /Tweeb-2025/PI/home.php');
            exit();
        }

        header('Location: /Tweeb-2025/PI/App/user/View/pages/login.php?status=error');
        exit();
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /Tweeb-2025/PI/App/user/View/pages/login.php');
        exit();
    }

    // Método estático para processar as requisições
    public static function processarRequisicao() {
        $controller = new self();
        $acao = $_GET['acao'] ?? '';

        switch ($acao) {
            case 'cadastrar':
                $controller->processarCadastro();
                break;
            
            case 'login':
                $controller->processarLogin();
                break;
            
            case 'logout':
                $controller->logout();
                break;
            
            default:
                header('Location: /Tweeb-2025/PI/App/user/View/pages/login.php');
                exit();
        }
    }
}

// Se este arquivo for chamado diretamente, processa a requisição
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    UserController::processarRequisicao();
}