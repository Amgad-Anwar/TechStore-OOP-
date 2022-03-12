<?php

namespace TechStore\Classes\Validation;

class RequiredFiles implements ValidationRule
{
    public function check($name, $value)
    {
        if ($value['error'] != 0) {
            return "$name is required";
        }
        return false;
    }
}
