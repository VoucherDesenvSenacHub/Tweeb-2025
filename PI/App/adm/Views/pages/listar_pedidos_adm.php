<?php

include "head_adm.php";
include "nav_bar_adm.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
  width: 100%;
  border-collapse: collapse;
  font-family: sans-serif;
}

th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.container_item_list_ações{
  background-color: transparent;
  border: none;
  cursor: pointer;
  font-size: 15px;
  transition: transform 0.2s;
}

</style>
<body onload='load_table()'>
        
        <main class="main_adm">
            <div class="conatiner_dashbord_adm">
                <div class="Title_deafult_adm">
                    <div class="container_title_adm_left">
                        <span class="title_adm">Pedidos</span>
                    </div>
                    <div class="container_title_adm_right">
                        <!-- <input type="text" placeholder="Pesquisar...">
                        <i class="fa-solid fa-magnifying-glass"></i> -->

                    </div>
                    
                </div>
                <div class="conatiner_cont_dados_adm">
                    <div class="card_item_dados">
                        <i class="fa-solid fa-dolly"></i>
                        <div class="item_dados_adm">
                            <p class="n_item_dados">N° 45</p>
                            <p class="text_item_dados">Total de Pedidos</p>
                        </div>
                    </div>
                    <div class="shape_dados"></div>
                    <div class="card_item_dados">
                        <i class="fa-solid fa-money-bill"></i>
                        <div class="item_dados_adm">
                            <p class="n_item_dados">N° 23</p>
                            <p class="text_item_dados">Total a pagar</p>
                        </div>
                    </div>
                    <div class="shape_dados"></div>
                    <div class="shape_dados_mobile"></div>
                    <div class="card_item_dados">
                        <i class="fa-solid fa-box"></i>
                        <div class="item_dados_adm">
                            <p class="n_item_dados">N° 34</p>
                            <p class="text_item_dados">Total Disponivel</p>
                        </div>
                    </div>
                    <div class="shape_dados"></div>
                    <div class="card_item_dados">
                        <i class="fa-solid fa-gift"></i>
                        <div class="item_dados_adm">
                            <p class="n_item_dados">N° 11</p>
                            <p class="text_item_dados">Total Personalizado</p>
                        </div>
                    </div>

                </div>
                <div class="conatiner_listar_adm">
                    <div class="container_listar_header_adm">
                        <div class="container_listar_header_adm_left">
                            <button id="btn_item_listar_adm">A pagar</button>
                            <button id="btn_item_listar_adm">Produção</button>
                            <button id="btn_item_listar_adm">Envio</button>
                            <button id="btn_item_listar_adm">Entregue</button>
                        </div>
                        <div class="container_listar_header_adm_right">
                            <input id="input_search" placeholder="Pesquisar Nº do pedido" type="search" name="" id="">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <button id="btn_search_listar">Buscar</button>
                        </div>
                    </div>
                    <div class="container_listar_body_adm">
                    <table class="table_adm_list" id='tabela'>
                        <thead>
                            <th>numero</th>
                            <th>total</th>
                            <th>tipo</th>
                            <th id="Mob_table_none_th" >estado</th>
                            <th>ações</th>
                        </thead>
                        <tbody id="dados">   
                        </tbody>
                    </table>
                    </div>


                </div>
                
            
            </div>
        

        </main>


        <script src="../../src/JS/load_table.js"></script>
</body>
</html>
