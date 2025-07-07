<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

echo "<h1>Teste do Sistema de Carrinho</h1>";

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    echo "<p style='color: red;'>❌ Usuário não está logado!</p>";
    echo "<p>Faça login primeiro para testar o carrinho.</p>";
    exit();
}

echo "<p style='color: green;'>✅ Usuário logado: " . $_SESSION['usuario']['nome'] . " (ID: " . $_SESSION['usuario']['id'] . ")</p>";

// Testar conexão com banco de dados
try {
    require_once __DIR__ . '/App/DB/Database.php';
    $db = new Database('carrinho_items');
    echo "<p style='color: green;'>✅ Conexão com banco de dados OK</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erro na conexão com banco: " . $e->getMessage() . "</p>";
    exit();
}

// Verificar se a tabela carrinho_items existe
try {
    $stmt = $db->execute("SHOW TABLES LIKE 'carrinho_items'");
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>✅ Tabela carrinho_items existe</p>";
    } else {
        echo "<p style='color: red;'>❌ Tabela carrinho_items não existe!</p>";
        echo "<p>Execute o SQL para criar a tabela:</p>";
        echo "<pre>";
        echo "CREATE TABLE carrinho_items (
    id_item INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    preco_unitario DECIMAL(10,2) NOT NULL,
    data_adicionado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produtos (id_produto) ON DELETE CASCADE,
    UNIQUE KEY unique_user_product (id_usuario, id_produto)
);";
        echo "</pre>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erro ao verificar tabela: " . $e->getMessage() . "</p>";
}

// Verificar se existem produtos
try {
    $produtos_db = new Database('produtos');
    $stmt = $produtos_db->select("id_departamento = 6 AND status_produto = 1");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($produtos) > 0) {
        echo "<p style='color: green;'>✅ Existem " . count($produtos) . " produtos no departamento Games</p>";
        echo "<h3>Produtos disponíveis:</h3>";
        echo "<ul>";
        foreach ($produtos as $produto) {
            echo "<li>{$produto['nome_produto']} - R$ " . number_format($produto['preco_unid'], 2, ',', '.') . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p style='color: orange;'>⚠️ Nenhum produto encontrado no departamento Games</p>";
        echo "<p>Execute o arquivo teste_produtos.php para inserir produtos de teste.</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erro ao verificar produtos: " . $e->getMessage() . "</p>";
}

// Testar CarrinhoController
try {
    require_once __DIR__ . '/App/user/Models/Carrinho.php';
    echo "<p style='color: green;'>✅ Model Carrinho carregado com sucesso</p>";
    
    // Testar contagem de itens
    $contagem = Carrinho::contarItens($_SESSION['usuario']['id']);
    echo "<p>📊 Itens no carrinho: " . $contagem . "</p>";
    
    // Testar obter carrinho
    $itens = Carrinho::obterCarrinho($_SESSION['usuario']['id']);
    echo "<p>🛒 Itens no carrinho: " . count($itens) . "</p>";
    
    if (count($itens) > 0) {
        echo "<h3>Itens no carrinho:</h3>";
        echo "<ul>";
        foreach ($itens as $item) {
            echo "<li>{$item['nome_produto']} - Qtd: {$item['quantidade']} - R$ " . number_format($item['preco_unitario'] * $item['quantidade'], 2, ',', '.') . "</li>";
        }
        echo "</ul>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erro no Model Carrinho: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h2>Links para teste:</h2>";
echo "<ul>";
echo "<li><a href='/Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php' target='_blank'>Página de Games</a></li>";
echo "<li><a href='/Tweeb-2025/PI/App/user/View/pages/Carrinho.php' target='_blank'>Página do Carrinho</a></li>";
echo "<li><a href='/Tweeb-2025/PI/teste_produtos.php' target='_blank'>Inserir Produtos de Teste</a></li>";
echo "</ul>";

echo "<h2>Como testar:</h2>";
echo "<ol>";
echo "<li>Execute o arquivo teste_produtos.php se ainda não inseriu produtos</li>";
echo "<li>Acesse a página de Games</li>";
echo "<li>Clique no ícone do carrinho ou no botão 'Adicionar ao Carrinho'</li>";
echo "<li>Veja a notificação e o contador na navbar</li>";
echo "<li>Acesse o carrinho para gerenciar os produtos</li>";
echo "</ol>";
?> 