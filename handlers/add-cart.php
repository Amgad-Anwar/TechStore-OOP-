<?php

require_once('../app.php');

use TechStore\Classes\Cart;

if($request->postHas('submit')){
    
    $id =$request->post('id'); 
    $name =$request->post('name'); 
    $qty =$request->post('qty'); 
    $price =$request->post('price'); 
    $img =$request->post('img'); 

    $prodArray = [
        "name"=>$name, 
        "qty"=>$qty, 
        "price"=>$price, 
        "img"=>$img
    ];

    $cart = new Cart;
    $cart->add($id ,$prodArray);

    header('location: ../products.php');
  
}