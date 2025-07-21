<?php


require_once __DIR__ . '../../../DB/Database.php';

class Categoria {
    
    public static function buscarTodos() {
        $db = new Database();
        $stmt = $db->execute("SELECT * FROM tipos_componente ORDER BY ordem_exibicao ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>