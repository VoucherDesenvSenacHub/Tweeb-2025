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
          <span><p>Visão Geral</p></span>
          <p><a href="adm-pedidos.php">Pedidos</a></p>
          <p><a href="adm-enviados.php">Enviados</a></p>
        </div>  

        <div class="estoque-busca">
          <form action="">
            <input type="text" placeholder="Busca">
          </form>
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

    
    <div class="buscar-filtros">
      <div class="filtros-datas">
          <div class="datas-botoes">
              <!-- trocar isso aqui pra checkbox ou algum outro form quando iniciar o desenvolvimento do backend -->
              <button class="botao-ativado">Hoje</button>
              <button>Ontem</button>
              <button>7 dias</button>
              <button>30 dias</button>
              <button>Último mês</button>
              <button>Data <img src="../../../../public/assets/img/adm-calendario.png" alt=""></button>
          </div>
      </div>

      <div class="filtro-formulario">
          <form action="">
              <div class="form-group-estoque">
                          
                  <label for="filtrar-nome">Nome</label>
                  <input type="text" id="filtrar-nome" name="filtrar-nome" placeholder="filtrar nome" >
                  
                  <label for="filtrar-email">Modelo</label>
                  <input type="email" id="filtrar-email" name="filtrar-email" placeholder="filtrar modelo">
                  
                  <label for="filtrar-id">Número de série</label>
                  <input type="text" id="filtrar-id" name="filtrar-id" placeholder="filtrar nº">

                  <label for="valor">Fornecedor</label>
                  <input type="text" id="valor" name="valor" placeholder="filtrar fornecedor">
                  
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
                  <th>N</th>
                  <th>Imagem</th>
                  <th>Produto</th>
                  <th>Departamento</th>
                  <th>QTD Entrada</th>
                  <th>Valor UND</th>
                  <th>Valor Total</th>
                  <th>Estoque</th>
                  <th>Fornecedor</th>
                  <th>Status</th>
                  <th>NF</th>
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
                  <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
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
                  <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
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
                  <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
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
                <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
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
                  <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
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
                  <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
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
                  <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
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
                <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
            </tr>
              
          </tbody>
          <tbody id="page-2" class="product-page" style="display: none;">
              
      </table>
    </div>

        <div class="pagination">
            <button onclick="showPage(1)">1</button>
            <button onclick="showPage(2)">2</button>
        </div>
    </div>
</div>

            
    
</body>
</html>