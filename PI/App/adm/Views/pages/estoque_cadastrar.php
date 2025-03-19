<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Produtos</title>
</head>
<body>
    <div class="registro-produtos-container">
        <nav class="registro-produtos-nav">
            <span class="registro-produtos-ativo">Novo Produto</span>
            <span class="registro-produtos-inativo">Cadastrados</span>
        </nav>
        <h2 class="registro-produtos-titulo">Detalhes do Produto</h2>
        <form class="registro-produtos-form">
            <div class="registro-produtos-grid">
                <input type="text" placeholder="Nome do Produto" class="registro-produtos-input">
                <input type="text" placeholder="Marca/Modelo" class="registro-produtos-input">
                <input type="number" placeholder="Quantidade" class="registro-produtos-input">
                <select class="registro-produtos-input">
                    <option>Departamento</option>
                </select>
                <label class="registro-produtos-file">
                    <img src="../../../../public/assets/img/documento-registro-cadastro.png" alt="Ícone">
                    <span id="escolher-arquivo">Escolher arquivo</span>
                    <input type="file" hidden>
                </label>
                <label class="registro-produtos-file">
                    <img src="../../../../public/assets/img/documento-registro-cadastro.png" alt="Ícone">
                    <span id="escolher-arquivo">Escolher arquivo</span>
                    <input type="file" hidden>
                </label>
                <input type="text" placeholder="Número de Série" class="registro-produtos-input">
                <input type="text" placeholder="Custo" class="registro-produtos-input">
                <input type="text" placeholder="Estoque mínimo" class="registro-produtos-input">
                <input type="text" placeholder="Nome" class="registro-produtos-input">
                <input type="text" placeholder="Informação" class="registro-produtos-input">
                <button type="button" class="registro-produtos-botao-icone">Escolher ícone</button>
                <input type="text" placeholder="Cor" class="registro-produtos-input">
                <input type="text" placeholder="Código" class="registro-produtos-input">
                <button type="button" class="registro-produtos-botao-icone">Escolher ícone</button>
            </div>
            <textarea class="registro-produtos-descricao" placeholder="Descrição"></textarea>
        </form>
        <h2 class="registro-produtos-titulo">Especificações Promocionais</h2>
        <div class="registro-produtos-grid">
            <input type="text" placeholder="Valor" class="registro-produtos-input">
            <input type="text" placeholder="Desconto Promocional" class="registro-produtos-input">
            <select class="registro-produtos-input">
                <option>Produtos Relacionados</option>
            </select>
        </div>
        <div class="registro-produtos-icones">
            <span class="registro-produtos-status">📦 Em estoque <strong>Hoje</strong></span>
            <span class="registro-produtos-status">🛡 Garantia <strong>1 ano</strong></span>
            <span class="registro-produtos-status">🚚 Entrega Grátis <strong>1-2 dias</strong></span>
        </div>
        <button class="registro-produtos-salvar">Salvar</button>
    </div>
</body>
</html>
