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
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Cancelados</title>
</head>
<body class="body-pcancelados">

<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
    <div class="container-pcancelados">
        <h2 class="titulo-pcancelados">Pedidos Cancelados</h2>

        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/Iphone 14 pro 1.png" alt="Notebook" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Notebook Samsung Book Intel Celeron</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$2.754,99</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>

        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Mouse Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Mouse Gamer Sem Fio Logitech G PRO Wireless</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>

        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/gabinete-pcancelados.png" alt="Gabinete Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Gabinete Gamer Rise Mode Glass</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Mouse Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Mouse Gamer Sem Fio Logitech G PRO Wireless</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Mouse Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Mouse Gamer Sem Fio Logitech G PRO Wireless</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Mouse Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Mouse Gamer Sem Fio Logitech G PRO Wireless</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Mouse Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Mouse Gamer Sem Fio Logitech G PRO Wireless</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Mouse Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Mouse Gamer Sem Fio Logitech G PRO Wireless</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        <div class="pedido-pcancelados">
            <div class="info-produto-pcancelados">
                <img src="../../../../public/assets/img/mouse-pcancelados.png" alt="Mouse Gamer" class="imagem-pcancelados">
                <div>
                    <p class="nome-produto-pcancelados">Mouse Gamer Sem Fio Logitech G PRO Wireless</p>
                    <p class="codigo-produto-pcancelados">#25139526913984</p>
                </div>
                <input type="number" class="quantidade-pcancelados" value="1" readonly>
            </div>

            <div class="detalhes-pcancelados" style="display: none;">
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            </div>

            <p class="data-cancelamento-pcancelados">Pedido Cancelado em 12/07/2024</p>
            
            <button class="toggle-pcancelados">
                <img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">
            </button>
        </div>
        
    </div>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
