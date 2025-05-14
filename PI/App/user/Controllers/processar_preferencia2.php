<?php
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categoria'])) {
    $_SESSION['categoria'] = $_POST['categoria']; 
    header("Location: /Tweeb-2025/PI/App/user/View/pages/pagina_3_pesquisa_cadastro.php"); 
    exit();
}
?>
