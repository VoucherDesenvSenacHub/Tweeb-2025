<?php

require_once '../App/user/Models/Pedido.php';

$pedidos = Pedido::listarTodosPedidos();

if ($pedidos) {
    
    echo json_encode($pedidos);
} else {
    echo json_encode(['status' => 400, 'msg' => 'Nenhum pedido encontrado.']);
}
?>
