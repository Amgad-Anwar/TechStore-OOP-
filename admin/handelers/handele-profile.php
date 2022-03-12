<?php

use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;

require_once('../../app.php');

if($request->postHas('submit')){

  
    $email=$request->post('email');
    $password=$request->post('password');
    $password_confirm=$request->post('password_confirmation');
    $name=$request->post('name');
    
    $validater=new Validator;
 $validater->validate('email',$email,['Required','Email','Max']);
 $validater->validate('name',$name,['Required','Max','Str']);
 if(!empty($password) && $password == $password_confirm){
 $validater->validate('password',$password,['Required','Max']);

 }


 
 if($validater->hasErrors()){
    $session->set('errors',$validater->getErrors());
    header("location:../login.php");
 
     }
     // lw mafish error ei eli hitem hna 
     else{
        $admin = new Admin;
        // $password_hashed = password_hash($password , PASSWORD_DEFAULT);
           $admin->update("name='$name',email='$email',password='$password'", $request->post('id'));
     $session->set('success','your operation success');
         
       
    header("location:../index.php");
       
     
     }



}else{
    header("location:../login.php");

}