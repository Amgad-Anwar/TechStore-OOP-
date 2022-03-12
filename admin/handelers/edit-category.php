<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Validation\Validator;

require_once('../../app.php');

if ($request->postHas('submit')) {

    $id = $request->post('id');

    $name = $request->post('name');







    $validater = new Validator;
    $validater->validate('name', $name, ['Required', 'Max', 'Str']);
    if ($validater->hasErrors()) {
        $session->set('errors', $validater->getErrors());
        header("location:../add-product.php");
    } else {
        $c = new Cat;
        $c->update("name ='$name'", $id);
        $session->set('success', 'products added successfully');

        header("location:../categories.php");
        }
       

        /*
         $file = new File($img);
        $file_name =  $file->rename()->upload();
            $product = new Products;

        $product->update("name,price,piecesNo,`desc`,img,cat_id",
                 "'$name','$price','$pieces','$desc','$file_name','$cat_id'");
                 $session->set('success','products added successfully');
              
                 header("location:../products.php");*/
    
} else {
    
    header("loacation:../categories.php");
}
