// Função para abrir o modal de cadastro
function abrirModalCadastro() {
    const modal = document.getElementById('modalCadastro');
    modal.classList.add('show');
    modal.style.display = 'block';
}

// Função para fechar o modal de cadastro
function fecharModalCadastro() {
    const modal = document.getElementById('modalCadastro');
    modal.classList.remove('show');
    modal.style.display = 'none';
}

// Função para mostrar o modal de sucesso
function mostrarModalSucesso() {
    console.log('Tentando mostrar o modal');
    const modal = document.getElementById('modalSucesso');
    console.log('Modal encontrado:', modal);
    if (modal) {
        modal.style.display = 'block';
        console.log('Modal exibido');
    }
}

// Função para fechar o modal
function fecharModal() {
    const modal = document.getElementById('modalSucesso');
    if (modal) {
        modal.style.display = 'none';
    }
}

// Função para validar o formulário
function validarFormulario() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmarSenha').value;

    // Validações básicas
    if (!nome || !email || !senha || !confirmarSenha) {
        mostrarErro('Por favor, preencha todos os campos!');
        return false;
    }

    if (senha !== confirmarSenha) {
        mostrarErro('As senhas não coincidem!');
        return false;
    }

    if (!validarEmail(email)) {
        mostrarErro('Por favor, insira um email válido!');
        return false;
    }

    return true;
}

// Função para mostrar erro
function mostrarErro(mensagem) {
    const errorDiv = document.getElementById('error-message');
    errorDiv.textContent = mensagem;
    errorDiv.style.display = 'block';
    
    setTimeout(() => {
        errorDiv.style.display = 'none';
    }, 3000);
}

// Função para validar email
function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Função para cadastrar usuário
async function cadastrarUsuario(event) {
    event.preventDefault();

    if (!validarFormulario()) {
        return;
    }

    const formData = {
        nome: document.getElementById('nome').value,
        email: document.getElementById('email').value,
        senha: document.getElementById('senha').value
    };

    try {
        // Aqui você pode adicionar a lógica para enviar os dados para seu backend
        console.log('Dados do usuário:', formData);
        fecharModalCadastro();
        limparFormulario();
        mostrarModalSucesso();
    } catch (error) {
        console.error('Erro ao cadastrar:', error);
        mostrarErro('Erro ao realizar cadastro. Tente novamente.');
    }
}

// Função para limpar o formulário
function limparFormulario() {
    document.getElementById('formCadastro').reset();
}

// Event Listeners
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM carregado');
    const form = document.getElementById('formCadastro');
    
    if (form) {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            
            try {
                // Envia o formulário
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    // Mostra o modal de sucesso
                    const modal = document.getElementById('modalSucesso');
                    modal.style.display = 'block';
                    modal.classList.add('show');
                    
                    // Redireciona após 2 segundos
                    setTimeout(() => {
                        window.location.href = '/Tweeb-2025/PI/App/user/View/pages/pagina_1_pesquisa_cadastro.php';
                    }, 3000);
                }
            } catch (error) {
                console.error('Erro ao enviar formulário:', error);
            }
        });
    }

    // Fechar modal quando clicar fora dele
    window.addEventListener('click', (event) => {
        const modal = document.getElementById('modalSucesso');
        if (event.target === modal) {
            fecharModal();
        }
    });

    // Teste: mostrar modal ao clicar em qualquer lugar da página
    document.body.addEventListener('click', () => {
        console.log('Clique detectado');
        mostrarModalSucesso();
    });
});
