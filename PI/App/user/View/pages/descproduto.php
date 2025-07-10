<?php
require_once(__DIR__ . '/../../../adm/Controllers/Produto.php');


$id_produto = (int) $_GET['id_produto'];
$produto = Produto::buscar_by_id($id_produto);

if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}
?>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
<body>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>


    

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

            <!-- <div class="tabs-memoria">
                <button class="card-botao-produto">4GB</button>
                <button class="card-botao-produto" id="ativo">6GB</button>
                <button class="card-botao-produto">8GB</button>
                <button class="card-botao-produto">12GB</button>
            </div>

            <div class="details">
                <div class="memoria">
                    <img src="../../../../public/assets/img/desc-icon1.png" alt="icon memoria">
                    <div class="details-info">
                        <p>Memória</p>
                        <p id="destacado" >6GB</p>
                    </div>
                </div>
                <div class="interface">
                    <img src="../../../../public/assets/img/desc-icon2.png" alt="icon interface">
                    <div class="details-info">
                        <p>Interface</p>
                        <p id="destacado">APCI-Express 3.0</p>
                    </div>
                </div>
            </div> -->

            <div class="info">
                <p></p>
            </div>

            <div class="buy-buttons">
                <button class="add-carrinho">Adicionar ao carrinho</button>
                <a href="Carrinho.php"><button class="comprar-agora">Comprar Agora</button></a>
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
            <!-- <ul class="product-attributes">
                <h2>Detalhes do Produto</h2>
                <li>Rgb: rgb não</li>
                <li>Overclocked não</li>
                <li>Conector de alimentação 8pin</li>
                <li>Categoria do produto: Placas Gráficas de Desktop</li>
                <li>Cenário de uso: GAMING, Áudio & Video, Família, Escritório de escritório, DESIGN, Estação de trabalho</li>
                <li>Características do produto: CROSSFIRE</li>
            </ul> -->
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

                
                
                    <!-- <div class="more-info-btn-container">
                        <button class="more-info-btn">Saiba Mais <i class="fa-solid fa-chevron-down"></i></button>
                    </div> -->
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
<!-- 
            <form class="form-comentario" action="">
                <input type="text" name="add_comentario" placeholder="Deixe Comentário">
            </form> --> 
        
            <form method="POST" action="avaliar.php" class="form-comentario">
            <div class="estrelas" id="estrelas">
                    <input type="hidden" name="nota" id="notaSelecionada" value="0">
                                    <i class="fa-regular fa-star" data-nota="1"></i>
                                    <i class="fa-regular fa-star" data-nota="2"></i>
                                    <i class="fa-regular fa-star" data-nota="3"></i>
                                    <i class="fa-regular fa-star" data-nota="4"></i>
                                    <i class="fa-regular fa-star" data-nota="5"></i>
                </div>

                                <input type="text" name="comentario" placeholder="Deixe um comentário..." required>
                                <button type="submit" class="avaliacao_btn">Enviar Avaliação</button>
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
     
           
            <div class="more-info-btn-container">
                <button class="more-info-btn" onclick="VerMaisComentarios()">Ver Mais <i class="fa-solid fa-chevron-down"></i></button>
            </div>
        </section>
    </div>

    <!--  -->

<!--     
    <section class="produtos">
        <div class="produtos-grid">
            <div class="produtos-card">
                <img class="heart" src="public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="image-produto" src="public/assets/img/card-produto2.png" alt="">
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
            <div class="produtos-card">
                <img class="heart" src="public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="image-produto" src="public/assets/img/card-produto2.png" alt="">
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
            <div class="produtos-card">
                <img class="heart" src="public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="image-produto" src="public/assets/img/card-produto2.png" alt="">
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
            <div class="produtos-card">
                <img class="heart" src="public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="image-produto" src="public/assets/img/card-produto2.png" alt="">
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
        </div>
    </section> -->

    <section class="produtos produtos2">
        <div class="promo-text">
            <p>Produtos relacionados</p>
        </div>
        <div class="produtos-grid">
            <div class="produtos-card">
                <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt="">

                <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
                <div class="card-rate">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span class="qnt-avaliacoes">(500+)</span>
                </div>
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
            <div class="produtos-card">
                <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt="">

                <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
                <div class="card-rate">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span class="qnt-avaliacoes">(500+)</span>
                </div>
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
            <div class="produtos-card">
                <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt="">

                <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
                <div class="card-rate">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span class="qnt-avaliacoes">(500+)</span>
                </div>
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
            <div class="produtos-card">
                <img class="heart" src="../../../../public/assets/img/heart_disabled.png" alt="coração" onclick="AtivarCoracao(this)">

                <img class="add-carrinho" src="../../../../public/assets/img/carrinho-card.png" alt="">

                <img class="image-produto" src="../../../../public/assets/img/card-produto2.png" alt="">
                <div class="card-rate">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span class="qnt-avaliacoes">(500+)</span>
                </div>
                <p>Monitor Gamer Curvo</p>
                <p>GAMING MG700 27</p>
                <h1>R$2535,99</h1>
                <button class="card-botao">Comprar Agora</button>
            </div>
        </div>
    </section>
<script defer src="public/js/descProduto.js"></script>
<?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body>
</html>