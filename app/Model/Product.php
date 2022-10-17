<?php

namespace App\Model;
use \App\Config\config;
use \PDO;
class Product extends config{
        private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }

    public  function getAll()
    {
        $sqlSelect = $this->conn->query("select * from $this->table order by id desc");
        $resultQuery = $sqlSelect->fetchAll(PDO::FETCH_OBJ);
        
        return $resultQuery;
    }   

    public function getExist($sku)
    {
        $sqlSelect = $this->conn->query("select sku from $this->table where sku='".$sku."'");
        $sqlSelect->execute();
        return $sqlSelect->rowCount();
    }   

    public function create($sku, $name, $price, $productType, $attribute)
    {
            $sqlInsert = $this->conn->prepare("insert into $this->table (sku, name, price, productType, attribute) values (?,?,?,?,?)");
            $sqlInsert->bindValue(1,$sku);
            $sqlInsert->bindValue(2,$name);
            $sqlInsert->bindValue(3,$price);
            $sqlInsert->bindValue(4,$productType);
            $sqlInsert->bindValue(5,$attribute);
                $sqlInsert->execute();
        }
        
    public function delete($sku)
    {    

        foreach($sku as $skus){
            $sqlDelete = $this->conn->prepare("delete from $this->table where sku='$skus'");
          
                $sqlDelete->execute();
        }
            }


}
