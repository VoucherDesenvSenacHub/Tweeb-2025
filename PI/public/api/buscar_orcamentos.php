<?php
include_once '../../App/user/Models/Orcamento.php';

switch($_SERVER['REQUEST_METHOD']){
    case "GET":
        $orcamento = new Orcamento();
        echo json_encode($orcamento->buscar());
        break;
}