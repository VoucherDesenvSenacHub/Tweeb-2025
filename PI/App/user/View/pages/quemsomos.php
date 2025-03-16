
<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem somos</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body-quemsomos>
<?php include __DIR__.'/../../../../includes/navbar-logada.php'; ?>
    <section class="Banner_Sobre_Nos">
        <div class="shape_sobre"></div>
        <div class="content_banner_sobre_nos">
            <img class="img_sobre_banner" src="../../../../public/assets/img/Apresentação Empresarial Moderna Azul e Verde.png" alt="">
            <div class="content_coteudo_banner_sobre">
                <h4 class="text_top_sobre"> Tweeb, inovação ao seu alcance!</h4>
                <h5 class="text_bottom_sobre">Soluções em informática, tecnologia e serviços digitais para transformar sua experiência online. </h4>
                <button class="btn_sobre"> <a href="#contato-fale">Fale Conosco</a></button>
            </div>
        </div>
    </section>

  

   
    <div class="main-content">
        <div class="bemvindo-text">
            <div class="elipse-quemsomos">
                <div class="elipse31"></div>
                <p class="tagline">Bem vindo</p>
            </div>
            <div class="info-bemvindo-line">
                <h2>Sua <span class="highlight">Conexão</span> <br> com o <span class="highlight">Futuro</span></h2>
            <p>Bem-vindo a Tweeb, sua plataforma online especializada em informática, tecnologia e soluções digitais. 
               Tem a missão de facilitar o acesso a produtos de qualidade e inovação.</p>
            </div>
            
        </div>
        <img class="mascote-pc" src="../../../../public/assets/img/sobrenos_computador.png" alt="logo_sobrenos">
    </div>
    
    <div class="categorias">
        <div class="categorias-content">
            <div class="categorias-text">
                <div class="text">
                    <h1>Categorias de Vendas</h1>
                </div>
            </div>
            <div class="categorias-card">
                <div class="card card1">
                    <img src="../../../../public/assets/img/phone-icon.png" alt="hardware">
                    <p>Hardwares</p>
                </div>
                <div class="card card2">
                    <img src="../../../../public/assets/img/perifericos-icon.png" alt="periféricos">
                    <p>Periféricos</p>
                </div>
                <div class="card card3">
                    <img src="../../../../public/assets/img/energia-icon.png" alt="periféricos">
                    <p>Energia</p>
                </div>
                <div class="card card4">
                    <img src="../../../../public/assets/img/audio-icon.png" alt="periféricos">
                    <p>Aúdio</p>
                </div>
                <div class="card card5">
                    <img src="../../../../public/assets/img/computadores-icon.png" alt="periféricos">
                    <p>Computadores</p>
                </div>
                <div class="card card6">
                    <img src="../../../../public/assets/img/jogos-icon.png" alt="periféricos">
                    <p>Jogos</p>
                </div>
            </div>
        </div>
    </div>

    <section class="contato" id="contato-fale">
        <div class="elipse-quemsomos2">
            <div class="elipse32"></div>
            <p class="tagline2">Contato</p>
        </div>
        <h1>Fale conosco. <span class="highlight">Ouvimos você.</span></h1>
        <p>Entre em Contato através de um de nossos canais.</p>

        <div class="quemsomos-container">
            <div class="quemsomos-card">
                <div class="quemsomos-icon"><img src="../../../../public/assets/img/telefone-quemsomos.png" alt=""></div>
                <div class="quemsomos-info">
                    <span>Telefone</span>
                    <p>(67) 9 9123-4567 (Whatsapp)</p>
                </div>
            </div>
            <div class="quemsomos-card">
                <div class="quemsomos-icon"><img src="../../../../public/assets/img/email-quemsomos.png" alt=""></div>
                <div class="quemsomos-info">
                    <span>Email</span>
                    <p>tweebcomercial@gmail.com</p>
                </div>
            </div>
            <div class="quemsomos-card">
                <div class="quemsomos-icon"><img src="../../../../public/assets/img/localizacao-quemsomos.png" alt=""></div>
                <div class="quemsomos-info">
                    <span>Endereço</span>
                    <p>Rua 134, Centro, Campo Grande - MS</p>
                </div>
            </div>
        </div>
    </section>

    <!-- formulario fale conosco -->

    <div class="fale-conosco-container">
        <div class="fale-conosco-contact-info">
            <div class="fale-conosco-info-section">
                <img src="../../../../public/assets/img/telefone-faleconosco.png" alt="Ícone telefone roxo"> 
                <h3 class="fale-conosco-titulo">Telefone</h3>
                <p class="fale-conosco-texto">67 1234-5678</p>
                <p class="fale-conosco-texto">O prazo para resposta é de 48 horas.</p>
               
            </div>
            <div class="fale-conosco-info-section">
                <img src="../../../../public/assets/img/email-faleconosco.png" alt="Ícone email laranja">
                <h3 class="fale-conosco-titulo">Email</h3>
                <p class="fale-conosco-texto">orcamentotweeb@gmail.com</p>
                <p class="fale-conosco-texto">suportetweeb@gmail.com</p>
            </div>
        </div>

        <div class="fale-conosco-form-section">
            <h1 class="fale-conosco-titulo">Fale Conosco</h1>
            <form class="fale-conosco-form" action="#" method="post">
                <div class="fale-conosco-input-group">
                    <input class="fale-conosco-input" type="text" name="nome" placeholder="Nome Completo *" required>
                    <input class="fale-conosco-input" type="email" name="email" placeholder="Email *" required>
                    <input class="fale-conosco-input" type="tel" name="telefone" placeholder="Telefone *" required>
                </div>
                <div id="imagePreviewContainer"></div>

                <textarea class="fale-conosco-textarea" name="descricao" placeholder="Como podemos te ajudar?"></textarea>
                <button class="fale-conosco-botao-enviar" type="submit">Enviar Mensagem</button>
            </form>
        </div>
    </div>


    <!-- SERVIÇOS -->

    <section class="container_items_produto_personalizado">
        <div class="card_produto_personalizado">
            <i class="fa-solid fa-laptop"></i>
            <h6 class="name_card_item_personalizado">+5000 pedidos</h6>
        </div>
        <div class="card_produto_personalizado">
            <i class="fa-solid fa-pen-to-square"></i>
            <h6 class="name_card_item_personalizado">+2000 personalizados</h6>
        </div>
        <div class="card_produto_personalizado">
            <i class="fa-brands fa-pix"></i>
            <h6 class="name_card_item_personalizado">Pagamento</h6>
        </div>
        <div class="card_produto_personalizado">
            <i class="fa-solid fa-box"></i>
            <h6 class="name_card_item_personalizado">Entrega</h6>
        </div>
    </section>
   


    <!-- COMENTÁRIOS -->
      
    <section class="qsomos">
        <div class="elipse-quemsomos3">
            <div class="elipse33"></div>
            <p class="tagline3">Comentários</p>
            <div class="dizem-clientes">
                <p class="tagline4">O que nossos clientes dizem:</p>
            </div>
            
        </div>
        <div class="qsomos-container">
            <button class="qsomos-prev">&lt;</button>
            <div class="qsomos-wrapper">
                <div class="qsomos-slider">
                    <div class="qsomos-card">
                        <img src="../../../../public/assets/img/foto-perfil-comentarios.jpg" alt="Avatar Cliente" class="qsomos-avatar">
                        <div class="qsomos-stars">⭐⭐⭐⭐⭐</div>
                        <h3 class="qsomos-nome">Lucas Ferreira</h3>
                        <p class="qsomos-texto">
                            "Comprei um notebook para trabalho e foi uma das melhores aquisições!<br> Rápido, leve e com excelente desempenho!"
                        </p>
                    </div>
                    <div class="qsomos-card">
                        <img src="../../../../public/assets/img/foto-perfil-comentarios3.jpg" alt="Avatar Cliente" class="qsomos-avatar">
                        <div class="qsomos-stars">⭐⭐⭐⭐⭐</div>
                        <h3 class="qsomos-nome">Mariana Costa</h3>
                        <p class="qsomos-texto">
                            "O fone de ouvido que comprei superou minhas expectativas!<br> Qualidade de som incrível e ótima duração da bateria."
                        </p>
                    </div>
                    <div class="qsomos-card">
                        <img src="../../../../public/assets/img/foto-perfil-comentarios2.jpg" alt="Avatar Cliente" class="qsomos-avatar">
                        <div class="qsomos-stars">⭐⭐⭐⭐⭐</div>
                        <h3 class="qsomos-nome">Fernando Lima</h3>
                        <p class="qsomos-texto">
                            "A câmera de segurança Wi-Fi que adquiri funciona perfeitamente.<br> Fácil de instalar e com ótima resolução!"
                        </p>
                    </div>
                    <div class="qsomos-card">
                        <img src="../../../../public/assets/img/foto-perfil-comentarios2.jpg" alt="Avatar Cliente" class="qsomos-avatar">
                        <div class="qsomos-stars">⭐⭐⭐⭐⭐</div>
                        <h3 class="qsomos-nome">Fernando Lima</h3>
                        <p class="qsomos-texto">
                            "A câmera de segurança Wi-Fi que adquiri funciona perfeitamente.<br> Fácil de instalar e com ótima resolução!"
                        </p>
                    </div>
                    <div class="qsomos-card">
                        <img src="../../../../public/assets/img/foto-perfil-comentarios2.jpg" alt="Avatar Cliente" class="qsomos-avatar">
                        <div class="qsomos-stars">⭐⭐⭐⭐⭐</div>
                        <h3 class="qsomos-nome">Fernando Lima</h3>
                        <p class="qsomos-texto">
                            "A câmera de segurança Wi-Fi que adquiri funciona perfeitamente.<br> Fácil de instalar e com ótima resolução!"
                        </p>
                    </div>
                    <div class="qsomos-card">
                        <img src="../../../../public/assets/img/foto-perfil-comentarios2.jpg" alt="Avatar Cliente" class="qsomos-avatar">
                        <div class="qsomos-stars">⭐⭐⭐⭐⭐</div>
                        <h3 class="qsomos-nome">Fernando Lima</h3>
                        <p class="qsomos-texto">
                            "A câmera de segurança Wi-Fi que adquiri funciona perfeitamente.<br> Fácil de instalar e com ótima resolução!"
                        </p>
                    </div>
                </div>
            </div>
            <button class="qsomos-next">&gt;</button>
        </div>
    </section>
    <?php include __DIR__.'/../../../../includes/footer.php'; ?>
</body-quemsomos>
</html>
