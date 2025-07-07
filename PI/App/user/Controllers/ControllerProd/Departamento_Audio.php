<?php
require_once __DIR__ . '/../Produto.php'; 

$produtos_por_pagina = 9;
$pagina_atual = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($pagina_atual - 1) * $produtos_por_pagina;

$where = 'id_departamento = 5 AND status_produto = 1';


$total_produtos = Produto::contar($where);
$total_paginas = ceil($total_produtos / $produtos_por_pagina);


$produtos = Produto::buscarPaginado($where, null, $produtos_por_pagina, $offset);


include __DIR__ . '/../../View/pages/Audio.php';