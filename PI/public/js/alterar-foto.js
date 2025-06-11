document.addEventListener("DOMContentLoaded", function () {
    const inputFoto = document.getElementById("inputFotoPerfil");
    const formFoto = document.getElementById("formFotoPerfil");
    const imagemPerfil = document.querySelector(".foto-perfil");

    if (!inputFoto || !formFoto || !imagemPerfil) return;

    inputFoto.addEventListener("change", function () {
        const formData = new FormData(formFoto);

        fetch("/Tweeb-2025/PI/app/user/Controllers/AlterarFotoController.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.sucesso) {
                const novaImagem = "/Tweeb-2025/PI/public/uploads/" + data.nova_foto;
                imagemPerfil.src = novaImagem + "?t=" + new Date().getTime(); // Cache busting
                alert("Foto de perfil atualizada com sucesso!");
            } else {
                alert("Erro: " + (data.erro || "Não foi possível atualizar a foto."));
            }
        })
        .catch(error => {
            console.error("Erro ao enviar imagem:", error);
            alert("Erro ao enviar imagem.");
        });
    });
});
