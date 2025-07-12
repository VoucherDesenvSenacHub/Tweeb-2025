// pagamento-pix.js
// Lógica JavaScript para a página de pagamento PIX.

document.addEventListener('DOMContentLoaded', function() {
    console.log('JavaScript da página de pagamento PIX carregado!');
    
    let pedidoCriado = false;
    let pagamentoVerificado = false;

    // Referências aos elementos do DOM
    const statusElement = document.getElementById('status-pagamento');
    const loadingElement = document.getElementById('loading-spinner');
    const btnFinalizar = document.getElementById('btn-finalizar');

    console.log('Elementos encontrados:', {
        statusElement: statusElement,
        loadingElement: loadingElement,
        btnFinalizar: btnFinalizar
    });

    // Função para criar o pedido via AJAX
    function criarPedido() {
        console.log('Iniciando criação do pedido...');
        statusElement.textContent = 'Aguardando pagamento...';
        loadingElement.style.display = 'block';

        fetch('/Tweeb-2025/PI/App/user/Controllers/PagamentoPixController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=criar_pedido'
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do servidor:', data);
            loadingElement.style.display = 'none'; // Esconde o spinner
            if (data.success) {
                pedidoCriado = true;
                console.log('Pedido criado:', data.id_pedido);
                statusElement.textContent = 'Aguardando pagamento...';
                statusElement.style.color = '#333'; // Cor padrão
                
                // Inicia a simulação de pagamento aprovado após 3 segundos
                console.log('Iniciando timer de 3 segundos para aprovação automática...');
                setTimeout(() => {
                    console.log('Timer concluído! Aprovando pagamento...');
                    atualizarStatusUI('Pagamento aprovado!', '#28a745', true);
                }, 3000); // 3 segundos
            } else {
                statusElement.textContent = 'Erro ao criar pedido.';
                statusElement.style.color = 'red';
                console.error('Erro ao criar pedido:', data.message);
            }
        })
        .catch(error => {
            loadingElement.style.display = 'none';
            statusElement.textContent = 'Erro de rede ao criar pedido.';
            statusElement.style.color = 'red';
            console.error('Erro:', error);
            alert('Erro ao criar pedido. Verifique o console para mais detalhes.');
        });
    }

    // Função auxiliar para atualizar a UI do status
    function atualizarStatusUI(message, color, isVerified) {
        console.log('Atualizando UI:', { message, color, isVerified });
        statusElement.textContent = message;
        statusElement.style.color = color;
        loadingElement.style.display = 'none';
        pagamentoVerificado = isVerified;
        if (isVerified) {
            btnFinalizar.style.display = 'block';
            console.log('Botão Finalizar Compra exibido!');
        } else {
            btnFinalizar.style.display = 'none';
        }
    }

    // Função para copiar a chave PIX (fictícia)
    function copiarChavePix() {
        const chavePix = 'tweeb.pix@empresa.com.br'; // Chave fictícia
        
        const tempInput = document.createElement('textarea');
        tempInput.value = chavePix;
        document.body.appendChild(tempInput);
        tempInput.select();
        try {
            document.execCommand('copy');
            alert('Chave PIX copiada! Cole no seu aplicativo de banco para simular o pagamento.');
        } catch (err) {
            console.error('Erro ao copiar chave PIX:', err);
            alert('Erro ao copiar chave PIX. Tente copiar manualmente: ' + chavePix);
        } finally {
            document.body.removeChild(tempInput);
        }
    }

    // Atribui as funções aos botões
    document.getElementById('btn-copiar-pix').addEventListener('click', copiarChavePix);
    document.getElementById('btn-finalizar').addEventListener('click', function() {
        if (!pagamentoVerificado) {
            alert('Aguarde a confirmação do pagamento para finalizar a compra.');
            return;
        }
        fetch('/Tweeb-2025/PI/App/user/Controllers/PagamentoPixController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=finalizar_compra'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Compra finalizada com sucesso! Seu pedido foi confirmado.');
                window.location.href = 'confirmacao-compra.php?id_pedido=' + data.id_pedido;
            } else {
                alert('Erro ao finalizar compra: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao finalizar compra. Verifique o console para mais detalhes.');
        });
    });

    // Lógica do Modal de Cancelamento
    const btnCancelarPedido = document.getElementById('btn-cancelar-pedido');
    const modalCancelamento = document.getElementById('modal-cancelamento');
    const btnConfirmarCancelamento = document.getElementById('confirmar-cancelamento');
    const btnFecharModalCancelamento = document.getElementById('fechar-modal-cancelamento');

    btnCancelarPedido.addEventListener('click', function() {
        modalCancelamento.style.display = 'flex'; 
    });

    btnFecharModalCancelamento.addEventListener('click', function() {
        modalCancelamento.style.display = 'none'; 
    });

    btnConfirmarCancelamento.addEventListener('click', function() {
        modalCancelamento.style.display = 'none';

        fetch('/Tweeb-2025/PI/App/user/Controllers/PagamentoPixController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=cancelar_pedido'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Pedido cancelado com sucesso! O estorno será realizado automaticamente.');
                window.location.href = 'pedidos-cancelados.php'; 
            } else {
                alert('Erro ao cancelar pedido: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao cancelar pedido. Verifique o console para mais detalhes.');
        });
    });

    // Inicia o processo de criação do pedido ao carregar a página
    criarPedido();
});
