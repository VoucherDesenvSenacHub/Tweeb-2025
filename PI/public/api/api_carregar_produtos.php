<?php

session_start();
require_once __DIR__ . '/../../App/user/Controllers/Produto.php'; 

if (!isset($_GET['tipo_id']) || !isset($_GET['page'])) {
    http_response_code(400);
    echo "Parâmetros ausentes.";
    exit();
}

$tipo_id = (int)$_GET['tipo_id'];
$pagina = (int)$_GET['page'];
$limite = 7;
$offset = ($pagina - 1) * $limite;

$produtos = Produto::buscarPorTipoComponente($tipo_id, $limite, $offset);

foreach ($produtos as $produto) {
    $esta_selecionado = false;
    if (isset($_SESSION['montagem'][$tipo_id])) {
        $item_selecionado = $_SESSION['montagem'][$tipo_id];
        if (is_array($item_selecionado)) {
            $esta_selecionado = ($item_selecionado['id_produto'] == $produto['id_produto']);
        } else {
            $esta_selecionado = ($item_selecionado == $produto['id_produto']);
        }
    }
    
    $preco_formatado = number_format($produto['preco_unid'], 2, ',', '.');
    $classe_selecionado = $esta_selecionado ? 'selecionado' : '';
    
    // LINHA CORRIGIDA: Caminho absoluto para a imagem
    $imagem_path = "/Tweeb-2025/PI/public/assets/img/" . htmlspecialchars($produto['imagem_produto']);
    
    $nome_produto = htmlspecialchars($produto['nome_produto']);
    $descricao_produto = htmlspecialchars($produto['descricao_produto']);

    echo "
    <div class='produto-container'>
        <div class='do-seu-jeito-product {$classe_selecionado}' id='produto-{$produto['id_produto']}'>
            <img src='{$imagem_path}' alt='{$nome_produto}' class='do-seu-jeito-img-product'>
            <p class='do-seu-jeito-name'>{$nome_produto}</p>
            <p class='do-seu-jeito-value'>R$ {$preco_formatado}</p>
            <div class='container-selecao'>";

    if ($tipo_id == 3) {
        $quantidade = $esta_selecionado ? $_SESSION['montagem'][$tipo_id]['quantidade'] : 0;
        $disabled = $quantidade == 0 ? 'disabled' : '';
        echo "
            <div class='seletor-quantidade' data-produto-id='{$produto['id_produto']}' data-tipo-id='{$tipo_id}'>
                <button class='btn-qty-decrease' {$disabled}>-</button>
                <span class='qty-value'>{$quantidade}</span>
                <button class='btn-qty-increase'>+</button>
            </div>";
    } else {
        if ($esta_selecionado) {
            echo "<div class='indicador-selecionado'><i class='bx bx-check-circle'></i><span>Selecionado</span></div>";
        } else {
            echo "<button class='botao-selecionar' data-produto-id='{$produto['id_produto']}' data-tipo-id='{$tipo_id}'>Selecionar</button>";
        }
    }
    
    // CORRIGIDO AQUI TAMBÉM: Use a variável $imagem_path para a seta, ou um caminho absoluto fixo.
    echo "
            </div>
            <div class='do-seu-jeito-product-bottom'>
                <div class='do-seu-jeito-sub-bottom'><img src='/Tweeb-2025/PI/public/assets/img/Arrow - Right 3.png' alt='arrow'></div>
            </div>
        </div>
        <div class='produto-ver-mais'>
             <div class='ver-mais-image-details'>
                <h1>{$nome_produto}</h1>
                <p>{$descricao_produto}</p>
            </div>
        </div>
    </div>";
}