<?php

use TechStore\Classes\Models\Cat;

require_once('header.php')


?>

<?php


/*



*/

$cat = new Cat;
$cats = $cat->selectAll();



?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Categories</h3>
                    <a href="add-category.php" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                <?php 
                  $i=1;
                 foreach($cats as $cat) : ;
                           
                ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?=$i++?></th>
                        <td><?= $cat['name']?></td>
                        <td><?= $cat['created_at']?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="edit-category.php?id=<?= $cat['id']?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="handelers/delete-category.php?id=<?= $cat['id']?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                        <?php endforeach ; ?>
                </table>
            </div>

        </div>
    </div>
    <?php 

require_once('footer.php')


?>