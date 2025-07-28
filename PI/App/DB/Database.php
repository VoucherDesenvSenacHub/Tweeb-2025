<?php
    
class Database{

    
    public $conn;
    public string $local="localhost";
    public string $db="140p2";
    public string $user="root";
    public string $password="senac";
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
        $where = (!empty($where) && strlen($where) > 0) ? 'WHERE ' . $where : '';
        $order = (!empty($order) && strlen($order) > 0) ? 'ORDER BY ' . $order : '';
        $limit = (!empty($limit) && strlen($limit) > 0) ? 'LIMIT ' . $limit : '';

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

    public function buscarUsuarioPorCpf(string $cpf) {
        $query = "
            SELECT u.id, u.nome, u.sobrenome, u.email, u.senha, u.tipo, u.telefone, u.foto_perfil, c.cpf
            FROM usuarios u
            LEFT JOIN clientes c ON u.id = c.id_usuario
            WHERE c.cpf = ?
            LIMIT 1
        ";
        $stmt = $this->execute($query, [$cpf]);
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

    public function select_avaliacao(){
        $query = "SELECT avaliacao_produto.comentario, avaliacao_produto.notas, usuarios.nome, usuarios.sobrenome, usuarios.foto_perfil
        FROM avaliacao_produto JOIN usuarios ON 
        avaliacao_produto.id = usuarios.id JOIN usuarios ON usuarios.id = usuarios.id ORDER BY avaliacao_produto.id_avaliacao_produto DESC";
        $stmt = $this->execute($query)->fetchAll(PDO::FETCH_ASSOC);
        
        if($stmt){
            return $stmt;
        }
        else{
            return false;
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
                FROM produtos 
                WHERE nome_produto LIKE ? OR descricao_produto LIKE ?";
        
        $params = ["%{$term}%", "%{$term}%"];
        
        return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function findProductById(int $id) {
        $sql = "SELECT * FROM produtos WHERE id_produto = ?";
        return $this->execute($sql, [$id])->fetchObject('Produto');
    }

    
    public function deleteProductById(int $id): bool {
        $sql = "DELETE FROM produtos WHERE id_produto = ?";
        $stmt = $this->execute($sql, [$id]);
        return $stmt->rowCount() > 0;
    }

    
    public function updateProductById(int $id, array $productData): bool {

        unset($productData['id_produto']);

        $fields = array_keys($productData);
        $setClause = implode(' = ?, ', $fields) . ' = ?';

        $sql = "UPDATE produtos SET {$setClause} WHERE id_produto = ?";
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
    public function buscarProdutosPorTipoComponente(int $tipo_id) {
        $query = "
            SELECT p.*
            FROM produtos p
            JOIN produto_componente_link l ON p.id_produto = l.id_produto
            WHERE l.id_tipo_componente = ?
        ";
        
        $stmt = $this->execute($query, [$tipo_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectFiltrado(array $filtros)
    {

        $tabela = $this->table;
        $where_conditions = [];
        $params = [];

        foreach ($filtros as $chave => $valor) {
            switch ($chave) {
                case 'departamento_id':
                    if (!empty($valor)) {
                        $where_conditions[] = "id_departamento = ?";
                        $params[] = (int)$valor;
                    }
                    break;
                case 'marca':
                    if (!empty($valor) && is_array($valor)) {
                        $placeholders = implode(',', array_fill(0, count($valor), '?'));
                        $where_conditions[] = "marca_modelo IN ($placeholders)";
                        $params = array_merge($params, $valor);
                    }
                    break;
                case 'preco_min':
                    if (is_numeric($valor)) {
                        $where_conditions[] = "preco_unid >= ?";
                        $params[] = (float)$valor;
                    }
                    break;
                case 'preco_max':
                    if (is_numeric($valor)) {
                        $where_conditions[] = "preco_unid <= ?";
                        $params[] = (float)$valor;
                    }
                    break;
                case 'em_estoque':
                case 'entrega_gratis':
                case 'garantia':
                    if ($valor) { 
                        $where_conditions[] = "$chave = 1";
                    }
                    break;
            }
        }
        $sql_where = !empty($where_conditions) ? 'WHERE ' . implode(' AND ', $where_conditions) : '';
        $count_query = "SELECT COUNT(*) FROM $tabela $sql_where";
        $total_produtos = $this->execute($count_query, $params)->fetchColumn();
        
        $produtos_por_pagina = 12;
        $total_paginas = ceil($total_produtos / $produtos_por_pagina);
        $pagina_atual = (int)($filtros['page'] ?? 1);
        $offset = ($pagina_atual - 1) * $produtos_por_pagina;

        $opcoes_ordenacao = ['preco_asc' => 'preco_unid ASC', 'preco_desc' => 'preco_unid DESC', 'nome_asc' => 'nome_produto ASC'];
        $sql_order = isset($filtros['ordenar']) && isset($opcoes_ordenacao[$filtros['ordenar']])
            ? " ORDER BY " . $opcoes_ordenacao[$filtros['ordenar']]
            : " ORDER BY id_produto DESC";
        $final_query = "SELECT * FROM $tabela $sql_where $sql_order LIMIT $produtos_por_pagina OFFSET $offset";
        $produtos = $this->execute($final_query, $params)->fetchAll(PDO::FETCH_ASSOC);
        
        return [
            'produtos'      => $produtos,
            'total_paginas' => (int)$total_paginas,
            'pagina_atual'  => $pagina_atual
        ];
    }
    public function buscarProdutosPorTipoComponentePaginado(int $tipo_id, int $limit, int $offset)
    {
        $query = "
            SELECT p.*
            FROM produtos p
            JOIN produto_componente_link l ON p.id_produto = l.id_produto
            WHERE l.id_tipo_componente = :tipo_id
            ORDER BY p.nome_produto ASC
            LIMIT :limit OFFSET :offset
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':tipo_id', $tipo_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarProdutosPorTipoComponente(int $tipo_id): int
    {
        $query = "
            SELECT COUNT(p.id_produto)
            FROM produtos p
            JOIN produto_componente_link l ON p.id_produto = l.id_produto
            WHERE l.id_tipo_componente = ?
        ";

        $stmt = $this->execute($query, [$tipo_id]);
        return (int) $stmt->fetchColumn();
    }
    public function buscarKitsComPaginacao(int $limit, int $offset): array {
        $where = "ativo = 1";
        $order = "id_kit ASC";

        $countQuery = "SELECT COUNT(*) as total FROM {$this->table} WHERE {$where}";
        $total = $this->execute($countQuery)->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
        $total_paginas = ceil($total / $limit);

        $query = "SELECT * FROM {$this->table} WHERE {$where} ORDER BY {$order} LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();

        return [
            'kits' => $stmt->fetchAll(PDO::FETCH_ASSOC),
            'total_paginas' => $total_paginas
        ];
    }
    
      // Funções para a parte dos banners
    public function select_banner($where = null, $order = null, $limit = null, $fields = '*') {

        $where = !empty($where) ? 'WHERE ' . $where : '';
        $order = !empty($order) ? 'ORDER ' . $order : '';
        $limit = !empty($limit) ? 'LIMIT ' . $limit : '';
    
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
    
        return $this->execute($query);
    }

       public function update_banner($where, $values) {
        $fields = array_keys($values);
        $set = implode(' = ?, ', $fields) . ' = ?';
        $query = 'UPDATE ' . $this->table . ' SET ' . $set . ' WHERE ' . $where;
    
        return $this->execute($query, array_values($values));
    }

      public function insert_banner($values){
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        $query = 'INSERT INTO ' . $this->table .'  (' .implode(',',$fields). ') VALUES (' .implode(',',$binds).')';


        // echo $query ;
        // print_r( array_values($values));
        // die();


        $result = $this->execute($query,array_values($values));

        if($result){
            return true;
        }
        else{
            return false;
        }

        
    }

}

?>