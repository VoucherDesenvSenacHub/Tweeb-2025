<?php
// App/Controllers/SearchController.php

// Inicia a sessão para que a navbar funcione corretamente com o login
session_start();

// 1. INCLUI A MODEL
require_once __DIR__ . '/../../Models/Produto.php'; 

// 2. OBTÉM OS DADOS DA URL
$searchTerm = $_GET['search'] ?? ''; 
$pagina_atual = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// 3. CONFIGURA A PAGINAÇÃO
$produtos_por_pagina = 9;
$offset = ($pagina_atual - 1) * $produtos_por_pagina;

// 4. CHAMA A MODEL PARA BUSCAR OS DADOS
$total_produtos = 0;
$produtos = [];

if (!empty($searchTerm)) {
    // Usa os métodos que já definimos no Produto.php
    $total_produtos = Produto::searchAndCount($searchTerm);
    $produtos = Produto::searchPaginated($searchTerm, $produtos_por_pagina, $offset);
}

$total_paginas = ceil($total_produtos / $produtos_por_pagina);

// 5. INCLUI A VIEW (A PÁGINA HTML COMPLETA)
// O controller prepara todas as variáveis e depois carrega a página de visualização.
include __DIR__ . '/../../View/pages/Search.php';