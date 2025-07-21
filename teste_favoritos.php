<?php
/**
 * Teste do Sistema de Favoritos
 * Execute este arquivo para testar se tudo está funcionando
 */

session_start();

// Simular usuário logado para teste
if (!isset($_SESSION['usuario']['id'])) {
    $_SESSION['usuario']['id'] = 1; // ID de teste
    echo "<p>⚠️ Usuário não logado. Usando ID de teste: 1</p>";
}

require_once __DIR__ . '/App/DB/Database.php';
require_once __DIR__ . '/App/user/Models/Favorito.php';

echo "<h1>🧪 Teste do Sistema de Favoritos</h1>";

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    echo "<h2>📋 Verificando banco de dados...</h2>";
    
    // Verificar se a tabela favoritos existe
    $stmt = $conn->query("SHOW TABLES LIKE 'favoritos'");
    if ($stmt->rowCount() == 0) {
        echo "❌ Tabela 'favoritos' não encontrada!<br>";
        echo "Execute primeiro: <a href='instalar_favoritos.php'>instalar_favoritos.php</a><br>";
        exit();
    }
    echo "✅ Tabela 'favoritos' encontrada<br>";
    
    // Verificar se há produtos
    $stmt = $conn->query("SELECT COUNT(*) as total FROM produtos");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalProdutos = $result['total'];
    echo "✅ {$totalProdutos} produtos encontrados<br>";
    
    if ($totalProdutos == 0) {
        echo "⚠️ Nenhum produto encontrado. Adicione produtos primeiro.<br>";
    }
    
    // Testar o modelo
    echo "<h2>🔧 Testando modelo...</h2>";
    
    $favorito = new Favorito();
    echo "✅ Classe Favorito instanciada<br>";
    
    // Testar verificar favorito
    $is_favorito = Favorito::verificarFavorito($_SESSION['usuario']['id'], 1);
    echo "✅ Verificar favorito: " . ($is_favorito ? 'Sim' : 'Não') . "<br>";
    
    // Testar adicionar favorito
    $resultado = $favorito->adicionarFavorito($_SESSION['usuario']['id'], 1);
    echo "✅ Adicionar favorito: " . ($resultado ? 'Sucesso' : 'Falha') . "<br>";
    
    // Verificar novamente
    $is_favorito = Favorito::verificarFavorito($_SESSION['usuario']['id'], 1);
    echo "✅ Verificar favorito após adicionar: " . ($is_favorito ? 'Sim' : 'Não') . "<br>";
    
    // Testar remover favorito
    $resultado = $favorito->removerFavorito($_SESSION['usuario']['id'], 1);
    echo "✅ Remover favorito: " . ($resultado ? 'Sucesso' : 'Falha') . "<br>";
    
    // Verificar novamente
    $is_favorito = Favorito::verificarFavorito($_SESSION['usuario']['id'], 1);
    echo "✅ Verificar favorito após remover: " . ($is_favorito ? 'Sim' : 'Não') . "<br>";
    
    // Testar API
    echo "<h2>🌐 Testando API...</h2>";
    
    // Simular requisição GET
    $_GET['action'] = 'toggle';
    $_GET['id_produto'] = 1;
    
    ob_start();
    include __DIR__ . '/App/user/Controllers/FavoritoController.php';
    $response = ob_get_clean();
    
    echo "✅ Resposta da API: " . htmlspecialchars($response) . "<br>";
    
    // Decodificar JSON
    $data = json_decode($response, true);
    if ($data) {
        echo "✅ JSON válido<br>";
        echo "Success: " . ($data['success'] ? 'Sim' : 'Não') . "<br>";
        echo "Message: " . $data['message'] . "<br>";
        if (isset($data['is_favorito'])) {
            echo "Is Favorito: " . ($data['is_favorito'] ? 'Sim' : 'Não') . "<br>";
        }
    } else {
        echo "❌ JSON inválido<br>";
    }
    
    echo "<h2>🎉 Teste Concluído!</h2>";
    echo "<p>Se todos os testes passaram, o sistema está funcionando corretamente.</p>";
    
    echo "<h3>📝 Próximos passos:</h3>";
    echo "<ol>";
    echo "<li>Faça login no sistema</li>";
    echo "<li>Acesse uma página de produtos</li>";
    echo "<li>Clique nos corações para testar</li>";
    echo "<li>Verifique se os favoritos são salvos</li>";
    echo "</ol>";
    
} catch (Exception $e) {
    echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "<h3>❌ Erro no teste:</h3>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "</div>";
    
    echo "<h3>🔧 Solução de problemas:</h3>";
    echo "<ul>";
    echo "<li>Verifique se o banco de dados está configurado</li>";
    echo "<li>Confirme se a tabela 'favoritos' foi criada</li>";
    echo "<li>Verifique se há produtos no banco</li>";
    echo "<li>Confirme se o usuário está logado</li>";
    echo "</ul>";
}

echo "<hr>";
echo "<p><small>Teste do Sistema de Favoritos - Tweeb</small></p>";
?> 