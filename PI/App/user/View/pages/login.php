<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
<body class="body-login">
    <div class="forms">
        <form action="">
            <a href="../../../../home.php" class="back-links"><i class='bx bx-chevron-left'></i> Voltar</a>
            <h1 class="tit">Login</h1>
            <p class="descrit">Faça login para acessar sua conta.</p>
            <div class="input-box">
                <label for="email">Email</label>
                <input type="text" id="email" placeholder="Digite seu email" required>
            </div>
            <div class="input-box">
                <label for="senha">Senha</label>
                <input type="password" id="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Lembrar senha</label>
                <a href="esqueceuSenha.php" class="forgot-password">Esqueceu sua senha?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="account">
                <h6 class="account-title">Não tem uma Conta?</h6>
                <a class="account-link" href="cadastro.php">Cadastre-se</a>
            </div>
            <div class="linha">
                <p class="linha-1"></p>
                <p class="p1">Ou faça login com</p>
                <p class="linha-2"></p>
            </div>
            <button type="button" class="bt"><img src="../../../../public/assets/img/Google.png" alt="">Google</button>
            <button type="button" class="bt">Acesso Corporativo</button>
        </form>
    </div>
    <div class="image-container">
        <img src="../../../../public/assets/img/Groupo4.png" alt="img-login" class="login-image">
    </div>
</body>
</html>
