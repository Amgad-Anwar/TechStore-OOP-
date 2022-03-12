
<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Models\Product;

require_once('header.php')


?>

<?php

if($request->getHas('id')){
    $id= $request->get('id');
    //echo $id ;
 
  

}else {
    $id = 1;
}
$pr = new Product;
$cat = new Cat;
$cats= $cat->selectAll();

 $product = $pr->selectId($id,"products.name AS prodName,
 cats.name AS catName,cats.id AS catId, `desc` ,img,price,pieces_no,cat_id");


?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Product : name here</h3>
                <div class="card">
                    <div class="card-body p-5">
                    <form method="POST" enctype="multipart/form-data" action="handelers/handele-edit.php">
                            <div class="form-group">
                              <label>Name</label>
                              <input name="name" type="text" value="<?=$product['prodName']?>" class="form-control">
                            </div>
                            <input type="hidden" name="id" value="<?=$id?>">

                            <div class="form-group">
                                <label>Category</label>

                                
                                <select class="form-control"  name="cat_id">
                                  <option>Select Category</option>
                                  <?php foreach( $cats as $cat) : ?>
                                  <option value="<?=$cat['id']?>" <?php if($cat['id'] == $product['cat_id']){echo "selected";};?> >  <?=$cat['name'] ; ?> </option>
                            
                             

                                <?php endforeach ?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Price</label>
                                <input  name="price" type="number"value="<?=$product['price']?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input  name="pieces" type="number" value="<?=$product['pieces_no']?>" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea  name="desc" class="form-control" rows="3"><?=$product['desc']?></textarea>
                            </div>

                         <div class="mb-3 d-flex justify-content-center">
                         <img src="<?= '../uploads/' . $product['img']?>" height="100px" alt="" srcset="">
                         </div>

                            <div class="custom-file">
                                <input  name="img" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                              
                            <div class="text-center mt-5">
                                <button  name="submit" type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="#">Back</a>
                            </div>
                        </form>
                </div>
            </div>

        </div>
    </div>
    <?php 

require_once('footer.php')


?>