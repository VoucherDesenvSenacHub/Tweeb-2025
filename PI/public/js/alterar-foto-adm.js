document.addEventListener('DOMContentLoaded', function() {
    const inputFoto = document.getElementById('inputFotoPerfil');
    
    if (inputFoto) {
        inputFoto.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;

            // Preview antes de enviar
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.querySelector('.foto-perfil');
                if (img) {
                    img.src = e.target.result;
                }
                
                // Atualizar também a foto no sidebar
                const sidebarImg = document.getElementById('userAdm_avatar');
                if (sidebarImg) {
                    sidebarImg.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);

            const formData = new FormData();
            formData.append('foto_perfil', file);

            fetch('/Tweeb-2025/PI/App/adm/Controllers/AlterarFotoAdmController.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.sucesso) {
                    // Atualizar a foto no sidebar sem recarregar a página
                    const sidebarImg = document.getElementById('userAdm_avatar');
                    if (sidebarImg) {
                        const novaFoto = '/Tweeb-2025/PI/public/uploads/' + data.nova_foto;
                        sidebarImg.src = novaFoto;
                    }
                    
                    // Mostrar mensagem de sucesso
                    alert('Foto alterada com sucesso!');
                } else {
                    alert(data.erro || 'Erro ao alterar imagem.');
                }
            })
            .catch(() => alert('Erro de rede'));
        });
    }
}); 