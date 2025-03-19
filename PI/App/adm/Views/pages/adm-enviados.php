<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviados</title>
    <link rel="stylesheet" href="../../../../public/css/adm-enviados.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


    <div class="quantidade-pedidos">
        <div class="pedidos-ui-card">

            <div class="ui-pedidos-frame">
                <p>Pedidos</p>
                <img src="../../../../public/assets/img/adm-pedidos-icon1.png" alt="">
            </div>

            <div class="ui-pedidos-label">
                <h1>96</h1>
                <p><span>5%</span> incompleto</p>
            </div>

        </div>

        <div class="pedidos-adicionar-envio">
            <img src="../../../../public/assets/img/plus-circle.svg" alt="">
            <p>Adicionar Envio</p>
        </div>
    </div>

    <div class="pedidos-categoria-selecionado">
        <div class="categorias">
            <p>Visão Geral</p>
            <p>Pedidos</p>
            <span><p>Enviados</p></span>
        </div>
    </div>

    <div class="pedidos-envios-recentes">
        <h1>Envios Recentes</h1>

        <!-- <div class="filtro-semana">
            <p>Mês</p>
            <p>Semanal</p>
            
            <div class="filtro-selecionado">
                <p>Hoje</p>
            </div>
        </div> -->

        <div class="radio-inputs">
            <label class="radio">
            <input type="radio" name="radio">
            <span class="name">Mês</span>
            </label>
            <label class="radio">
            <input type="radio" name="radio">
            <span class="name">Semana</span>
            </label>
                
            <label class="radio">
            <input type="radio" name="radio" checked="">
            <span class="name">Hoje</span>
            </label>
        </div>
    </div>

    <div class="tabela-container">
        <table class="tabela-recentes">
            <tbody>

                <tr class="tabela-cima">
                    <td>Produto</td>
                    <td>Departamento</td>
                    <td>Qtd</td>
                    <td>NF</td>
                    <td>Cliente</td>
                    <td>Status</td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>hagamenongoncalves@gmail.com</td>
                    <td><div class="status-enviado"><p>Enviado</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>flavinsilva@gmail.com</td>
                    <td><div class="status-pendente"><p>Pendente</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>waldirbraz@gmail.com</td>
                    <td><div class="status-enviado"><p>Enviado</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>homicidiogames@gmail.com</td>
                    <td><div class="status-enviado"><p>Enviado</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>rucoyonline@gmail.com</td>
                    <td><div class="status-pendente"><p>Pendente</p></div></td>
                </tr>

            </tbody>
        </table>
    </div>



    <div class="buscar-filtros">
        <div class="filtros-datas">
            <div class="datas-botoes">
                <!-- trocar isso aqui pra checkbox ou algum outro form quando iniciar o desenvolvimento do backend -->
                <button class="botao-ativado">Hoje</button>
                <button>Ontem</button>
                <button>Data <img src="../../../public/assets/img/adm-calendario.png" alt=""></button>
            </div>
        </div>

        <div class="filtro-formulario">
            <form action="">
                <div class="form-group">
                            
                    <label for="filtrar-nome">Nome</label>
                    <input type="text" id="filtrar-nome" name="filtrar-nome" placeholder="filtrar nome" >
                    
                    <label for="filtrar-email">Email</label>
                    <input type="email" id="filtrar-email" name="filtrar-email" placeholder="filtrar modelo">
                    
                    <label for="filtrar-id">Id do Pedido</label>
                    <input type="text" id="filtrar-id" name="filtrar-id" placeholder="filtrar nº">
                </div>

                <div class="form-group-breakline">
                    
                    <label for="valor">Valor</label>
                    <input type="text" id="valor" name="valor" placeholder="filtrar valor">
                    
                    <label for="filtrar-cpf">CPF</label>
                    <input type="text" id="filtrar-cpf" name="filtrar-cpf" placeholder="filtrar nº">

                    <input class="form-botao-buscar" type="submit" value="Buscar">
                </div>

            </form>
        </div>
    </div>


    <div class="envios-container">
        
        <table class="tabela-envios">
            <h1>Envios</h1>
            
            <tbody>

                <tr class="envios-cima">
                    <td>
                        <label class="envios-checkbox">
                            <input type="checkbox">
                            <span class="checkbox"></span>
                        </label>
                    </td>
                    
                    <td>
                        <div class="td-com-setinha">
                            <div class="td-text">
                                <p>Id Order</p>
                            </div>
                            <div class="td-arrows">
                                <i class="fa-solid fa-chevron-up"></i>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </td>

                    <td>Produto</td>
                    <td>Cliente</td>
                    
                    <td>
                        <div class="td-com-setinha">
                            <div class="td-text">
                                <p>Status</p>
                            </div>
                            <div class="td-arrows">
                                <i class="fa-solid fa-chevron-up"></i>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="td-com-setinha">
                            <div class="td-text">
                                <p>Data do Pedido</p>
                            </div>
                            <div class="td-arrows">
                                <i class="fa-solid fa-chevron-up"></i>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="td-com-setinha">
                            <div class="td-text">
                                <p>Prazo</p>
                            </div>
                            <div class="td-arrows">
                                <i class="fa-solid fa-chevron-up"></i>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="td-com-setinha">
                            <div class="td-text">
                                <p>Preço</p>
                            </div>
                            <div class="td-arrows">
                                <i class="fa-solid fa-chevron-up"></i>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </td>

                    <td>Etapa</td>
                </tr>
                
                <!--  -->

                <?php 
                    for($x = 0; $x < 3; $x++){
                        echo'
                        <tr class="envios-information">
                        <td>
                            <label class="envios-checkbox">
                                <input type="checkbox">
                                <span class="checkbox"></span>
                            </label>
                        </td>
                        
                        <td>990 - 132</td>

                        <td id="envios-bold">TV 14 Inch Gede</td>
                        <td>Leticia</td>
                        
                        <td>
                            <div class="status-completo">
                                <p>Completo</p>
                            </div>
                        </td>

                        <td>
                            <div class="table-data">
                                <p>21 de Março 2025</p>
                                <p>00:28</p>
                            </div>
                        </td>

                        <td>23 de Março, 2025</td>

                        <td id="envios-bold">R$190.09</td>

                        <td>
                            <form class="etapa-form">
                                <select>
                                    <option value="ativo">Ativo</option>
                                    <option value="ativo">Cancelado</option>
                                    <option value="ativo">Pendente</option>
                                </select>
                            </form>
                        </td>
                    </tr>

                    <tr class="envios-information">
                        <td>
                            <label class="envios-checkbox">
                                <input type="checkbox">
                                <span class="checkbox"></span>
                            </label>
                        </td>
                        
                        <td>990 - 132</td>

                        <td id="envios-bold">Sepeda BMX Shadow Blue</td>
                        <td>Lucas</td>
                        
                        <td>
                            <div class="status-andamento">
                                <p>Andamento</p>
                            </div>
                        </td>

                        <td>
                            <div class="table-data">
                                <p>21 de Março 2025</p>
                                <p>10:58</p>
                            </div>
                        </td>

                        <td>15 de Abril, 2025</td>

                        <td id="envios-bold">R$155.10</td>

                        <td>
                            <form class="etapa-form">
                                <select>
                                    <option value="ativo">Ativo</option>
                                    <option value="ativo">Cancelado</option>
                                    <option value="ativo">Pendente</option>
                                </select>
                            </form>
                        </td>
                    </tr>

                    <tr class="envios-information">
                        <td>
                            <label class="envios-checkbox">
                                <input type="checkbox">
                                <span class="checkbox"></span>
                            </label>
                        </td>
                        
                        <td>990 - 132</td>

                        <td id="envios-bold">Mouse Gaming Logitech M-1332A</td>
                        <td>Ana</td>
                        
                        <td>
                            <div class="status-rejeitado">
                                <p>Rejeitado</p>
                            </div>
                        </td>

                        <td>
                            <div class="table-data">
                                <p>21 de Março 2025</p>
                                <p>10:58</p>
                            </div>
                        </td>

                        <td>15 de Abril, 2025</td>

                        <td id="envios-bold">R$155.10</td>

                        <td>
                            <form class="etapa-form">
                                <select>
                                    <option value="ativo">Ativo</option>
                                    <option value="ativo">Cancelado</option>
                                    <option value="ativo">Pendente</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                        
                        ';
                    }
                ?>

                <tr class="envios-information">
                    <td>
                        <label class="envios-checkbox">
                            <input type="checkbox">
                            <span class="checkbox"></span>
                        </label>
                    </td>
                    
                    <td>990 - 132</td>

                    <td id="envios-bold">TV 14 Inch Gede</td>
                    <td>Leticia</td>
                    
                    <td>
                        <div class="status-completo">
                            <p>Completo</p>
                        </div>
                    </td>

                    <td>
                        <div class="table-data">
                            <p>21 de Março 2025</p>
                            <p>00:28</p>
                        </div>
                    </td>

                    <td>23 de Março, 2025</td>

                    <td id="envios-bold">R$190.09</td>

                    <td>
                        <form class="etapa-form">
                            <select>
                                <option value="ativo">Ativo</option>
                                <option value="ativo">Cancelado</option>
                                <option value="ativo">Pendente</option>
                            </select>
                        </form>
                    </td>
                </tr>

                <tr class="envios-information">
                    <td>
                        <label class="envios-checkbox">
                            <input type="checkbox">
                            <span class="checkbox"></span>
                        </label>
                    </td>
                    
                    <td>990 - 132</td>

                    <td id="envios-bold">Sepeda BMX Shadow Blue</td>
                    <td>Marcos</td>
                    
                    <td>
                        <div class="status-andamento">
                            <p>Andamento</p>
                        </div>
                    </td>

                    <td>
                        <div class="table-data">
                            <p>21 de Março 2025</p>
                            <p>10:58</p>
                        </div>
                    </td>

                    <td>15 de Abril, 2025</td>

                    <td id="envios-bold">R$155.10</td>

                    <td>
                        <form class="etapa-form">
                            <select>
                                <option value="ativo">Ativo</option>
                                <option value="ativo">Cancelado</option>
                                <option value="ativo">Pendente</option>
                            </select>
                        </form>
                    </td>
                </tr>

                <tr class="envios-information">
                    <td>
                        <label class="envios-checkbox">
                            <input type="checkbox">
                            <span class="checkbox"></span>
                        </label>
                    </td>
                    
                    <td>990 - 132</td>

                    <td id="envios-bold">Mouse Gaming Logitech M-1332A</td>
                    <td>Carla</td>
                    
                    <td>
                        <div class="status-rejeitado">
                            <p>Rejeitado</p>
                        </div>
                    </td>

                    <td>
                        <div class="table-data">
                            <p>21 de Março 2025</p>
                            <p>10:58</p>
                        </div>
                    </td>

                    <td>15 de Abril, 2025</td>

                    <td id="envios-bold">R$155.10</td>

                    <td>
                        <form class="etapa-form">
                            <select>
                                <option value="ativo">Ativo</option>
                                <option value="ativo">Cancelado</option>
                                <option value="ativo">Pendente</option>
                            </select>
                        </form>
                    </td>
                </tr>

                </tbody>
                </table>


    </div>

  
</body>
</html>