<?php

require_once('../app.php');

use TechStore\Classes\Cart;

if($request->getHas('id')){
    
    $id =$request->get('id'); 


    $cart = new Cart;
    $cart->removeId($id);

    header('location: ../cart.php');
  
}