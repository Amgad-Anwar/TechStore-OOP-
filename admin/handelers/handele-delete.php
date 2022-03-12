<?php

use TechStore\Classes\Models\Product;

require_once('../../app.php');

if($request->getHas('id')){
    $id= $request->get('id');
    $pr = new Product;
    $imgName = $pr->selectId($id , 'img')['img'];
    unlink(PATH . "uploads/$imgName");
    $pr->delete( $id);
    header("location:../products.php");

}
