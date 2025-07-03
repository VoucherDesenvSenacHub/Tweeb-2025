<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    link
   
</head>
<body> 

<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

    <div class="pedidos-categoria-selecionado">
        <div class="categorias-estoque">
          <span><p>Visão Geral</p></span>
          <p><a href="adm-pedidos.php">Pedidos</a></p>
          <p><a href="adm-enviados.php">Enviados</a></p>
          <a href="estoqueok.php"><p>Novos Produtos</p></a>

        </div>  

    </div>
        

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
                  <input type="text" id="filtrar-nome" name="filtrar-nome" placeholder="filtrar nome" >
          
                  
                  <label for="filtrar-id">Número ID</label>
                  <input type="text" id="filtrar-id" name="filtrar-id" placeholder="filtrar nº">

                  
                  
                  <input class="form-botao-limpar" type="submit" value="Limpar">
                  <input class="form-botao-buscar" type="submit" value="Buscar">

                 
                    
            </div>

                  

          </form>
      </div>
  </div>

    <div class="overflow-estoque">
      <h1 class="estoque-titulo">Estoque</h1>
      <table class="estoque-table">
        <thead>
          <tr>
                  <th>N° ID</th>
                  <th>Imagem</th>
                  <th>Produto</th>
                  <th>Departamento</th>
                  <th>QTD Entrada</th>
                  <th>Valor UND</th>
                  <th>Valor Total</th>
                  <th>Estoque</th>
                  <th>Fornecedor</th>
                  <th>Status</th>
                  <th>Ação</th>
              </tr>
          </thead>
          <tbody id="page-1" class="product-page">
              <tr>
                  <td>01</td>
                  <td><img src="../../../../public/assets/img/gtx-desc.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Placa GTX</td>
                  <td>Perifericos</td>
                  <td>150</td>
                  <td>R$ 230,00</td>
                  <td>R$ 34.000,00</td>
                  <td>70 PCS</td>
                  <td>SONY.SA</td>
                  <td class="status-estoque">Estoque</td>
                  <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
                </td>


              </tr>

              <tr>
                  <td>02</td>
                  <td><img src="../../../../public/assets/img/image 56.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Rx 580</td>
                  <td>Hardware</td>
                  <td>150</td>
                  <td>R$ 720,00</td>
                  <td>R$ 12.000,00</td>
                  <td>180 PCS</td>
                  <td>Mancer</td>
                  <td class="status-emfalta">Em falta</td>
                  <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
              </tr>

              <tr>
                  <td>03</td>
                  <td><img src="../../../../public/assets/img/gabinete-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Gabinete</td>
                  <td>Hardware</td>
                  <td>150</td>
                  <td>R$ 100,00</td>
                  <td>R$ 5,000.00</td>
                  <td>40 PCS</td>
                  <td>Big Ben's Store</td>
                  <td class="status-poucasunid">Poucas unid.</td>
                  <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
              </tr>

              <tr>
                <td>04</td>
                <td><img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                <td>Mouse Gamer</td>
                <td>Periférico</td>
                <td>30</td>
                <td>R$ 350,00</td>
                <td>R$ 8,000.00</td>
                <td>80 PCS</td>
                <td>Big Ben's Store</td>
                <td class="status-poucasunid">Poucas unid.</td>
                <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
            </tr>

            <tr>
                  <td>05</td>
                  <td><img src="../../../../public/assets/img/gtx-desc.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Placa GTX</td>
                  <td>Perifericos</td>
                  <td>150</td>
                  <td>R$ 230,00</td>
                  <td>R$ 34.000,00</td>
                  <td>70 PCS</td>
                  <td>SONY.SA</td>
                  <td class="status-estoque">Estoque</td>
                  <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
              </tr>

              <tr>
                  <td>06</td>
                  <td><img src="../../../../public/assets/img/image 56.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Rx 580</td>
                  <td>Hardware</td>
                  <td>150</td>
                  <td>R$ 720,00</td>
                  <td>R$ 12.000,00</td>
                  <td>180 PCS</td>
                  <td>Mancer</td>
                  <td class="status-emfalta">Em falta</td>
                  <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
              </tr>

              <tr>
                  <td>07</td>
                  <td><img src="../../../../public/assets/img/gabinete-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Gabinete</td>
                  <td>Hardware</td>
                  <td>150</td>
                  <td>R$ 100,00</td>
                  <td>R$ 5,000.00</td>
                  <td>40 PCS</td>
                  <td>Big Ben's Store</td>
                  <td class="status-poucasunid">Poucas unid.</td>
                  <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
              </tr>

              <tr>
                <td>08</td>
                <td><img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                <td>Mouse Gamer</td>
                <td>Periférico</td>
                <td>30</td>
                <td>R$ 350,00</td>
                <td>R$ 8,000.00</td>
                <td>80 PCS</td>
                <td>Big Ben's Store</td>
                <td class="status-poucasunid">Poucas unid.</td>
                <td class="centralizar-nota">
                <button class="botao-editar-nota"><i class="fa-regular fa-file-lines"></i> Editar</button>
                </td>
            </tr>
              
          </tbody>
              
      </table>
    </div>

        <div class="pagination">
            <button onclick="showPage(1)">1</button>
            <button onclick="showPage(2)">2</button>
        </div>
    </div>
</div>


<!-- Modal para editar produto -->
<div id="modalEditarProduto" class="modal">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <h2>Editar Produto</h2>
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

      <button type="submit">Salvar</button>
    </form>
  </div>

            



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


<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 
    
</body>
</html>