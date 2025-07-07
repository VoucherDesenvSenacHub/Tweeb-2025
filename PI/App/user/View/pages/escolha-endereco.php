<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    // Redireciona para login se não estiver logado
    header('Location: login.php');
    exit();
}

// Verificar se há itens no carrinho
require_once __DIR__ . '/../../Models/Carrinho.php';
$id_usuario = $_SESSION['usuario']['id'];
$itens_carrinho = Carrinho::obterCarrinho($id_usuario);

if (empty($itens_carrinho)) {
    // Se o carrinho estiver vazio, redirecionar para a página de produtos
    header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Endereço - Tweeb</title>
    <link rel="stylesheet" href="../../../../public/css/escolha-endereco.css">
    <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>

<div class="container">
    <div class="step-indicator">
        <span class="" id="step-ativo">
            <i class="fa-solid fa-magnifying-glass-location"></i>
            <div class="span-information">
                <p id="step-passo">Passo 1</p>
                <p>Endereço</p>
            </div>
        </span>
        
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="">
            <i class="fa-solid fa-cart-flatbed"></i>
            <div class="span-information">
                <p id="step-passo">Passo 2</p>
                <p>Entrega</p>
            </div>
        </span>
        <img src="../../../../public/assets/img/linha-pontilhada.png" alt="">
        <span class="">
            <i class="fa-solid fa-credit-card"></i>
            <div class="span-information">
                <p id="step-passo">Passo 3</p>
                <p>Pagamento</p>
            </div>
        </span>
    </div>

    <div class="enderecos">
        <h1 class="metodoh1">Selecione Endereço</h1>
        <div id="enderecos-list">
            <!-- Endereços serão carregados dinamicamente aqui -->
        </div>
    </div>

    <!-- Modal para adicionar/editar endereço -->
    <div id="modal-endereco" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modal-title">Adicionar Novo Endereço</h2>
            <form id="form-endereco">
                <input type="hidden" id="id_endereco" name="id_endereco" value="">
                
                <div class="form-group">
                    <label for="nome_endereco">Nome do Endereço (ex: Casa, Trabalho):</label>
                    <input type="text" id="nome_endereco" name="nome_endereco" placeholder="Digite um nome para o endereço">
                </div>

                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <div class="cep-input-group">
                        <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" required>
                        <button type="button" id="btn-buscar-cep" class="btn-buscar-cep">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <small id="cep-status" class="cep-status"></small>
                </div>

                <div class="form-group">
                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua" placeholder="Nome da rua" required>
                </div>

                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" placeholder="Número" required>
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Nome do bairro" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Nome da cidade" required>
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="">Selecione o estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn-cancelar" onclick="fecharModal()">Cancelar</button>
                    <button type="submit" class="btn-salvar">Salvar Endereço</button>
                </div>
            </form>
        </div>
    </div>

    <div class="add-new-endereco" id="add-new-endereco-btn">
        <i class="fa-solid fa-circle-plus"></i>
        <p>Adicionar novo endereço</p>
    </div>

    <div class="endereco-botoes">
        <a href="/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php">
            <button class="botao-sair">Voltar</button>
        </a>
        <button class="botao-avancar" id="btn-avancar" disabled>Avançar</button>
    </div>
</div>

<?php include __DIR__.'/../../../../includes/footer.php'; ?>

<script>
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
function fecharModal() {
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
document.querySelector('.close').addEventListener('click', fecharModal);

// Fechar modal quando clicar fora dele
window.addEventListener('click', function(event) {
    const modal = document.getElementById('modal-endereco');
    if (event.target === modal) {
        fecharModal();
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
            fecharModal();
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
</script>
</body>
</html>















