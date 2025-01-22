<?php
require 'C:/xampp/htdocs/tweeb/DB/Database.php';

class Questionario{
    private $id_questionario;
    private $conhecimento_tecnico;
    private $tipo_hardware;
    private $tipo_compra_pessoal_corporativa;

    public function __construct($questionario) {
        $this->conhecimento_tecnico = $questionario['conhecimento_tecnico'];
        $this->tipo_hardware = $questionario['tipo_hardware'];
        $this->tipo_compra = $questionario['tipo_compra'];

    }

    public function insert(){
        $db = new Database('questionario');
        return $db->insert([
            'conhecimento_tecnico' => $this->conhecimento_tecnico,
            'tipo_hardware' => $this->tipo_hardware,
            'tipo_compra' => $this->tipo_compra,
        ]);
    }
}

?>