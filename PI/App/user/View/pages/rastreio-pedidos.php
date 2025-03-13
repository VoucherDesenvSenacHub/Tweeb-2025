<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreio</title>
</head>
<body class="body-rastreio">
<?php include __DIR__.'/../../../../includes/navbar.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-User.php'; ?>

    <div class="container-rastreio">
        <!-- Pedido 1 -->
        <div class="pedido-rastreio">
            <div class="header-rastreio">
                <p class="id-rastreio">Ordem ID: 9632145632152</p>
                <div class="rastreio-botoes">
                    <button class="rastreio-botao" onclick="toggleDetalhes(this)">Acompanhar Pedido</button>
                    <button class="rastreio-icone">
                        <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone">
                    </button>
                </div>
            </div>
            
            <div class="rastreio-info-entrega">
                <p class="data-rastreio">Data: 01 de janeiro</p>
                <img src="../../../../public/assets/img/truck-tick.png" alt="Ícone Caminhão" class="rastreio-truck">
                <p class="entrega-prevista-rastreio verde">Entrega prevista: 16 de Janeiro</p>
            </div>
        </div>

        <!-- div do rastreio -->
        <div class="rastreio-status">
            <div class="rastreio-linha">
                <div class="rastreio-etapa ativo">
                    <p class="rastreio-status-texto">Pagamento</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qua, 1 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Enviado</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Ter, 06 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">A caminho</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qui, 10 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Entregue</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Sex, 16 de Agosto</p>
                </div>
            </div>
            <div class="line"></div>
        </div>

        <!-- div do item pedido -->
        <div class="rastreio-item">
            <img src="../../../../public/assets/img/pedido-enviado1.png" alt="Placa de vídeo GTX 1660" class="rastreio-img">
            <div class="rastreio-info-preco">
                <div class="rastreio-info">
                    <p class="rastreio-nome">Placa de vídeo GTX 1660</p>
                    <p class="rastreio-detalhes">GDDR6 | 6GB | 192-BIT</p>
                </div>
                <div class="rastreio-preco">
                    <h3 class="rastreio-valor"><strong>R$ 1.399,99</strong></h3>
                    <h3 class="rastreio-quantidade">Quantidade: 1</h3>
                </div>
            </div>
        </div>
        
        <div class="rastreio-pagamento-entrega">
            <div class="rastreio-pagamento-entrega-flex">
                <div class="rastreio-pagamento">
                    <h3>Pagamento</h3>
                    <p class="rastreio-metodo-pagamento">PIX</p>
                </div>
                <div class="rastreio-entrega">
                    <h3>Entrega</h3>
                    <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                    <p class="rastreio-endereco">Rua Capiatá, nº 240</p>
                    <p class="rastreio-bairro-cidade">Novos Estados, Campo Grande - MS</p>
                    <p class="rastreio-cep">CEP 79034331</p>
                </div>
            </div>
        </div>
        
        
        <div class="rastreio-resumo">
            <p>Subtotal <span>R$ 6.599,99</span></p>
            <p>Imposto estimado <span>R$ 50</span></p>
            <p>Frete <span>Grátis</span></p>
            <p>Cupons <span>R$ 0,00</span></p>
            <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ 6.649,97</strong></span></p>
        </div>
    </div>

    <div class="container-rastreio">
        <!-- Pedido 1 -->
        <div class="pedido-rastreio">
            <div class="header-rastreio">
                <p class="id-rastreio">Ordem ID: 9632145632152</p>
                <div class="rastreio-botoes">
                    <button class="rastreio-botao" onclick="toggleDetalhes(this)">Acompanhar Pedido</button>
                    <button class="rastreio-icone">
                        <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone">
                    </button>
                </div>
            </div>
            
            <div class="rastreio-info-entrega">
                <p class="data-rastreio">Data: 01 de janeiro</p>
                <img src="../../../../public/assets/img/truck-tick.png" alt="Ícone Caminhão" class="rastreio-truck">
                <p class="entrega-prevista-rastreio verde">Entrega prevista: 16 de Janeiro</p>
            </div>
        </div>

        <!-- div do rastreio -->
        <div class="rastreio-status">
            <div class="rastreio-linha">
                <div class="rastreio-etapa ativo">
                    <p class="rastreio-status-texto">Pagamento</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qua, 1 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Enviado</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Ter, 06 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">A caminho</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qui, 10 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Entregue</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Sex, 16 de Agosto</p>
                </div>
            </div>
            <div class="line"></div>
        </div>

        <!-- div do item pedido -->
        <div class="rastreio-item">
            <img src="../../../../public/assets/img/pedido-enviado1.png" alt="Placa de vídeo GTX 1660" class="rastreio-img">
            <div class="rastreio-info-preco">
                <div class="rastreio-info">
                    <p class="rastreio-nome">Placa de vídeo GTX 1660</p>
                    <p class="rastreio-detalhes">GDDR6 | 6GB | 192-BIT</p>
                </div>
                <div class="rastreio-preco">
                    <h3 class="rastreio-valor"><strong>R$ 1.399,99</strong></h3>
                    <h3 class="rastreio-quantidade">Quantidade: 1</h3>
                </div>
            </div>
        </div>
        
        <div class="rastreio-pagamento-entrega">
            <div class="rastreio-pagamento-entrega-flex">
                <div class="rastreio-pagamento">
                    <h3>Pagamento</h3>
                    <p class="rastreio-metodo-pagamento">PIX</p>
                </div>
                <div class="rastreio-entrega">
                    <h3>Entrega</h3>
                    <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                    <p class="rastreio-endereco">Rua Capiatá, nº 240</p>
                    <p class="rastreio-bairro-cidade">Novos Estados, Campo Grande - MS</p>
                    <p class="rastreio-cep">CEP 79034331</p>
                </div>
            </div>
        </div>
        
        
        <div class="rastreio-resumo">
            <p>Subtotal <span>R$ 6.599,99</span></p>
            <p>Imposto estimado <span>R$ 50</span></p>
            <p>Frete <span>Grátis</span></p>
            <p>Cupons <span>R$ 0,00</span></p>
            <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ 6.649,97</strong></span></p>
        </div>
    </div>

    <div class="container-rastreio">
        <!-- Pedido 1 -->
        <div class="pedido-rastreio">
            <div class="header-rastreio">
                <p class="id-rastreio">Ordem ID: 9632145632152</p>
                <div class="rastreio-botoes">
                    <button class="rastreio-botao" onclick="toggleDetalhes(this)">Acompanhar Pedido</button>
                    <button class="rastreio-icone">
                        <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone">
                    </button>
                </div>
            </div>
            
            <div class="rastreio-info-entrega">
                <p class="data-rastreio">Data: 01 de janeiro</p>
                <img src="../../../../public/assets/img/truck-tick.png" alt="Ícone Caminhão" class="rastreio-truck">
                <p class="entrega-prevista-rastreio verde">Entrega prevista: 16 de Janeiro</p>
            </div>
        </div>

        <!-- div do rastreio -->
        <div class="rastreio-status">
            <div class="rastreio-linha">
                <div class="rastreio-etapa ativo">
                    <p class="rastreio-status-texto">Pagamento</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qua, 1 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Enviado</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Ter, 06 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">A caminho</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qui, 10 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Entregue</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Sex, 16 de Agosto</p>
                </div>
            </div>
            <div class="line"></div>
        </div>

        <!-- div do item pedido -->
        <div class="rastreio-item">
            <img src="../../../../public/assets/img/pedido-enviado1.png" alt="Placa de vídeo GTX 1660" class="rastreio-img">
            <div class="rastreio-info-preco">
                <div class="rastreio-info">
                    <p class="rastreio-nome">Placa de vídeo GTX 1660</p>
                    <p class="rastreio-detalhes">GDDR6 | 6GB | 192-BIT</p>
                </div>
                <div class="rastreio-preco">
                    <h3 class="rastreio-valor"><strong>R$ 1.399,99</strong></h3>
                    <h3 class="rastreio-quantidade">Quantidade: 1</h3>
                </div>
            </div>
        </div>
        
        <div class="rastreio-pagamento-entrega">
            <div class="rastreio-pagamento-entrega-flex">
                <div class="rastreio-pagamento">
                    <h3>Pagamento</h3>
                    <p class="rastreio-metodo-pagamento">PIX</p>
                </div>
                <div class="rastreio-entrega">
                    <h3>Entrega</h3>
                    <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                    <p class="rastreio-endereco">Rua Capiatá, nº 240</p>
                    <p class="rastreio-bairro-cidade">Novos Estados, Campo Grande - MS</p>
                    <p class="rastreio-cep">CEP 79034331</p>
                </div>
            </div>
        </div>
        
        
        <div class="rastreio-resumo">
            <p>Subtotal <span>R$ 6.599,99</span></p>
            <p>Imposto estimado <span>R$ 50</span></p>
            <p>Frete <span>Grátis</span></p>
            <p>Cupons <span>R$ 0,00</span></p>
            <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ 6.649,97</strong></span></p>
        </div>
    </div>
    <div class="container-rastreio">
        <!-- Pedido 1 -->
        <div class="pedido-rastreio">
            <div class="header-rastreio">
                <p class="id-rastreio">Ordem ID: 9632145632152</p>
                <div class="rastreio-botoes">
                    <button class="rastreio-botao" onclick="toggleDetalhes(this)">Acompanhar Pedido</button>
                    <button class="rastreio-icone">
                        <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone">
                    </button>
                </div>
            </div>
            
            <div class="rastreio-info-entrega">
                <p class="data-rastreio">Data: 01 de janeiro</p>
                <img src="../../../../public/assets/img/truck-tick.png" alt="Ícone Caminhão" class="rastreio-truck">
                <p class="entrega-prevista-rastreio verde">Entrega prevista: 16 de Janeiro</p>
            </div>
        </div>

        <!-- div do rastreio -->
        <div class="rastreio-status">
            <div class="rastreio-linha">
                <div class="rastreio-etapa ativo">
                    <p class="rastreio-status-texto">Pagamento</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qua, 1 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Enviado</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Ter, 06 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">A caminho</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qui, 10 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Entregue</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Sex, 16 de Agosto</p>
                </div>
            </div>
            <div class="line"></div>
        </div>

        <!-- div do item pedido -->
        <div class="rastreio-item">
            <img src="../../../../public/assets/img/pedido-enviado1.png" alt="Placa de vídeo GTX 1660" class="rastreio-img">
            <div class="rastreio-info-preco">
                <div class="rastreio-info">
                    <p class="rastreio-nome">Placa de vídeo GTX 1660</p>
                    <p class="rastreio-detalhes">GDDR6 | 6GB | 192-BIT</p>
                </div>
                <div class="rastreio-preco">
                    <h3 class="rastreio-valor"><strong>R$ 1.399,99</strong></h3>
                    <h3 class="rastreio-quantidade">Quantidade: 1</h3>
                </div>
            </div>
        </div>
        
        <div class="rastreio-pagamento-entrega">
            <div class="rastreio-pagamento-entrega-flex">
                <div class="rastreio-pagamento">
                    <h3>Pagamento</h3>
                    <p class="rastreio-metodo-pagamento">PIX</p>
                </div>
                <div class="rastreio-entrega">
                    <h3>Entrega</h3>
                    <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                    <p class="rastreio-endereco">Rua Capiatá, nº 240</p>
                    <p class="rastreio-bairro-cidade">Novos Estados, Campo Grande - MS</p>
                    <p class="rastreio-cep">CEP 79034331</p>
                </div>
            </div>
        </div>
        
        
        <div class="rastreio-resumo">
            <p>Subtotal <span>R$ 6.599,99</span></p>
            <p>Imposto estimado <span>R$ 50</span></p>
            <p>Frete <span>Grátis</span></p>
            <p>Cupons <span>R$ 0,00</span></p>
            <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ 6.649,97</strong></span></p>
        </div>
    </div>
    <div class="container-rastreio">
        <!-- Pedido 1 -->
        <div class="pedido-rastreio">
            <div class="header-rastreio">
                <p class="id-rastreio">Ordem ID: 9632145632152</p>
                <div class="rastreio-botoes">
                    <button class="rastreio-botao" onclick="toggleDetalhes(this)">Acompanhar Pedido</button>
                    <button class="rastreio-icone">
                        <img src="../../../../public/assets/img/nota-rastreio.png" alt="Ícone">
                    </button>
                </div>
            </div>
            
            <div class="rastreio-info-entrega">
                <p class="data-rastreio">Data: 01 de janeiro</p>
                <img src="../../../../public/assets/img/truck-tick.png" alt="Ícone Caminhão" class="rastreio-truck">
                <p class="entrega-prevista-rastreio verde">Entrega prevista: 16 de Janeiro</p>
            </div>
        </div>

        <!-- div do rastreio -->
        <div class="rastreio-status">
            <div class="rastreio-linha">
                <div class="rastreio-etapa ativo">
                    <p class="rastreio-status-texto">Pagamento</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qua, 1 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Enviado</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Ter, 06 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">A caminho</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Qui, 10 de Agosto</p>
                </div>
                <div class="rastreio-etapa">
                    <p class="rastreio-status-texto">Entregue</p>
                    <span class="rastreio-bolinha"></span>
                    <p class="rastreio-data">Sex, 16 de Agosto</p>
                </div>
            </div>
            <div class="line"></div>
        </div>

        <!-- div do item pedido -->
        <div class="rastreio-item">
            <img src="../../../../public/assets/img/pedido-enviado1.png" alt="Placa de vídeo GTX 1660" class="rastreio-img">
            <div class="rastreio-info-preco">
                <div class="rastreio-info">
                    <p class="rastreio-nome">Placa de vídeo GTX 1660</p>
                    <p class="rastreio-detalhes">GDDR6 | 6GB | 192-BIT</p>
                </div>
                <div class="rastreio-preco">
                    <h3 class="rastreio-valor"><strong>R$ 1.399,99</strong></h3>
                    <h3 class="rastreio-quantidade">Quantidade: 1</h3>
                </div>
            </div>
        </div>
        
        <div class="rastreio-pagamento-entrega">
            <div class="rastreio-pagamento-entrega-flex">
                <div class="rastreio-pagamento">
                    <h3>Pagamento</h3>
                    <p class="rastreio-metodo-pagamento">PIX</p>
                </div>
                <div class="rastreio-entrega">
                    <h3>Entrega</h3>
                    <p class="rastreio-endereco-titulo"><strong>Endereço</strong></p>
                    <p class="rastreio-endereco">Rua Capiatá, nº 240</p>
                    <p class="rastreio-bairro-cidade">Novos Estados, Campo Grande - MS</p>
                    <p class="rastreio-cep">CEP 79034331</p>
                </div>
            </div>
        </div>
        
        
        <div class="rastreio-resumo">
            <p>Subtotal <span>R$ 6.599,99</span></p>
            <p>Imposto estimado <span>R$ 50</span></p>
            <p>Frete <span>Grátis</span></p>
            <p>Cupons <span>R$ 0,00</span></p>
            <p class="rastreio-total"><strong>Total</strong> <span><strong>R$ 6.649,97</strong></span></p>
        </div>
    </div>
    
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>
