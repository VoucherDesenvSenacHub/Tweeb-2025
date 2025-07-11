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

    public function update($values, $where) {
        if (empty($values)) {
            throw new InvalidArgumentException("Valores de atualização não podem estar vazios.");
        }
    
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
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $query = 'SELECT '.$fields. ' FROM ' .$this->table. ' '.$where;

        return $this->execute($query);

    }
       
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
            SELECT u.id, u.nome, u.sobrenome, u.email, u.senha, u.tipo, u.telefone, u.foto_perfil, a.matricula, a.cargo
            FROM usuarios u
            LEFT JOIN administrador a ON u.id = a.id_usuario
            WHERE u.email = ?
            LIMIT 1
        ";
        $stmt = $this->execute($query, [$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarFuncionarioPorEmail(string $email) {
        $query = "
            SELECT u.id, u.nome, u.sobrenome, u.email, u.senha, u.tipo, u.telefone, u.foto_perfil, f.matricula, f.cargo
            FROM usuarios u
            INNER JOIN funcionarios f ON u.id = f.id_usuario
            WHERE u.email = ?
            LIMIT 1
        ";
        $stmt = $this->execute($query, [$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function buscarAdministradorPorEmail(string $email) {
        $query = "
            SELECT 
                u.id, 
                u.nome, 
                u.sobrenome,        
                u.email, 
                u.telefone,         
                u.senha, 
                u.tipo, 
                u.foto_perfil, 
                a.matricula,        
                a.cargo             
            FROM usuarios u
            LEFT JOIN administrador a ON u.id = a.id_usuario
            WHERE u.email = ?
            LIMIT 1
        ";
        $stmt = $this->execute($query, [$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarDadosCompletosPorId($id, $tipo) {
        if ($tipo === 'administrador') {
            $query = "
                SELECT 
                    u.id, 
                    u.nome, 
                    u.sobrenome,        
                    u.email, 
                    u.telefone,         
                    u.tipo, 
                    u.foto_perfil, 
                    a.matricula,        
                    a.cargo             
                FROM usuarios u
                LEFT JOIN administrador a ON u.id = a.id_usuario
                WHERE u.id = ?
                LIMIT 1
            ";
        } else {
            $query = "
                SELECT 
                    u.id, 
                    u.nome, 
                    u.sobrenome,        
                    u.email, 
                    u.telefone,         
                    u.tipo, 
                    u.foto_perfil, 
                    f.matricula,        
                    f.cargo             
                FROM usuarios u
                LEFT JOIN funcionarios f ON u.id = f.id_usuario
                WHERE u.id = ?
                LIMIT 1
            ";
        }
        $stmt = $this->execute($query, [$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function update2(array $where, array $values) {
        $fields = array_keys($values);
        $set = implode(' = ?, ', $fields) . ' = ?';
    
        $whereFields = array_keys($where);
        $whereClause = implode(' = ? AND ', $whereFields) . ' = ?';
    
        $query = 'UPDATE ' . $this->table . ' SET ' . $set . ' WHERE ' . $whereClause;
    
        try {
            $params = array_merge(array_values($values), array_values($where));
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }

     public function count($where = null)
    {
        $whereClause = !empty($where) ? 'WHERE ' . $where : '';
        $query = 'SELECT COUNT(*) as total FROM ' . $this->table . ' ' . $whereClause;
        $stmt = $this->execute($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['total'] : 0;
    }

    public function selectPaginado($where = null, $order = null, $limit = null, $offset = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        $offset = strlen($offset) ? 'OFFSET ' . $offset : '';
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit . ' ' . $offset;
        
        return $this->execute($query);
    }
}

?>