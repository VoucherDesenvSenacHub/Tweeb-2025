<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['compra_tipo'])) {
    $_SESSION['compra_tipo'] = $_POST['compra_tipo']; 

    $conhecimento = $_SESSION['conhecimento'];
    $categoria = $_SESSION['categoria'];
    $compra_tipo = $_SESSION['compra_tipo'];

    require __DIR__.'/../../DB/Database.php'; 


    $db = new Database('respostas_preferencias');

  
    $user_id = $_SESSION['usuario']['id'];


    $values = [
        'user_id' => $user_id,
        'resposta1' => $conhecimento,
        'resposta2' => $categoria,
        'resposta3' => $compra_tipo
    ];

 
    if ($db->insert($values)) {

        header("Location: /Tweeb-2025/PI/home.php"); 
        exit();
    } else {

        echo "Erro ao salvar as respostas. Tente novamente.";
    }
}
?>
