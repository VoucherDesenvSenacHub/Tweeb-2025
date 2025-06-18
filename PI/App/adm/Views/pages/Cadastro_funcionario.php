<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../../public/css/cadastro_funcionario.css">
</head>
<body class= "body-cadastro">
<div class="cadastro-funcionario-container">
    <h2 class="cadastro-funcionario-title">Cadastro de Funcionário</h2>
    <form action="processa_cadastro.php" method="POST" class="cadastro-funcionario-form">
      <label for="nome" class="cadastro-funcionario-label">Nome Completo:</label>
      <input type="text" id="nome" name="nome" class="cadastro-funcionario-input" required>

      <label for="email" class="cadastro-funcionario-label">E-mail:</label>
      <input type="email" id="email" name="email" class="cadastro-funcionario-input" required>

      <label for="cpf" class="cadastro-funcionario-label">CPF:</label>
      <input type="text" id="cpf" name="cpf" class="cadastro-funcionario-input" required>

      <label for="cargo" class="cadastro-funcionario-label">Cargo:</label>
      <input type="text" id="cargo" name="cargo" class="cadastro-funcionario-input" required>

      <label for="matricula" class="cadastro-funcionario-label">Matrícula:</label>
      <input type="text" id="matricula" name="matricula" class="cadastro-funcionario-input" required>

      <label for="senha" class="cadastro-funcionario-label">Senha:</label>
      <input type="password" id="senha" name="senha" class="cadastro-funcionario-input" required>

      <button type="submit" class="cadastro-funcionario-button">Cadastrar Funcionário</button>
    </form>
  </div>

  </div>
</body>
</html>