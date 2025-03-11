<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/adm-enviados.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- navbar, tirar isso depois e deixar só como include. -->
    <header>
        <div class="listarU-logo">
            <img src="../../../public/assets/img/Ativo 2.png " alt="logo tweeb">
        </div> 
    </header>

    <!-- Barra de departamentos -->
    <section class="listarU-departments-bar">
        <div class="listarU-department"></div>
    </section>

    <div class="quantidade-pedidos">
        <div class="pedidos-ui-card">

            <div class="ui-pedidos-frame">
                <p>Pedidos</p>
                <img src="../../../public/assets/img/adm-pedidos-icon1.png" alt="">
            </div>

            <div class="ui-pedidos-label">
                <h1>96</h1>
                <p><span>5%</span> incompleto</p>
            </div>

        </div>

        <div class="pedidos-adicionar-envio">
            <img src="../../../public/assets/img/plus-circle.svg" alt="">
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

        <div class="filtro-semana">
            <p>Mês</p>
            <p>Semanal</p>
            
            <div class="filtro-selecionado">
                <p>Hoje</p>
            </div>
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
                    <td>desgraçasilva@gmail.com</td>
                    <td><div class="status-enviado"><p>Enviado</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>desgraçasilva@gmail.com</td>
                    <td><div class="status-pendente"><p>Pendente</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>desgraçasilva@gmail.com</td>
                    <td><div class="status-enviado"><p>Enviado</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>desgraçasilva@gmail.com</td>
                    <td><div class="status-enviado"><p>Enviado</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td class="centralizar-nota"><div class="tabela-nota-fiscal"><i class="fa-regular fa-file-lines"></i><p>Nota</p></div></td>
                    <td>desgraçasilva@gmail.com</td>
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
                    <td class="temSetinha">ID Order 
                        <div class="envios-setinhas">
                            <i class="fa-solid fa-chevron-up"></i>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </td>
                    <td>Produto</td>
                    <td>Cliente</td>
                    <td class="temSetinha">Status
                        <div class="envios-setinhas">
                            <i class="fa-solid fa-chevron-up"></i>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </td>
                    <td class="temSetinha">Data do Pedido
                        <div class="envios-setinhas">
                            <i class="fa-solid fa-chevron-up"></i>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </td>
                    <td class="temSetinha">Prazo
                        <div class="envios-setinhas">
                            <i class="fa-solid fa-chevron-up"></i>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </td>
                    <td class="temSetinha">Preço
                        <div class="envios-setinhas">
                            <i class="fa-solid fa-chevron-up"></i>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </td>
                    <td>Etapa</td>
                </tr>

            </tbody>
        </table>

    </div>

</body>
</html>