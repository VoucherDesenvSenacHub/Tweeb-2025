<?php
session_start();
require_once __DIR__ . '/../Models/Favorito.php';

header('Content-Type: application/json');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit();
}

$id_usuario = $_SESSION['usuario']['id'];
$action = $_GET['action'] ?? '';

try {
    switch ($action) {
        case 'adicionar':
            $id_produto = $_POST['id_produto'] ?? $_GET['id_produto'] ?? 0;
            
            if (!$id_produto) {
                throw new Exception('ID do produto é obrigatório');
            }
            
            $favorito = new Favorito();
            $resultado = $favorito->adicionarFavorito($id_usuario, $id_produto);
            
            if ($resultado) {
                echo json_encode([
                    'success' => true, 
                    'message' => 'Produto adicionado aos favoritos',
                    'is_favorito' => true
                ]);
            } else {
                throw new Exception('Erro ao adicionar aos favoritos');
            }
            break;
            
        case 'remover':
            $id_produto = $_POST['id_produto'] ?? $_GET['id_produto'] ?? 0;
            
            if (!$id_produto) {
                throw new Exception('ID do produto é obrigatório');
            }
            
            $favorito = new Favorito();
            $resultado = $favorito->removerFavorito($id_usuario, $id_produto);
            
            if ($resultado) {
                echo json_encode([
                    'success' => true, 
                    'message' => 'Produto removido dos favoritos',
                    'is_favorito' => false
                ]);
            } else {
                throw new Exception('Erro ao remover dos favoritos');
            }
            break;
            
        case 'verificar':
            $id_produto = $_GET['id_produto'] ?? 0;
            
            if (!$id_produto) {
                throw new Exception('ID do produto é obrigatório');
            }
            
            $is_favorito = Favorito::verificarFavorito($id_usuario, $id_produto);
            
            echo json_encode([
                'success' => true,
                'is_favorito' => $is_favorito
            ]);
            break;
            
        case 'listar':
            $page = $_GET['page'] ?? 1;
            $limit = $_GET['limit'] ?? 12;
            $offset = ($page - 1) * $limit;
            
            $favoritos = Favorito::buscarFavoritosPaginados($id_usuario, $limit, $offset);
            $total = Favorito::contarFavoritosUsuario($id_usuario);
            
            echo json_encode([
                'success' => true,
                'favoritos' => $favoritos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'total_pages' => ceil($total / $limit)
            ]);
            break;
            
        case 'toggle':
            $id_produto = $_POST['id_produto'] ?? $_GET['id_produto'] ?? 0;
            
            if (!$id_produto) {
                throw new Exception('ID do produto é obrigatório');
            }
            
            $favorito = new Favorito();
            $is_favorito = Favorito::verificarFavorito($id_usuario, $id_produto);
            
            if ($is_favorito) {
                // Remove dos favoritos
                $resultado = $favorito->removerFavorito($id_usuario, $id_produto);
                $message = 'Produto removido dos favoritos';
                $is_favorito = false;
            } else {
                // Adiciona aos favoritos
                $resultado = $favorito->adicionarFavorito($id_usuario, $id_produto);
                $message = 'Produto adicionado aos favoritos';
                $is_favorito = true;
            }
            
            if ($resultado) {
                echo json_encode([
                    'success' => true,
                    'message' => $message,
                    'is_favorito' => $is_favorito
                ]);
            } else {
                throw new Exception('Erro ao alterar favoritos');
            }
            break;
            
        case 'limpar':
            $resultado = Favorito::removerTodosFavoritos($id_usuario);
            
            if ($resultado) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Todos os favoritos foram removidos'
                ]);
            } else {
                throw new Exception('Erro ao limpar favoritos');
            }
            break;
            
        default:
            throw new Exception('Ação não reconhecida');
    }
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?> 