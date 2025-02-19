<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código de verificação</title>
    <script src="../../../../public/js/codVerificacao.js" defer></script>
    <link rel="stylesheet" href="../../../../public/css/codVerificacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-verificacao">
        <div class="forms-verificacao">
            <form action="">
                <a href="#" class="voltar"><i class='bx bx-chevron-left'></i>< Voltar</a>
                <h1 class="titulo">Digite o código</h1>
                <p class="subtitulo">Um código de verificação foi enviado para o seu e-mail.</p>
                <div class="input-group-verificacao w50">
                    <label for="codigo">Código</label>
                    <input type="password" name="codigo" id="codigo" placeholder="Digite o código" required><i class="bi bi-eye-fill" id="btn-senha3" onclick="mostraSenha('codigo', 'btn-senha3')"></i>
                </div>
                <ul class="login-utils">
                    <li class="margin-bottom-8 mar-top-8">
                        <span class="texto1">Não recebeu o código?</span>
                        <a href="#" class="texto2">Reenviar Código</a> <!-- colocar o link para reeviar -->
                    </li>
                </ul>
                <button type="submit" class="btn"><a class="botaolinkar" href="ResetarSenha.php">Verifique</a></button>
            </form>
        </div>
        <div class="image-container-verificacao">
            <img src="../../../../public/assets/img/codVerifc 20 (1).png" alt="Imagem verificacao">
        </div>
    </div>


</body>
</html>