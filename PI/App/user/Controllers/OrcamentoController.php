<?php
require_once '../Models/Orcamento.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $orcamento = new Orcamento();
        $orcamento->nome = $_POST['nome'];
        $orcamento->email = $_POST['email'];
        $orcamento->telefone = $_POST['telefone'];
        $orcamento->tipo_solicitacao = $_POST['tipo-solicitacao'];
        $orcamento->prazo_estimado = $_POST['prazo-estimado'];
        $orcamento->descricao = $_POST['descricao'];
        $orcamento->status_orcamento = 'pendente';

        // Pasta onde as imagens serão salvas (crie se não existir)
        $pastaDestino = '../../../public/assets/img';

        // Se houver ao menos uma imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'][0] == 0) {
            $nomeOriginal = $_FILES['imagem']['name'][0];
            $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);

            // Gera nome único
            $nomeUnico = uniqid('img_', true) . '.' . $extensao;

            // Caminho completo para salvar o arquivo
            $caminhoCompleto = $pastaDestino . $nomeUnico;

            // Move o arquivo
            if (move_uploaded_file($_FILES['imagem']['tmp_name'][0], $caminhoCompleto)) {
                // Salva o caminho relativo no banco
                $orcamento->imagem = 'uploads/orcamentos/' . $nomeUnico;
            }
        }

        $dados = [
            'post' => $_POST,
            'arquivos' => $_FILES,
            'imagem_salva' => $orcamento->imagem
        ];

        $orcamento->cadastrar();

        echo json_encode($dados);
        break;
}