### 🛒 Tweeb - E-commerce de Peças de Informática

## 📌 IMPORTANTE: CONFIGURAR LOCAL, DB, USER, PASSWORD DO BANCO EM `Database.php`

## Tipos de Commits

### `feat` - Nova funcionalidade
```bash
git commit -m "feat: adicionar botão de cadastro"
```

### `fix` - Correção de bug
```bash
git commit -m "fix: corrigir erro ao salvar usuário sem email"
```

### `refactor` - Refatoração de código
```bash
git commit -m "refactor: melhorar organização da classe"
```

### `style` - Alteração de estilo
```bash
git commit -m "style: remover espaços em branco"
```

## Descrição

O Tweeb é uma plataforma de e-commerce voltada para a venda de peças de informática. Desenvolvido com PHP, HTML, CSS e JavaScript, o sistema permite aos usuários visualizar produtos, realizar compras, personalizar preferências e acompanhar pedidos. O projeto utiliza o banco de dados MySQL e segue uma estrutura baseada no padrão MVC (Model-View-Controller).

🛠️ Funcionalidades: 

🧩 Catálogo de Produtos: Lista de produtos com imagens, preços e categorias.

🛒 Carrinho de Compras: Adição e remoção de itens, cálculo automático de total.

👤 Cadastro e Login de Usuários: Sistema de autenticação seguro.

🎯 Sistema de Preferências: Recomendação de produtos com base em perguntas iniciais.

🧑‍💼 Painel Administrativo: CRUD de produtos, usuários, categorias e pedidos.

📊 Relatórios: Vendas, usuários ativos e produtos mais vendidos.



## 💻 Tecnologias: 

Frontend: HTML5, CSS3, JavaScript

Backend: PHP 8+

Banco de Dados: MySQL

Arquitetura: MVC (Model-View-Controller)




# Instalação
## 1. Configuração do Banco de Dados

Crie um banco de dados no MYSQL e configure a string de conexão no arquivo Database.php:

```PHP
public $conn;
    public string $local="SEU_LOCAL";
    public string $db="DATABASE_NAME";
    public string $user="NAME_USER";
    public string $password="SENHA_BD";
```

## 2. Instalar as dependências
Não é necessário instalar dependências via terminal. Certifique-se de que:

O PHP está instalado e funcionando (recomendado usar o XAMPP).

O MySQL está em execução.

O projeto está na pasta htdocs (ou equivalente do seu servidor local).

## 🚀 Execução

Inicie o XAMPP e ative os serviços Apache e MySQL.

Coloque a pasta do projeto dentro do diretório htdocs (ex: C:\xampp\htdocs\tweeb).

No navegador, acesse:


## 🗂️ Estrutura do Projeto
A estrutura do projeto segue o padrão MVC (Model-View-Controller):

Models: Contém as classes que representam as entidades do banco de dados, como Produto, Usuário, Pedido etc.

Views: Contém as páginas HTML com CSS/JS, acessadas pelos usuários e administradores.

Controllers: Contém a lógica responsável por processar requisições, manipular dados e redirecionar entre views e models.

## 🤝 Contribuições
Se você deseja contribuir para o projeto, siga os passos abaixo:
1. Crie uma nova branch para a sua funcionalidade ou correção:
  - git checkout -b feature/nome-da-feature
2. Faça as alterações necessárias no código.
3. Commit suas alterações com uma mensagem clara e padronizada:
  - git commit -m "feat: descrição da feature"
4. Envie para a branch principal (git push origin feature/nome-da-feature).


## Responsáveis

<div style="display: flex; gap: 10px;">
   <a href="https://github.com/Leandro-Oli2">
    <img src="https://github.com/Leandro-Oli2.png" alt="Leandro Oliveira" style="border-radius: 50%; width: 60px; height: 60px; margin: 10%">
  </a>
  <a href="https://github.com/thz006">
    <img src="https://github.com/thz006.png" alt="Arthur Santoro" style="border-radius: 50%; width: 60px; height: 60px; margin: 10%">
  </a>
  <a href="https://github.com/marcosg432">
    <img src="https://github.com/marcosg432.png" alt="Marcos Jatoba" style="border-radius: 50%; width: 60px; height: 60px; margin: 10%">
  </a>
  <a href="https://github.com/akamedevy">
    <img src="https://github.com/akamedevy.png" alt="João Almeida" style="border-radius: 50%; width: 60px; height: 60px; margin: 10%">
  </a>
  <a href="https://github.com/senabeatriz">
    <img src="https://github.com/senabeatriz.png" alt="Beatriz Sena" style="border-radius: 50%; width: 60px; height: 60px; margin: 10%">
  </a>
  <a href="https://github.com/AnaPatriciia">
    <img src="https://github.com/AnaPatriciia.png" alt="Ana Patricia" style="border-radius: 50%; width: 60px; height: 60px; margin: 10%">
  </a>
  <a href="https://github.com/MARCOSAWADA">
    <img src="https://github.com/MARCOSAWADA.png" alt="Marcos Sawada" style="border-radius: 50%; width: 60px; height: 60px; margin: 10%">
  </a>
</div>
