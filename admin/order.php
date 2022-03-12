<?php

use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetail;

require_once('header.php')


?>

<?php 
if($request->getHas('id')){
  $id= $request->get('id');

}else{
  $id = 1;
}
$or = new Order;
$pr = new OrderDetail;
 $order = $or->selectIdJoin($id,"orders.* , SUM(price * qty) AS total");
 $prods = $pr->selectWith($id);

?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Order : <?=$order['id']?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">Customer</th>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Name</th>
                                <td><?=$order['name']  // i used null policy operator?></td>
                              </tr>
                              <tr>
                                <th scope="row">Email</th>
                                <td><?=$order['email']?? "...."?></td>
                              </tr>
                              <tr>
                                <th scope="row">Phone</th>
                                <td><?=$order['phone']?></td>
                              </tr>
                              <tr>
                                <th scope="row">Address</th>
                                <td><?=$order['address']?? "...."?></td>
                              </tr>
                              <tr>
                                <th scope="row">Time</th>
                                <td><?=date('y/m/d h:i a',strtotime($order['created_at']))?></td>
                              </tr>
                              <tr>
                                <th scope="row">Status</th>
                                <td><?=$order['status']?></td>
                              </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($prods as $prod) : ?>
                              <tr>
                                <td><?=$prod['prodName']?></td>
                                <td><?=$prod['qty']?></td>
                                <td><?=$prod['prodPrice']?></td>
                              </tr>
                              <?php endforeach ?>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                   <?php if($order['status'] =='pendding') :?>
                                    <th>Change Status</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>$<?=$order['total']?></td>

                                <td>
                                <?php if($order['status'] =='pendding') :?>
                                  <a class="btn btn-success"  href="handelers/handele-approve.php?id=<?=$order['id']?>">Approve</a>
                                    <a class="btn btn-danger" href="handelers/handele-cancel.php?id=<?=$order['id']?>">Cancel</a>
                                    <?php endif ?>
                                   
                                </td>
                              </tr>
                            </tbody>
                        </table>

                        <a class="btn btn-dark" href="orders.php">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php 

require_once('footer.php')


?>