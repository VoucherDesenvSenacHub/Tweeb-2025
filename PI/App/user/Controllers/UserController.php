<?php

require_once __DIR__ . '/../Models/Usuario.php';

class UserController {
    private $usuario;

    public function __construct() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $this->usuario = new Usuario();
    }

    public function processarCadastro() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php');
            exit();
        }

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $cpf = trim($_POST['cpf'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $confirmacao = $_POST['confirmar_senha'] ?? '';

        if (empty($nome) || empty($email) || empty($senha) || empty($confirmacao)) {
            header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=Preencha todos os campos');
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=Email inválido');
            exit();
        }

        if ($senha !== $confirmacao) {
            header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=Senhas não conferem');
            exit();
        }

        $usuarioExistente = $this->usuario->buscarPorEmail($email);
        if ($usuarioExistente) {
            header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=Email já cadastrado');
            exit();
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $this->usuario->nome = $nome;
        $this->usuario->email = $email;
        $this->usuario->cpf = $cpf;
        $this->usuario->senha = $senhaHash;
        $this->usuario->tipo = 'cliente';
        // $this->usuario->foto_perfil = 'imagem_padrao.png';

        if ($this->usuario->inserir()) {
            $usuarioCadastrado = $this->usuario->buscarPorEmail($email);

            $_SESSION['usuario'] = [
                'id'    => $usuarioCadastrado->id,
                'nome'  => $usuarioCadastrado->nome,
                'email' => $usuarioCadastrado->email,
                'tipo'  => $usuarioCadastrado->tipo
            ];
            header('location: /Tweeb-2025/PI/App/user/View/pages/pagina_1_pesquisa_cadastro.php');
            exit();
        } else {
            header('location: /Tweeb-2025/PI/App/user/View/pages/cadastro.php?status=Erro ao cadastrar');
            exit();
        }
    }

    public function processarLogin() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: /Tweeb-2025/PI/App/user/View/pages/login.php');
            exit();
        }

        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        if (empty($email) || empty($senha)) {
            header('location: /Tweeb-2025/PI/App/user/View/pages/login.php?status=Preencha todos os campos');
            exit();
        }

        $usuarioDB = $this->usuario->buscarPorEmail($email);

        if ($usuarioDB && password_verify($senha, $usuarioDB['senha'])) {
            $_SESSION['usuario'] = [
                'id' => $usuarioDB['id'],
                'nome' => $usuarioDB['nome'],
                'email' => $usuarioDB['email'],
                'tipo' => $usuarioDB['tipo'],
                'foto_perfil' => $usuarioDB['foto_perfil']
            ];
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['usuario']['id'])) {
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }

        $id = $_SESSION['usuario']['id'];

        $dadosUsuario = array_filter([
            'nome' => trim($_POST['nome'] ?? ''),
            'sobrenome' => trim($_POST['sobrenome'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'telefone' => trim($_POST['telefone'] ?? '')
        ], fn($v) => $v !== '');


        foreach ($dadosUsuario as $campo => $valor) {
            $this->usuario->$campo = $valor;
        }
        $this->usuario->id = $id;

        if ($this->usuario->atualizar()) {
            foreach ($dadosUsuario as $campo => $valor) {
                $_SESSION['usuario'][$campo] = $valor;
            }
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        } else {
            $_SESSION['erro'] = "Nenhuma alteração foi realizada.";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }
    }

    public function processarUploadFoto() {
        if (!isset($_SESSION['usuario']['id'])) {
            header('Location: /Tweeb-2025/PI/app/user/view/pages/login.php');
            exit();
        }

        if (!isset($_FILES['foto_perfil']) || $_FILES['foto_perfil']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['erro'] = "Erro no upload da imagem.";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }

        $foto = $_FILES['foto_perfil'];
        $nomeArquivo = uniqid() . '_' . basename($foto['name']);
        $diretorioDestino = __DIR__ . '/../../../../PI/public/uploads/';

        if (!file_exists($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        $tipoPermitido = ['image/jpeg', 'image/png', 'image/gif'];
        $tipoArquivo = mime_content_type($foto['tmp_name']);

        if (!in_array($tipoArquivo, $tipoPermitido)) {
            $_SESSION['erro'] = "Tipo de arquivo não permitido. Use JPG, PNG ou GIF.";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }

        if (move_uploaded_file($foto['tmp_name'], $diretorioDestino . $nomeArquivo)) {
            $this->usuario->id = $_SESSION['usuario']['id'];
            $this->usuario->foto_perfil = $nomeArquivo;
            $this->usuario->atualizar();

            $_SESSION['usuario']['foto_perfil'] = $nomeArquivo;
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }

        $_SESSION['erro'] = "Erro ao salvar a imagem. Tente novamente.";
        header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
        exit();
    }

    public function processarAlteracaoSenha() {
        if (!isset($_SESSION['usuario']['id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /Tweeb-2025/PI/app/user/view/pages/alterar-senha.php');
            exit();
        }

        $id = $_SESSION['usuario']['id'];
        $senhaAtual = $_POST['senha_atual'] ?? '';
        $novaSenha = $_POST['nova_senha'] ?? '';
        $confirmarSenha = $_POST['confirmar_senha'] ?? '';

        if (empty($senhaAtual) || empty($novaSenha) || empty($confirmarSenha)) {
            $_SESSION['mensagem'] = "Todos os campos são obrigatórios.";
            $_SESSION['mensagem_tipo'] = "alert-danger";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/alterar-senha.php');
            exit();
        }

        if ($novaSenha !== $confirmarSenha) {
            $_SESSION['mensagem'] = "A nova senha e a confirmação não coincidem.";
            $_SESSION['mensagem_tipo'] = "alert-danger";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/alterar-senha.php');
            exit();
        }

        $usuarioDB = $this->usuario->buscarPorId($id);

        if (!$usuarioDB || !password_verify($senhaAtual, $usuarioDB['senha'])) {
            $_SESSION['mensagem'] = "Senha atual incorreta.";
            $_SESSION['mensagem_tipo'] = "alert-danger";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/alterar-senha.php');
            exit();
        }

        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $this->usuario->id = $id;
        $this->usuario->senha = $senhaHash;

        if ($this->usuario->atualizar()) {
            $_SESSION['mensagem'] = "Senha alterada com sucesso!";
            $_SESSION['mensagem_tipo'] = "alert-success";
        } else {
            $_SESSION['mensagem'] = "Erro ao alterar a senha. Tente novamente.";
            $_SESSION['mensagem_tipo'] = "alert-danger";
        }

        header('Location: /Tweeb-2025/PI/app/user/view/pages/alterar-senha.php');
        exit();
    }

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

            case 'alterar_senha':
                $controller->processarAlteracaoSenha();
                break;

            default:
                header('Location: /Tweeb-2025/PI/App/user/View/pages/login.php');
                exit();
        }
    }
}

if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    UserController::processarRequisicao();
}
