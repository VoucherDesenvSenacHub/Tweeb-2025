<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu sua Senha</title>
    <link rel="stylesheet" href="../../../../public/css/login-funcionario.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bodi">
   
    <header class="login-func-header">
        <div class="header-logo"><img src="../../../../public/assets/img/Ativo 2.png" alt="Logo Tweeb"></div>

        <div class="mini-navbar"></div>
    </header>

    <div class="container-esqueceu">
        <div class="forms-esqueceu">
            <form method="POST" id="login-funcionario">
                <a href="/Tweeb-2025/PI/home.php" class="back-links-func"><i class='bx bx-chevron-left'></i> Voltar</a>
                <h1 class="tit">Acesso Corporativo</h1>
                <p class="descrit">Faça login para acessar a conta de administrador.</p>
                
                <div class="input-box-esqueceu">
                    <label for="email">Email Corporativo</label>
                    <input type="text" id="email-funcionario" name="email" placeholder="Digite seu email" required>
                    <i class='bx bxs-envelop'></i>

                </div>

                <div class="input-box">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha-funcionario" name="senha" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="btn-esqueceu">Login</button>
                <div class="linha">

                </div>
                <!-- <div class="remember-forgot">
                    <label><input type="checkbox"> Lembrar senha</label>
                    <a href="../../../user/View/pages/codVerificacao.php" class="forgot-password">Esqueceu sua senha</a>
                </div> -->
               
                
            </form>
        </div>
        <div class="image-container-esqueceu">
            <img src="../../../../public/assets/img/Rectangle 20.png" alt="Imagem de Recuperação">
        </div>
    </div>
    </div>
    <script src="../../../../public/js/login-funcionario.js"></script>
</body>
</html>
