document.addEventListener("DOMContentLoaded", function() {
  // Seleciona os botões de aumento, diminuição e remoção
  const increaseButtons = document.querySelectorAll(".increase");
  const decreaseButtons = document.querySelectorAll(".decrease");
  const removeButtons = document.querySelectorAll(".remover");

  // Atualiza o localStorage com os dados do carrinho
  function atualizarCarrinho() {
    const itens = document.querySelectorAll(".item");
    let carrinho = [];

    itens.forEach(item => {
      const nome = item.querySelector(".detalhe strong").innerText;
      const preco = item.querySelector(".preco").innerText;
      const quantidade = item.querySelector("#item-quantidade").innerText;

      carrinho.push({
        nome: nome,
        preco: preco,
        quantidade: quantidade
      });
    });

    localStorage.setItem("carrinho", JSON.stringify(carrinho));
  }

  // Adiciona eventos para botões de aumentar e diminuir
  increaseButtons.forEach(button => {
    button.addEventListener("click", function() {
      let quantidade = button.previousElementSibling;
      quantidade.innerText = parseInt(quantidade.innerText) + 1;
      atualizarCarrinho();
    });
  });

  decreaseButtons.forEach(button => {
    button.addEventListener("click", function() {
      let quantidade = button.nextElementSibling;
      if (parseInt(quantidade.innerText) > 1) {
        quantidade.innerText = parseInt(quantidade.innerText) - 1;
        atualizarCarrinho();
      }
    });
  });

  // Evento de remoção de itens
  removeButtons.forEach(button => {
    button.addEventListener("click", function() {
      button.parentElement.remove();
      atualizarCarrinho();
    });
  });

  // Atualiza o carrinho na primeira carga
  atualizarCarrinho();
});
