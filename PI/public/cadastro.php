<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        /* Estilos gerais */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            opacity: 1;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            transform: translateY(-20px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal.show .modal-content {
            transform: translateY(0);
            opacity: 1;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 10px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #000;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        #error-message {
            display: none;
            background-color: #ff5252;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Estilo do modal de sucesso */
        #modalSucesso .modal-content {
            text-align: center;
            padding: 30px;
        }

        .sucesso-icon {
            color: #4CAF50;
            font-size: 50px;
            margin-bottom: 20px;
        }

        .sucesso-mensagem {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .sucesso-submensagem {
            color: #666;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Seu conteúdo existente aqui -->

    <!-- Botão para abrir o modal -->
    <button onclick="abrirModalCadastro()">Cadastrar</button>

    <!-- Modal de Cadastro -->
    <div id="modalCadastro" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModalCadastro()">&times;</span>
            <h2>Cadastro de Usuário</h2>
            <div id="error-message"></div>
            <form id="formCadastro" onsubmit="cadastrarUsuario(event)">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div class="form-group">
                    <label for="confirmarSenha">Confirmar Senha:</label>
                    <input type="password" id="confirmarSenha" name="confirmarSenha" required>
                </div>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>

    <!-- Modal de Sucesso -->
    <div id="modalSucesso" class="modal">
        <div class="modal-content">
            <div class="sucesso-icon">✓</div>
            <div class="sucesso-mensagem">Cadastrado com Sucesso!</div>
            <div class="sucesso-submensagem">Seu cadastro foi realizado com sucesso.</div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/Modal_cadastroUsuario.js"></script>
</body>
</html> 