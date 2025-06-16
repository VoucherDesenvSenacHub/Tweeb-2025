<?php
    
class Database{
    public $conn;
    public string $local="192.168.22.9";
    public string $db="140p2";
    public string $user="devwebp2";
    public string $password="voucher@140";
    public $table;

   
    public function __construct($table = null){
        $this->table = $table;
        $result = $this->conecta();
    }

    public function conecta(){
        try {
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            //retirar msg em produção
            die("Connection Failed: " . $err->getMessage());
        }
    }

    
    public function execute($query, $binds = []){
        //BINDS = SELECT 
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }catch (PDOException $err) {
            //retirar msg em produção
            die("Connection Failed " . $err->getMessage());
        }
    }

    public function insert($values){
        //DEBUG
        //echo "<pre>";print_r($values);echo "</pre>";
        //Dados query $fields=campos $binds=parametros
        $fields = array_keys($values);
        //$data = array_values($values); TESTE DE RECEBIMENTO
        $binds = array_pad([],count($fields),'?');

        //Montar query
        $query = 'INSERT INTO ' . $this->table .'  (' .implode(',',$fields). ') VALUES (' .implode(',',$binds).')';
        //DEBUG para saber se está montando a query corretamente
        // print_r($query);
        // print_r(array_values($values));
        
        //Método para executar a Query
        $result = $this->execute($query,array_values($values));
        
        if($result){
            return $this->conn->lastInsertId();
        }
        else{
            return false;
        }
    }

    public function update($values, $where){
        $fields = array_keys($values);
        $set = implode(' = ?, ', $fields) . ' = ?';
        $query = 'UPDATE ' . $this->table . ' SET ' . $set . ' WHERE ' . $where;
        try {
            $result = $this->execute($query, array_values($values));
            return $result ? true : false;
        } catch (PDOException $err) {
            die("Update Failed: " . $err->getMessage());
        }
    }

    public function select($where = null,$order = null,$limit = null, $fields = '*'){
            //montando a query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $query = 'SELECT '.$fields. ' FROM ' .$this->table. ' '.$where;
        //SELECT * FROM pessoa;
        return $this->execute($query);

    }
        //FUNÇÃO PARA DELETAR NO DB - $query = $sql 
    public function delete($where){

        $query= 'DELETE FROM '.$this->table.' WHERE '.$where;
        $result = $this->execute($query);
        
        if($result == true){
            return true;
        }else{
            return false;
        }
        
    }
    public function buscarUsuarioComCpfPorEmail(string $email) {
        $query = "
            SELECT u.id, u.nome, u.sobrenome, u.email, u.senha, u.tipo, u.telefone, u.foto_perfil, c.cpf
            FROM usuarios u
            LEFT JOIN clientes c ON u.id = c.id_usuario
            WHERE u.email = ?
            LIMIT 1
        ";
        $stmt = $this->execute($query, [$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarAdmPorEmail(string $email) {
        $query = "
            SELECT u.id, u.nome, u.email, u.senha, u.tipo, a.matricula, a.cargo
            FROM usuarios u
            LEFT JOIN administrador a ON u.id = a.id_usuario
            WHERE u.email = ?
            LIMIT 1
        ";
        $stmt = $this->execute($query, [$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>