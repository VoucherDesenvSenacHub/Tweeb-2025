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
   
</head>
<body> 
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

    <div class="pedidos-categoria-selecionado">
        <div class="categorias-estoque">
          <p><a href="adm-estoque.php">Visão Geral</a></p>
          <span><p>Pedidos</p></span>
          <p><a href="adm-enviados.php">Enviados</a></p>
          <a href="estoqueok.php"><p>Novo Produto</p></a>
        </div>   
    </div>
        

   
    <form class="filtro-formulario">
    <label for="pedido">N° Pedido:</label>
    <input type="text" id="pedido" name="pedido" placeholder="Número Pedido">

    <label for="cliente">Cliente:</label>
    <input type="text" id="cliente" name="cliente" placeholder="Nome do Cliente">

    <button type="submit" class="form-botao-buscar">Buscar</button>
    <button type="reset" class="form-botao-limpar">Limpar</button>
  </form>

  </div>

    <div class="overflow-estoque">
      <h1 class="estoque-titulo">Pedidos</h1>
      <table class="estoque-table">
        <thead>
          <tr>
                  <th>N° Pedido</th>
                  <th>Imagem</th>
                  <th>Produto</th>
                  <th>Data</th>
                  <th>Cliente</th>
                  <th>Preço</th>
                  <th>Receita</th>
                  <th>Estoque</th>
                  <th>Fornecedor</th>
                  <th>Status</th>
              
                  
                  
              </tr>
          </thead>
          <tbody id="page-1" class="product-page">
              <tr>
                  <td>01</td>
                  <td><img src="../../../../public/assets/img/gtx-desc.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Placa GTX</td>
                  <td>27/05/25</td>
                  <td>Roger Santos</td>
                  <td>R$ 230,00</td>
                  <td>R$ 30,00</td>
                  <td>70 PCS</td>
                  <td>SONY.SA</td>
                  <td class="status-estoque">Estoque</td>
                
                  
                <div></td>
              </tr>

              <tr>
                  <td>02</td>
                  <td><img src="../../../../public/assets/img/image 56.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Rx 580</td>
                  <td>27/05/25</td>
                  <td>Cleber Santana</td>
                  <td>R$ 720,00</td>
                  <td>R$ 50,00</td>
                  <td>0 PCS</td>
                  <td>Mancer</td>
                  <td class="status-emfalta">Em falta</td>
                  </div></td>
              </tr>

              <tr>
                  <td>03</td>
                  <td><img src="../../../../public/assets/img/gabinete-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Gabinete</td>
                  <td>26/05/25</td>
                  <td>Vanessa da Mata</td>
                  <td>R$ 100,00</td>
                  <td>R$ 10.00</td>
                  <td>40 PCS</td>
                  <td>Big Ben's Store</td>
                  <td class="status-poucasunid">Poucas unid.</td>
                  </div></td>
              </tr>

              <tr>
                <td>04</td>
                <td><img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                <td>Mouse Gamer</td>
                <td>25/05/25</td>
                <td>Suzana Richtofe</td>
                <td>R$ 350,00</td>
                <td>R$ 20.00</td>
                <td>80 PCS</td>
                <td>Big Ben's Store</td>
                <td class="status-poucasunid">Poucas unid.</td>
                </div></td>
            </tr>

            <tr>
                  <td>05</td>
                  <td><img src="../../../../public/assets/img/gtx-desc.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Placa GTX</td>
                  <td>22/05/25</td>
                  <td>Jõao Cleber</td>
                  <td>R$ 230,00</td>
                  <td>R$ 22,00</td>
                  <td>70 PCS</td>
                  <td>SONY.SA</td>
                  <td class="status-estoque">Estoque</td>
                  </div></td>
              </tr>

              <tr>
                  <td>06</td>
                  <td><img src="../../../../public/assets/img/image 56.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Rx 580</td>
                  <td>21/05//25</td>
                  <td>Michael Jacksom</td>
                  <td>R$ 720,00</td>
                  <td>R$ 60,00</td>
                  <td>180 PCS</td>
                  <td>Mancer</td>
                  <td class="status-emfalta">Em falta</td>
                  </div></td>
              </tr>

              <tr>
                  <td>07</td>
                  <td><img src="../../../../public/assets/img/gabinete-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                  <td>Gabinete</td>
                  <td>20/05/25</td>
                  <td>Felipe Toledo</td>
                  <td>R$ 100,00</td>
                  <td>R$ 9.00</td>
                  <td>40 PCS</td>
                  <td>Big Ben's Store</td>
                  <td class="status-poucasunid">Poucas unid.</td>
                  </div></td>
              </tr>

              <tr>
                <td>08</td>
                <td><img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Descrição da imagem" width="40" height="40"></td>
                <td>Mouse Gamer</td>
                <td>19/05/25</td>
                <td>Melissa Saaid</td>
                <td>R$ 350,00</td>
                <td>R$ 20.00</td>
                <td>80 PCS</td>
                <td>Big Ben's Store</td>
                <td class="status-poucasunid">Poucas unid.</td>
                </div></td>
            </tr>
              
          </tbody>
          <tbody id="page-2" class="product-page" style="display: none;">
              
      </table>
    </div>

</div>

<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

            
    
</body>
</html>