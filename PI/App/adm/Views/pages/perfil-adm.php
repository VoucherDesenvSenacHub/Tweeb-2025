<?php
require_once __DIR__ . '/../../Models/Funcionario.php';
require_once __DIR__ . '/../../../DB/Database.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Verifica se o usuário está logado como admin ou funcionário
if (!isset($_SESSION['adm']) && !isset($_SESSION['funcionario'])) {
    header('Location: login-funcionario.php');
    exit();
}

// Define qual sessão usar (admin tem prioridade)
$funcionario = isset($_SESSION['adm']) ? $_SESSION['adm'] : $_SESSION['funcionario'];

// Busca dados completos do banco para garantir que temos todos os campos
$db = new Database();
$dadosCompletos = $db->buscarDadosCompletosPorId($funcionario['id'], $funcionario['tipo']);

// Se encontrou dados completos, atualiza a sessão e usa eles
if ($dadosCompletos) {
    $tipo_sessao = isset($_SESSION['adm']) ? 'adm' : 'funcionario';
    $_SESSION[$tipo_sessao] = array_merge($_SESSION[$tipo_sessao], $dadosCompletos);
    $funcionario = $dadosCompletos;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/Tweeb-2025/PI/public/css/perfil-adm.css">
</head>
<body>

<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="perfil-tweeb">
    <div class="perfil-tweeb-container">
        <button type="button" class="perfil-tweeb-editar">Oi <?php echo htmlspecialchars($funcionario['nome']); ?>, 👋🏼 </button>
        
        <div class="perfil-tweeb-header">
            <div class="perfil-tweeb-imagem">
                <?php 
                    $foto_perfil = !empty($funcionario['foto_perfil']) ? $funcionario['foto_perfil'] : 'imagem_padrao.png';
                    
                    // Verifica se é a imagem padrão ou uma foto personalizada
                    if ($foto_perfil === 'imagem_padrao.png' || empty($foto_perfil) || $foto_perfil === null) {
                        $caminho_foto = '/Tweeb-2025/PI/public/uploads/imagem_padrao.png';
                    } else {
                        $caminho_foto = '/Tweeb-2025/PI/public/uploads/' . $foto_perfil;
                    }
                ?>
                <img src="<?php echo htmlspecialchars($caminho_foto); ?>" alt="Foto de perfil" class="foto-perfil">
                
                <label for="inputFotoPerfil" class="btn-upload-foto" title="Alterar foto">
                    <i class="bi bi-cloud-arrow-up carregar-foto"></i>
                </label>

                <button type="button" class="perfil-tweeb-editar-foto" title="Editar">
                    <i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i>
                </button>
            </div>
            <div class="perfil-tweeb-info">
                <h1><?php echo htmlspecialchars($funcionario['nome']); ?></h1>
                <p class="perfil-tweeb-email"><?php echo htmlspecialchars($funcionario['email']); ?></p>
                <div class="fio"></div>
            </div>
        </div>

        <form class="perfil-tweeb-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($funcionario['id']); ?>">
            <input type="file" id="inputFotoPerfil" name="foto_perfil" accept="image/*" style="display: none;">

            <div class="perfil-tweeb-input-group">
                <label for="primeiro-nome">Primeiro nome</label>
                <input type="text" id="primeiro-nome" name="nome" value="<?php echo htmlspecialchars($funcionario['nome']); ?>" readonly>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome" value="<?php echo htmlspecialchars($funcionario['sobrenome'] ?? ''); ?>" readonly>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($funcionario['email']); ?>" readonly>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($funcionario['telefone'] ?? ''); ?>" readonly>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="matricula">Matrícula <span class="campo-fixo">(Não editável)</span></label>
                <input type="text" id="matricula" name="matricula" value="<?php echo htmlspecialchars($funcionario['matricula'] ?? ''); ?>" readonly disabled>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="cargo">Cargo <span class="campo-fixo">(Não editável)</span></label>
                <input type="text" id="cargo" name="cargo" value="<?php echo htmlspecialchars($funcionario['cargo'] ?? ''); ?>" readonly disabled>
            </div>

            <div class="perfil-tweeb-botoes-user">
                <button type="button" class="perfil-tweeb-cancelar-end" onclick="cancelEdit()">Cancelar</button>
                <button type="button" class="perfil-tweeb-salvar-end" onclick="editarUsuario()">Salvar alteração</button>
                <button type="button" class="perfil-tweeb-excluir-end" onclick="deletaUsuario()">Excluir Conta</button>
            </div>
        </form>
    </div>
</div>
<script src="../../../../public/js/perfil-adm.js"></script>
<script src="../../../../public/js/alterar-foto-adm.js"></script>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>