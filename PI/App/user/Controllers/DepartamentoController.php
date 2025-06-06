<?php
require '../../DB/Database.php';

class Departamento{

    public int $id_departamento;
    public string $nome_departamento;

    public function cadastrar(){
        $db = new Database('departamento');
        $result =  $db->insert(
                            [
                            'nome_departamento' => $this->nome_departamento
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
            return (new Database('departamento'))->update('id_departamento ='.$this->id,[
                'nome' => $this->nome_departamento
            ]);
    }

    public static function buscar(){
        //FETCHALL
        return (new Database('departamento'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id){
        //FETCHALL
        return (new Database('departamento'))->select('id_departamento = '. $id)->fetchObject(self::class);
    }

    public function excluir($id){
        return (new Database('departamento'))->delete('id = '.$id);
    }

}


$dep = new Departamento();

$post_nome = "VENDAS";

$dep->nome_departamento = $post_nome;

$res = $dep->cadastrar();

if($res){
    echo "CADASTRADO COM SUCESSO";
}

echo '<br>';

$dados = $dep->buscar_by_id(8);

print_r($dados);