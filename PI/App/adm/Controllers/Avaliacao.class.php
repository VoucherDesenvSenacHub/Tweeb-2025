<?php

require_once __DIR__ . '/../../DB/Database.php';


Class Avaliacao{
    public string $comentario;
    public string $notas;
    public int $id;
    

    public function cadastrarAvaliacao(){
        $db = new Database('avaliacao_produto');
        $result = $db->insert([
            'comentario'=> $this->comentario,
            'notas'=> $this->notas,
            'id'=> $this->id
        ]);
        
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function buscarAvaliacao(){
        $db = new Database('avaliacao_produto');

        $result = $db->select_avaliacao();

        return $result;
    }
        
}