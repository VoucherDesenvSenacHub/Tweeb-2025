<?php

require_once __DIR__ . '/../Produto.php';
$kits = Produto::buscarTodosKits();
require_once __DIR__ . '/../../View/pages/kitsetup.php';