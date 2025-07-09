<?php
// require_once '../../Controllers/resetar_senha.php';

// switch($_SERVER['REQUEST_METHOD']){
//     case 'POST':
        
//         if(isset($_GET['token']) && strlen($_GET['token'] != 0)){
//             $token = $_GET['token'];

//             $reset = new ResetarSenha();
//             $result = $reset::ResetarSenha($token, $_POST['confirmar_senha']);

//             if($result){
//                 echo("<script>alert('senha alterada com sucesso') </script>");
//             }
            
//         }
// }



// // if(isset($_GET)){
// //     var_dump($_GET);
// // }

// ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refazer Senha</title>
    <script src="../../../../public/js/resetarSenha.js" defer></script>
    <link rel="stylesheet" href="../../../../public/css/ResetarSenha.Css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="resetar-senha">

    <div id="modal_esqueceu" class="modal-resetar-senha modal-hide">

        <div class="modal-sucesso">
            <img src="../../../../public/assets/img/check-one.png" alt="">
            <h1>Senha Alterada!</h1>
            <p>Sua senha foi alterada com sucesso!</p>
            <button id="esqueceu-button" onclick="voltarLogin()">Voltar</button>
        </div>

    </div>

    <div class="container-resetar">
        <div class="forms-resetar">
            <form method="POST" id="form-resetar-senha">
            <input name="token" id="token" type="hidden" value="<?php echo isset($_GET['token']) ? htmlspecialchars($_GET['token']) : ''; ?>">
                <a href="./login.php" class="voltar"><i class='bx bx-chevron-left'></i>< Voltar</a>
                <h1 class="titulo">Refazer Senha</h1>
                <p class="sutitulo">Sua conta irá ser resetada. Por favor, digite uma nova senha para sua conta.</p>
                
                <div class="input-group w50">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha." required>
                    <i class="bi bi-eye-fill" id="btn-senha1" onclick="mostraSenha('senha', 'btn-senha1')"></i>
                </div>
                <div class="input-group w50">
                    <label for="confirmar_senha">Confirmar Senha</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirme sua senha" required>
                    <i class="bi bi-eye-fill" id="btn-senha2" onclick="mostraSenha('confirmar_senha', 'btn-senha2')"></i>
                </div>
                
                <input type="submit" class="Btn" value="Enviar Senha">
            </form>
        </div>
        <div class="image-container-resetar">
            <img src="../../../../public/assets/img/Rectangle 20 (1).png" alt="Imagem refazer senha">
        </div>
    </div>

</body>
</html>
