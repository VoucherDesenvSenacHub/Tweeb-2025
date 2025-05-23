<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu sua Senha</title>
    <link rel="stylesheet" href="../../../../public/css/login-funcionario2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bodi2">
   
    <header class="login-func-header2">
        <div class="header-logo2"><img src="../../../../public/assets/img/Ativo 2.png" alt="Logo Tweeb"></div>

        <div class="mini-navbar2"></div>
    </header>

    <div class="container-esqueceu2">
        <div class="forms-esqueceu2">
            <form action="">
                
                <h1 class="tit2">Matrícula</h1>
                <p class="descrit2">Faça login para acessar a conta de administrador.</p>
                
                <div class="input-box-esqueceu2">
                    <label for="matricula">Matrícula</label>
                    <input type="email" id="email" placeholder="Digite seu email" required>
                    <i class='bx bxs-envelop'></i>

                </div>

                <div class="input-box2">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="btn-esqueceu2"><a class="botaolinkar2" href="painel-adm.php">Login</a></button>
                <div class="linha2">

                </div>
                <!-- <div class="remember-forgot">
                    <label><input type="checkbox"> Lembrar senha</label>
                    <a href="../../../user/View/pages/codVerificacao.php" class="forgot-password">Esqueceu sua senha</a>
                </div> -->
               
                
            </form>
        </div>
        <div class="image-container-esqueceu2">
            <img src="../../../../public/assets/img/Rectangle 20.png" alt="Imagem de Recuperação">
        </div>
    </div>
</body>
</html>
