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

    public function processarEdicao() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }

        $id = $_SESSION['usuario']['id'];
        
        // Dados do usuário
        $dadosUsuario = [
            'nome' => $_POST['nome'] ?? '',
            'sobrenome' => $_POST['sobrenome'] ?? '',
            'email' => $_POST['email'] ?? '',
            'telefone' => $_POST['telefone'] ?? ''
        ];

        // Atualiza o usuário
        $this->usuario->atualizar($id, $dadosUsuario);

        // Atualiza a sessão
        $_SESSION['usuario'] = array_merge($_SESSION['usuario'], $dadosUsuario);

        header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
        exit();
    }

    public function processarUploadFoto() {
        if (!isset($_FILES['foto_perfil']) || $_FILES['foto_perfil']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['erro'] = "Erro no upload da imagem.";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }

        $foto = $_FILES['foto_perfil'];
        $nomeArquivo = uniqid() . '_' . basename($foto['name']);
        $diretorioDestino = __DIR__ . '/../../../../PI/public/uploads/';
        
        // Verifica e cria o diretório se não existir
        if (!file_exists($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }
        
        $caminhoCompleto = $diretorioDestino . $nomeArquivo;
        
        // Verifica o tipo do arquivo
        $tipoPermitido = ['image/jpeg', 'image/png', 'image/gif'];
        $tipoArquivo = mime_content_type($foto['tmp_name']);
        
        if (!in_array($tipoArquivo, $tipoPermitido)) {
            $_SESSION['erro'] = "Tipo de arquivo não permitido. Use apenas imagens JPG, PNG ou GIF.";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }
        
        if (move_uploaded_file($foto['tmp_name'], $caminhoCompleto)) {
            // Atualiza a foto no banco de dados
            $this->usuario->atualizarFoto($_SESSION['usuario']['id'], $nomeArquivo);
            
            // Atualiza a sessão
            $_SESSION['usuario']['foto_perfil'] = $nomeArquivo;
            
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }
        
        $_SESSION['erro'] = "Erro ao salvar a imagem. Tente novamente.";
        header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
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

            case 'editar':
                $controller->processarEdicao();
                break;

            case 'upload_foto':
                $controller->processarUploadFoto();
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
?>
