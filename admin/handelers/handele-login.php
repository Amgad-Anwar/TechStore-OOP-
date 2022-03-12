<?php

use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;

require_once('../../app.php');

if ($request->postHas('submit')) {


    $email = $request->post('email');
    $password = $request->post('password');

    $validater = new Validator;
    $validater->validate('email', $email, ['Required', 'Email', 'Max']);
    $validater->validate('password', $password, ['Required', 'Max']);


    if ($validater->hasErrors()) {
        $session->set('errors', $validater->getErrors());
        header("location:../login.php");
    } else {
        $admin = new Admin;
        $is_login = $admin->login($email, $password, $session);
        
        if ($is_login) {
            header('location:../index.php');
        } else {
            $session->set('errors', ['cardintial not correct']);
            header("location:../login.php");

        }
    }
} else {
    header("location:../login.php");
}
