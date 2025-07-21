# Sistema de Favoritos - Tweeb

Sistema completo de favoritos para o projeto Tweeb, permitindo que usuários salvem produtos favoritos e gerenciem sua lista de desejos.

## 📋 Índice

1. [Estrutura do Sistema](#estrutura-do-sistema)
2. [Instalação](#instalação)
3. [Como Usar](#como-usar)
4. [API Endpoints](#api-endpoints)
5. [Integração em Páginas](#integração-em-páginas)
6. [Funcionalidades](#funcionalidades)
7. [Arquivos Criados/Modificados](#arquivos-criadosmodificados)

## 🏗️ Estrutura do Sistema

```
App/
├── DB/
│   └── SQL-SCRIPT/
│       └── favoritos.sql          # Script SQL da tabela
├── user/
│   ├── Controllers/
│   │   └── FavoritoController.php # Controlador da API
│   ├── Models/
│   │   └── Favorito.php          # Modelo de dados
│   └── View/pages/
│       ├── favoritos.php         # Página de favoritos
│       └── exemplo-favoritos.php # Exemplo de integração
public/
├── css/
│   └── favoritos.css             # Estilos do sistema
└── js/
    └── favoritos.js              # JavaScript do sistema
```

## 🚀 Instalação

### 1. Criar Tabela no Banco de Dados

Execute o script SQL em `App/DB/SQL-SCRIPT/favoritos.sql`:

```sql
CREATE TABLE IF NOT EXISTS favoritos (
    id_favorito INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_produto INT NOT NULL,
    data_adicionado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto) ON DELETE CASCADE,
    UNIQUE KEY unique_user_product (id_usuario, id_produto)
);
```

### 2. Verificar Dependências

Certifique-se de que os seguintes arquivos existem:
- `App/DB/Database.php` (já existe)
- `public/assets/img/heart_enabled.png` (coração preenchido)
- `public/assets/img/heart_disabled.png` (coração vazio)

## 📖 Como Usar

### Integração Básica

1. **Incluir CSS:**
```html
<link rel="stylesheet" href="../../../../public/css/favoritos.css">
```

2. **Incluir JavaScript:**
```html
<script src="../../../../public/js/favoritos.js"></script>
```

3. **Estrutura HTML do Card:**
```html
<div class="produtos-card" data-produto-id="ID_DO_PRODUTO">
    <img class="heart" 
         src="../../../../public/assets/img/heart_disabled.png" 
         alt="coração" 
         data-produto-id="ID_DO_PRODUTO"
         onclick="toggleFavorito(ID_DO_PRODUTO, this)">
    <!-- resto do conteúdo -->
</div>
```

## 🔌 API Endpoints

### FavoritoController.php

| Método | Endpoint | Parâmetros | Descrição |
|--------|----------|------------|-----------|
| GET | `?action=toggle&id_produto=X` | `id_produto` | Alterna favorito (adiciona/remove) |
| GET | `?action=verificar&id_produto=X` | `id_produto` | Verifica se produto está nos favoritos |
| GET | `?action=adicionar&id_produto=X` | `id_produto` | Adiciona produto aos favoritos |
| GET | `?action=remover&id_produto=X` | `id_produto` | Remove produto dos favoritos |
| GET | `?action=listar` | `page`, `limit` | Lista favoritos com paginação |
| GET | `?action=limpar` | - | Remove todos os favoritos |

### Respostas da API

```json
{
    "success": true,
    "message": "Produto adicionado aos favoritos",
    "is_favorito": true
}
```

## 🎨 Integração em Páginas

### Exemplo Completo

```php
<?php
// Verificar se usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../../../public/css/favoritos.css">
</head>
<body>
    <div class="container-favoritos-depto">
        <?php foreach ($produtos as $produto): ?>
            <div class="produtos-card" data-produto-id="<?= $produto['id_produto'] ?>">
                <img class="heart" 
                     src="../../../../public/assets/img/heart_disabled.png" 
                     alt="coração" 
                     data-produto-id="<?= $produto['id_produto'] ?>"
                     onclick="toggleFavorito(<?= $produto['id_produto'] ?>, this)">
                
                <img class="image-produto" 
                     src="../../../../public/assets/img/<?= $produto['imagem_produto'] ?>" 
                     alt="<?= $produto['nome_produto'] ?>">
                
                <p><?= $produto['nome_produto'] ?></p>
                <p><?= $produto['marca_modelo'] ?></p>
                <h1>R$ <?= number_format($produto['preco_unid'], 2, ',', '.') ?></h1>
                
                <button class="card-botao">Comprar Agora</button>
            </div>
        <?php endforeach; ?>
    </div>
    
    <script src="../../../../public/js/favoritos.js"></script>
</body>
</html>
```

## ⚡ Funcionalidades

### ✅ Implementadas

- ✅ Adicionar produto aos favoritos
- ✅ Remover produto dos favoritos
- ✅ Verificar se produto está nos favoritos
- ✅ Listar todos os favoritos do usuário
- ✅ Limpar todos os favoritos
- ✅ Interface responsiva
- ✅ Notificações visuais
- ✅ Animações e efeitos visuais
- ✅ Estado persistente (carrega automaticamente)
- ✅ Integração com sistema de sessão
- ✅ Validação de usuário logado
- ✅ Tratamento de erros

### 🎯 Funcionalidades Especiais

1. **Toggle Automático:** Um clique alterna entre adicionar/remover
2. **Estado Visual:** Coração muda de cor automaticamente
3. **Notificações:** Feedback visual para todas as ações
4. **Responsivo:** Funciona em dispositivos móveis
5. **Performance:** Carregamento assíncrono via AJAX

## 📁 Arquivos Criados/Modificados

### Novos Arquivos

1. **`App/DB/SQL-SCRIPT/favoritos.sql`**
   - Script SQL para criar tabela de favoritos

2. **`App/user/Models/Favorito.php`**
   - Modelo para gerenciar dados dos favoritos

3. **`App/user/Controllers/FavoritoController.php`**
   - API REST para operações de favoritos

4. **`App/user/View/pages/exemplo-favoritos.php`**
   - Exemplo de integração

5. **`SISTEMA_FAVORITOS_README.md`**
   - Documentação completa

### Arquivos Modificados

1. **`App/user/View/pages/favoritos.php`**
   - Página principal de favoritos atualizada

2. **`public/css/favoritos.css`**
   - Estilos completos do sistema

3. **`public/js/favoritos.js`**
   - JavaScript com todas as funcionalidades

4. **`App/user/View/pages/Games.php`**
   - Exemplo de integração em página de departamento

## 🔧 Funções JavaScript Disponíveis

```javascript
// Funções principais
toggleFavorito(idProduto, elemento)      // Alterna favorito
verificarFavorito(idProduto, elemento)   // Verifica estado
carregarEstadoFavoritos()                // Carrega todos os estados
adicionarFavorito(idProduto, elemento)   // Adiciona favorito
removerFavorito(idProduto, elemento)     // Remove favorito
limparFavoritos()                        // Limpa todos
mostrarNotificacao(mensagem, tipo)       // Mostra notificação
atualizarContadorFavoritos()             // Atualiza contador na navbar
```

## 🎨 Classes CSS Importantes

```css
.heart                    /* Ícone do coração */
.favorito-ativo          /* Coração ativo/favoritado */
.produtos-card           /* Card do produto */
.container-favoritos-5   /* Container principal */
.container-favoritos-depto /* Container de departamentos */
.notificacao             /* Notificações */
.favoritos-vazio         /* Estado vazio */
```

## 🚨 Requisitos

- PHP 7.4+
- MySQL 5.7+
- Usuário logado (sessão ativa)
- Tabela `usuarios` e `produtos` existentes
- Imagens de coração (heart_enabled.png, heart_disabled.png)

## 🔍 Testes

Para testar o sistema:

1. Execute o script SQL
2. Acesse uma página com produtos
3. Clique nos corações para favoritar
4. Acesse `/favoritos.php` para ver a lista
5. Teste em dispositivos móveis

## 📞 Suporte

Em caso de dúvidas ou problemas:

1. Verifique se o usuário está logado
2. Confirme se a tabela foi criada corretamente
3. Verifique o console do navegador para erros JavaScript
4. Confirme se os caminhos dos arquivos estão corretos

---

**Sistema desenvolvido para o projeto Tweeb - Sistema completo de favoritos funcionando!** 🎉 