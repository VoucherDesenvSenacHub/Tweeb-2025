<?php
session_start();
require __DIR__.'/../Models/Usuario.php';
require __DIR__.'/../Models/Endereco.php';
require __DIR__.'/../Models/Cep.php';

if (!isset($_SESSION['usuario']['id'])) {
    header('Location: /Tweeb-2025/PI/app/user/view/pages/login.php');
    exit();
}

$usuarioModel = new Usuario();
$cepModel = new Cep();
$enderecoModel = new Endereco();

$id = $_SESSION['usuario']['id'];

// Tratamento do upload de foto
if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
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
        // Verifica se o arquivo foi realmente movido e existe
        if (file_exists($caminhoCompleto)) {
            $usuarioModel->atualizarFoto($id, $nomeArquivo);
            $_SESSION['usuario']['foto_perfil'] = $nomeArquivo;
            
            if (!isset($_POST['nome'])) {
                header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
                exit();
            }
        } else {
            $_SESSION['erro'] = "Erro ao salvar a imagem. Tente novamente.";
            header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
            exit();
        }
    } else {
        $_SESSION['erro'] = "Erro ao fazer upload da imagem. Tente novamente.";
        header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosUsuario = [
        'nome' => $_POST['nome'] ?? '',
        'sobrenome' => $_POST['sobrenome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? ''
    ];
    
    $dadosEndereco = [
        'nome_endereco' => 'teste',
        'rua' => $_POST['rua'] ?? '',
        'bairro' => $_POST['bairro'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'estado' => $_POST['estado'] ?? ''
    ];

    $dadosCep = [
        'codigo' => $_POST['cep'] ?? ''
    ];

    // Primeiro atualiza o usuário
    $okUsuario = $usuarioModel->atualizar($id, $dadosUsuario);

    // Depois trata o endereço
    $existeEndereco = $enderecoModel->buscarPorUsuario($id);
    if ($existeEndereco) {
        $okEndereco = $enderecoModel->atualizarPorUsuario($id, $dadosEndereco);
        $enderecoId = $existeEndereco['id'];
    } else {
        $enderecoId = $enderecoModel->inserirParaUsuario($id, $dadosEndereco);
        $okEndereco = $enderecoId !== false;
    }

    // Por fim, trata o CEP apenas se tiver um endereço válido
    if ($enderecoId) {
        $dadosCep['endereco_id'] = $enderecoId;
        $existeCep = $cepModel->buscarPorUsuario($enderecoId);
        if ($existeCep) {
            $okCep = $cepModel->atualizarPorUsuario($enderecoId, $dadosCep);
        } else {
            $okCep = $cepModel->inserirParaUsuario($enderecoId, $dadosCep);
        }
    }

    $_SESSION['usuario']['nome'] = $dadosUsuario['nome'];
    $_SESSION['usuario']['email'] = $dadosUsuario['email'];
    $_SESSION['usuario']['telefone'] = $dadosUsuario['telefone'];
    $_SESSION['usuario']['sobrenome'] = $dadosUsuario['sobrenome'];
    $_SESSION['usuario']['cep'] = $dadosCep['codigo'];
    $_SESSION['usuario']['rua'] = $dadosEndereco['rua'];
    $_SESSION['usuario']['cidade'] = $dadosEndereco['cidade'];
    $_SESSION['usuario']['bairro'] = $dadosEndereco['bairro'];
    $_SESSION['usuario']['estado'] = $dadosEndereco['estado'];

    if ($okUsuario || $okEndereco || ($enderecoId && $okCep)) {
        header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
        exit();
    }
}                                                                                          
