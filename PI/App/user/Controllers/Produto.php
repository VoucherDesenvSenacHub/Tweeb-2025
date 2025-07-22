
<?php

$path1 = __DIR__ . '/../../DB/Database.php';
$path2 = __DIR__ . '/../../../DB/Database.php';

if (file_exists($path1)) {
    require_once $path1;
} elseif (file_exists($path2)) {
    require_once $path2;
} else {
    die('Erro: Arquivo Database.php não encontrado.');
}

class Produto{

    public int $id_produto;
    public string $nome_produto;
    public string $marca_modelo;
    public int $quantidade_produto;
    public string $imagem_produto;
    public int $numero_serie;
    public float $custo_produto;
    public string $cor_produto;
    public float $preco_unid;
    public string $descricao_produto;
    public string $detalhes_produto;

    public int $id_departamento;
    public int $entrega_gratis;
    public int $em_estoque;
    public int $garantia;

    public function cadastrar(){
        $db = new Database('produto');
        $result =  $db->insert(
                            [
                            'id_prod' => $this->id_prod,    
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
            return (new Database('produto'))->update('id_produto ='.$this->id_produto,[
                // 'id_prod' => $this->id_prod, 
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

        ]);
    }

    public static function buscar($where = null, $order = null, $limit = null) {
        return (new Database('produtos'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id){
        return (new Database('produtos'))->select('id_produto = ' . (int)$id)->fetchObject(self::class);
    }


    public function excluir($id_produto){
        return (new Database('produtos'))->delete('id_produto = '.$id_produto);
    }
    public static function buscarPaginado($where = null, $order = null, $limit = null, $offset = null)
    {
    
        return (new Database('produtos'))->selectPaginado($where, $order, $limit, $offset)->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function contar($where = null)
    {
        return (new Database('produtos'))->count($where);
    }
}