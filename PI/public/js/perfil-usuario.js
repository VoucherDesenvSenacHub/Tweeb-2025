const form = document.querySelector('.perfil-tweeb-form');
const inputs = form.querySelectorAll('input:not([disabled])');
let originalValues = {};

// Salva os valores originais dos campos
inputs.forEach(input => {
    originalValues[input.name] = input.value;
});

// Função para ativar/desativar modo de edição
function toggleEditMode() {
    form.classList.toggle('editing');
    inputs.forEach(input => {
        input.readOnly = !input.readOnly;
    });
}

// Função para cancelar a edição
function cancelEdit() {
    form.classList.remove('editing');
    inputs.forEach(input => {
        input.readOnly = true;
        input.value = originalValues[input.name] || '';
    });
}

// Script para upload automático da foto
document.getElementById('inputFotoPerfil').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        // Mostra um preview da imagem antes do upload
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.foto-perfil').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
        
        // Envia o formulário automaticamente
        document.getElementById('formFotoPerfil').submit();
    }
}); 