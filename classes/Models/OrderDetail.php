<?php

namespace TechStore\Classes\Models;
use TechStore\Classes\DB;

class OrderDetail extends DB{
    public $table_name="order_details";
    
    public function __construct()
    {
        $this->table="order_details";
        $this->connect();
    }
    public function selectWith($orderId){
        $qry="SELECT $this->table_name.qty,products.price AS prodPrice,products.name As prodName FROM $this->table_name Join products 
        ON $this->table_name.product_id = products.id
         where $orderId = order_id";
        $rslt = mysqli_query($this->conn,$qry);
        return mysqli_fetch_all($rslt,MYSQLI_ASSOC);
    }
}