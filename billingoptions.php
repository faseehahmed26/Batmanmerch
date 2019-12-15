<?php 
	session_start();
	include('includes/header.php'); 
	require(rootDir('config/connection'));
	require(rootDir('controllers/secure'));
	$id = $_SESSION['_login'];

	$cart = $_SESSION['cart'];
	if(count($cart) == 0){
		flash('danger','Please add product to cart and then checkout');
		redirectTo(localhost('cart'));
	}
	$conn=connect();
	$stmt = $conn->prepare("select * FROM shipping_address where user_id=$id");
	$stmt->execute();
	$useraddresses = $stmt->fetchall();
	if (count($useraddresses) == 0) {
	redirectTo(localhost('shipping_address'));
	 }
?>
 	<section class="login-banner">
 		<div class="container">
 			<div class="col-md-6">
 				<div class="login-box" style="background: #000;">
 					<h3 class="text-center"><b>Billing Options</b></h3>
 					<h5 class="text-center padrl-20">*Cash On Delivery*</h5>
 					<br>
 					<form action="<?php echo controller('placeorder'); ?>" class="padrl-20 row" method="POST">
 						<div class="form-group col-md-12 text-capitalize">
 							<label for="">Delivery Address:</label>
 							<?php foreach ($useraddresses as $address ) { ?>
 							 <div class="radio">
 									<label>
 										<input type="radio" name="address_name" value="<?php echo $address['id']?>" <?php if (isset($values['address_name']) == $address[
 											'id']) {echo "checked"; } ?> >
 											<b class=""><?php echo $address['address_name'];?>:</b><br>
 											<?php echo $address['addressline1'];?>,<br>
 											<?php echo $address['addressline2'];?>,<br>
 											<?php echo $address['city'];?> -
 										    <?php echo $address['pincode'];?>
 									</label>
 							</div>
 						<?php	}?>
 						<span><?php if (isset($errors['address_name'])) { echo $errors['address_name'];}?>
 					  </span>
 						</div>
 						<div class="form-group col-md-12 text-right">
 							<a href="<?php echo localhost('shipping_address') ?>" class="btn btn-sm btn-default">Add new Address</a>
 						</div>
 						<div class="form-group col-md-12 text-right">
 						</div>
 						<div class="form-group col-md-12 text-center">
 							<a href="<?php echo localhost('cart') ?>" class="btn  btn-default">Back to Cart</a>
 						<button type="submit" class="btn btn-default">Place order</button>
 						</div>

 					</form>
 				</div>
 			</div>
 		</div>
 	</section>     
<?php include('includes/footer.php') ?> 