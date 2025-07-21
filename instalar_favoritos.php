<?php
/**
 * Script de Instalação do Sistema de Favoritos
 * Execute este arquivo uma vez para configurar o sistema
 */

require_once __DIR__ . '/../Tweeb-2025/PI/App/DB/Database.php';

echo "<h1>🔧 Instalação do Sistema de Favoritos - Tweeb</h1>";

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    echo "<h2>📋 Verificando dependências...</h2>";
    
    // Verificar se a tabela usuarios existe
    $stmt = $conn->query("SHOW TABLES LIKE 'usuarios'");
    if ($stmt->rowCount() == 0) {
        throw new Exception("❌ Tabela 'usuarios' não encontrada. Execute primeiro o script principal do banco de dados.");
    }
    echo "✅ Tabela 'usuarios' encontrada<br>";
    
    // Verificar se a tabela produtos existe
    $stmt = $conn->query("SHOW TABLES LIKE 'produtos'");
    if ($stmt->rowCount() == 0) {
        throw new Exception("❌ Tabela 'produtos' não encontrada. Execute primeiro o script principal do banco de dados.");
    }
    echo "✅ Tabela 'produtos' encontrada<br>";
    
    // Verificar se a tabela favoritos já existe
    $stmt = $conn->query("SHOW TABLES LIKE 'favoritos'");
    if ($stmt->rowCount() > 0) {
        echo "⚠️ Tabela 'favoritos' já existe. Pulando criação...<br>";
    } else {
        echo "<h2>🗄️ Criando tabela de favoritos...</h2>";
        
        $sql = "
        CREATE TABLE favoritos (
            id_favorito INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT NOT NULL,
            id_produto INT NOT NULL,
            data_adicionado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
            FOREIGN KEY (id_produto) REFERENCES produtos(id_produto) ON DELETE CASCADE,
            UNIQUE KEY unique_user_product (id_usuario, id_produto)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";
        
        $conn->exec($sql);
        echo "✅ Tabela 'favoritos' criada com sucesso!<br>";
        
        // Criar índices para melhor performance
        echo "<h2>⚡ Criando índices...</h2>";
        
        $indexes = [
            "CREATE INDEX idx_favoritos_usuario ON favoritos (id_usuario)",
            "CREATE INDEX idx_favoritos_produto ON favoritos (id_produto)",
            "CREATE INDEX idx_favoritos_data ON favoritos (data_adicionado)"
        ];
        
        foreach ($indexes as $index) {
            $conn->exec($index);
        }
        echo "✅ Índices criados com sucesso!<br>";
    }
    
    // Verificar arquivos necessários
    echo "<h2>📁 Verificando arquivos...</h2>";
    
    $files = [
        'App/user/Models/Favorito.php' => 'Modelo de Favoritos',
        'App/user/Controllers/FavoritoController.php' => 'Controlador de Favoritos',
        'App/user/View/pages/favoritos.php' => 'Página de Favoritos',
        'public/css/favoritos.css' => 'Estilos CSS',
        'public/js/favoritos.js' => 'JavaScript',
        'public/assets/img/heart_enabled.png' => 'Imagem Coração Ativo',
        'public/assets/img/heart_disabled.png' => 'Imagem Coração Inativo'
    ];
    
    foreach ($files as $file => $description) {
        if (file_exists($file)) {
            echo "✅ {$description}: {$file}<br>";
        } else {
            echo "❌ {$description}: {$file} - ARQUIVO NÃO ENCONTRADO<br>";
        }
    }
    
    // Testar conexão com o modelo
    echo "<h2>🧪 Testando sistema...</h2>";
    
    require_once __DIR__ . '/../Tweeb-2025/PI/App/user/Models/Favorito.php';
    
    // Testar se a classe pode ser instanciada
    $favorito = new Favorito();
    echo "✅ Classe Favorito carregada com sucesso<br>";
    
    // Verificar se há produtos no banco
    $stmt = $conn->query("SELECT COUNT(*) as total FROM produtos");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalProdutos = $result['total'];
    echo "✅ {$totalProdutos} produtos encontrados no banco<br>";
    
    // Verificar se há usuários no banco
    $stmt = $conn->query("SELECT COUNT(*) as total FROM usuarios");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalUsuarios = $result['total'];
    echo "✅ {$totalUsuarios} usuários encontrados no banco<br>";
    
    echo "<h2>🎉 Instalação Concluída!</h2>";
    echo "<div style='background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "<h3>✅ Sistema de Favoritos instalado com sucesso!</h3>";
    echo "<p><strong>Próximos passos:</strong></p>";
    echo "<ol>";
    echo "<li>Faça login no sistema</li>";
    echo "<li>Acesse uma página de produtos</li>";
    echo "<li>Clique nos corações para favoritar produtos</li>";
    echo "<li>Acesse <a href='App/user/View/pages/favoritos.php'>favoritos.php</a> para ver sua lista</li>";
    echo "</ol>";
    echo "</div>";
    
    echo "<h3>📚 Documentação:</h3>";
    echo "<ul>";
    echo "<li><a href='SISTEMA_FAVORITOS_README.md'>README Completo</a></li>";
    echo "<li><a href='App/user/View/pages/exemplo-favoritos.php'>Exemplo de Integração</a></li>";
    echo "</ul>";
    
} catch (Exception $e) {
    echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "<h3>❌ Erro na instalação:</h3>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "</div>";
    
    echo "<h3>🔧 Solução de problemas:</h3>";
    echo "<ul>";
    echo "<li>Verifique se o banco de dados está configurado corretamente</li>";
    echo "<li>Confirme se as tabelas 'usuarios' e 'produtos' existem</li>";
    echo "<li>Verifique se todos os arquivos foram criados</li>";
    echo "<li>Confirme as permissões de escrita no banco de dados</li>";
    echo "</ul>";
}

echo "<hr>";
echo "<p><small>Script de instalação do Sistema de Favoritos - Tweeb</small></p>";
?> 