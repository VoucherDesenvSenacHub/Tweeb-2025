<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['conhecimento'])) {
    if (!empty($_POST['conhecimento'])) {  // Verificando se a opção foi selecionada
        $_SESSION['conhecimento'] = $_POST['conhecimento'];  // Armazenando a resposta em 'conhecimento'
        header("Location: /Tweeb-2025/PI/App/user/View/pages/pagina_2_pesquisa_cadastro.php");  // Redireciona para a página 2
        exit();
    } else {
        echo "Por favor, selecione uma opção para continuar.";
    }
}
?>
