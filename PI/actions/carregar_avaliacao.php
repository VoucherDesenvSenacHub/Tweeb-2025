<?php

require '../Entity/Avaliacao.class.php';


$avaliacao = new Avaliacao();

$dados = $avaliacao->buscarAvaliacao();
if($dados){
    echo json_encode($dados);
}
else{
    $array = ['status' => 400, 'msg' => 'Ocorreu algum erro!!'];
    echo json_encode($array);
}