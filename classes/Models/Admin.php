<?php

namespace TechStore\Classes\Models;

use TechStore\Classes\DB;
use TechStore\Classes\Session;

class Admin extends DB
{

    public $table_name="admins";
    public function __construct()
    {
        $this->table = "admins";
        $this->connect();
    }



    public function login($email, $password, Session $session)
    {
        // global $session;
        $sql = "SELECT * FROM $this->table_name WHERE email = '$email' LIMIT 1";
        $rslt = mysqli_query($this->conn, $sql);

        $admin = mysqli_fetch_assoc($rslt);

        if ( ! empty($admin)) {
            $password_hashed = $admin['password'];
           // $is_same = password_verify($password, $password_hashed);
            if ($password == $password_hashed) {
                $session->set('adminId', $admin['id']);
                // $session->set('adminPassword',$admin['password']);
                $session->set('adminEmail', $admin['email']);
                $session->set('adminName', $admin['name']);

                //  echo " hello you are auth";
                // you must write return to make $var $is_same return true to check it in condition
                return true;
            } else {
                echo "passord not correct";
                //var_dump(password_verify($password, $password_hashed));
                return false;
            }
        } else {

            echo "email not correct";

            return false;
        }
        // return $admin;

    }

    public function logout(/*Session $session*/)
    {
        global $session;
        $session->remove('adminId');
        $session->remove('adminEmail');
        $session->remove('adminName');
        return true;
    }
}
