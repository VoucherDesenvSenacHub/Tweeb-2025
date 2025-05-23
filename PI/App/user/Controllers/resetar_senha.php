<?php
require_once __DIR__.'/../../DB/Database.php';

class ResetarSenha{

    public static function ResetarSenha($token, $senha){
        $db = new Database('usuarios');
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        
        return $db->update(
            ["senha" => $senha,
            "token_recuperacao" => null
        ],
            "token_recuperacao = '$token'" 
        );
    }
}
