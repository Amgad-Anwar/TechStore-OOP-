<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once('../../app.php');

if($request->postHas('submit')){

    $id=$request->post('id');
  
    $name=$request->post('name');
    $cat_id=$request->post('cat_id');
    $price=$request->post('price');
    $pieces=$request->post('pieces');
    $desc = $request->post('desc');
    $img = $request->files('img');



 
    
    
    $validater=new Validator;
 $validater->validate('price',$price,['Required','Numeric','Max']);
 $validater->validate('name',$name,['Required','Max','Str']);
 $validater->validate('discription',$desc,['Required','Max','Str']);
 $validater->validate('pieces of product',$pieces,['Required','Max','Numeric']);
if($img['error'] == 0){
    $validater->validate('img',$img,['Image']);

}
 

 if($validater->hasErrors()){
    $session->set('errors',$validater->getErrors());
    header("location:../add-product.php");
 
     }else{

         $pr = new Product;
         $img_Name = $pr->selectId($id,'img')['img'];
      

       if($img['error'] == 0){
        unlink(PATH . "uploads/" . $img_Name);
            $file = new File($img);
       
            $img_Name = $file->rename()->upload(); // nafs esm btaa3 el $img_Name 3shan a3ml override wna b update neccessary
        }
      $pr->update("name ='$name',price='$price',cat_id='$cat_id',pieces_no='$pieces',`desc`='$desc',img='$img_Name'",$id);
      $session->set('success','products added successfully');
              
      header("location:../products.php"); 

       
        
     }
}else{
    header("loacation:../add-product.php");

}