let banners = [];
let currentBanner = null;

// Elementos do DOM
const fileInput = document.getElementById('file-input');
const dropArea = document.getElementById('drop-area');
const previewImage = document.getElementById('preview-image');
const addBannerBtn = document.getElementById('add-banner');
const saveChangesBtn = document.getElementById('save-changes');
const bannersContainer = document.getElementById('banners-container');
const bannerTitleInput = document.getElementById('banner-title');
const bannerLinkInput = document.getElementById('banner-link');
const bannerActiveSelect = document.getElementById('banner-active');
const cancelBtn = document.getElementById('cancel-btn');

// Event Listeners
dropArea.addEventListener('click', () => fileInput.click());
fileInput.addEventListener('change', handleFileSelect);
dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.style.borderColor = '#4a6bff';
    dropArea.style.backgroundColor = 'rgba(74, 107, 255, 0.1)';
});
dropArea.addEventListener('dragleave', () => {
    dropArea.style.borderColor = '#e0e0e0';
    dropArea.style.backgroundColor = 'transparent';
});
dropArea.addEventListener('drop', handleDrop);
addBannerBtn.addEventListener('click', addBanner);
saveChangesBtn.addEventListener('click', saveChanges);
cancelBtn.addEventListener('click', resetForm);

// Função para lidar com seleção de arquivo
function handleFileSelect(e) {
    const file = e.target.files[0];
    if (file && file.type.match('image.*')) {
        displayPreview(file);
    }
}

// Função para lidar com arrastar e soltar
function handleDrop(e) {
    e.preventDefault();
    dropArea.style.borderColor = '#e0e0e0';
    dropArea.style.backgroundColor = 'transparent';
    
    const file = e.dataTransfer.files[0];
    if (file && file.type.match('image.*')) {
        displayPreview(file);
    }
}

// Função para exibir pré-visualização da imagem
function displayPreview(file) {
    const reader = new FileReader();
    reader.onload = (e) => {
        previewImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

// Função para adicionar novo banner
function addBanner() {
    const title = bannerTitleInput.value.trim();
    const link = bannerLinkInput.value.trim();
    const isActive = bannerActiveSelect.value === '1';
    const imageSrc = previewImage.src;

    if (!title) {
        alert('Por favor, insira um título para o banner');
        return;
    }

    if (!link) {
        alert('Por favor, insira um link de redirecionamento');
        return;
    }

    if (imageSrc.includes('placehold.co')) {
        alert('Por favor, adicione uma imagem para o banner');
        return;
    }

    const newBanner = {
        id: Date.now(),
        title: title,
        link: link,
        image: imageSrc,
        active: isActive,
        createdAt: new Date().toLocaleDateString()
    };

    banners.push(newBanner);
    renderBanners();
    resetForm();
    showNotification('Banner adicionado com sucesso!');
}

// Função para renderizar a lista de banners
function renderBenders() {
    if (banners.length === 0) {
        bannersContainer.innerHTML = `
            <div class="empty-state">
                <div class="empty-icon">📷</div>
                <h3>Nenhum banner cadastrado</h3>
                <p>Adicione seu primeiro banner usando o formulário abaixo</p>
            </div>
        `;
        return;
    }

    bannersContainer.innerHTML = '';
    
    banners.forEach(banner => {
        const bannerCard = document.createElement('div');
        bannerCard.className = 'banner-card';
        bannerCard.dataset.id = banner.id;
        bannerCard.draggable = true;
        
        bannerCard.innerHTML = `
            <img src="${banner.image}" alt="Banner promocional: ${banner.title}" class="banner-image">
            <div class="banner-controls">
                <div class="banner-info">
                    <div class="banner-title">${banner.title}</div>
                    <div class="banner-date">Adicionado em ${banner.createdAt}</div>
                </div>
                <div class="banner-actions">
                    <button class="control-btn edit-btn" data-id="${banner.id}">✏️</button>
                    <button class="control-btn delete-btn" data-id="${banner.id}">🗑️</button>
                </div>
            </div>
        `;

        bannersContainer.appendChild(bannerCard);
    });

    // Adiciona eventos para os botões de editar e deletar
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', (e) => editBanner(e.target.dataset.id));
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', (e) => deleteBanner(e.target.dataset.id));
    });

    // Configura drag and drop para reordenar
    setupDragAndDrop();
}

// Função para reordenamento com drag and drop
function setupDragAndDrop() {
    const cards = document.querySelectorAll('.banner-card');
    
    cards.forEach(card => {
        card.addEventListener('dragstart', () => {
            card.classList.add('dragging');
        });
        
        card.addEventListener('dragend', () => {
            card.classList.remove('dragging');
            updateBannersOrder();
        });
    });
    
    bannersContainer.addEventListener('dragover', e => {
        e.preventDefault();
        const draggingCard = document.querySelector('.dragging');
        const afterElement = getDragAfterElement(e.clientY);
        
        if (afterElement) {
            bannersContainer.insertBefore(draggingCard, afterElement);
        } else {
            bannersContainer.appendChild(draggingCard);
        }
    });
}

function getDragAfterElement(y) {
    const cards = [...document.querySelectorAll('.banner-card:not(.dragging)')];
    
    return cards.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        
        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child };
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

// Atualiza a ordem dos banners após reordenar
function updateBannersOrder() {
    const cards = document.querySelectorAll('.banner-card');
    const newBannersOrder = [];
    
    cards.forEach(card => {
        const bannerId = parseInt(card.dataset.id);
        const banner = banners.find(b => b.id === bannerId);
        if (banner) newBannersOrder.push(banner);
    });
    
    banners = newBannersOrder;
}

// Função para editar banner
function editBanner(id) {
    const banner = banners.find(b => b.id === parseInt(id));
    if (!banner) return;
    
    currentBanner = banner;
    bannerTitleInput.value = banner.title;
    bannerLinkInput.value = banner.link;
    bannerActiveSelect.value = banner.active ? '1' : '0';
    previewImage.src = banner.image;
    
    addBannerBtn.textContent = 'Atualizar Banner';
    addBannerBtn.removeEventListener('click', addBanner);
    addBannerBtn.addEventListener('click', updateBanner);
}

// Função para atualizar banner
function updateBanner() {
    const title = bannerTitleInput.value.trim();
    const link = bannerLinkInput.value.trim();
    const isActive = bannerActiveSelect.value === '1';
    
    if (!title || !link || !currentBanner) return;
    
    currentBanner.title = title;
    currentBanner.link = link;
    currentBanner.active = isActive;
    
    renderBanners();
    resetForm();
    showNotification('Banner atualizado com sucesso!');
}

// Função para deletar banner
function deleteBanner(id) {
    if (confirm('Tem certeza que deseja remover este banner?')) {
        banners = banners.filter(b => b.id !== parseInt(id));
        renderBanners();
        showNotification('Banner removido com sucesso!');
    }
}

// Função para resetar o formulário
function resetForm() {
    bannerTitleInput.value = '';
    bannerLinkInput.value = '';
    bannerActiveSelect.value = '1';
    previewImage.src = 'https://placehold.co/1200x400?text=Pré-visualização+do+Banner';
    fileInput.value = '';
    
    if (currentBanner) {
        addBannerBtn.textContent = 'Adicionar Banner';
        addBannerBtn.removeEventListener('click', updateBanner);
        addBannerBtn.addEventListener('click', addBanner);
        currentBanner = null;
    }
}

// Função para salvar alterações
function saveChanges() {
    // Simulando salvamento no servidor
    console.log('Banners salvos:', banners);
    showNotification('Alterações salvas com sucesso!');
}

// Função para mostrar notificação
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = '#4a6bff';
    notification.style.color = 'white';
    notification.style.padding = '12px 24px';
    notification.style.borderRadius = '4px';
    notification.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
    notification.style.zIndex = '1000';
    notification.style.animation = 'fadeIn 0.3s';
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'fadeOut 0.3s';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Carrega banners iniciais (simulados)
function loadInitialBanners() {
    const demoBanners = [
        {
            id: 1,
            title: 'Promoção de Verão',
            link: 'https://exemplo.com/promocao-verao',
            image: 'https://placehold.co/600x300?text=Promoção+de+Verão',
            active: true,
            createdAt: '15/06/2023'
        },
        {
            id: 2,
            title: 'Novos Produtos',
            link: 'https://exemplo.com/novidades',
            image: 'https://placehold.co/600x300?text=Novos+Produtos',
            active: true,
            createdAt: '10/06/2023'
        }
    ];

    banners = demoBanners;
    renderBenders();
}

// Inicializa o aplicativo
function init() {
    loadInitialBanners();
    
    // Adiciona estilos dinâmicos para animações
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(20px); }
        }
    `;
    document.head.appendChild(style);
}

// Inicia a aplicação quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', init);