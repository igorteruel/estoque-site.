<?php

namespace Project\Db;

use Project\Db\Connection;

class QueryBuilder
{
    
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getConnection();
    }

    public function select($table, $parameters = [], $first = false, $condition = 'and',  $fetch = \PDO::FETCH_ASSOC)
    {

        $params = array_map(function($p){
            return "$p = :$p";
        }, array_keys($parameters));

        $where = !empty($parameters) ? 'where ' . implode(" {$condition} ", $params) : '';
 
        $s = $this->pdo->prepare("select * from {$table} {$where}");
        try{
            $s->execute($parameters);

            return $first ? $s->fetch($fetch) : $s->fetchAll($fetch);

        }  catch(\PDOException $e){
             die($e->getMessage());
        }
        
    }
    
    public function insert($table, $data)
    {

        $columns = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        $stmt = $this->pdo->prepare($sql);

        try {
            return $stmt->execute($data);
        } catch (\PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function delete($table, $data)
    {   
        $where = key($data) . ' = :' . key($data);
        //die($where);
        $sql = "DELETE FROM {$table} WHERE {$where}";
        $stmt = $this->pdo->prepare($sql);

        try {
           return $stmt->execute($data);
        } catch (\PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function update($table, $data, $condition)
    {   
        $columns = implode(' =?, ', array_keys($data)) . ' =? ';
        $where = key($condition) . ' = ?';

        $sql = "UPDATE {$table} SET {$columns} WHERE {$where}";
        $stmt = $this->pdo->prepare($sql);

        $dados = array_values($data);
        $dados[] = $condition[key($condition)];
        
        try {
            return $stmt->execute($dados);
        } catch (\PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function selectproduto()
{

  $sql = "SELECT produtos.nome, sum(estoque) - sum(transacao) as total FROM mydb.produtos
inner join estoque
on estoque.id_produto = produtos.id
group by estoque.id_produto order by nome asc"; 
  $s = $this->pdo->prepare($sql);

  try{
      $s->execute();

      return $s->fetchAll(\PDO::FETCH_ASSOC);

  }  catch(\PDOException $e){
       die($e->getMessage());
  }
}

}
