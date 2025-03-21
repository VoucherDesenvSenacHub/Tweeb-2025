// Função para abrir o modal
function openModal() {
    document.getElementById('editar-os-modal').style.display = 'block';
  }
  
  // Função para fechar o modal
  function closeModal() {
    document.getElementById('editar-os-modal').style.display = 'none';
  }
  
  // Função para atualizar o valor do progresso
  function updateProgresso(value) {
    document.getElementById('progresso-valor').textContent = value + '%';
  }
  
  // Função para salvar as alterações
  function saveChanges() {
    // Aqui, você pode adicionar a lógica para salvar os dados, por exemplo, enviando um pedido AJAX para o servidor
    alert("Alterações salvas com sucesso!");
    closeModal();
  }