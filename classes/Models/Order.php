<?php

namespace TechStore\Classes\Models;
use TechStore\Classes\DB;

class Order extends DB{
    
    public function __construct()
    {
        $this->table="orders";
        $this->connect();
    }
    public function selectIdJoin($id,$column="*" ){
        $qry="SELECT $column FROM $this->table JOIN order_details JOIN products ON
        $this->table.id = order_details.order_id AND
         order_details.product_id = products.id where $this->table.id=$id";
        $rslt = mysqli_query($this->conn,$qry);
        return mysqli_fetch_assoc($rslt);

    }

    public function selectAllJoin($column = "*"):array{
        $qry="SELECT $column ,SUM(price * qty) AS total FROM  $this->table JOIN order_details JOIN products ON
         $this->table.id = order_details.order_id AND
          order_details.product_id = products.id GROUP BY  $this->table.id";
        $rslt = mysqli_query($this->conn,$qry);
        return mysqli_fetch_all($rslt,MYSQLI_ASSOC);}
}