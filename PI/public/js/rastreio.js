// public/js/rastreio.js

document.addEventListener('DOMContentLoaded', function() {
    // ... (função toggleDetalhes, sem alterações) ...

    const cancelarButtons = document.querySelectorAll('.rastreio-cancelar-botao');
    cancelarButtons.forEach(button => {
        button.addEventListener('click', function() {
            const pedidoId = this.dataset.idPedido;

            if (confirm('Tem certeza que deseja cancelar o pedido ' + pedidoId + '?')) {
                // Caminho absoluto: Ajustado para o seu setup
                fetch('/Tweeb-2025/PI/App/user/Controllers/cancelar_pedido.php', { 
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=cancelar_pedido&id_pedido=${pedidoId}`
                })
                .then(response => {
                    console.log("Resposta bruta do servidor:", response); //
                    return response.text().then(text => { //
                        console.log("Conteúdo da resposta (texto):", text); //
                        try {
                            return JSON.parse(text); //
                        } catch (e) {
                            console.error("Erro ao parsear JSON:", e); //
                            throw new SyntaxError("Erro de sintaxe JSON: " + e.message + " - Resposta: " + text); //
                        }
                    });
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        window.location.reload();
                    } else {
                        alert('Erro ao cancelar pedido: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Erro na requisição ou parsing JSON:', error); //
                    alert('Erro de comunicação ou resposta inválida do servidor. Verifique o console do navegador para detalhes.');
                });
            }
        });
    });
});