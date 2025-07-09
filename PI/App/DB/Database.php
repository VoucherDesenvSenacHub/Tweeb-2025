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
            error_log("Erro de Conexão com o Banco: " . $err->getMessage());
            throw new Exception("Não foi possível conectar ao banco de dados.");
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
            throw $err;
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
            SELECT u.id, u.nome, u.email, u.senha, u.tipo, a.matricula, a.cargo
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
            SELECT u.id, u.nome, u.email, u.senha, u.tipo, f.matricula, f.cargo
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

    public function searchProductsByTerm(string $term): array {
        $sql = "SELECT id_produto, nome_produto, descricao_produto, preco_unid, imagem_produto 
                FROM produto 
                WHERE nome_produto LIKE ? OR descricao_produto LIKE ?";
        
        $params = ["%{$term}%", "%{$term}%"];
        
        return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function findProductById(int $id) {
        $sql = "SELECT * FROM produto WHERE id_produto = ?";
        return $this->execute($sql, [$id])->fetchObject('Produto');
    }

    
    public function deleteProductById(int $id): bool {
        $sql = "DELETE FROM produto WHERE id_produto = ?";
        $stmt = $this->execute($sql, [$id]);
        return $stmt->rowCount() > 0;
    }

    
    public function updateProductById(int $id, array $productData): bool {

        unset($productData['id_produto']);

        $fields = array_keys($productData);
        $setClause = implode(' = ?, ', $fields) . ' = ?';

        $sql = "UPDATE produto SET {$setClause} WHERE id_produto = ?";
        $params = array_values($productData);
        $params[] = $id;
        
        $stmt = $this->execute($sql, $params);
        return $stmt->rowCount() > 0;
    }

    public function countSearchResults(string $term): int {
        $sql = $sql = "SELECT COUNT(*) FROM produtos WHERE nome_produto LIKE ? OR descricao_produto LIKE ?";
        $params = ["%{$term}%", "%{$term}%"];
        $stmt = $this->execute($sql, $params);
        return (int) $stmt->fetchColumn();
    }
    public function searchProductsPaginated(string $term, int $limit, int $offset): array {
        $sql = "SELECT * FROM produtos 
                WHERE nome_produto LIKE ? OR descricao_produto LIKE ? 
                ORDER BY nome_produto ASC 
                LIMIT ? OFFSET ?";

        $params = ["%{$term}%", "%{$term}%", $limit, $offset];
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $params[0]); 
        $stmt->bindValue(2, $params[1]); 
        $stmt->bindValue(3, $params[2], PDO::PARAM_INT); 
        $stmt->bindValue(4, $params[3], PDO::PARAM_INT); 
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>