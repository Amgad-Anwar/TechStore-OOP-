<?php

namespace TechStore\Classes\Models;
use TechStore\Classes\DB;

class Cat extends DB{
    
    public function __construct()
    {
        $this->table="cats";
        $this->connect();
    }
}