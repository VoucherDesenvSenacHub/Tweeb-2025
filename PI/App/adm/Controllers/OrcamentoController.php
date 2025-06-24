<?php
include_once '../../Models/Orcamento.php';

$orcamento = new Orcamento();
$dados = $orcamento->buscar();
var_dump($dados);