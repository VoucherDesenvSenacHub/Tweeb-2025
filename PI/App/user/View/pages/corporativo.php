<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano Corporativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="Planos_corporativos">
<?php include __DIR__.'/../../../../includes/navbar.php'; ?>
    <div class="banner_corporativo">
        <img src="../../../../public/assets/img/3 3.png" alt="">
    </div>
    
    <div class="container_corporativo">
        <div class="card_corporativo">
            <h2>Escritório</h2>
            <p class="Preco_corporativo"> 2700 <small>Unidade</small></p>
            <br>
            <p><span>Mínimo de compra: 30 PCs</span></p>
            <br>
            <a href="#" class="btn_corporativo"><span>Começar</span></a>
            <br><br>
            <h3>CARACTERÍSTICAS</h3>
            <span>Tudo o que essa opção fornece</span>
            <br><br>
            <ul>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> Ideal para Desempenho de Performance regular</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> Intel Core i3 ou AMD Ryzen 3</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> Bateria com 8 horas de autonomia</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> Sistema Operacional: Windows 10/11 ou Linux</li>
            </ul>
        </div>
        <div class="card_corporativo popular_corporativo">
            <div class="popular-label_corporativo">MAIS POPULAR</div>
            <h2 class="Preco_corporativo-texto">Gerenciamento</h2>
            <p class="Preco_corporativo-preco">R$ 4500</p>
            <br>
            <p>Mínimo de compra: 10 PCs</p>
            <br>
            <a href="#" class="btn_corporativo"><span>Começar</span></a>
            <br><br>
            <h3>CARACTERÍSTICAS</h3>
            <span>Tudo o que essa opção fornece</span>
            <br><br>
            <ul>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check i2"></i> Intel Core i5 ou AMD Ryzen 5</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check i2"></i> Bateria com 10 horas de autonomia</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check i2"></i> Sistema Operacional Estável com SSD 512GB</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check i2"></i> ideal para uso versátil: jogos ou até Sistemas ERP </li>
            </ul>
        </div>
        <div class="card_corporativo">
            <h2>Edição e Criação</h2>
            <p class="Preco_corporativo">R$ 8000</p>
            <br>
            <p><span>Mínimo de compra: 10 PCs</span></p>
            <br>
            <a href="#" class="btn_corporativo"><span class="'botao-comecar">Começar</span></a>
            <br><br>
            <h3>CARACTERÍSTICAS</h3>
            <span>Tudo o que essa opção fornece</span>
            <br><br>
            <ul>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> Desempenho de alta Performance</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> Ideal para uso de softwares 3D e edição </li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> Intel Core i7/i9 ou AMD Ryzen 7/9</li>
                <li class="checklist-corporativo"><i class="fa-regular fa-circle-check"></i> NVIDIA GeForce RTX ou AMD Radeon RX</li>
            </ul>
        </div>
    </div>

    <section class="form-section_corporativo">
        <form class="form_corporativo">
            <div class="form-group_corporativo">
                <label for="name">Nome</label>
                <input type="text" id="name" placeholder="Lara Castro">
            </div>
            <div class="form-group_corporativo">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="email@empresa.com">
            </div>
            <div class="form-group_corporativo">
                <label for="phone">Telefone</label>
                <input type="text" id="phone" placeholder="(99) 99999-9999">
            </div>
            <div class="form-group_corporativo">
                <label for="name">Empresa</label>
                <input type="text" id="name" placeholder="Corporação">
            </div>
            <div class="form-group_corporativo">
                <label for="employees">Itens</label>
                <input type="number" id="employees" placeholder="10">
            </div>
            <div class="form-group_corporativo">
                <label for="employees">Número de funcionários</label>
                <input type="number" id="employees" placeholder="10">
            </div>
            <div class="form-group_corporativo">
                <label for="description">Descrição das atividades</label>
                <textarea id="description" placeholder="Digite sua mensagem"></textarea>
            </div>
           
        </form>
    </section>
    <div class="button-orcamento_corporativo">
                <button class="btn2_corporativo">Enviar Orçamento</button>
            </div>
<?php include __DIR__.'/../../../../includes/voltar-ao-topo.php'; ?>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>             

</body>
</html>
