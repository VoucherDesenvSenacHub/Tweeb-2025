document.querySelectorAll('.item').forEach(item => {
  const minusBtn = item.querySelector('.minus');
  const plusBtn = item.querySelector('.plus');
  const numberSpan = item.querySelector('.number');
  const priceSpan = item.querySelector('.preco');

  // Pegando o preço inicial do item e convertendo para número
  const pricePerUnit = parseFloat(priceSpan.textContent.replace('R$', '').replace('.', '').replace(',', '.'));

  function updatePrice(quantity) {
      // Atualiza o preço baseado na quantidade
      const totalPrice = pricePerUnit * quantity;
      priceSpan.textContent = `R$ ${totalPrice.toLocaleString('pt-BR', { minimumFractionDigits: 2 })}`;
  }

  minusBtn.addEventListener('click', () => {
      let currentValue = parseInt(numberSpan.textContent, 10);
      if (currentValue > 1) {
          numberSpan.textContent = currentValue - 1;
          updatePrice(currentValue - 1);
      }
  });

  plusBtn.addEventListener('click', () => {
      let currentValue = parseInt(numberSpan.textContent, 10);
      numberSpan.textContent = currentValue + 1;
      updatePrice(currentValue + 1);
  });
});

// ========== ADICIONAR AO CARRINHO (GLOBAL) ==========

document.addEventListener('DOMContentLoaded', function() {
    // Função para atualizar contador do carrinho na navbar
    function atualizarContadorCarrinho() {
        fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php?action=contar_itens')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let contador = document.querySelector('.carrinho-contador');
                if (!contador) {
                    // Cria o contador se não existir
                    const nav = document.querySelector('.bx-cart-alt')?.parentElement;
                    if (nav) {
                        contador = document.createElement('span');
                        contador.className = 'carrinho-contador';
                        contador.style.position = 'absolute';
                        contador.style.top = '0';
                        contador.style.right = '0';
                        contador.style.background = 'red';
                        contador.style.color = 'white';
                        contador.style.borderRadius = '50%';
                        contador.style.fontSize = '12px';
                        contador.style.width = '18px';
                        contador.style.height = '18px';
                        contador.style.display = 'flex';
                        contador.style.alignItems = 'center';
                        contador.style.justifyContent = 'center';
                        nav.style.position = 'relative';
                        nav.appendChild(contador);
                    }
                }
                if (contador) {
                    contador.textContent = data.contagem;
                    contador.style.display = data.contagem > 0 ? 'flex' : 'none';
                }
            }
        })
        .catch(error => {
            console.error('Erro ao atualizar contador:', error);
        });
    }

    atualizarContadorCarrinho(); // Atualiza ao carregar a página

    // Evento de clique para todos os botões de adicionar ao carrinho
    document.querySelectorAll('.add-carrinho-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Evita propagação para outros listeners globais
            const idProduto = this.getAttribute('data-id');
            fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=adicionar&id_produto=' + encodeURIComponent(idProduto) + '&quantidade=1'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    atualizarContadorCarrinho();
                    alert('Produto adicionado ao carrinho!');
                } else {
                    if (data.message && data.message.includes('logado')) {
                        window.location.href = '/Tweeb-2025/PI/app/user/view/pages/login.php';
                    } else {
                        alert('Erro ao adicionar ao carrinho: ' + (data.message || 'Erro desconhecido.'));
                    }
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao adicionar ao carrinho.');
            });
        });
    });
});
