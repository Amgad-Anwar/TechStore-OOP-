<?php

use TechStore\Classes\Models\Admin;

require_once('../../app.php');

if($request->getHas('id')){
    $id= $request->get('id');
    $ad = new Admin;
    $admin = $ad->delete($id);
    header("location:../index.php");

  

}
