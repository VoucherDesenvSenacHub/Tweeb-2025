<?php
require_once '../Models/Orcamento.php';

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $orcamento = new Orcamento();
        $orcamento->nome = $_POST['nome'];
        $orcamento->email = $_POST['email'];
        $orcamento->telefone = $_POST['telefone'];
        $orcamento->tipo_solicitacao = $_POST['tipo-solicitacao'];
        $orcamento->prazo_estimado = $_POST['prazo-estimado'];
        $orcamento->imagem = $_FILES['imagem']['name'][0];
        $orcamento->descricao = $_POST['descricao'];
        $orcamento->status_orcamento = 'pendente';

        $dados = [
            'post' => $_POST,
            'arquivos' => $_FILES
        ];

        $orcamento->cadastrar();

        echo json_encode($dados);
}