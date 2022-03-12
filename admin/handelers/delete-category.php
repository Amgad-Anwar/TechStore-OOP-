<?php

use TechStore\Classes\Models\Cat;

require_once('../../app.php');

if($request->getHas('id')){
    $id= $request->get('id');
    $c = new Cat;
 
    $c->delete( $id);
    header("location:../categories.php");
    $session->set('success' , 'selected category is deleted ');

}
