
<?php

//require '../DB/Database.php';
// require_once '../App/DB/Database.php';

require_once(__DIR__ . '/../../DB/Database.php');

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

        ]);
    }

    public static function buscar($where=null,$order=null,$limit=null){
        //FETCHALL
        return (new Database('produtos'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id){
        //FETCHALL
        return (new Database('produtos'))->select($id_produto)->fetchObject(self::class);
    }

    public function excluir($id_produto){
        return (new Database('produtos'))->delete('id_produto = '.$id_produto);
    }

    public function atualizarFlags($id_produto, $em_estoque, $garantia, $entrega_gratis) {

    
        $stmt = $conn->prepare("UPDATE produtos SET em_estoque = ?, garantia = ?, entrega_gratis = ? WHERE id_produto = ?");
        $stmt->execute([$em_estoque, $garantia, $entrega_gratis, $id]);
    }
}