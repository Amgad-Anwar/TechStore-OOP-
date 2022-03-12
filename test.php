<?php

require_once("app.php");

//=======================================================================
/*    require_once('classes/Request.php');
    require_once('classes/Session.php'); 
//========================================================================    
    require_once('classes/DB.php'); 
    require_once('classes/Models/Product.php'); 
//========================================================================
    require_once('classes/Validation/ValidationRule.php');    
    require_once('classes/Validation/Required.php');  
    require_once('classes/Validation/Max.php');  
    require_once('classes/Validation/Email.php');
    require_once('classes/Validation/Str.php');    
    require_once('classes/Validation/Numeric.php'); 
    require_once('classes/Validation/Validator.php');    
//==========================================================================    
*/




echo $request->get("name");



//$v = new Validator();
$v->validate("age",'',["Numeric" , "Str" , "Email" ]);

print_r( $v->getErrors());





