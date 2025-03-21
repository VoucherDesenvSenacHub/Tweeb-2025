<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap');
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }
       
        .cadastrando-products {
            width: 90%;
            max-width: 1100px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }
        nav {
            display: flex;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }
        nav a {
            text-decoration: none;
            padding: 10px 15px;
            color: #333;
        }
        nav a.active {
            border-bottom: 2px solid #ff6600;
        }
        h2, h3 {
            margin-bottom: 35px;
        }
        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 25px;
        }
        .form-group label {
            flex: 1 1 30%;
        }
        .form-group input, .form-group select, .form-group textarea {
            flex: 2 1 65%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            height: 80px;
        }
        .icons {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
        #save-button {
            width: 150px;
            padding: 10px;
            background: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 30px;
        }
        #save-button:hover {
            background: #e05500;
        }
    </style>
</head>
<body>
    <div class="cadastrando-products">
        <nav>
            <a href="#" class="active">Novo Produto</a>
            <a href="#">Cadastrados</a>
        </nav>
        <h2>Detalhes do Produto</h2>
        <form id="product-form">
            <div class="form-group">
                <label for="product-name">Nome do Produto</label>
                <input type="text" id="product-name">
                <label for="product-brand">Marca/Modelo</label>
                <input type="text" id="product-brand">
            </div>
            <div class="form-group">
                <label for="product-quantity">Quantidade</label>
                <input type="number" id="product-quantity">
                <label for="product-department">Departamento</label>
                <select id="product-department">
                    <option value="">Selecione</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-image">Imagem</label>
                <input type="file" id="product-image">
                <label for="product-invoice">Nota Fiscal</label>
                <input type="file" id="product-invoice">
            </div>
            <div class="form-group">
                <label for="serial-number">Número de Série</label>
                <input type="text" id="serial-number">
                <label for="product-cost">Custo</label>
                <input type="text" id="product-cost">
            </div>
            <div class="form-group">
                <label for="stock-minimum">Estoque Mínimo</label>
                <input type="number" id="stock-minimum">
                <label for="product-color">Cor</label>
                <input type="text" id="product-color">
            </div>
            <div class="form-group">
                <label for="product-description">Descrição</label>
                <textarea id="product-description" maxlength="1000"></textarea>
            </div>
            <h3>Especificações Promocionais</h3>
            <div class="form-group">
                <label for="promo-value">Valor</label>
                <input type="text" id="promo-value">
                <label for="promo-discount">Desconto Promocional</label>
                <input type="text" id="promo-discount">
            </div>
            <div class="form-group">
                <label for="related-products">Produtos Relacionados</label>
                <select id="related-products">
                    <option value="">Selecione</option>
                </select>
            </div>
            <div class="icons">
                <span>📦 Em estoque Hoje</span>
                <span>🔒 Garantia 1 ano</span>
                <span>🚚 Entrega Grátis 1-2 dias</span>
            </div>
            <button type="submit" id="save-button">Salvar</button>
        </form>
    </div>
</body>
</html>
