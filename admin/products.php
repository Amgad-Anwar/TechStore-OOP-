<?php

use TechStore\Classes\Models\Product;

require_once('header.php')




?>


<?php
/*
we use this line to get data from two columns by two objects
but we can get data from two columns by join from table one 

 public function selectAll($column = "*"):array{
        $qry="SELECT $column FROM $this->table_name JOIN cats ON $this->table_name.cat_id = cats.id";
        $rslt = mysqli_query($this->con,$qry);
        return mysqli_fetch_all($rslt,MYSQLI_ASSOC);}


$cat = new Cats;
$cats = $cat->selectAll();
and 
$Pord = new Products;
$product = $Pord->selectAll();
*/

$Pord = new Product;
$product = $Pord->selectWithJoin("products.created_at AS prodCreated_at,products.id AS prodID ,products.name AS pName,
 cats.name AS catName,cats.id AS catId,img,price,pieces_no,cats.created_at AS catCreated_at");



?>
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Products</h3>
                    <a href="add-product.php" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pieces</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <?php 
                    $i=1;
                    
                    foreach($product as $prod) : ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?=$i++;?></th>
                        <td><?=$prod['pName']?></td>
                        <td><?=$prod['catName']?></td>
                        <td>
                            <img src="../uploads/<?=$prod['img']?>" height="50px" alt="">
                        </td>
                        <td><?=$prod['pieces_no']?></td>
                        <td>$<?=$prod['price']?></td>
                        <td><?=  date("Y-m-d H:i a",strtotime($prod['prodCreated_at']))?></td>
                        <td><!--
                            <a class="btn btn-sm btn-primary" href="#">
                                <i class="fas fa-eye"></i>
                            </a>
                        -->
                            <a class="btn btn-sm btn-info" href="edit-product.php?id=<?=$prod['prodID']?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="handelers/handele-delete.php?id=<?=$prod['prodID']?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>


                    <?php endforeach  ?>
                </table>
            </div>

        </div>
    </div>
    <?php 

require_once('footer.php')


?>