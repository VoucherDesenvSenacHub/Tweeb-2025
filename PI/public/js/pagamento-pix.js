// pagamento-pix.js
// Lógica JavaScript para a página de pagamento PIX.

document.addEventListener('DOMContentLoaded', function() {
    let pedidoCriado = false;
    let pagamentoVerificado = false;

    // Referências aos elementos do DOM
    const statusElement = document.getElementById('status-pagamento');
    const loadingElement = document.getElementById('loading-spinner');
    const btnFinalizar = document.getElementById('btn-finalizar');

    // Função para criar o pedido via AJAX
    function criarPedido() {
        statusElement.textContent = 'Criando pedido...';
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
            loadingElement.style.display = 'none'; // Esconde o spinner
            if (data.success) {
                pedidoCriado = true;
                console.log('Pedido criado:', data.id_pedido);
                statusElement.textContent = 'Aguardando pagamento...';
                statusElement.style.color = '#333'; // Cor padrão
                
                // Inicia a simulação de pagamento aprovado após 5 segundos
                setTimeout(() => {
                    atualizarStatusUI('Pagamento aprovado!', '#28a745', true);
                }, 5000); // 5 segundos
            } else {
                statusElement.textContent = 'Erro ao criar pedido.';
                statusElement.style.color = 'red';
                // Removido o alert aqui para não bloquear a UI
                // alert('Erro ao criar pedido: ' + data.message); 
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
        statusElement.textContent = message;
        statusElement.style.color = color;
        loadingElement.style.display = 'none';
        pagamentoVerificado = isVerified;
        if (isVerified) {
            btnFinalizar.style.display = 'block';
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
