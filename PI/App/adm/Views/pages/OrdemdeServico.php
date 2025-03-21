<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>

<body class="OrdemSevico21">
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="container-ordem-de-servico21">
<h1 class="ordem-de-servico-h121">Ordem de Serviço</h1>
    <form class="Servico21">
        <div class="Ordem_Servico21">
            <label for="">Número da Os</label>
            <input type="text" name="Numero_da_Os" id="Numero_da_Os"  placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Data de Abertura</label>
            <input type="text" name="Data_de_Abertura" id="Data_de_Abertura"  placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Tipo de equipamento</label>
            <input type="text" name="Tipo_de_equipamento" id="Tipo_de_equipamento" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Nome do Cliente</label>
            <input type="text" name="Nome_do_Cliente" id="Nome_do_Cliente" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Email</label>
            <input type="text" name="Email" id="Email" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Marca e modelo</label>
            <input type="text" name="Marca_e_modelo" id="Marca_e_modelo" placeholder="">
        </div>
       
        <div class="Ordem_Servico21">
            <label for="">Telefone</label>
            <input type="text" name="Telefone" id="Telefone" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Endereço</label>
            <input type="text" name="Endereco" id="Endereco" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">CEP</label>
            <input type="text" name="CEP" id="CEP" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Número de série</label>
            <input type="text" name="Numero_de_série" id="Numero_de_série"  placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Acessórios entregues</label>
            <input type="text" name="Acessorios_entregues" id="Acessorios_entregues"  placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Relato do cliente</label>
            <input type="text" name="Relato_do_cliente" id="Relato_do_cliente" placeholder="">
        </div>
       
        <div class="Ordem_Servico21">
            <label for="">Parecer Técnico</label>
            <input type="text" name="Parecer_Tecnico" id="Parecer_Tecnico" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Serviços solicitados</label>
            <input type="text" name="Serviços_solicitados" id="Serviços_solicitados" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Estimativa de custo</label>
            <input type="text" name="Estimativa_de_custo" id="Estimativa_de_custo" placeholder="">
        </div>
       
        <div class="Ordem_Servico21">
            <label for="">Aprovação do Cliente</label>
            <input type="text" name="Aprovação_do_Cliente" id="Aprovação_do_Cliente" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Serviços realizados</label>
            <input type="text" name="Serviços_realizados" id="Serviços_realizados" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Peças substituídas</label>
            <input type="text" name="Peças_substituidas" id="Peças_substituidas" placeholder="">

        </div>
        <div class="Ordem_Servico21">
            <label for="">Testes realizados:</label>
            <input type="text" name="Testes_realizados" id="Testes_realizados" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Data de conclusão</label>
            <input type="text" name="Data_de_conclusao" id="Data_de_conclusao" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="">Observações</label>
            <input type="text" name="Observacoes" id="Observacoes" placeholder="">
        </div>
      
        
    </form>
    <button type="submit" class="btn_ordemServico21">Salvar</button>

</div>

<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 
</body>
</html>
