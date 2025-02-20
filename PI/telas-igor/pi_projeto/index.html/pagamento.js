document.addEventListener("DOMContentLoaded", function() {
  const containerResumo = document.querySelector(".left-panel");

  // Recupera os dados do carrinho do localStorage
  const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

  // Remove os itens anteriores para evitar duplicação
  const itensExistentes = containerResumo.querySelectorAll(".item");
  itensExistentes.forEach(item => item.remove());

  // Adiciona os itens ao resumo
  carrinho.forEach(item => {
    const divItem = document.createElement("div");
    divItem.classList.add("item");
    divItem.innerHTML = `
      <span>${item.nome}</span>
      <span>${item.preco}</span>
      <span>Quantidade: ${item.quantidade}</span>
    `;
    containerResumo.appendChild(divItem);
  });
});
