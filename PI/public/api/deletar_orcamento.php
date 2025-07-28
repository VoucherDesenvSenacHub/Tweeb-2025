<?php
include_once '../../App/user/Models/Orcamento.php';

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $orcamento = new Orcamento();
    $orcamento->excluir($id);
    echo json_encode($id);
}