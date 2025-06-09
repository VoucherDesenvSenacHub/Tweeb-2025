<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenções</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="../../../../public/js/adm-manutencao.js"></script>
</head>
<body class="manutencao-body">
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>
        <div class="manutencao-container">
          
            <section class="manutencao-section">
                <h1>Manutenções</h1>

                <div class="manutencoes-cards">

                    <div class="manutencao-card">
                        <p class="manutencoes-total">Total</p>
                        <p>37</p>
                    </div>
    
                    <div class="manutencao-card">
                        <p class="manutencoes-andamento">Em andamento</p>
                        <p>32</p>
                    </div>
    
                    <div class="manutencao-card">
                        <p class="manutencoes-finalizadas">Finalizadas</p>
                        <p>5</p>
                    </div>
                </div>

                
            </section>
        
            
            <nav class="manutencao-tabs2">
                <a href="adm-manutencao.php" class="active">Ordem de serviço</a>
                <a href="#" class="sublinhado">Enviadas</a>
            </nav>
            
            <div class="manutencao-actions">

            <a href="OrdemdeServico.php" class="pedidos-adicionar-envio">
                <img src="../../../../public/assets/img/plus-circle.svg" alt="Adicionar OS">
                <p>Adicionar OS</p>
            </a>
                <!-- <div class="pedidos-adicionar-envio">
                    <img src="../../../../public/assets/img/plus-circle.svg" alt="">
                    <p>Editar OS</p>
                </div> -->

                <div class="pedidos-adicionar-envio" onclick="window.location.href='editar-modal.php';">
                        <img src="../../../../public/assets/img/plus-circle.svg" alt="">
                        <p>Editar OS</p>
                </div>
  
            </div>
        <div class="servicos-table">
            <h1>Ordem de serviço</h1>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Entrada</th>
                        <th>Order ID</th>
                        <th>Saída</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="page-1" class="product-page">
                    <tr>
                        <td>Monitor</td>
                        <td>R$ 2557</td>
                        <td>22 Unidades</td>
                        <td>5724</td>
                        <td>21/08/24</td>
                        <td class="entregue">Entregue</td>
                    </tr>
                    <tr>
                        <td>Computador Gamer</td>
                        <td>R$ 4075</td>
                        <td>36 Unidades</td>
                        <td>2775</td>
                        <td>5/07/24</td>
                        <td class="garantia">Retorno Garantia</td>
                    </tr>
                    <tr>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>14 Unidades</td>
                        <td>2275</td>
                        <td>8/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>14 Unidades</td>
                        <td>2275</td>
                        <td>8/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>14 Unidades</td>
                        <td>2275</td>
                        <td>8/03/24</td>
                        <td class="atrasado">Atrasado</td>
                    </tr>
                    <tr>
                        <td>Notebook Dell</td>
                        <td>R$ 4306</td>
                        <td>43 Unidades</td>
                        <td>7535</td>
                        <td>11/08/24</td>
                        <td class="atrasado">Atrasado</td>
                    </tr>
                    <tr>
                        <td>Monitor</td>
                        <td>R$ 2557</td>
                        <td>22 Unidades</td>
                        <td>5724</td>
                        <td>21/08/24</td>
                        <td class="entregue">Entregue</td>
                    </tr>
                    <tr>
                        <td>Computador Gamer</td>
                        <td>R$ 4075</td>
                        <td>36 Unidades</td>
                        <td>2775</td>
                        <td>5/07/24</td>
                        <td class="garantia">Retorno Garantia</td>
                    </tr>
                    <tr>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>14 Unidades</td>
                        <td>2275</td>
                        <td>8/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>14 Unidades</td>
                        <td>2275</td>
                        <td>8/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>14 Unidades</td>
                        <td>2275</td>
                        <td>8/03/24</td>
                        <td class="atrasado">Atrasado</td>
                    </tr>

                   
                </tbody>
                <tbody id="page-2" class="product-page" style="display: none;">
                    <tr>
                        <td>Teclado Mecânico</td>
                        <td>R$ 329</td>
                        <td>50 Unidades</td>
                        <td>8923</td>
                        <td>12/09/24</td>
                        <td class="entregue">Entregue</td>
                    </tr>
                    <tr>
                        <td>Headset Gamer</td>
                        <td>R$ 499</td>
                        <td>30 Unidades</td>
                        <td>7123</td>
                        <td>15/09/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>
                    <tr>
                        <td>Placa de Vídeo RTX</td>
                        <td>R$ 3599</td>
                        <td>20 Unidades</td>
                        <td>6201</td>
                        <td>20/09/24</td>
                        <td class="garantia">Retorno Garantia</td>
                    </tr>
                    <tr>
                        <td>SSD NVMe 1TB</td>
                        <td>R$ 850</td>
                        <td>40 Unidades</td>
                        <td>4902</td>
                        <td>25/09/24</td>
                        <td class="atrasado">Atrasado</td>
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



    <div class="manutencoes-aceitas">
        <p>Manutenções Aceitas</p>

        <div class="botao-out" id="ativar-aceitas">

            <div class="botao-inner">
                <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="">
            </div>

        </div>

    </div>
    
    <div class="aceitas-table" id="manutencoes-aceitas" style="display: none;">
        <h1>Manutenções Aceitas</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Prazo determinado</th>
                <th>Solicitação</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Rafaela Costa</td>
                <td>costa25@gmail.com</td>
                <td class="green-text">2 dias</td>
                <td>Formatação</td>
            </tr>
            <tr class="highlight-adm">
                <td>2</td>
                <td>Laura Borges</td>
                <td>blaura2021@gmail.com</td>
                <td>Não</td>
                <td>Troca de tela</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Wesley Pablo</td>
                <td>wes_pablo@live.com</td>
                <td class="green-text">3 dias</td>
                <td>Troca de tela</td>
            </tr>
            <tr class="highlight-adm">
                <td>4</td>
                <td>Gabriel José</td>
                <td>gabriel_joca@live.com</td>
                <td>Não</td>
                <td>Notebook não liga</td>
            </tr>
        </table>
        <div class="pagination">
            <button class="active">1</button>
            <button>2</button>
        </div>
        
    </div>

            
    
</body>
</html>