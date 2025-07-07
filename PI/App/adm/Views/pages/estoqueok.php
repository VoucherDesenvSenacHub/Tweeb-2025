<?php
// require '../../Controllers/Produto.php';


require_once(__DIR__ . '/../../Controllers/Produto.php');

$dados_produto = new Produto();
$produto_banco = $dados_produto->buscar();

// if(isset($_POST['cadastrar'])){
//     // $id_produto = $_POST['id_produto'];
//     $nome_produto = $_POST['nome_produto'];
//     $marca_modelo = $_POST['marca_modelo'];
//     $quantidade_produto = $_POST['quantidade_produto'];    
//     $imagem_produto = $_FILES['imagem_produto'];
//     $numero_serie = $_POST['numero_serie'];
//     $custo_produto = $_POST['custo_produto'];
//     $cor_produto = $_POST['cor_produto'];
//     $preco_unid = $_POST['preco_unid'];
//     $descricao_produto = $_POST['descricao_produto'];
//     $detalhes_produto = $_POST['detalhes_produto'];

//     $id_departamento= $_POST['id_departamento'];
//     $entrega_gratis = isset($_POST['entrega_gratis']) ? 1 : 0;
//     $em_estoque = isset($_POST['em_estoque']) ? 1 : 0;
//     $garantia = isset($_POST['garantia']) ? 1 : 0;

    
     
//     ###Código para cadastrar foto no servidor de banco de dados###
//     $arquivo =$_FILES['imagem_produto'];
//     if ($arquivo['error'])die("Falha ao enviar a foto");
//     $pasta ='../../../../public/uploads/';
//     $nome_foto =$arquivo['name'];
//     $novo_nome = uniqid();
//     // echo $novo_nome;
//     $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
//     if ($extensao != 'png' && $extensao !='jpg') die('Falha ao enviar a foto');
//     $caminho = $pasta . $novo_nome . '.' . $extensao;
//     $foto =move_uploaded_file($arquivo['tmp_name'], $caminho);

//     // echo '<br>CAMINHO ' . $caminho;
//     ###Código para cadastrar foto no servidor de banco de dados###

//     $produto = new Produto();
//     // $produto->id_produto = $id_produto;
//     $produto->nome_produto = $nome_produto;
//     $produto->marca_modelo = $marca_modelo;
//     $produto->quantidade_produto = $quantidade_produto;
//     $produto->imagem_produto = $caminho;
//     $produto->numero_serie = $numero_serie;
//     $produto->custo_produto = $custo_produto;
//     $produto->cor_produto  = $cor_produto;
//     $produto->preco_unid = $preco_unid;
//     $produto->descricao_produto = $descricao_produto;
//     $produto->detalhes_produto= $detalhes_produto;

//     $produto->id_departamento = $id_departamento;
//     $produto->entrega_gratis = $entrega_gratis;
//     $produto->em_estoque = $em_estoque;
//     $produto->garantia = $garantia;

   
    

//     $result = $produto->cadastrar();
//     if($result){
//         echo '<script> alert("Produto cadastrado com sucesso!!") </script>';
//     }else{
//         echo 'Error';
//     }
// }

if (isset($_POST['cadastrar'])) {
    $erros = [];

    // Validação dos campos obrigatórios
    if (empty($_POST['nome_produto'])) $erros[] = "O nome do produto é obrigatório.";
    if (empty($_POST['marca_modelo'])) $erros[] = "A marca/modelo é obrigatória.";
    if (empty($_POST['quantidade_produto'])) $erros[] = "A quantidade do produto é obrigatória.";
    if (!isset($_FILES['imagem_produto']) || $_FILES['imagem_produto']['error'] == 4) $erros[] = "A imagem do produto é obrigatória.";
    if (empty($_POST['numero_serie'])) $erros[] = "O número de série é obrigatório.";
    if (empty($_POST['custo_produto'])) $erros[] = "O custo do produto é obrigatório.";
    if (empty($_POST['cor_produto'])) $erros[] = "A cor do produto é obrigatória.";
    if (empty($_POST['preco_unid'])) $erros[] = "O preço unitário é obrigatório.";
    if (empty($_POST['descricao_produto'])) $erros[] = "A descrição do produto é obrigatória.";
    if (empty($_POST['detalhes_produto'])) $erros[] = "Os detalhes do produto são obrigatórios.";
    if (empty($_POST['id_departamento'])) $erros[] = "O departamento do produto é obrigatório.";

    // Se houver erros, exibe-os e interrompe o cadastro
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<p style='color: red;'>$erro</p>";
        }
        return; // Interrompe o script
    }

    // Prossegue com o processamento e upload da imagem
    $nome_produto = $_POST['nome_produto'];
    $marca_modelo = $_POST['marca_modelo'];
    $quantidade_produto = $_POST['quantidade_produto'];
    $imagem_produto = $_FILES['imagem_produto'];
    $numero_serie = $_POST['numero_serie'];
    $custo_produto = $_POST['custo_produto'];
    $cor_produto = $_POST['cor_produto'];
    $preco_unid = $_POST['preco_unid'];
    $descricao_produto = $_POST['descricao_produto'];
    $detalhes_produto = $_POST['detalhes_produto'];
    $id_departamento = $_POST['id_departamento'];
    $entrega_gratis = isset($_POST['entrega_gratis']) ? 1 : 0;
    $em_estoque = isset($_POST['em_estoque']) ? 1 : 0;
    $garantia = isset($_POST['garantia']) ? 1 : 0;

    // Processamento da imagem
    $arquivo = $_FILES['imagem_produto'];
    if ($arquivo['error']) die("Falha ao enviar a foto");
    $pasta = '../../../../public/uploads/';
    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
    if (!in_array($extensao, ['png', 'jpg', 'jpeg', 'gif', 'webp', 'bmp'])) die('Falha ao enviar a foto: formato inválido');

    $caminho = $pasta . $novo_nome . '.' . $extensao;
    $foto = move_uploaded_file($arquivo['tmp_name'], $caminho);

    // Cadastro do produto
    $produto = new Produto();
    $produto->nome_produto = $nome_produto;
    $produto->marca_modelo = $marca_modelo;
    $produto->quantidade_produto = $quantidade_produto;
    $produto->imagem_produto = $caminho;
    $produto->numero_serie = $numero_serie;
    $produto->custo_produto = $custo_produto;
    $produto->cor_produto  = $cor_produto;
    $produto->preco_unid = $preco_unid;
    $produto->descricao_produto = $descricao_produto;
    $produto->detalhes_produto = $detalhes_produto;
    $produto->id_departamento = $id_departamento;
    $produto->entrega_gratis = $entrega_gratis;
    $produto->em_estoque = $em_estoque;
    $produto->garantia = $garantia;

    $result = $produto->cadastrar();
    if ($result) {
        echo '<script>alert("Produto cadastrado com sucesso!!");</script>';
    } else {
        echo '<p style="color: red;">Erro ao cadastrar o produto.</p>';
    }
}


$id_produto = $_POST['id_produto'] ?? null;

$em_estoque = isset($_POST['em_estoque']) ? 1 : 0;
$garantia = isset($_POST['garantia']) ? 1 : 0;
$entrega_gratis = isset($_POST['entrega_gratis']) ? 1 : 0;

if ($id_produto !== null) {
    $produto = new Produto();
    $produto->atualizarFlags($id_produto, $em_estoque, $garantia, $entrega_gratis);
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
    </head>
<body class='produtos_listados'>
    <?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
    <?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>
    <div class="cadastrando-products-pai">
        <div class="cadastrando-products">
            <nav>
            <a href="#" class="active" id="btn-cadastrados">Visão Geral</a>
            <a href="#" class="" id="btn-pedidos">Pedidos</a>
            <a href="#" class="" id="btn-enviados">Enviados</a>
            <a href="#" class="active" id="btn-novo-produto">Novo Produto</a>
            <a href="#" id="btn-inativos">Inativos</a>
            </nav>
            <h2 id='titulo-cadastro-produto'>Detalhes do Produto</h2>

            <!-- Formulário de cadastro -->
            <form action="estoqueok.php" method="POST" enctype="multipart/form-data" id="product-form">
                <div class="form-group">
                    <label for="product-name">Nome do Produto</label>
                    <input autocomplete="off" type="text" name="nome_produto" class="form_field" id="nome_produto" required>

                    <label for="product-brand">Marca/Modelo</label>
                    <input autocomplete="off" type="text" name="marca_modelo" class="form_field" id="marca_modelo" required>
                </div>

                <div class="form-group">
                    <label for="product-quantity">Quantidade</label>
                    <input autocomplete="off" type="number" name="quantidade_produto" class="form_field" id="quantidade_produto" required>

                    <label for="product-department">Departamento</label>
                    <select name="id_departamento" id="id_departamento">
                        <option value="1">hardwares</option>
                        <option value="2">computadores</option>
                        <option value="3">periféricos</option>
                        <option value="4">energia</option>
                        <option value="5">áudio</option>
                        <option value="6">jogos</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product-image">Imagem</label>
                    <input autocomplete="off" type="file" name="imagem_produto" class="form_field" id="imagem_produto" required>
                </div>

                <div class="form-group">
                    <label for="serial-number">Número de Série</label>
                    <input autocomplete="off" type="number" name="numero_serie" class="form_field" id="numero_serie" required>

                    <label for="product-cost">Custo</label>
                    <input autocomplete="off" type="number" name="custo_produto" step="0.01" class="form_field" id="custo_produto" required>
                </div>

                <div class="form-group">
                    <label for="product-color">Cor</label>
                    <input autocomplete="off" type="text" name="cor_produto" class="form_field" id="cor_produto" required>
                </div>

                <div class="form-group">
                    <label for="product-description">Descrição</label>
                    <textarea name="descricao_produto" id="descricao_produto" maxlength="1000"></textarea>
                </div>

                <div class="form-group">
                    <label for="product-description">Detalhes produto</label>
                    <textarea name="detalhes_produto" id="detalhes_produto" maxlength="1000"></textarea>
                </div>

                <h3>Especificações Promocionais</h3>
                <div class="form-group">
                    <label for="promo-value">Valor</label>
                    <input autocomplete="off" type="number" name="preco_unid" step="0.01" class="form_field" id="preco_unid" required>
                </div>

                <div class="form-group">
                    <label for="related-products">Produtos Relacionados</label>
                    <select name="related-products" id="related-products">
                        <option value="">hardwares</option>
                        <option value="">computadores</option>
                        <option value="">periféricos</option>
                        <option value="">energia</option>
                        <option value="">áudio</option>
                        <option value="">jogos</option>
                    </select>
                </div>

                <div class="icons">
                    <label>
                        <input type="checkbox" name="em_estoque" value="1" <?= !empty($produto_banco['em_estoque']) ? "checked" : "" ?>>
                        📦 Em estoque Hoje
                    </label><br>

                    <label>
                        <input type="checkbox" name="garantia" value="1" <?= !empty($produto_banco['garantia']) ? "checked" : "" ?>>
                        🔒 Garantia 1 ano
                    </label><br>

                    <label>
                        <input type="checkbox" name="entrega_gratis" value="1" <?= !empty($produto_banco['entrega_gratis']) ? "checked" : "" ?>>
                        🚚 Entrega Grátis 1-2 dias
                    </label>
                </div>

                <button type="submit" name="cadastrar" value="cadastrar" id="save-button">Salvar</button>
            </form>

            <!-- Div para carregar a tabela via AJAX -->
            <div id="tabela-produtos" style="margin-top:20px;"></div>
        </div>
    </div>

    <!-- Alternar a exibição -->
<script>

// Seleciona o tbody da tabela (onde as linhas serão inseridas)
let dados_tabela = document.getElementById('rows_products');

async function load_table() {
    

    let dados_php = await fetch('../../../../actions/listar_produtos.php');
    let response = await dados_php.json();

    let html = '';

    console.log(response);

    for(let i = 0; i < response.length; i++) {
        html += `<tr class="tr-tr-listarP">`;
        html += `<td class="td-listarP"><img src="${response[i].imagem_produto}" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>`;
        html += `<td class="td-listarP">${response[i].nome_produto}</td>`;
        html += `<td class="td-listarP">${response[i].preco_unid}</td>`;
        html += `<td class="td-listarP">${response[i].quantidade_produto}</td>`;
        html += `<td class="td-listarP">${response[i].id_departamento}</td>`;
        html += `<td class="td-listarP"><div class="td_botao">`;
        html += `<a href="editar_produtos.php?id_produto=${response[i].id_produto}">`;
        html += `<button type="submit" class="form-listarP_editar">`;
        html += `<img src="../../../../public/assets/img/edit-03.png" alt="Editar" class="listarP-edit-icon">`;
        html += `</button></a>`;

        html += `<a href="excluir_produtos.php?id_produto=${response[i].id_produto}">`;
        html += `<button type="submit" class="listarP-delete-btn">`;
        html += `<img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">`;
        html += `</button></a>`;
        html += `</div></td></tr>`;

        console.log(response[i].nome_produto);
    }

    dados_tabela.innerHTML = html;
}



// // Ao clicar no botão "Cadastrados"
// document.getElementById("btn-cadastrados").addEventListener("click", async function(event) {
//     event.preventDefault();

//     // Esconde o formulário
//     document.getElementById('product-form').style.display = 'none';

//     // Cria a estrutura básica da tabela com tbody id "rows_products"
//     const tabelaHTML = `
    
//         <table class="listarP-table">
//             <thead class="thead-listarP">
//                 <tr class="tr-listarP">
//                     <th class="th-listarP">Foto</th>
//                     <th class="th-listarP">Produto</th>
//                     <th class="th-listarP">Valor</th>
//                     <th class="th-listarP">Quantidade</th>
//                     <th class="th-listarP">Departamentos</th>
//                     <th class="th-listarP">Alterar</th>
//                 </tr>
//             </thead>
//             <tbody id="rows_products" class="tbody-listarP"></tbody>
//         </table>
//     `;
//     document.getElementById('tabela-produtos').innerHTML = tabelaHTML;

//     // Atualiza a variável dados_tabela para o novo tbody inserido
//     dados_tabela = document.getElementById('rows_products');

//     // Chama a função que carrega os produtos
//     await load_table();

//     // Altera o título
//     document.getElementById('titulo-cadastro-produto').textContent = 'Produtos Cadastrados';

//     // Ajusta navegação ativa
//     document.getElementById('btn-novo-produto').classList.remove('active');
//     this.classList.add('active');
//     document.getElementById('btn-inativos').classList.remove('active');
//     this.classList.add('active');

// });

document.getElementById("btn-cadastrados").addEventListener("click", async function(event) {
    event.preventDefault();

    // Esconde o formulário de novo produto
    document.getElementById('product-form').style.display = 'none';

    // Cria o HTML com as categorias + filtros
    const infoEstoqueHTML = `
        <div class="centralizar-categorias">
            <div class="adm-estoque-caterogias">

                <div class="estoque-categoria">
                    <img src="../../../../public/assets/img/computadores-icon.png" alt="">
                    <h1 class="visao-geral-adm-estoque">Computadores</h1>
                    <div class="estoque-progresso"></div>
                    <p><span>200</span> | Estoque min: 35</p>
                </div>

                <div class="estoque-categoria">
                    <img src="../../../../public/assets/img/phone-icon.png" alt="">
                    <h1 class="visao-geral-adm-estoque">Hardwares</h1>
                    <div class="estoque-progresso"></div>
                    <p><span>600</span> | Estoque min: 100</p>
                </div>

                <div class="estoque-categoria">
                    <img src="../../../../public/assets/img/perifericos-icon.png" alt="">
                    <h1 class="visao-geral-adm-estoque">Periféricos</h1>
                    <div class="estoque-progresso"></div>
                    <p><span>500</span> | Estoque min: 142</p>
                </div>

                <div class="estoque-categoria">
                    <img src="../../../../public/assets/img/energia-icon.png" alt="">
                    <h1 class="visao-geral-adm-estoque">Energia</h1>
                    <div class="estoque-progresso"></div>
                    <p><span>160</span> | Estoque min: 67</p>
                </div>

                <div class="estoque-categoria">
                    <img src="../../../../public/assets/img/audio-icon.png" alt="">
                    <h1 class="visao-geral-adm-estoque">Áudio</h1>
                    <div class="estoque-progresso"></div>
                    <p><span>256</span> | Estoque min: 108</p>
                </div>

                <div class="estoque-categoria">
                    <img src="../../../../public/assets/img/jogos-icon.png" alt="">
                    <h1 class="visao-geral-adm-estoque">Jogos</h1>
                    <div class="estoque-progresso"></div>
                    <p><span>123</span> | Estoque min: 50</p>
                </div>

            </div>
        </div>

        <div class="filtro-formulario">
            <form action="">
                <div class="form-group-estoque">
                    <label for="filtrar-nome">Nome</label>
                    <input type="text" id="filtrar-nome" name="filtrar-nome" placeholder="filtrar nome">

                    <label for="filtrar-id">Número ID</label>
                    <input type="text" id="filtrar-id" name="filtrar-id" placeholder="filtrar nº">

                    <input class="form-botao-limpar" type="submit" value="Limpar">
                    <input class="form-botao-buscar" type="submit" value="Buscar">
                </div>
            </form>
        </div>
    `;

    // Cria a tabela
    const tabelaHTML = `
        <table class="listarP-table">
            <thead class="thead-listarP">
                <tr class="tr-listarP">
                    <th class="th-listarP">Foto</th>
                    <th class="th-listarP">Produto</th>
                    <th class="th-listarP">Valor</th>
                    <th class="th-listarP">Quantidade</th>
                    <th class="th-listarP">Departamentos</th>
                    <th class="th-listarP">Alterar</th>
                </tr>
            </thead>
            <tbody id="rows_products" class="tbody-listarP"></tbody>
        </table>
    `;

    // Junta tudo no container principal (tabela-produtos)
    document.getElementById('tabela-produtos').innerHTML = infoEstoqueHTML + tabelaHTML;

    // Atualiza referência do tbody
    dados_tabela = document.getElementById('rows_products');

    // Carrega os dados da tabela
    await load_table();

    // Atualiza o título da seção
    document.getElementById('titulo-cadastro-produto').textContent = 'Produtos Cadastrados';

    // Ativa o botão "Cadastrados" e desativa os outros
    document.getElementById('btn-novo-produto').classList.remove('active');
    document.getElementById('btn-inativos').classList.remove('active');
    this.classList.add('active');
});



async function load_table2() {
    console.log("AQuiiiiiii 2.0");

    let dados_php = await fetch('../../../../actions/listar_produtos_inativos.php');
    let response = await dados_php.json();

    let html = '';

    console.log(response);

    for(let i = 0; i < response.length; i++) {
        html += `<tr class="tr-tr-listarP">`;
        html += `<td class="td-listarP"><img src="${response[i].imagem_produto}" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>`;
        html += `<td class="td-listarP">${response[i].nome_produto}</td>`;
        html += `<td class="td-listarP">${response[i].preco_unid}</td>`;
        html += `<td class="td-listarP">${response[i].quantidade_produto}</td>`;
        html += `<td class="td-listarP">${response[i].id_departamento}</td>`;
        html += `<td class="td-listarP"><div class="td_botao">`;
        html += `<a href="editar_produtos.php?id_produto=${response[i].id_produto}">`;
        html += `<button type="submit" class="form-listarP_editar">`;
        html += `<img src="../../../../public/assets/img/edit-03.png" alt="Editar" class="listarP-edit-icon">`;
        html += `</button></a>`;

        html += `<a href="excluir_produtos.php?id_produto=${response[i].id_produto}">`;
        html += `<button type="submit" class="listarP-delete-btn">`;
        html += `<img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">`;
        html += `</button></a>`;
        html += `</div></td></tr>`;

        console.log(response[i].nome_produto);
    }

    dados_tabela.innerHTML = html;
}

// Ao clicar no botão "Inativos"
document.getElementById("btn-inativos").addEventListener("click", async function(event) {
    event.preventDefault();

    // Esconde o formulário
    document.getElementById('product-form').style.display = 'none';
    

    // Cria a estrutura básica da tabela com tbody id "rows_products"
    const tabelaHTML = `
        <table class="listarP-table">
            <thead class="thead-listarP">
                <tr class="tr-listarP">
                    <th class="th-listarP">Foto</th>
                    <th class="th-listarP">Produto</th>
                    <th class="th-listarP">Valor</th>
                    <th class="th-listarP">Quantidade</th>
                    <th class="th-listarP">Departamentos</th>
                    <th class="th-listarP">Alterar</th>
                </tr>
            </thead>
            <tbody id="rows_products" class="tbody-listarP"></tbody>
        </table>
    `;
    document.getElementById('tabela-produtos').innerHTML = tabelaHTML;

    // Atualiza a variável dados_tabela para o novo tbody inserido
    dados_tabela = document.getElementById('rows_products');

    // Chama a função que carrega os produtos
    await load_table2();

    // Altera o título
    document.getElementById('titulo-cadastro-produto').textContent = 'Produtos Inativos';

    // Ajusta navegação ativa
    document.getElementById('btn-novo-produto').classList.remove('active');
    this.classList.add('active');
    document.getElementById('btn-cadastrados').classList.remove('active');
    this.classList.add('active');
});


        // Quando clicar em "Novo Produto"
        document.getElementById("btn-novo-produto").addEventListener("click", function(event) {
            event.preventDefault();

            // Mostrar formulário
            document.getElementById('product-form').style.display = 'block';

            // Limpar tabela
            document.getElementById('tabela-produtos').innerHTML = '';

            // Alterar título
            document.getElementById('titulo-cadastro-produto').textContent = 'Detalhes do Produto';

            // Ajustar navegação ativa
            document.getElementById('btn-cadastrados').classList.remove('active');
            this.classList.add('active');
        });

        
      
        
    </script>
    <script src="../../js_adm/load_table.js"></script>

    <!-- Modal para editar produto -->
<div id="modalEditarProduto" class="modal">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <h2 class="titulo-modal">Editar Produto</h2>
    <form id="formEditarProduto" method="post" action="processa-editar-produto.php">
      <input type="hidden" name="id" id="produto-id">

      <label for="produto-nome">Produto</label>
      <input type="text" id="produto-nome" name="produto_nome" required>

      <label for="produto-departamento">Departamento</label>
      <input type="text" id="produto-departamento" name="produto_departamento" required>

      <label for="produto-quantidade">QTD Entrada</label>
      <input type="number" id="produto-quantidade" name="produto_quantidade" required>

      <label for="produto-valor-und">Valor UND</label>
      <input type="text" id="produto-valor-und" name="produto_valor_und" required>

      <label for="produto-valor-total">Valor Total</label>
      <input type="text" id="produto-valor-total" name="produto_valor_total" required>

      <label for="produto-estoque">Estoque</label>
      <input type="text" id="produto-estoque" name="produto_estoque" required>

      <label for="produto-fornecedor">Fornecedor</label>
      <input type="text" id="produto-fornecedor" name="produto_fornecedor" required>

      <label for="produto-status">Status</label>
      <input type="text" id="produto-status" name="produto_status" required>

      <button class="btao-salvar">Salvar</button>
    </form>

    <script>
  // Elementos do modal
  const modal = document.getElementById('modalEditarProduto');
  const closeModalBtn = modal.querySelector('.close-modal');
  const form = document.getElementById('formEditarProduto');

  // Função para abrir modal e preencher dados da linha clicada
  function abrirModalEditar(event) {
    const btn = event.currentTarget;
    const tr = btn.closest('tr');

    // Captura dados da linha (colunas)
    const id = tr.children[0].innerText.trim();
    const produtoNome = tr.children[2].innerText.trim();
    const departamento = tr.children[3].innerText.trim();
    const quantidade = tr.children[4].innerText.trim();
    const valorUnd = tr.children[5].innerText.trim();
    const valorTotal = tr.children[6].innerText.trim();
    const estoque = tr.children[7].innerText.trim();
    const fornecedor = tr.children[8].innerText.trim();
    const status = tr.children[9].innerText.trim();

    // Preenche inputs do formulário
    document.getElementById('produto-id').value = id;
    document.getElementById('produto-nome').value = produtoNome;
    document.getElementById('produto-departamento').value = departamento;
    document.getElementById('produto-quantidade').value = quantidade;
    document.getElementById('produto-valor-und').value = valorUnd;
    document.getElementById('produto-valor-total').value = valorTotal;
    document.getElementById('produto-estoque').value = estoque;
    document.getElementById('produto-fornecedor').value = fornecedor;
    document.getElementById('produto-status').value = status;

    // Exibe modal
    modal.style.display = 'block';
  }

  // Fecha modal ao clicar no "x"
  closeModalBtn.onclick = () => {
    modal.style.display = 'none';
  };

  // Fecha modal ao clicar fora da área do conteúdo
  window.onclick = (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };

  // Aplica o evento a todos os botões editar
  document.querySelectorAll('.botao-editar-nota').forEach(button => {
    button.addEventListener('click', abrirModalEditar);
  });
</script>

</body>
</html>


        