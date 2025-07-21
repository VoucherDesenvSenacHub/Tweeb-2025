// Função para alternar favorito (compatível com AtivarCoracao)
function toggleFavorito(idProduto, elemento) {
    fetch('/Tweeb-2025/PI/App/user/Controllers/FavoritoController.php?action=toggle&id_produto=' + idProduto, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (data.is_favorito) {
                elemento.src = '/Tweeb-2025/PI/public/assets/img/heart_enabled.png';
                elemento.classList.add('favorito-ativo');
            } else {
                elemento.src = '/Tweeb-2025/PI/public/assets/img/heart_disabled.png';
                elemento.classList.remove('favorito-ativo');
            }
            
            // Mostra notificação simples
            alert(data.message);
        } else {
            console.error('Erro:', data.message);
            alert('Erro ao alterar favoritos');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao alterar favoritos');
    });
}

// Função para verificar se um produto está nos favoritos
function verificarFavorito(idProduto, elemento) {
    fetch('/Tweeb-2025/PI/App/user/Controllers/FavoritoController.php?action=verificar&id_produto=' + idProduto, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (data.is_favorito) {
                elemento.src = '/Tweeb-2025/PI/public/assets/img/heart_enabled.png';
                elemento.classList.add('favorito-ativo');
            } else {
                elemento.src = '/Tweeb-2025/PI/public/assets/img/heart_disabled.png';
                elemento.classList.remove('favorito-ativo');
            }
        }
    })
    .catch(error => {
        console.error('Erro ao verificar favorito:', error);
    });
}

// Função para carregar o estado dos favoritos em uma página
function carregarEstadoFavoritos() {
    const coracoes = document.querySelectorAll('.heart[data-produto-id]');
    
    coracoes.forEach(coracao => {
        const idProduto = coracao.getAttribute('data-produto-id');
        if (idProduto) {
            verificarFavorito(idProduto, coracao);
        }
    });
}

// Função AtivarCoracao modificada para trabalhar com favoritos
function AtivarCoracao(elemento) {
    // Se o elemento tem data-produto-id, usa a função de favoritos
    const idProduto = elemento.getAttribute('data-produto-id');
    if (idProduto) {
        toggleFavorito(idProduto, elemento);
    } else {
        // Comportamento original (apenas visual)
        if (elemento.src.includes('heart_disabled')) {
            elemento.src = '/Tweeb-2025/PI/public/assets/img/heart_enabled.png';
        } else {
            elemento.src = '/Tweeb-2025/PI/public/assets/img/heart_disabled.png';
        }
    }
}

// Event listener para carregar estado dos favoritos quando a página carrega
document.addEventListener('DOMContentLoaded', function() {
    // Carrega o estado dos favoritos
    carregarEstadoFavoritos();
});

// Responsivo para containers de favoritos (mantém o original)
window.addEventListener('load', function () {
    // Seleciona todos os containers com a classe .container-favoritos-5
    const containers = document.querySelectorAll('.container-favoritos-5, .container-favoritos-depto');

    // Função para aplicar o estilo no responsivo
    function aplicarEstilosResponsivos() {
        containers.forEach(container => {
            // Seleciona todos os .produtos-card dentro do container
            const produtosCards = container.querySelectorAll('.produtos-card');

            // Verifica se a largura da tela é menor que 768px
            if (window.innerWidth <= 768) {
                // Aplica display flex e flex-direction column no container
                container.style.display = 'flex';
                container.style.flexDirection = 'column';
                container.style.alignItems = 'center';

                // Aplica os estilos necessários para os produtos-card
                produtosCards.forEach(card => {
                    card.style.width = '300px';
                    card.style.marginBottom = '20px';
                    card.style.boxSizing = 'border-box';
                });
            } else {
                // Se a tela for maior que 768px, usa o layout original
                container.style.display = '';
                container.style.flexDirection = '';
                container.style.alignItems = '';

                // Restaura as propriedades dos produtos-card para o estado original
                produtosCards.forEach(card => {
                    card.style.width = '';
                    card.style.marginBottom = '';
                    card.style.boxSizing = '';
                });
            }
        });
    }

    // Aplica o estilo ao carregar a página
    aplicarEstilosResponsivos();

    // Aplica novamente sempre que a janela for redimensionada
    window.addEventListener('resize', aplicarEstilosResponsivos);
});
