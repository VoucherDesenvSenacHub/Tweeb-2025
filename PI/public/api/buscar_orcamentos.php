<?php
include_once '../../App/user/Models/Orcamento.php';

if(isset($_GET['status'])){
    $orcamento = new Orcamento();
    echo json_encode($orcamento->buscar_aceitos());
    die();
}

switch($_SERVER['REQUEST_METHOD']){
    case "GET":
        $orcamento = new Orcamento();
        echo json_encode($orcamento->buscar());
        break;
}