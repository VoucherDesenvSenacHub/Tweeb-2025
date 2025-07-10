<?php

require_once '../App/adm/Controllers/Produto.php';

$objProd = new Produto();

$dados = $objProd->buscar_inativo();

if($dados){
    echo json_encode($dados);
}
else{
    $array = ['status' => 400, 'msg' => 'Ocorreu algum erro!!'];
    echo json_encode($array);
}

?>

