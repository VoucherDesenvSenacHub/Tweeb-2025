<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}

// Verificar se há itens no carrinho
require_once __DIR__ . '/../../Models/Carrinho.php';
$id_usuario = $_SESSION['usuario']['id'];
$itens_carrinho = Carrinho::obterCarrinho($id_usuario);

if (empty($itens_carrinho)) {
    // Se o carrinho estiver vazio, redirecionar para a página de produtos
    header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Endereço - Tweeb</title>
    <link rel="stylesheet" href="../../../../public/css/escolha-endereco.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

<div class="container">
    <div class="step-indicator">
        <span class="" id="step-ativo">
            <i class="fa-solid fa-magnifying-glass-location"></i>
            <div class="span-information">
                <p id="step-passo">Passo 1</p>
                <p>Endereço</p>
            </div>
        </span>
        
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="">
            <i class="fa-solid fa-credit-card"></i>
            <div class="span-information">
                <p id="step-passo">Passo 3</p>
                <p>Pagamento</p>
            </div>
        </span>
    </div>

    <div class="enderecos">
        <h1 class="metodoh1">Selecione Endereço</h1>
        <div id="enderecos-list">
            <!-- Endereços serão carregados dinamicamente aqui -->
        </div>
    </div>

    <!-- Modal para adicionar/editar endereço -->
    <div id="modal-endereco" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modal-title">Adicionar Novo Endereço</h2>
            <form id="form-endereco">
                <input type="hidden" id="id_endereco" name="id_endereco" value="">
                
                <div class="form-group">
                    <label for="nome_endereco">Nome do Endereço (ex: Casa, Trabalho):</label>
                    <input type="text" id="nome_endereco" name="nome_endereco" placeholder="Digite um nome para o endereço">
                </div>

                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <div class="cep-input-group">
                        <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" required>
                        <button type="button" id="btn-buscar-cep" class="btn-buscar-cep">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <small id="cep-status" class="cep-status"></small>
                </div>

                <div class="form-group">
                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua" placeholder="Nome da rua" required>
                </div>

                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" placeholder="Número" required>
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Nome do bairro" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Nome da cidade" required>
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="">Selecione o estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn-cancelar" onclick="fecharModal()">Cancelar</button>
                    <button type="submit" class="btn-salvar">Salvar Endereço</button>
                </div>
            </form>
        </div>
    </div>

    <div class="add-new-endereco" id="add-new-endereco-btn">
        <i class="fa-solid fa-circle-plus"></i>
        <p>Adicionar novo endereço</p>
    </div>

    <div class="endereco-botoes">
        <a href="/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php">
            <button class="botao-sair">Voltar</button>
        </a>
        <button class="botao-avancar" id="btn-avancar" disabled>Avançar</button>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<script src="../../../../public/js/escolha-endereco.js"></script>
</body>
</html>