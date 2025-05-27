document.addEventListener('DOMContentLoaded', function() {
    const inputCPF = document.getElementById('cpf');
    
    // Aplica a máscara enquanto o usuário digita
    inputCPF.addEventListener('input', function(e) {
        let cpf = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
        
        if (cpf.length > 11) {
            cpf = cpf.slice(0, 11); // Limita a 11 dígitos
        }
        
        // Aplica a máscara
        if (cpf.length <= 3) {
            e.target.value = cpf;
        } else if (cpf.length <= 6) {
            e.target.value = cpf.slice(0, 3) + '.' + cpf.slice(3);
        } else if (cpf.length <= 9) {
            e.target.value = cpf.slice(0, 3) + '.' + cpf.slice(3, 6) + '.' + cpf.slice(6);
        } else {
            e.target.value = cpf.slice(0, 3) + '.' + cpf.slice(3, 6) + '.' + cpf.slice(6, 9) + '-' + cpf.slice(9);
        }
    });

    // Valida o CPF quando o campo perde o foco
    inputCPF.addEventListener('blur', function(e) {
        const cpf = e.target.value.replace(/\D/g, '');
        
        if (cpf.length !== 11) {
            mostrarErro('O CPF deve conter 11 dígitos');
            return;
        }

        if (/^(\d)\1{10}$/.test(cpf)) {
            mostrarErro('CPF inválido: todos os dígitos são iguais');
            return;
        }

        if (!validarDigitosCPF(cpf)) {
            mostrarErro('CPF inválido');
            return;
        }

        limparErro();
    });
});

// Função para validar os dígitos verificadores do CPF
function validarDigitosCPF(cpf) {
    let soma = 0;
    let resto;

    // Primeiro dígito verificador
    for (let i = 1; i <= 9; i++) {
        soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;

    // Segundo dígito verificador
    soma = 0;
    for (let i = 1; i <= 10; i++) {
        soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) return false;

    return true;
}

// Função para mostrar mensagem de erro
function mostrarErro(mensagem) {
    const errorDiv = document.getElementById('cpf-error');
    if (!errorDiv) {
        const div = document.createElement('div');
        div.id = 'cpf-error';
        div.style.color = 'red';
        div.style.fontSize = '12px';
        div.style.marginTop = '5px';
        inputCPF.parentNode.appendChild(div);
    }
    errorDiv.textContent = mensagem;
    inputCPF.style.borderColor = 'red';
}

// Função para limpar mensagem de erro
function limparErro() {
    const errorDiv = document.getElementById('cpf-error');
    if (errorDiv) {
        errorDiv.remove();
    }
    inputCPF.style.borderColor = '';
} 