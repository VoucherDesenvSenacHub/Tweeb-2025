<?php

require '../../../Entity/Usuario.php'; // ALTERE O DIRETORIO CONFORME ESTIVER SALVO NO SEU LOCAL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $email = $_POST['email'];
    $senha = $_POST['senha'];

$usuario = Usuario::autenticar($email, $senha);

if($usuario){
    echo '<script>alert("Login realizado. ");</script>';
    header("Location: listar.php");
            exit;
}else{
    echo '<script>alert("Usuário ou senha inválidos. Tente novamente");</script>';
}

}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../../css/Login.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        <div class="forms">
            <form action="login.php" method = 'POST'>
                <h1 class="tit">Login</h1>
                <p class="descrit">Faça login para acessar sua conta.</p>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="text" name= 'email' id="email" placeholder="Digite seu email" required>
                </div>
                <div class="input-box">
                    <label for="email">Senha</label>
                    <input type="password" name='senha' placeholder="Digite sua senha" required>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Lembrar senha</label>
                    <a href="#">Esqueceu sua senha</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <p class="sla">Não tem uma conta? <a href=""> Cadastre-se</a></p>
                <div class="linha">
                    <p class="linha-1"></p>
                    <p class="p1"> Ou faça login com </p>
                    <p class="linha-2"></p>
                </div>
                <button type="submit" class="bt"><img src="../../assets/img/Google.png" alt="">Google</button>
                <button type="submit" class="bt">Acesso Corporativo</button>
            </form>
        </div>
        <div class="image-container">
            <img src="../../assets/img/Group 4.png" alt="img-login">
        </div>
</body>
</html>
