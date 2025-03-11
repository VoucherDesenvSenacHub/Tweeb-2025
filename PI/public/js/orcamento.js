function previewImages(event) {
    const input = event.target;
    const container = document.getElementById("imagePreviewContainer");
    container.innerHTML = ""; // Limpa imagens anteriores

    if (input.files.length > 3) {
        alert("Você pode selecionar no máximo 3 imagens.");
        input.value = ""; // Reseta o input para evitar o envio de mais arquivos
        return;
    }

    for (let i = 0; i < input.files.length && i < 3; i++) {
        const file = input.files[i];
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.style.width = "120px";
            img.style.height = "auto";
            img.style.borderRadius = "8px";
            img.style.border = "1px solid #ccc";
            img.style.padding = "5px";
            container.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
}
