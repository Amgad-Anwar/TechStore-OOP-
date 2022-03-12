<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Validation\Validator;

require_once('../../app.php');

if($request->postHas('submit')){

 
    $name=$request->post('name');
    
    $validater=new Validator;

 $validater->validate('name',$name,['Required','Max','Str']);



 
 if($validater->hasErrors()){
    $session->set('errors',$validater->getErrors());
    header("location:../add-category.php.php");
 
     }
     // lw mafish error ei eli hitem hna 
     else{
        $cat = new Cat;
      $cats = $cat->insert('name',"'$name'");
     $session->set('success','your operation success');
         
       
    header("location:../index.php");
       
     
     }



}else{
    header("location:../index.php");

}