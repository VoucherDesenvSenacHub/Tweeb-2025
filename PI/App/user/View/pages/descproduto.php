<?php


require_once(__DIR__ . '/../../../adm/Controllers/Produto.php');
require_once(__DIR__ . '/../../../DB/Database.php');




// Exibir todos os erros
$produtos = Produto::buscar(null, 'id_produto DESC', 8);

$produtoController = new Produto();

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verifica o método
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h3>🔍 Método POST recebido</h3>";

    if (!isset($_SESSION['usuario']['id'])) {
        echo "<p>❌ Usuário não está logado.</p>";
        exit;
    }

    $id_usuario = $_SESSION['usuario']['id'];
    $id_produto = $_GET['id_produto'] ?? $_POST['id_produto'] ?? null;
    $nota       = $_POST['nota'] ?? null;
    $comentario = $_POST['comentario'] ?? null;

    echo "<p>🧾 ID do usuário: $id_usuario</p>";
    echo "<p>📦 ID do produto: $id_produto</p>";
    echo "<p>⭐ Nota: $nota</p>";
    echo "<p>💬 Comentário: $comentario</p>";

    if (!$id_usuario || !$id_produto || $nota === null || $comentario === null) {
        echo "<p>⚠️ Dados incompletos. Verifique os campos.</p>";
        exit;
    }

    try {
        $db = new Database();
        $sql = "INSERT INTO avaliacao_produto (id, id_produto, notas, comentario) VALUES (?, ?, ?, ?)";
        $db->execute($sql, [$id_usuario, $id_produto, $nota, $comentario]);

        echo "<p>✅ Avaliação salva com sucesso!</p>";
    } catch (Exception $e) {
        echo "<p>❌ Erro ao salvar no banco: " . $e->getMessage() . "</p>";
        exit;
    }
} else {
    // echo "<p>❌ Requisição inválida. Esperado método POST.</p>";
}



$id_produto = (int) ($_GET['id_produto'] ?? 0);
$produto = Produto::buscar_by_id($id_produto);
$avaliacoes = Produto::listarAvaliacoesPorProduto($id_produto);



if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}

include __DIR__.'/../../../../includes/headernavb.php'; 
?>
<link rel="stylesheet" href="../../../../public/css/descproduto.css">
<body>



    
<?php
    if (isset($_SESSION['usuario'])) {
        include __DIR__.'/../../../../includes/navbar.php'; 
        include __DIR__.'/../../../../includes/sidebar-User.php'; 
    } else {
        include __DIR__.'/../../../../includes/navbar.php'; 
    }
    ?>

    <div class="container-produto">
        <div class="produto-img">
        <img src="<?= htmlspecialchars($produto->imagem_produto) ?>" alt="Imagem do Produto">
            
        </div>
        <div class="produto-desc">
            <h1><?=htmlspecialchars($produto->detalhes_produto ?? '')?>
            </h1>
            <br>
            <div class="preco">
                <p>R$<?=$produto->preco_unid;?></p>
                
            </div>


            <div class="buy-buttons">
                <button class="add-carrinho">Adicionar ao carrinho</button>
                <button class="comprar-agora">Comprar Agora</button>
            </div>

            <div class="card-infos">
    
                <?php if ($produto->entrega_gratis == 1): ?>
                <div class="card-subinfos">
                    <div class="card-quadrado">
                        <img src="../../../../public/assets/img/desc-produto-carro.png" alt="carro">
                    </div>
                    <div class="subinfo-info">
                        <p id="p-titulo">Entrega Grátis</p>
                        <p>1-2 dias</p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($produto->em_estoque == 1): ?>
                <div class="card-subinfos">
                    <div class="card-quadrado">
                        <img src="../../../../public/assets/img/desc-produto-casa.png" alt="estoque">
                    </div>
                    <div class="subinfo-info">
                        <p id="p-titulo">Em estoque</p>
                        <p>hoje</p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($produto->garantia == 1): ?>
                <div class="card-subinfos">
                    <div class="card-quadrado">
                        <img src="../../../../public/assets/img/desc-produto-verify.png" alt="garantia">
                    </div>
                    <div class="subinfo-info">
                        <p id="p-titulo">Garantia</p>
                        <p>1 ano</p>
                    </div>
                </div>
                <?php endif; ?>

            </div>

            
        </div>
    </div>


    <div class="products-detail-background">

        <div class="product-details-container">
          
            <ul class="product-attributes">
                <h2>Detalhes do Produto</h2>
                <?php 
                // Explode pelo separador vírgula
                $detalhes = explode(',', $produto->detalhes_produto ?? '');

                foreach ($detalhes as $linha): 
                    $linha = trim($linha); // remove espaços em branco
                    if ($linha): 
                ?>
                    <li><?=htmlspecialchars($linha)?></li>
                <?php 
                    endif; 
                endforeach; 
                ?>
            </ul>





                <div class="product-especifications">
                    <h2><?=htmlspecialchars($produto->nome_produto ?? '')?></h2>

                    <table class="product-specs">
                        <tr>
                            <td>- Marca</td>
                            <td class="product-right"><?=htmlspecialchars($produto->marca_modelo ?? '')?></td>
                        </tr>
                        <tr>
                            <td>- Cor</td>
                            <td class="product-right"><?=htmlspecialchars($produto->cor_produto ?? '')?></td>
                        </tr>
                        
                    </table>
                </div>

                
        </div>
    </div>

    <div class="reviews-section">
        <section class="reviews-container">
            <h1 class="reviews-title">Reviews</h1>

            <div class="reviews-details">
                <div class="reviews-amount">
                    <h1>4.8</h1>
                    <p>of 125 reviews</p>
                    <div class="reviews-amount-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                </div>

                <div class="reviews-info">
                    <div class="reviews-info-stars">
                        <h1>Excelente</h1>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="reviews-info-stars">
                        <h1>Bom</h1>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="reviews-info-stars">
                        <h1>Média</h1>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>

                    </div>
                    <div class="reviews-info-stars">
                        <h1>Abaixo da Média</h1>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>

                    </div>
                    <div class="reviews-info-stars">
                        <h1>Ruim</h1>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>
            </div>

        
           <form id="formAvaliacao" method="POST" class="form-comentario">
            <div class="estrelas" id="estrelas">
                    <input type="hidden" name="nota" id="notaSelecionada" value="0">
                                    <i class="fa-regular fa-star" data-nota="1"></i>
                                    <i class="fa-regular fa-star" data-nota="2"></i>
                                    <i class="fa-regular fa-star" data-nota="3"></i>
                                    <i class="fa-regular fa-star" data-nota="4"></i>
                                    <i class="fa-regular fa-star" data-nota="5"></i>
                </div>

                                <input type="text" name="comentario" placeholder="Deixe um comentário..." required>
                                <button type="submit" name="avaliar" class="avaliacao_btn">Enviar Avaliação</button>
                                
            </form>

                                <script>
                                    const estrelas = document.querySelectorAll('#estrelas i');
                                    const inputNota = document.getElementById('notaSelecionada');

                                    estrelas.forEach((estrela, index) => {
                                    estrela.addEventListener('click', () => {
                                        const nota = estrela.dataset.nota;
                                        inputNota.value = nota;

                                        estrelas.forEach((el, i) => {
                                        if (i < nota) {
                                            el.classList.remove('fa-regular');
                                            el.classList.add('fa-solid', 'preenchida');
                                        } else {
                                            el.classList.remove('fa-solid', 'preenchida');
                                            el.classList.add('fa-regular');
                                        }
                                        });
                                    });
                                    });
                                </script>

           
                

                        <?php if (!empty($avaliacoes)): ?>
                        <div class="comentarios-container">
                            <?php foreach ($avaliacoes as $av): ?>
                                <div class="comentario-box">
                                   <?php
                                    $baseUrl = '/Tweeb-2025/PI/public/uploads/';
                                    $fotoPath = !empty($av['foto_perfil']) ? $baseUrl . $av['foto_perfil'] : $baseUrl . 'default.png';
                                    ?>
                                    <img src="<?= $fotoPath ?>" alt="Foto de <?= htmlspecialchars($av['nome']) ?>" class="foto-perfil">
                                    <div>
                                        <strong><?= htmlspecialchars($av['nome']) ?></strong><br>
                                        <small>Nota: <?= $av['notas'] ?>/5</small>
                                        <p><?= nl2br(htmlspecialchars($av['comentario'])) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                       
                    <?php endif; ?>



                    <div class="more-info-btn-container">
                

                
            </div>
        </section>
        
    </div>  
    
  
<script defer src="public/js/descProduto.js"></script>
<script>window.ID_PRODUTO_DESC = <?= (int)$produto->id_produto ?>;</script>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>