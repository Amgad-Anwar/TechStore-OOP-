 <?php include('inc/header.php');
 
	use TechStore\Classes\Models\Product;
	
	if($request->getHas('id')){
		$id = $request->get('id');
	}else{
		$id = 1;
	}
	$pr= new Product;
	$product=  $pr->selectId($id ,"products.name as pname ,products.id as pid,img ,`desc`,price ,pieces_no , cats.name as catName");

 ?> 
	<!-- Single Product -->
	<?php 
	if(! empty($product)){ ?>

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
			

				<!-- Selected Image -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="image_selected"><img src="uploads/<?=$product['img']?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-6 order-3">
					<div class="product_description">
						<div class="product_category"><?=$product['catName']?></div>
						<div class="product_name"> <?=$product['pname']?></div>
						<div class="product_text"><p><?=$product['desc']?></p></div>
						<div class="order_info d-flex flex-row">
							<form method="POST" action="handlers/add-cart.php">
								<div class="clearfix" style="z-index: 1000;">

								<input type="hidden" name="name" value="<?=$product['pname']?>"> 
								<input type="hidden" name="price" value="<?=$product['price']?>"> 
								<input type="hidden" name="img" value="<?=$product['img']?>"> 
								<input type="hidden" name="id" value="<?=$product['pid']?>"> 

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" name="qty" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

                                    <div class="product_price">$<?=$product['price']?></div>

								</div>

								<?php if( ! $cart->has($product['pid'])){?>
								<div class="button_container">
									<button type="submit" name="submit" class="button cart_button">Add to Cart</button>
								</div>
								<?php } ?>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?php }else{ ?>
		<div class="single_product"> <h1 style="text-align: center;"> no data found </h1></div>
	<?php } ?>	

	<!-- Copyright -->
	<?php include('inc/footer.php'); ?> 