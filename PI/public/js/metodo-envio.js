// metodo-envio.js
// Lógica JavaScript para a página de seleção de método de envio.

document.addEventListener('DOMContentLoaded', function() {
    let metodoEnvioSelecionado = '';
    let valorFrete = 0.00;
    // O valor subtotal será injetado do PHP na página HTML
    const valorSubtotalElement = document.getElementById('valor-subtotal-php');
    let valorSubtotal = parseFloat(valorSubtotalElement.dataset.value) || 0.00;
    let dataAgendada = '';

    // Seleciona o primeiro método de envio por padrão e atualiza os valores
    const primeiroRadio = document.querySelector('input[name="envio"]:checked');
    if (primeiroRadio) {
        metodoEnvioSelecionado = primeiroRadio.value;
        valorFrete = parseFloat(primeiroRadio.dataset.valor) || 0.00;
    }
    atualizarValores(); // Chama para exibir os valores iniciais

    // Atualizar valores quando um método de envio for selecionado
    document.addEventListener('change', function(e) {
        if (e.target.name === 'envio') {
            metodoEnvioSelecionado = e.target.value;
            valorFrete = parseFloat(e.target.dataset.valor) || 0.00;
            
            // Mostrar/ocultar opção de data agendada
            const envioAgendadoCard = document.getElementById('envio-agendado');
            if (metodoEnvioSelecionado === 'Envio Agendado') {
                envioAgendadoCard.style.display = 'flex'; // Usar flex para manter o layout
            } else {
                envioAgendadoCard.style.display = 'none';
                dataAgendada = ''; // Limpa a data agendada se outro método for selecionado
                document.getElementById('selecionar-data').value = ''; // Reseta o select
            }
            
            atualizarValores();
        }
    });

    // Atualizar data agendada
    document.getElementById('selecionar-data').addEventListener('change', function(e) {
        dataAgendada = e.target.value;
    });

    /**
     * Atualiza os valores de frete e total na interface do usuário.
     */
    function atualizarValores() {
        const valorFreteElement = document.getElementById('valor-frete');
        const valorTotalElement = document.getElementById('valor-total');
        
        if (valorFrete > 0) {
            valorFreteElement.textContent = `R$ ${valorFrete.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
        } else {
            valorFreteElement.textContent = 'Grátis';
        }
        
        const valorTotal = valorSubtotal + valorFrete;
        valorTotalElement.textContent = `R$ ${valorTotal.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
    }

    // Avançar para pagamento
    document.getElementById('btn-avancar').addEventListener('click', function() {
        if (!metodoEnvioSelecionado) {
            alert('Selecione um método de envio para continuar.');
            return;
        }
        
        if (metodoEnvioSelecionado === 'Envio Agendado' && !dataAgendada) {
            alert('Selecione uma data para entrega agendada.');
            return;
        }
        
        // Dados a serem enviados para o Controller via AJAX
        const dadosEnvio = {
            metodo: metodoEnvioSelecionado,
            valor: valorFrete,
            data_agendada: dataAgendada // Envia a data agendada
        };
        
        // Enviar dados para o servidor (MetodoEnvioController.php)
        fetch('/Tweeb-2025/PI/App/user/Controllers/MetodoEnvioController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=salvar_envio&' + new URLSearchParams(dadosEnvio)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'pagamento-pix.php'; // Redireciona para a próxima etapa
            } else {
                alert('Erro ao salvar dados de envio: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao processar dados de envio. Verifique o console para mais detalhes.');
        });
    });
});
