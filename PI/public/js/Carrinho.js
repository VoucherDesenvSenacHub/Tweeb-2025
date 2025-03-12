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
