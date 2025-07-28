document.addEventListener('DOMContentLoaded', function() {

    const selecionarApiUrl = '/Tweeb-2025/PI/public/api/api_selecionar_produto.php';
    const carregarApiUrl = '/Tweeb-2025/PI/public/api/api_carregar_produtos.php';

    function handleSelecaoClick(event) {
        const botao = event.currentTarget;
        const produtoId = botao.dataset.produtoId;
        const tipoId = botao.dataset.tipoId;

        const formData = new FormData();
        formData.append('produto_id', produtoId);
        formData.append('tipo_id', tipoId);
        formData.append('quantidade', 1);

        fetch(selecionarApiUrl, { method: 'POST', body: formData })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelectorAll('.do-seu-jeito-product.selecionado').forEach(prod => {
                        prod.classList.remove('selecionado');
                        const containerAntigo = prod.querySelector('.container-selecao');
                        if (containerAntigo && containerAntigo.dataset.originalButton) {
                            containerAntigo.innerHTML = containerAntigo.dataset.originalButton;
                        }
                    });

                    const produtoContainer = botao.closest('.do-seu-jeito-product');
                    produtoContainer.classList.add('selecionado');

                    const containerSelecao = botao.parentElement;
                    if (!containerSelecao.dataset.originalButton) {
                        containerSelecao.dataset.originalButton = containerSelecao.innerHTML;
                    }
                    containerSelecao.innerHTML = `<div class="indicador-selecionado"><i class='bx bx-check-circle'></i><span>Selecionado</span></div>`;
                    
                    const linkCategoria = document.querySelector(`.do-seu-jeito-ul-components a[href*="tipo=${tipoId}"]`);
                    if (linkCategoria) linkCategoria.parentElement.classList.add('com-selecao');
                    
                    initializeEventListeners(document.body);
                } else {
                    alert('Erro: ' + data.message);
                }
            });
    }

    function updateRamQuantity(seletor, newQuantity) {
        const produtoId = seletor.dataset.produtoId;
        const tipoId = seletor.dataset.tipoId;

        const formData = new FormData();
        formData.append('produto_id', produtoId);
        formData.append('tipo_id', tipoId);
        formData.append('quantidade', newQuantity);

        fetch(selecionarApiUrl, { method: 'POST', body: formData })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const qtyValueSpan = seletor.querySelector('.qty-value');
                    const decreaseBtn = seletor.querySelector('.btn-qty-decrease');
                    qtyValueSpan.textContent = newQuantity;
                    decreaseBtn.disabled = (newQuantity === 0);

                    document.querySelectorAll('.do-seu-jeito-product').forEach(p => p.classList.remove('selecionado'));
                    document.querySelectorAll('.seletor-quantidade').forEach(sel => {
                        if (sel !== seletor) {
                            sel.querySelector('.qty-value').textContent = '0';
                            sel.querySelector('.btn-qty-decrease').disabled = true;
                        }
                    });

                    const produtoContainer = seletor.closest('.do-seu-jeito-product');
                    const linkCategoria = document.querySelector(`.do-seu-jeito-ul-components a[href*="tipo=${tipoId}"]`);

                    if (newQuantity > 0) {
                        produtoContainer.classList.add('selecionado');
                        if (linkCategoria) linkCategoria.parentElement.classList.add('com-selecao');
                    } else {
                        if (linkCategoria) linkCategoria.parentElement.classList.remove('com-selecao');
                    }
                } else {
                    alert('Erro: ' + data.message);
                }
            });
    }

    function handleVerMaisToggle(event) {
        const produtoContainer = event.currentTarget.closest('.produto-container');
        if (produtoContainer) {
            produtoContainer.classList.toggle('ver-mais-ativo');
        }
    }

    function initializeEventListeners(container) {
        container.querySelectorAll('.botao-selecionar:not(.event-attached)').forEach(botao => {
            botao.classList.add('event-attached');
            botao.addEventListener('click', handleSelecaoClick);
        });

        container.querySelectorAll('.seletor-quantidade:not(.event-attached)').forEach(seletor => {
            seletor.classList.add('event-attached');
            const increaseBtn = seletor.querySelector('.btn-qty-increase');
            const decreaseBtn = seletor.querySelector('.btn-qty-decrease');
            
            increaseBtn.addEventListener('click', () => {
                let currentQty = parseInt(seletor.querySelector('.qty-value').textContent);
                updateRamQuantity(seletor, currentQty + 1);
            });
            decreaseBtn.addEventListener('click', () => {
                let currentQty = parseInt(seletor.querySelector('.qty-value').textContent);
                if (currentQty > 0) {
                    updateRamQuantity(seletor, currentQty - 1);
                }
            });
        });

        container.querySelectorAll('.do-seu-jeito-product-bottom:not(.event-attached)').forEach(trigger => {
            trigger.classList.add('event-attached');
            trigger.addEventListener('click', handleVerMaisToggle);
        });
    }

    initializeEventListeners(document);

    const btnVerMais = document.getElementById('btn-ver-mais');
    if (btnVerMais) {
        btnVerMais.addEventListener('click', function() {
            const botao = this;
            const proximaPagina = parseInt(botao.dataset.proximaPagina);
            const tipoId = botao.dataset.tipoId;
            const totalProdutos = parseInt(botao.dataset.totalProdutos);

            botao.textContent = 'Carregando...';
            botao.disabled = true;

            const url = `${carregarApiUrl}?tipo_id=${tipoId}&page=${proximaPagina}`;

            fetch(url)
                .then(response => response.text())
                .then(htmlProdutos => {
                    const listaProdutos = document.getElementById('lista-produtos');
                    
                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = htmlProdutos;

                    while (tempContainer.firstChild) {
                        listaProdutos.appendChild(tempContainer.firstChild);
                    }
                    
                    initializeEventListeners(listaProdutos);

                    botao.dataset.proximaPagina = proximaPagina + 1;
                    botao.textContent = 'Ver Mais';
                    botao.disabled = false;

                    const produtosCarregados = listaProdutos.querySelectorAll('.produto-container').length;
                    if (produtosCarregados >= totalProdutos) {
                        botao.style.display = 'none';
                    }
                });
        });
    }
});