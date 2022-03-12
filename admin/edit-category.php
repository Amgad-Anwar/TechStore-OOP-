<?php

use TechStore\Classes\Models\Cat;

require_once('header.php')


?>

<?php

    if($request->getHas('id')){
        $id=$request->get('id');
    }else{
        $id = 1;
    }
    $c = new Cat;
    $cat = $c->selectId($id)

?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Category : <?=$cat['name']?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="handelers/edit-category.php">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="hidden" name="id" value="<?=$id?>">
                              <input type="text" name="name" value="<?=  $cat['name'] ?>" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="categories.php">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php 

require_once('footer.php')


?>