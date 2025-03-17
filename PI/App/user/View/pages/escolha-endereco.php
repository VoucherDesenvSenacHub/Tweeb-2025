<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../../public/css/escolhaendereco.css">
    <script defer src="../../../../public/js/ENDERECO.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<div class="container">
    <div class="step-indicator">
        <span class="active"><i class="fa-solid fa-location-dot"></i> Passo 1 <br> Endereço</span>
        <span class=""><i class="fa-solid fa-boxes-packing"></i> Passo 2 <br> Entrega </span>
        <span class=""><i class="fa-solid fa-credit-card"></i> Passo 3 <br> Pagamento </span>
      
    </div>

    <div class="enderecos">
        <h1>Selecione Endereco</h1>
        <div class="endereco-card">
            <label>
                <input type="radio" id="endereco" name="endereco" value="casa" checked>
                <label class="endereco-label" for="endereco">Casa</label>
                <div class="endereco-details">
                    <p>240 Rua Capiatá, Novos Estados, Campo Grande MS 79034331</p>
                    <p>(209) 555-0104</p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa fa-trash"></i></button>
            </div>
        </div>

        <div class="endereco-card">
            <label>
                <input type="radio" name="endereco" value="trabalho">
                <div class="endereco-details">
                    <p><strong>Trabalho</strong> <span class="default-tag">PADRÃO</span></label>
                    <p>2715 RUA Dr Jose, Caranda Bosque, Campo Grande MS 79034331</p>
                    <p>(67) 555-0127</p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>

  
    
    <div id="new-endereco-form" style="display: none;">
        <h2>Adicionar Novo Endereço</h2>
        <form id="form-novo-endereco">
            <label for="nome-endereco">Nome (ex: Casa, Trabalho):</label>
            <input type="text" id="nome-endereco" required>
    
            <label for="endereco-detalhes">Endereço Completo:</label>
            <input type="text" id="endereco-detalhes" required>
    
            <label for="telefone-endereco">Telefone:</label>
            <input type="text" id="telefone-endereco" required>
    
            <button type="submit" class="btoes-endereco">Salvar Endereço</button>


        </form>
    </div>
    
    <div class="enderecos" id="enderecos-list">
        <!-- Endereços existentes estarão aqui -->
    </div>

    <div class="add-new-endereco" id="add-new-endereco-btn">
        <i class="fa fa-plus"></i> Adicionar novo endereço
    </div>
    

    <a href="../index.html/descproduto.html" class="btoes-endereco">Sair</a>
    <a href="../index.html/ENVIO.html" class="btoes-endereco">Avançar</a>

  


</div>
</body>

</html>















