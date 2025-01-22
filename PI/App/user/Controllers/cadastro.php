    <?php
    require '../../../Entity/Usuario.php'; // ALTERE O DIRETORIO CONFORME SALVO NO SEU LOCAL
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'confirmacao' => $_POST['confirmacao'],
        ];
    
        if ($dados['senha'] != $dados['confirmacao']) {
            echo '<script>alert("Senha e confirmação de senha não batem! Tente novamente!");</script>';
            echo "<meta http-equiv='refresh' content='0.5;url=cadastro.php' />"; 
        } else {
            $usuario = new Usuario($dados);
    
            if ($usuario->cadastrar()) {
                echo '<script>alert("Usuário cadastrado com sucesso!");</script>';
                echo "<meta http-equiv='refresh' content='0.5;url=listar.php' />"; 
            } else {
                echo '<script>alert("Erro ao cadastrar usuário.");</script>';
                echo "<meta http-equiv='refresh' content='0.5;url=cadastro.php' />"; 

            }
        }
        exit;
    }
    
?>

