<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\Product;

require_once('header.php');



?>

<?php
    $pr = new Product;
    $cat = new Cat;
    $orders = new Order;
    $productCount = $pr->getCount();
    $categoryCount = $cat->getCount();
    $ordersCount = $orders->getCount();
  
   
   
   

?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?=$productCount?></h5>
                          <a href="products.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?=$categoryCount?></h5>
                          <a href="categories.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?=$ordersCount?></h5>
                          <a href="orders.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php 

require_once('footer.php')


?>