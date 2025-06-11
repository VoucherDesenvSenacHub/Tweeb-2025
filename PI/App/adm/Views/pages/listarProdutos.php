<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR PRODUTOS</title>
</head>
<body  onload='load_table()' class="listarP">
    
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

    <div class="listarP-titulo-contain">
        <a href="estoqueok.php">
            <div class="listarP-titulo">Novo Produto</div>
        </a>
        
        <div class="listarP-titulo2">Cadastrados</div>
    </div>

    <div class="listarP-search-box">
        <div class="listarP-search-contain">
            <button type="submit" class="listarP-search-btn">
                <i class="bx bx-search"></i>
            </button>
            <input type="text" id="searchInput" class="listarP-srch" placeholder="Buscar">
        </div>
    </div>


    <!-- <div class="listarP-filtro-box">
        <img src="../../../../public/assets/img/Icon-filtro.png" alt="Ícone Filtro" class="listarP-filtro-icon">
        <span class="listarP-filtro-text">Filtro</span>
    </div> -->

  

    <section class="listarP-section">
        <div class="listarP-contain">
            <table class="listarP-table">
                <thead class="thead-listarP">
                    <tr class="tr-listarP">
                        <th class="th-listarP">Foto</th>
                        <th class="th-listarP">Produto</th>
                        <th class="th-listarP">Valor</th>
                        <th class="th-listarP">Quantidade</th>
                        <th class="th-listarP">Departamentos</th>
                        <th class="th-listarP">Alterar</th>
                   
                    </tr>
                </thead>
                <tbody id="rows_products" class="tbody-listarP">
                     
                </tbody>
    </section>
    

<script src="../../js_adm/load_table.js" defer></script>
<!-- <?php include __DIR__.'/../../../../includes/footer-adm.php'; ?>  -->
</body>
</html>
