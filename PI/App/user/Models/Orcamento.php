<?php
require '../../DB/Database.php';

class Orcamento{

    public int $id;
    public string $nome;
    public string $email;
    public string $telefone;
    public string $tipo_solicitacao;
    public string $prazo_estimado;
    public string $imagem;
    public string $descricao;
    public string $tipo_equipamento;
    public string $status_orcamento;

    public function cadastrar(){
        $db = new Database('orcamento');
        $result =  $db->insert(
                            [
                            'nome' => $this->nome,
                            'email' => $this->email,
                            'telefone' => $this->telefone,
                            'tipo_solicitacao' => $this->tipo_solicitacao,
                            'prazo_estimado' => $this->prazo_estimado,
                            'imagem' => $this->imagem,
                            'descricao' => $this->descricao,
                            'tipo_equipamento' => $this->tipo_equipamento,
                            'status_orcamento' => $this->status_orcamento,
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
            return (new Database('cliente'))->update('id ='.$this->id,[
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'email' => $this->email
            ]);
    }

    public static function buscar(){
        //FETCHALL
        return (new Database('orcamento'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id){
        //FETCHALL
        return (new Database('cliente'))->select('id = '. $id)->fetchObject(self::class);
    }

    public function excluir($id){
        return (new Database('cliente'))->delete('id = '.$id);
    }

}