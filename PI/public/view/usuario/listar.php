<?php
    require '../../../Entity/Usuario.php'; //ALTERE OS DIRETORIOS CONFORME ESTIVER SALVO NO SEU LOCAL

    $usuarios = Usuario::listar()->fetchAll(PDO::FETCH_ASSOC);


    ?>
    <!DOCTYPE html> 
    <html lang="pt-br"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Cadastro</title> 
        <link rel="stylesheet" href="../../css/cadastro.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    </head> 
    <body> 
        <div class="container"> 
            <div class="card">
                <table>
                    <?php
                        foreach($usuarios as $usuario){
                            echo '
                            <tr>
                                <td> '.$usuario['id_usuario'].'  </td>
                                <td> '.$usuario['nome'].'  </td>
                                <td> '.$usuario['email'].'  </td>
                            </tr>
                            ';
                        }
                    ?>
                </table>
            </div> 
        </div> 
    </body> 
    </html> 
