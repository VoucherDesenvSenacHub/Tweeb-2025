<aside class="filtro-lateral">
    <div class="filtro-box">
        <h4>Preço</h4>
        <div class="preco-range">
            <input type="number" placeholder="De" min="0">
            <input type="number" placeholder="Até" min="0">
            <input type="range" min="0" max="10000" step="100">
        </div>
    </div>

    <div class="filtro-box">
        <h4>Marca</h4>
        <input type="text" class="busca" placeholder="Busca">
        <div class="checkbox-list">
            <label><input type="checkbox"> Samsung</label>
            <label><input type="checkbox"> Lenovo</label>
            <label><input type="checkbox"> Xiaomi</label>
            <label><input type="checkbox"> AOC</label>
            <label><input type="checkbox"> OPPO</label>
            <label><input type="checkbox"> Asus</label>
            <label><input type="checkbox"> Dell</label>
            <label><input type="checkbox"> HP</label>
            <label><input type="checkbox"> Multilaser</label>
        </div>
    </div>

    <div class="filtro-box">
        <h4>Memória</h4>
        <input type="text" class="busca" placeholder="Busca">
        <div class="checkbox-list">
            <label><input type="checkbox"> 16GB</label>
            <label><input type="checkbox"> 32GB</label>
            <label><input type="checkbox"> 64GB</label>
            <label><input type="checkbox"> 128GB</label>
            <label><input type="checkbox"> 256GB</label>
            <label><input type="checkbox"> 512GB</label>
        </div>
    </div>

    <div class="filtro-box"><h4>Modelo</h4></div>
    <div class="filtro-box"><h4>Cor</h4></div>
    <div class="filtro-box"><h4>Tela</h4></div>
    <div class="filtro-box"><h4>Bateria</h4></div>
</aside>

<style>
.filtro-lateral {
    width: 250px;
    padding: 20px;
    font-family: 'Arial', sans-serif;
    background-color: #fff;
    border-right: 1px solid #ccc;
    overflow-y: auto;
    height: 100vh;
}

.filtro-box {
    margin-bottom: 30px;
}

.filtro-box h4 {
    font-size: 16px;
    margin-bottom: 10px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 5px;
}

.preco-range input[type="number"] {
    width: 48%;
    padding: 5px;
    margin-bottom: 5px;
}

.preco-range input[type="range"] {
    width: 100%;
}

.busca {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

.checkbox-list {
    max-height: 120px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.checkbox-list label {
    font-size: 14px;
}
</style>

<script>
    document.querySelectorAll(".filtro-box h4").forEach(h => {
        h.addEventListener("click", () => {
            const box = h.nextElementSibling;
            if (box) {
                box.style.display = (box.style.display === "none") ? "block" : "none";
            }
        });
    });
</script>
