// public/js/alterar-foto.js

document.getElementById('inputFotoPerfil').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    // Preview antes de enviar
    const reader = new FileReader();
    reader.onload = function (e) {
        const img = document.querySelector('.foto-perfil');
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);

    const formData = new FormData();
    formData.append('foto_perfil', file);

    fetch('/Tweeb-2025/PI/App/user/Controllers/AlterarFotoController.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.sucesso) {
            location.reload();
        } else {
            alert(data.erro || 'Erro ao alterar imagem.');
        }
    })
    .catch(() => alert('Erro de rede'));
});
