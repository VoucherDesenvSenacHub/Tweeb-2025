<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../../public/css/escolha-endereco.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div style="max-width: 900px; margin: 0 auto; padding: 20px;">
    <div class="enderecos">
        <h1 class="metodoh1">Meus Endereços</h1>
        <div class="endereco-card">
            <label>
                <input type="radio" id="endereco" name="endereco" value="casa" checked>
                <label class="endereco-label" for="endereco">Casa</label>
                <div class="endereco-details">
                    <p>240 Rua Capiatá, Novos Estados, Campo Grande MS 79034331</p>
                    <p>79034-331</p> 
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>

        <div class="endereco-card">
            <label>
                <input type="radio" id="endereco" name="endereco" value="trabalho">
                <label class="endereco-label" for="endereco">Trabalho <span class="default-tag">PADRÃO</span></label>
                <div class="endereco-details">
                    <p>2715 RUA Dr Jose, Caranda Bosque, Campo Grande MS 79034331</p>
                    <p>79034-331</p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
    </div>

    <div id="new-endereco-form" style="display: none;">
    <h2>Adicionar Novo Endereço</h2>
    <form id="form-novo-endereco" method="post">
        <div class="form-grid">
            <div class="form-group">
                <label for="nome_endereco">Nome (ex: Casa, Trabalho):</label>
                <input type="text" id="nome_endereco" name="nome_endereco" required>
            </div>

            <div class="form-group">
                <label for="cep_endereco">CEP:</label>
                <input type="text" id="cep_endereco" name="cep_endereco" required placeholder="Ex: 00000000">
            </div>

            <div class="form-group full-width">
                <label for="rua_endereco">Rua:</label>
                <input type="text" id="rua_endereco" name="rua_endereco" required>
            </div>

            <div class="form-group">
                <label for="numero_endereco">Número:</label>
                <input type="text" id="numero_endereco" name="numero_endereco" required>
            </div>

            <div class="form-group">
                <label for="bairro_endereco">Bairro:</label>
                <input type="text" id="bairro_endereco" name="bairro_endereco" required>
            </div>

            <div class="form-group">
                <label for="cidade_endereco">Cidade:</label>
                <input type="text" id="cidade_endereco" name="cidade_endereco" required>
            </div>

            <div class="form-group">
                <label for="estado_endereco">Estado:</label>
                <input type="text" id="estado_endereco" name="estado_endereco" required placeholder="Ex: SP">
            </div>
        </div>
        <button type="submit" class="btoes-endereco">Salvar Endereço</button>
    </form>
    </div>

    <div class="enderecos" id="enderecos-list">
        <!-- Endereços existentes estarão aqui -->
    </div>

    <div class="add-new-endereco" id="add-new-endereco-btn">
        <i class="fa-solid fa-circle-plus"></i>
        <p>Adicionar novo endereço</p>
    </div>

    <!-- <div class="endereco-botoes">
        <a href="../../../../home.php"><button class="botao-sair">Sair</button></a>
        <a href="#"><button class="botao-avancar">Salvar</button></a>
    </div> -->
</div> 


    
    <div class="enderecos" id="enderecos-list">
        <!-- Endereços existentes estarão aqui -->
    </div>

  

  


</div>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
<script src="../../../../public/js/ENDERECO.js"></script>
</body>

</html>


