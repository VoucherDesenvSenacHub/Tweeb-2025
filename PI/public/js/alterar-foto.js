document.getElementById('inputFotoPerfil').addEventListener('change', function () {
    const formData = new FormData();
    formData.append('foto_perfil', this.files[0]);

    fetch('../../Controllers/AlterarFotoController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(dados => {
        if (dados.sucesso) {
            document.querySelector('.foto-perfil').src = `/Tweeb-2025/PI/public/uploads/${dados.nova_foto}`;
        } else {
            alert(dados.erro || 'Erro ao atualizar a foto.');
        }
    })
    .catch(() => {
        alert('Erro de rede ao tentar enviar a imagem.');
    });
});
