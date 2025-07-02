document.addEventListener("DOMContentLoaded", function () {
    const inputFoto = document.getElementById('inputFotoPerfil');
    
    if (inputFoto) {
        inputFoto.addEventListener('change', function () {
            const formData = new FormData();
            formData.append('foto_perfil', inputFoto.files[0]);

            fetch('/Tweeb-2025/PI/app/adm/Controllers/alterarFotoADM.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.sucesso) {
                    const novaFoto = `/Tweeb-2025/PI/public/uploads/${data.foto}`;
                    document.querySelector('.foto-perfil').src = novaFoto;
                } else {
                    alert('Erro: ' + data.mensagem);
                }
            })
            .catch(err => {
                console.error(err);
                alert('Erro ao enviar a imagem.');
            });
        });
    }
});
