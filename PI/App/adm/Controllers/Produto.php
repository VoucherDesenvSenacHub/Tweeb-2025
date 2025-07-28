
<?php

//require '../DB/Database.php';
// require_once '../App/DB/Database.php';

require_once(__DIR__ . '/../../DB/Database.php');



class Produto{

    
public $conn;


    public ?int $id_produto = null;
    public string $nome_produto;
    public string $marca_modelo;
    public int $quantidade_produto;
    public string $imagem_produto;
    public string $numero_serie;
    public float $custo_produto;
    public string $cor_produto;
    public float $preco_unid;
    public string $descricao_produto;
    public string $detalhes_produto;
    

    public int $id_departamento;
    public int $entrega_gratis;
    public int $em_estoque;
    public int $garantia;
    public ?int $status_produto = 1;

    public function cadastrar(){
        $db = new Database('produtos');
        $result =  $db->insert(
                            [
                            'id_produto' => $this->id_produto,    
                            'nome_produto' => $this->nome_produto,
                            'marca_modelo' => $this->marca_modelo,
                            'quantidade_produto' => $this->quantidade_produto,                           
                            'imagem_produto' => $this->imagem_produto,
                            'numero_serie' => $this->numero_serie,
                            'custo_produto' => $this->custo_produto,
                            'cor_produto' => $this->cor_produto,
                            'preco_unid' => $this->preco_unid,
                            'descricao_produto' => $this->descricao_produto,
                            'detalhes_produto' => $this->detalhes_produto,

                            'id_departamento' => $this-> id_departamento,
                            'entrega_gratis' => $this-> entrega_gratis,
                            'em_estoque' => $this-> em_estoque,
                            'garantia' => $this-> garantia,
                            'status_produto' => $this-> status_produto,


                            ]
                        );
        
        if($result) {
            return true;
        }
        else{
            return false;
        }
    }

    public function atualizar(){
            return (new Database('produtos'))->update([
                'id_produto' => $this->id_produto, 
                'nome_produto' => $this->nome_produto,
                'marca_modelo' => $this->marca_modelo,
                'quantidade_produto' => $this->quantidade_produto,                
                'imagem_produto' => $this->imagem_produto,
                'numero_serie' => $this->numero_serie,
                'custo_produto' => $this->custo_produto,
                'cor_produto' => $this->cor_produto,
                'preco_unid' => $this->preco_unid,
                'descricao_produto' => $this->descricao_produto,
                'detalhes_produto' => $this->detalhes_produto,
                'id_departamento' => $this-> id_departamento,
                'entrega_gratis' => $this-> entrega_gratis,
                'em_estoque' => $this-> em_estoque,
                'garantia' => $this-> garantia,
                'status_produto' => $this-> status_produto,

            ],'id_produto ='.$this->id_produto );
    }

    // public static function buscar($where=null,$order=null,$limit=null){
    //     //FETCHALL
    //     return (new Database('produtos'))->select()->fetchAll(PDO::FETCH_ASSOC);
    // }

    // essa função está fazendo um select no banco apenas dos produtos ativos
    public static function buscar($where = null, $order = null, $limit = null) {
        // Adiciona a condição de status_produto = 1 ao where
        $condicaoBase = 'status_produto = 1';
    
        // Se já houver uma condição passada pelo usuário, concatena com AND
        if ($where) {
            $condicaoBase .= ' AND ' . $where;
        }
    
       
        return (new Database('produtos'))->select($condicaoBase, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_inativo($where = null, $order = null, $limit = null) {
        // Adiciona a condição de status_produto = 1 ao where
        $condicaoBase = 'status_produto = 0';
    
        // Se já houver uma condição passada pelo usuário, concatena com AND
        if ($where) {
            $condicaoBase .= ' AND ' . $where;
        }
    
       
        return (new Database('produtos'))->select($condicaoBase, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }



    // public static function buscar_by_id($id_produto){
    //     //FETCHALL
    //     return (new Database('produtos'))->select($id_produto)->fetchObject(self::class);
    // }

    public static function buscar_by_id($where=null, $order =null, $limit = null){
        return (new Database('produtos'))->select('id_produto = "'. $where .'"')->fetchObject(self::class);

    }

    public function excluir($id_produto){
        return (new Database('produtos'))->delete('id_produto = '.$id_produto);
    }

public function atualizarFlags($id_produto, $em_estoque, $garantia, $entrega_gratis) {
    $stmt = $this->conn->prepare("UPDATE produtos SET em_estoque = ?, garantia = ?, entrega_gratis = ? WHERE id_produto = ?");
    $stmt->execute([$em_estoque, $garantia, $entrega_gratis, $id_produto]);
}


    public function update2() {
        return (new Database('produtos'))->update2(
            ['id_produto' => $this->id_produto], 
            ['status_produto' => $this->status_produto] // ← dados para atualizar
        );
    }
    public static function buscarnovos($filtros = null, $ordenacao = null, $limite = null) {
        require_once __DIR__ . '/../../DB/Database.php'; // Ajuste o caminho conforme seu projeto
    
      
    
        $sql = "SELECT * FROM produtos";
    
        if ($filtros) {
            $sql .= " WHERE " . $filtros;
        }
    
        if ($ordenacao) {
            $sql .= " ORDER BY " . $ordenacao;
        }
    
        if ($limite) {
            $sql .= " LIMIT " . intval($limite);
        }
    
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
    
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    
    

public static function listarAvaliacoesPorProduto($id_produto) {
    $db = new Database();
    $sql = "SELECT a.notas, a.comentario, u.nome, u.foto_perfil
            FROM avaliacao_produto a
            JOIN usuarios u ON u.id = a.id
            WHERE a.id_produto = ?
            ORDER BY a.id_avaliacao DESC";
    $stmt = $db->execute($sql, [$id_produto]);
    $avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $avaliacoes;
}

public function getContagemNotasPorProduto($id_produto) {
    require_once __DIR__ . '/../../../DB/Database.php';
    $db = new Database();

    $sql = "SELECT notas, COUNT(*) as total FROM avaliacao_produto WHERE id_produto = ? GROUP BY notas";
    $stmt = $db->execute($sql, [$id_produto]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Inicializa contagem com zero para todas as notas
    $contagens = [
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
    ];

    foreach ($resultados as $linha) {
        $nota = (int) $linha['notas'];
        $contagens[$nota] = (int) $linha['total'];
    }

    return $contagens;
}

public function getMediaNotasPorProduto($id_produto) {
    require_once dirname(__DIR__, 2) . '/DB/Database.php';
    $db = new Database();

    $sql = "SELECT AVG(notas) as media FROM avaliacao_produto WHERE id_produto = ?";
    $stmt = $db->execute($sql, [$id_produto]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resultado && $resultado['media'] !== null ? round($resultado['media'], 1) : 0;
}

public static function buscarPorTipo($id_tipo) {
    $db = new Database();
    $stmt = $db->execute("SELECT * FROM produtos WHERE id_departamento = ?", [$id_tipo]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
    
   

  

        

   
