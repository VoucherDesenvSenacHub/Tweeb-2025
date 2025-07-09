<?php

require_once __DIR__ . '../../../Models/Usuario.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}
function mascararCPF($cpf) {
    $cpf = preg_replace('/\D/', '', $cpf);
    if (strlen($cpf) !== 11) return '';
    return '***.***.***-' . substr($cpf, 9, 2);
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
    <link rel="stylesheet" href="../../../../public/css/perfil-usuario-enderecos.css">
</head>
<body>
    
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<!-- Contêiner do Perfil -->
<div class="perfil-tweeb">
    <div class="perfil-tweeb-container">
        <button class="perfil-tweeb-editar">Oi <?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?>, 👋🏼 </button>
        
        <div class="perfil-tweeb-header">
            <?php if(isset($_SESSION['erro'])): ?>
                <div class="alert alert-danger">
                    <?php 
                    echo htmlspecialchars($_SESSION['erro']); 
                    unset($_SESSION['erro']);
                    ?>
                </div>
            <?php endif; ?>
            
            <div class="perfil-tweeb-imagem">
                <?php 
                $foto_perfil = !empty($_SESSION['usuario']['foto_perfil']) ? $_SESSION['usuario']['foto_perfil'] : 'imagem_padrao.png';
                $caminho_foto = strpos($foto_perfil, 'imagem_padrao.png') !== false ? 
                '/Tweeb-2025/PI/public/uploads/imagem_padrao.png' : 
                '/Tweeb-2025/PI/public/uploads/' . $foto_perfil;

                ?>
                <img src="<?php echo htmlspecialchars($caminho_foto); ?>" 
                     alt="Foto de Perfil" 
                     class="foto-perfil">
                
                <!-- Input oculto de upload -->

                <!-- Botão de upload (ícone Bootstrap) -->
                <label for="inputFotoPerfil" class="btn-upload-foto" title="Alterar foto">
                    <i class="bi bi-cloud-arrow-up carregar-foto"></i>
                </label>

                <!-- Botão de editar (ícone lápis) -->
                <button class="perfil-tweeb-editar-foto" title="Editar" onclick="toggleEditMode()">
                    <i class="fa-regular fa-pen-to-square" style="color: #4b5563;"></i>
                </button>
            </div>
            <div class="perfil-tweeb-info">
                <h1><?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?></h1>
                <p class="perfil-tweeb-email"><?php echo htmlspecialchars($_SESSION['usuario']['email']); ?></p>
                <div class="fio"></div>
            </div>
        </div>

        <form class="perfil-tweeb-form" id="perfil-tweeb-form" method="POST" enctype="multipart/form-data">
            <input type="file" id="inputFotoPerfil" name="foto_perfil" accept="image/*" style="display: none;">

            <div class="perfil-tweeb-input-group">
                <label for="primeiro-nome">Primeiro nome</label>
                <input type="text" id="primeiro-nome" name="nome" value="<?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?>" readonly>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome" value="<?php echo htmlspecialchars($_SESSION['usuario']['sobrenome'] ?? ''); ?>" readonly>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="cpf">CPF*</label>
                <input type="text" id="cpf" disabled value="<?php echo mascararCPF($_SESSION['usuario']['cpf']); ?>">
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['usuario']['email']); ?>" readonly>
            </div>

            <div class="perfil-tweeb-input-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($_SESSION['usuario']['telefone'] ?? ''); ?>" readonly>
            </div>

            <div class="perfil-tweeb-botoes-user">
                <button type="button" class="perfil-tweeb-cancelar-end" onclick="cancelEdit()">Cancelar</button>
                <button type="submit" class="perfil-tweeb-salvar-end" onClick="editarUsuario()">Salvar alteração</button>
                <button type="button" class="perfil-tweeb-excluir-end" onClick="abriModal()">Excluir Conta</button>
            </div>
            
        </form>
        
    </div>
</div>

<div id="modal" class="modal-perfil_usuario">
  <div class="modal-conteudo_perfilUsuario">
    <p>Tem certeza que deseja excluir sua conta?</p>
    <div class="botoes-perfil_usuario">
      <button class="btn-excluirPerfil" onclick="deletaUsuario()">Excluir</button>
      <button class="btn-cancelarPerfil" onclick="fecharModal()">Cancelar</button>
    </div>
  </div>
</div>
<!-- Modal de mensagem para feedback da exclusão -->
<div id="modalMensagem" class="modal-perfil_usuario">
  <div class="modal-conteudo_perfilUsuario">
    <p id="modalMensagemTexto"></p>
    <div class="botoes-perfil_usuario">
      <button onclick="document.getElementById('modalMensagem').style.display='none'">OK</button>
    </div>
  </div>
</div>

<div id="modalAviso" class="modal-aviso">
  <div class="modal-aviso-conteudo">
    <span id="modalAvisoTexto"></span>
  </div>
</div>

<div id="modalSucessoAtualizacao" class="modal-perfil_usuario">
  <div class="modal-conteudo_perfilUsuario">
    <p id="modalSucessoAtualizacaoTexto">Dados atualizados com sucesso!</p>
    <div class="botoes-perfil_usuario">
      <button class="btn-excluirPerfil" onclick="fecharModalSucessoAtualizacao()">OK</button>
    </div>
  </div>
</div>


<div id="modalConfirmarAlteracao" class="modal-perfil_usuario">
  <div class="modal-conteudo_perfilUsuario">
    <p>Deseja alterar?</p>
    <div class="botoes-perfil_usuario">
      <button class="btn-excluirPerfil" onclick="confirmarAlteracao()">Confirmar</button>
      <button class="btn-cancelarPerfil" onclick="fecharModalConfirmarAlteracao()">Cancelar</button>
    </div>
  </div>
</div>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
<script>
    const usuarioID  = <?php echo json_encode($_SESSION['usuario']['id']);?>
</script>
<script src="/Tweeb-2025/PI/public/js/alterar-foto.js"></script>
<script src="/Tweeb-2025/PI/public/js/perfil-usuario.js"></script>
</body>
</html>