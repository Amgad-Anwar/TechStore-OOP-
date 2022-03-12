<?php

require_once('../app.php');

use TechStore\Classes\Cart;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetail;
use TechStore\Classes\Validation\Validator;

$cart = new Cart;

if($request->postHas('submit') and $cart->count()!==0){
    
    $name =$request->post('name'); 
    $email =$request->post('email'); 
    $phone =$request->post('phone'); 
    $address =$request->post('address'); 
    
    $validator = new Validator;

    $validator->validate('name' , $name , ['required' , 'str' , 'max']); 
    $validator->validate('phone' , $phone , ['required' , 'str' , 'max']); 
    if(! empty($email)){
    $validator->validate('email' , $email , [ 'email' , 'max']); 
    $email = "'$email'";
    }else{
        $email = "NULL";
    }
    if(! empty($address)){
    $validator->validate('address' , $address , [ 'str' , 'max']); 
    $address = "'$address'";
    }else{
        $address = "NULL";
    }

    if($validator->hasErrors()){
        $session->set("errors" , $validator->getErrors());
        header('location: ../cart.php');

    }else{
        $order = new Order; 
        $orderDetail = new OrderDetail; 
       
        $orderId =  $order->insertAndGetId("name,email,phone,address" ,"'$name',$email,'$phone',$address");

        foreach($cart->all() as $prodId=>$pData){
            $qty = $pData['qty'];
            $orderDetail->insert("order_id ,product_id ,qty " , "'$orderId','$prodId','$qty'");
        }
        $cart->removeAll();
        header('location: ../products.php?');

    }

   
  
}else{
    header('location: ../products.php?');
}