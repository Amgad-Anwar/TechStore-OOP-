<?php

use TechStore\Classes\Models\Order;

require_once('../../app.php');

if($request->getHas('id')){
    $id= $request->get('id');
    $or = new Order;//status_of_order
    $or->update("status_of_order = 'approve'",$id);
    $session->set('success','order aproved');
    header("location:../order.php");

}
