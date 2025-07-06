console.log("foto-funcionario.js carregado");

document.addEventListener('DOMContentLoaded', function() {
    const inputFoto = document.getElementById('input-foto');
    const imgPreview = document.querySelector('.funcionario-form-foto img');

    if (inputFoto && imgPreview) {
        inputFoto.addEventListener('change', function () {
            const file = this.files[0];
            console.log('Arquivo selecionado:', file);
            
            if (file) {
                // Verifica se é uma imagem
                if (!file.type.startsWith('image/')) {
                    alert('Por favor, selecione apenas arquivos de imagem.');
                    this.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgPreview.src = e.target.result;
                    console.log('Preview atualizado');
                };
                reader.onerror = function() {
                    console.error('Erro ao ler arquivo');
                };
                reader.readAsDataURL(file);
            }
        });
    } else {
        console.error('Elementos não encontrados:', { inputFoto, imgPreview });
    }
});
