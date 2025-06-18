<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Enviados</title>
    <link rel="stylesheet" href="../../../../public/css/adm-enviados.css" />
    <link rel="stylesheet" href="../../../../public/css/enviadosmodal.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    
</head>
<body>
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="quantidade-pedidos">
    <div class="pedidos-ui-card">
        <div class="ui-pedidos-frame">
            <p>Pedidos</p>
            <img src="../../../../public/assets/img/adm-pedidos-icon1.png" alt="" />
        </div>
        <div class="ui-pedidos-label">
            <h1 class="numero-item-minicard">96</h1>
            <p><span>5%</span> incompleto</p>
        </div>
    </div>
</div>

<div class="pedidos-categoria-selecionado">
    <div class="categorias-adm-enviados">
        <a href="adm-estoque.php"><p>Visão Geral</p></a>
        <a href="adm-pedidos.php"><p>Pedidos</p></a>
        <a href=""><span><p>Enviados</p></span></a>
    </div>
</div>

<button class="btn-adicionar-envio">Adicionar Envio</button>


<div class="pedidos-envios-recentes">
    <h1>Envios Recentes</h1>
    <div class="radio-inputs">
        <label class="radio">
          <input type="radio" name="radio" />
          <span class="name">Mês</span>
        </label>
        <label class="radio">
          <input type="radio" name="radio" />
          <span class="name">Semana</span>
        </label>
        <label class="radio">
          <input type="radio" name="radio" checked="" />
          <span class="name">Hoje</span>
        </label>
    </div>
</div>

<div class="filtro-formulario">
    <form action="">
        <div class="form-group-estoque">
            <label for="filtrar-nome">Nome</label>
            <input type="text" id="filtrar-nome" name="filtrar-nome" placeholder="filtrar nome" />
            <label for="filtrar-email">Email</label>
            <input type="email" id="filtrar-email" name="filtrar-email" placeholder="filtrar modelo" />
            <label for="filtrar-id">ID Order</label>
            <input type="text" id="filtrar-id" name="filtrar-id" placeholder="filtrar nº" />
            <label for="text">Produto</label>
            <input type="text" id="filtrar-produto" name="filtrar-produto" placeholder="filtrar produto" />
            <input class="form-botao-limpar" type="submit" value="Limpar" />
            <input class="form-botao-buscar" type="submit" value="Buscar" />
        </div>
    </form>
</div>



<div class="envios-container">
    <table class="tabela-envios">
        <h1 class="envio-titulo-adm">Envios</h1>
        <tbody id="envios-tbody">
            <tr>
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

            <!-- Conteúdo PHP original removido para foco no exemplo -->
            <?php 
                for($x = 0; $x < 3; $x++){
                    echo'
                    <tr class="envios-information">
                        <td>990 - 132</td>
                        <td id="envios-bold">TV 14 Inch Gede</td>
                        <td>Leticia</td>
                        <td><div class="status-completo"><p>Completo</p></div></td>
                        <td><div class="table-data"><p>21 de Março 2025</p><p>00:28</p></div></td>
                        <td>23 de Março, 2025</td>
                        <td id="envios-bold">R$190.09</td>
                        <td>
                            <form class="etapa-form">
                                <select>
                                    <option value="ativo">Ativo</option>
                                    <option value="cancelado">Cancelado</option>
                                    <option value="pendente">Pendente</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal para adicionar envio -->
<div id="modal-adicionar-envio" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Adicionar Novo Envio</h2>
        <form id="form-adicionar-envio">
            <label for="input-id-order">Id Order</label>
            <input type="text" id="input-id-order" name="idOrder" required />

            <label for="input-produto">Produto</label>
            <input type="text" id="input-produto" name="produto" required />

            <label for="input-cliente">Cliente</label>
            <input type="text" id="input-cliente" name="cliente" required />

            <label for="select-status">Status</label>
            <select id="select-status" name="status" required>
                <option value="Completo">Completo</option>
                <option value="Andamento">Andamento</option>
                <option value="Rejeitado">Rejeitado</option>
            </select>

            <label for="input-data-pedido">Data do Pedido</label>
            <input type="date" id="input-data-pedido" name="dataPedido" required />

            <label for="input-prazo">Prazo</label>
            <input type="date" id="input-prazo" name="prazo" required />

            <label for="input-preco">Preço (R$)</label>
            <input type="number" id="input-preco" name="preco" step="0.01" min="0" required />

            <label for="select-etapa">Etapa</label>
            <select id="select-etapa" name="etapa" required>
                <option value="Ativo">Ativo</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Pendente">Pendente</option>
            </select>

            <button class="botaoenviar" type="submit">Adicionar</button>
        </form>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?>

<script>
    // Elementos
    const btnAbrirModal = document.querySelector('.btn-adicionar-envio');
    const modal = document.getElementById('modal-adicionar-envio');
    const spanFechar = modal.querySelector('.close-modal');
    const form = document.getElementById('form-adicionar-envio');
    const tbody = document.getElementById('envios-tbody');

    // Abrir modal
    btnAbrirModal.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    // Fechar modal ao clicar no X
    spanFechar.addEventListener('click', () => {
        modal.style.display = 'none';
        form.reset();
    });

    // Fechar modal ao clicar fora do conteúdo
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            form.reset();
        }
    });

    // Função para criar o HTML da linha nova conforme o status e etapa
    function criarStatusDiv(status) {
        let className = '';
        if(status.toLowerCase() === 'completo') className = 'status-completo';
        else if(status.toLowerCase() === 'andamento') className = 'status-andamento';
        else if(status.toLowerCase() === 'rejeitado') className = 'status-rejeitado';
        else className = 'status-completo'; // default

        return `<div class="${className}"><p>${status}</p></div>`;
    }

    // Evento submit do formulário
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        // Pegar valores do formulário
        const idOrder = form.idOrder.value.trim();
        const produto = form.produto.value.trim();
        const cliente = form.cliente.value.trim();
        const status = form.status.value;
        const dataPedidoRaw = form.dataPedido.value;
        const prazoRaw = form.prazo.value;
        const preco = parseFloat(form.preco.value).toFixed(2);
        const etapa = form.etapa.value;

        // Formatar data para o formato exibido (ex: 21 de Março 2025)
        const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

        const dataPedidoDate = new Date(dataPedidoRaw);
        const prazoDate = new Date(prazoRaw);

        const dataPedidoFormat = `${dataPedidoDate.getDate()} de ${meses[dataPedidoDate.getMonth()]} ${dataPedidoDate.getFullYear()}`;
        const horaPedidoFormat = dataPedidoDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

        const prazoFormat = `${prazoDate.getDate()} de ${meses[prazoDate.getMonth()]}, ${prazoDate.getFullYear()}`;

        // Criar nova linha da tabela
        const novaLinha = document.createElement('tr');
        novaLinha.classList.add('envios-information');
        novaLinha.innerHTML = `
            <td>${idOrder}</td>
            <td id="envios-bold">${produto}</td>
            <td>${cliente}</td>
            <td>${criarStatusDiv(status)}</td>
            <td>
                <div class="table-data">
                    <p>${dataPedidoFormat}</p>
                    <p>${horaPedidoFormat}</p>
                </div>
            </td>
            <td>${prazoFormat}</td>
            <td id="envios-bold">R$${preco}</td>
            <td>
                <form class="etapa-form">
                    <select>
                        <option value="ativo" ${etapa.toLowerCase() === 'ativo' ? 'selected' : ''}>Ativo</option>
                        <option value="cancelado" ${etapa.toLowerCase() === 'cancelado' ? 'selected' : ''}>Cancelado</option>
                        <option value="pendente" ${etapa.toLowerCase() === 'pendente' ? 'selected' : ''}>Pendente</option>
                    </select>
                </form>
            </td>
        `;

        // Adicionar nova linha na tabela
        tbody.appendChild(novaLinha);

        // Fechar modal e resetar formulário
        modal.style.display = 'none';
        form.reset();
    });
</script>

</body>
</html>