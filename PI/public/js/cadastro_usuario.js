document.addEventListener('DOMContentLoaded', () => {
    const formCadastro = document.getElementById('form-cadastro');
    const cpfInput = document.getElementById('cpf');
    
    // Verificação em tempo real do CPF
    if (cpfInput) {
        let timeoutId;
        
        cpfInput.addEventListener('input', function() {
            clearTimeout(timeoutId);
            const cpf = this.value.replace(/\D/g, '');
            
            // Primeiro valida se o CPF é válido
            if (cpf.length === 11) {
                // Verifica se não são todos os dígitos iguais
                if (/^(\d)\1{10}$/.test(cpf)) {
                    mostrarErroCpf('CPF inválido: todos os dígitos são iguais');
                    return;
                }
                
                // Verifica se os dígitos verificadores estão corretos
                if (!validarDigitosCPF(cpf)) {
                    mostrarErroCpf('CPF inválido');
                    return;
                }
                
                // Se o CPF é válido, verifica se já existe
                timeoutId = setTimeout(() => {
                    verificarCpfExistente(cpf);
                }, 500); // Aguarda 500ms após o usuário parar de digitar
            } else {
                limparErroCpf();
            }
        });
        
        // Validação quando o campo perde o foco
        cpfInput.addEventListener('blur', function() {
            const cpf = this.value.replace(/\D/g, '');
            
            if (cpf.length !== 11) {
                mostrarErroCpf('O CPF deve conter 11 dígitos');
                return;
            }

            if (/^(\d)\1{10}$/.test(cpf)) {
                mostrarErroCpf('CPF inválido: todos os dígitos são iguais');
                return;
            }

            if (!validarDigitosCPF(cpf)) {
                mostrarErroCpf('CPF inválido');
                return;
            }

            limparErroCpf();
        });
    }
    
    if (formCadastro) {
        formCadastro.addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = {
                nome: this.nome.value,
                email: this.email.value,
                senha: this.senha.value,
                confirmar_senha: this.confirmar_senha.value,
                cpf: this.cpf.value
            };

            const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (result.sucesso) {
                alert(result.mensagem);
                window.location.href = 'login.php';
            } else {
                alert('Erro: ' + result.mensagem);
            }
        });
    }
});

// Função para verificar se o CPF já existe
async function verificarCpfExistente(cpf) {
    try {
        const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                verificar_cpf: true,
                cpf: cpf
            })
        });

        const result = await response.json();
        
        if (result.invalido) {
            mostrarErroCpf('CPF inválido');
        } else if (result.existe) {
            mostrarErroCpf('CPF já cadastrado no sistema');
        } else {
            limparErroCpf();
        }
    } catch (error) {
        console.error('Erro ao verificar CPF:', error);
    }
}

// Função para mostrar erro de CPF
function mostrarErroCpf(mensagem) {
    const cpfInput = document.getElementById('cpf');
    let errorDiv = document.getElementById('cpf-existe-error');
    
    if (!errorDiv) {
        errorDiv = document.createElement('div');
        errorDiv.id = 'cpf-existe-error';
        errorDiv.style.color = 'red';
        errorDiv.style.fontSize = '12px';
        errorDiv.style.marginTop = '5px';
        cpfInput.parentNode.appendChild(errorDiv);
    }
    
    errorDiv.textContent = mensagem;
    cpfInput.style.borderColor = 'red';
}

// Função para limpar erro de CPF
function limparErroCpf() {
    const errorDiv = document.getElementById('cpf-existe-error');
    if (errorDiv) {
        errorDiv.remove();
    }
    
    const cpfInput = document.getElementById('cpf');
    if (cpfInput) {
        cpfInput.style.borderColor = '';
    }
}

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
