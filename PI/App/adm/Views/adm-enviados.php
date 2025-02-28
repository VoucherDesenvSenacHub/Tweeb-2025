<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/adm-enviados.css">
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
                    <td>Nota</td>
                    <td>desgraçasilva@gmail.com</td>
                    <td><div class="status-enviado"><p>Enviado</p></div></td>
                </tr>

                <tr class="tabela-info">
                    <td>Fone de ouvido</td>
                    <td>Periféricos</td>
                    <td><span>2</span></td>
                    <td>Nota</td>
                    <td>desgraçasilva@gmail.com</td>
                    <td><div class="status-pendente"><p>Pendente</p></div></td>
                </tr>

            </tbody>
        </table>
    </div>

</body>
</html>