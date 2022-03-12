<?php
namespace TechStore\Classes\Validation;

class Image implements ValidationRule
{
    public function check($name, $value)
    {
    $allowed = ['jpg' , 'png' , 'gif' , 'jpeg'];
    $ext = pathinfo($value['name'],PATHINFO_EXTENSION);

        if (! in_array($ext,$allowed)) {
            return "$name must have extension jpg or png or gif or jpeg";
        }
        return false;
    }
}
