let enderecoSelecionado = null;

// Carregar endereços quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    carregarEnderecos();
});

// Função para carregar endereços
function carregarEnderecos() {
    fetch('/Tweeb-2025/PI/App/user/Controllers/EnderecoController.php?action=listar')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const enderecosList = document.getElementById('enderecos-list');
            enderecosList.innerHTML = '';
            
            if (data.enderecos.length === 0) {
                enderecosList.innerHTML = '<p class="sem-enderecos">Você ainda não tem endereços cadastrados. Adicione um endereço para continuar.</p>';
                return;
            }
            
            data.enderecos.forEach((endereco, index) => {
                const enderecoCard = document.createElement('div');
                enderecoCard.className = 'endereco-card';
                enderecoCard.innerHTML = `
                    <label>
                        <input type="radio" id="endereco_${endereco.id_endereco}" name="endereco" value="${endereco.id_endereco}" ${index === 0 ? 'checked' : ''}>
                        <label class="endereco-label" for="endereco_${endereco.id_endereco}">
                            ${endereco.nome_endereco || 'Endereço'}
                        </label>
                        <div class="endereco-details">
                            <p>${endereco.endereco_completo}</p>
                        </div>
                    </label>
                    <div class="endereco-actions">
                        <button class="edit" onclick="editarEndereco(${endereco.id_endereco})">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button class="delete" onclick="excluirEndereco(${endereco.id_endereco})">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                `;
                enderecosList.appendChild(enderecoCard);
            });
            
            // Selecionar o primeiro endereço por padrão
            if (data.enderecos.length > 0) {
                selecionarEndereco(data.enderecos[0].id_endereco);
            }
        } else {
            alert('Erro ao carregar endereços: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao carregar endereços');
    });
}

// Função para selecionar endereço
function selecionarEndereco(idEndereco) {
    fetch('/Tweeb-2025/PI/App/user/Controllers/EnderecoController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=selecionar&id_endereco=' + idEndereco
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            enderecoSelecionado = idEndereco;
            document.getElementById('btn-avancar').disabled = false;
        } else {
            alert('Erro ao selecionar endereço: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao selecionar endereço');
    });
}

// Função para abrir modal de adicionar endereço
function abrirModalAdicionar() {
    document.getElementById('modal-title').textContent = 'Adicionar Novo Endereço';
    document.getElementById('form-endereco').reset();
    document.getElementById('id_endereco').value = '';
    document.getElementById('modal-endereco').style.display = 'block';
}

// Função para abrir modal de editar endereço
function editarEndereco(idEndereco) {
    // Buscar dados do endereço
    fetch('/Tweeb-2025/PI/App/user/Controllers/EnderecoController.php?action=listar')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const endereco = data.enderecos.find(e => e.id_endereco == idEndereco);
            if (endereco) {
                document.getElementById('modal-title').textContent = 'Editar Endereço';
                document.getElementById('id_endereco').value = endereco.id_endereco;
                document.getElementById('nome_endereco').value = endereco.nome_endereco || '';
                document.getElementById('cep').value = endereco.cep;
                document.getElementById('rua').value = endereco.rua;
                document.getElementById('numero').value = endereco.numero;
                document.getElementById('bairro').value = endereco.bairro;
                document.getElementById('cidade').value = endereco.cidade;
                document.getElementById('estado').value = endereco.estado;
                document.getElementById('modal-endereco').style.display = 'block';
            }
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao carregar dados do endereço');
    });
}

// Função para fechar modal
function fecharModalEscolhaEndereco() {
    document.getElementById('modal-endereco').style.display = 'none';
}

// Função para excluir endereço
function excluirEndereco(idEndereco) {
    if (!confirm('Tem certeza que deseja excluir este endereço?')) {
        return;
    }
    
    fetch('/Tweeb-2025/PI/App/user/Controllers/EnderecoController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=excluir&id_endereco=' + idEndereco
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Endereço excluído com sucesso');
            carregarEnderecos();
        } else {
            alert('Erro ao excluir endereço: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao excluir endereço');
    });
}

// Event listeners
document.getElementById('add-new-endereco-btn').addEventListener('click', abrirModalAdicionar);

document.getElementById('btn-avancar').addEventListener('click', function() {
    if (enderecoSelecionado) {
        window.location.href = 'metodo-envio.php';
    } else {
        alert('Selecione um endereço para continuar');
    }
});

// Fechar modal quando clicar no X
document.querySelector('.close').addEventListener('click', fecharModalEscolhaEndereco);

// Fechar modal quando clicar fora dele
window.addEventListener('click', function(event) {
    const modal = document.getElementById('modal-endereco');
    if (event.target === modal) {
        fecharModalEscolhaEndereco();
    }
});

// Formulário de endereço
document.getElementById('form-endereco').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const idEndereco = form.querySelector('#id_endereco').value;
    const action = idEndereco ? 'editar' : 'adicionar';
    
    // Coletar dados do formulário manualmente
    const formData = {
        action: action,
        nome_endereco: form.querySelector('#nome_endereco').value.trim(),
        cep: form.querySelector('#cep').value.trim(),
        rua: form.querySelector('#rua').value.trim(),
        numero: form.querySelector('#numero').value.trim(),
        bairro: form.querySelector('#bairro').value.trim(),
        cidade: form.querySelector('#cidade').value.trim(),
        estado: form.querySelector('#estado').value.trim()
    };
    
    // Adicionar id_endereco se estiver editando
    if (idEndereco) {
        formData.id_endereco = idEndereco;
    }
    
    // Debug: verificar dados sendo enviados
    console.log('Dados sendo enviados:', formData);
    
    // Converter para string de parâmetros
    const params = Object.keys(formData)
        .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(formData[key]))
        .join('&');
    
    console.log('Params string:', params);
    
    fetch('/Tweeb-2025/PI/App/user/Controllers/EnderecoController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: params
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            fecharModalEscolhaEndereco();
            carregarEnderecos();
        } else {
            alert('Erro: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao salvar endereço');
    });
});

// Seleção de endereço via radio button
document.addEventListener('change', function(e) {
    if (e.target.name === 'endereco') {
        selecionarEndereco(e.target.value);
    }
});

// Máscara para CEP
document.getElementById('cep').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 5) {
        value = value.substring(0, 5) + '-' + value.substring(5, 8);
    }
    e.target.value = value;
});

// Busca automática por CEP
let timeoutCep = null;
document.getElementById('cep').addEventListener('blur', function(e) {
    const cep = e.target.value.replace(/\D/g, '');
    if (cep.length === 8) {
        buscarCep(cep);
    }
});

// Botão de busca por CEP
document.getElementById('btn-buscar-cep').addEventListener('click', function() {
    const cep = document.getElementById('cep').value.replace(/\D/g, '');
    if (cep.length === 8) {
        buscarCep(cep);
    } else {
        mostrarStatusCep('Digite um CEP válido', 'error');
    }
});

// Função para buscar CEP
function buscarCep(cep) {
    const cepStatus = document.getElementById('cep-status');
    const btnBuscar = document.getElementById('btn-buscar-cep');
    
    // Mostrar loading
    mostrarStatusCep('Buscando CEP...', 'loading');
    btnBuscar.disabled = true;
    btnBuscar.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    
    fetch(`/Tweeb-2025/PI/App/user/Controllers/EnderecoController.php?action=buscar_cep&cep=${cep}`)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Preencher campos automaticamente
            document.getElementById('rua').value = data.endereco.rua || '';
            document.getElementById('bairro').value = data.endereco.bairro || '';
            document.getElementById('cidade').value = data.endereco.cidade || '';
            document.getElementById('estado').value = data.endereco.estado || '';
            
            mostrarStatusCep('Endereço encontrado!', 'success');
            
            // Focar no campo número
            document.getElementById('numero').focus();
        } else {
            mostrarStatusCep(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        mostrarStatusCep('Erro ao buscar CEP', 'error');
    })
    .finally(() => {
        // Restaurar botão
        btnBuscar.disabled = false;
        btnBuscar.innerHTML = '<i class="fa fa-search"></i>';
    });
}

// Função para mostrar status do CEP
function mostrarStatusCep(mensagem, tipo) {
    const cepStatus = document.getElementById('cep-status');
    cepStatus.textContent = mensagem;
    cepStatus.className = `cep-status ${tipo}`;
    
    // Limpar status após 3 segundos (exceto para sucesso)
    if (tipo !== 'success') {
        setTimeout(() => {
            cepStatus.textContent = '';
            cepStatus.className = 'cep-status';
        }, 3000);
    }
} 