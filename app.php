<?php

define("PATH" , __DIR__ . "/"); 


define("DB_SERVERNAME" , "localhost"); 
define("DB_USERNAME" , "root"); 
define("DB_PASSWORD" , ""); 
define("DB_NAME" , "techstore"); 



require_once(PATH . 'vendor/autoload.php');
   
use TechStore\Classes\Request;

use TechStore\Classes\Session;



$request = new Request;
$session = new Session; 
//$v = new Validator; 
//$v->validate("age",'',["Numeric" , "Str" , "Email" ]);

//print_r( $v->getErrors());
 
//echo $request->get('name'); 

