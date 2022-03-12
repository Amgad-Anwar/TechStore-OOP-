<?php

namespace TechStore\Classes; 

class File {
    public $name ,$uploadedname ,$tmp_name;
    public function __construct($file)
    {
        $this->name= $file['name']; ///hav extension
        $this->tmp_name= $file['tmp_name']; //have locaion on server
    }

    public function rename(){
        $extension = pathinfo($this->name,PATHINFO_EXTENSION);
        $random_string =uniqid();
       
        $this->uploadedname ="$random_string.$extension";
        return $this ;
    }



    //used when we update image 
    public function setName($name){
     
       
        $this->uploadedname =$name;
        return $this ;
    }

    public function upload(){
        $destination = PATH . "uploads/" . $this->uploadedname;
     move_uploaded_file($this->tmp_name , $destination);
     return $this->uploadedname;

    }
}