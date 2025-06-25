<?php
include __DIR__ . '/../../DB/Database.php'; // Conectar ao banco de dados

// Instanciar a classe Database para a tabela "funcionarios"
$db = new Database('funcionarios');

function validarCampos($dados) {
    $erros = [];

    // Validar campos obrigatórios
    if (empty($dados['primeiro-nome'])) {
        $erros[] = 'O primeiro nome é obrigatório.';
    }
    if (empty($dados['sobrenome'])) {
        $erros[] = 'O sobrenome é obrigatório.';
    }
    if (empty($dados['matricula'])) {
        $erros[] = 'A matrícula é obrigatória.';
    }
    if (empty($dados['email'])) {
        $erros[] = 'O e-mail é obrigatório.';
    } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'O e-mail fornecido não é válido.';
    }
    if (empty($dados['telefone'])) {
        $erros[] = 'O telefone é obrigatório.';
    }
    if (empty($dados['cpf'])) {
        $erros[] = 'O CPF é obrigatório.';
    } elseif (!preg_match("/^\d{11}$/", $dados['cpf'])) {
        $erros[] = 'O CPF fornecido não é válido.';
    }
    if (empty($dados['senha-funcionario']) || $dados['senha-funcionario'] !== $dados['confirmar-senha']) {
        $erros[] = 'As senhas não coincidem ou não foram preenchidas corretamente.';
    }

    return $erros;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = $_POST;
    $erros = validarCampos($dados); // Função de validação (já fornecida)

    if (empty($erros)) {
        // Preparar dados para inserir no banco
        $primeiro_nome = htmlspecialchars($dados['primeiro-nome']);
        $sobrenome = htmlspecialchars($dados['sobrenome']);
        $matricula = htmlspecialchars($dados['matricula']);
        $email = htmlspecialchars($dados['email']);
        $telefone = htmlspecialchars($dados['telefone']);
        $cpf = htmlspecialchars($dados['cpf']);
        $cargo = htmlspecialchars($dados['cargo']);
        $senha = htmlspecialchars($dados['senha']);
        $foto = isset($dados['input-foto']) ? $dados['input-foto'] : null; // Lógica para foto se necessária
        $senha_funcionario = password_hash($dados['senha-funcionario'], PASSWORD_BCRYPT);

        // Criar um array associativo com os dados para a inserção
        $values = [
            'primeiro_nome' => $primeiro_nome,
            'sobrenome' => $sobrenome,
            'matricula' => $matricula,
            'email' => $email,
            'telefone' => $telefone,
            'cpf' => $cpf,
            'cargo' => $cargo,
            'senha_funcionario' => $senha_funcionario,
            'foto' => $foto,
        ];

        // Usar o método 'insert' da classe Database para inserir os dados
        $insertId = $db->insert($values);

        if ($insertId) {
            echo "Funcionário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar funcionário!";
        }
    } else {
        // Exibir erros de validação
        foreach ($erros as $erro) {
            echo "<p>$erro</p>";
        }
    }
}
?>
