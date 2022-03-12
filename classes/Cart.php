<?php

namespace TechStore\Classes;

class Cart
{


    public function add($id, array $prodData)
    {
        $_SESSION["cart"][$id] = $prodData;
    }

    public function count()
    {
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        } else {
            return 0;
        }
    }

    public function total()
    {
        if (isset($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $prodData) {
                $total += $prodData['qty'] * $prodData['price'];
            }
            return $total;
        } else {
            return 0;
        }
    }

    public function has($id): bool
    {
        if (isset($_SESSION['cart'])) {
            return array_key_exists($id, $_SESSION['cart']);
        } else {
            return false;
        }
    }

    public function all()
    {
        if (isset($_SESSION['cart'])) {
            $arr =  $_SESSION['cart'];
            return  $arr;
        } else {
            $arr =[];
            return $arr ;
        }
    }

    public function removeId($id)
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart'][$id]);
        }
    }

    public function removeAll()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }

}
