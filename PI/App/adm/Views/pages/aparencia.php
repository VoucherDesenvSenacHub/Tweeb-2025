<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['adm']) && !isset($_SESSION['funcionario'])) {
    header("Location: login-funcionario.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Aparência - Gerenciamento de Banners</title>
</head>
<body id="body-aparencia">
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>
    <div class="container">

        <div class="panel">
            <h2 class="panel-title">Banners Ativos</h2>
            
            <div class="banners-grid" id="banners-container">
                <!-- Banners serão carregados dinamicamente aqui -->
                <div class="empty-state">
                    <div class="empty-icon">📷</div>
                    <h3>Nenhum banner cadastrado</h3>
                    <p>Adicione seu primeiro banner usando o formulário abaixo</p>
                </div>
            </div>
        </div>

        <div class="panel">
            <h2 class="panel-title">Adicionar Novo Banner</h2>
            
            <div class="upload-area" id="drop-area">
                <div class="upload-icon">⬆️</div>
                <p class="upload-text">Arraste e solte sua imagem aqui ou clique para selecionar</p>
                <button class="upload-btn">Selecionar Arquivo</button>
                <input type="file" id="file-input" accept="image/*">
            </div>

            <div class="form-group">
                <label class="label-banner" for="banner-title">Título do Banner</label>
                <input type="text" id="banner-title" placeholder="Ex: Promoção de Verão">
            </div>

            <div class="form-group">
                <label class="label-banner" for="banner-link">Link de Redirecionamento</label>
                <input type="text" id="banner-link" placeholder="Ex: https://exemplo.com/promocao">
            </div>

            <div class="form-group">
                <label class="label-banner" for="banner-active">Ativo</label>
                <select id="banner-active">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="actions-bar">
                <button class="btn-secondary" id="cancel-btn">Cancelar</button>
                <button class="btn-primary" id="add-banner">Adicionar Banner</button>
            </div>

            <div class="preview-section">
                <h3 class="preview-title">Pré-visualização</h3>
                <div class="preview-container">
                    <img src="https://placehold.co/1200x400?text=Pré-visualização+do+Banner" alt="Área de pré-visualização para o novo banner do site" class="preview-image" id="preview-image">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
