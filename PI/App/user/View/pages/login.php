<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../../../../public/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        <div class="forms">
            <form action="">
                <h1 class="tit">Login</h1>
                <p class="descrit">Faça login para acessar sua conta.</p>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="text" id="email" placeholder="Digite seu email" required>
                </div>
                <div class="input-box">
                <label for="password">Senha</label>
                <input type="password" id="password" placeholder="Digite sua senha" required>

                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Lembrar senha</label>
                    <a href="#">Esqueceu sua senha</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="link_cadastro">
                    <h6>Não tem uma conta?</h6>
                    <a href="cadastro.php">Cadastre-se</a>
                </div>
                <div class="linha">
                    <p class="linha-1"></p>
                    <p class="p1"> Ou faça login com </p>
                    <p class="linha-2"></p>
                </div>
                <button type="button" class="bt"><img src="../../../../public/assets/img/Google.png" alt="">Google</button>
                <button type="button" class="bt">Acesso Corporativo</button>
            </form>
        </div>
        <div class="image-container">
            <img src="../../../../public/assets/img/Groupo4.png" alt="img-login">
        </div>
</body>
</html>
