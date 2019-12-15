<?php 
	session_start();
	include('includes/header.php'); 
	require(rootDir('config/connection'));
	require(rootDir('controllers/secure'));

	$cart =$_SESSION['cart'];
	if(count($cart) == 0){
		flash('danger',"Please add product to cart and then checkout");
		redirectTo(localhost('cart'));
	}

	?>
	<section class="login-banner">
	 		<div class="container">
	 			<div class="col-md-6">
	 				<div class="login-box">
	 					<h3 class="text-center"><b>Shipping address</b></h3>
	 					<br>
	 					<form action="<?php echo controller('storeshippingaddress');?>" class="padrl-20 row" method="POST">
	 						<div class="form-group col-md-6">
	 							<input type="addressline1" name="addressline1" class="form-control" id="addressline1" placeholder="Address Line 1" value="<?php if(isset($values['addressline1'])){ echo $values['addressline1']; } ?>">
	 							<span><?php if (isset($errors['addressline1'])) {echo $errors['addressline1'];}?></span>
	 						</div>
	 						<div class="form-group col-md-6">
	 							<input type="addressline2" name="addressline2" class="form-control" id="addressline2" placeholder="Address Line 2" value="<?php if(isset($values['addressline2'])){ echo $values['addressline2']; } ?>">
	 							<span><?php if (isset($errors['addressline2'])) {echo $errors['addressline2'];}?></span>
	 						</div>
	 						<div class="form-group col-md-12">
										<select name="city" class="form-control">
										<option value="">City</option>
										<option <?php if (isset($values['city']) == "mumbai"){echo "selected"; }?> value="mumbai">Mumbai</option>
										<option <?php if (isset($values['city']) == "delhi"){echo "selected"; }?> value="delhi">Delhi</option>
										<option <?php if (isset($values['city']) == "chennai"){echo "selected"; }?> value="chennai">Chennai</option>
										<option <?php if (isset($values['city']) == "hyderabad"){echo "selected"; }?> value="hyderabad">Hyderabad</option>
										<option <?php if (isset($values['city']) == "ahmedabad"){echo "selected"; }?> value="ahmedabad">Ahmedabad</option>
										</select>
										<span><?php if (isset($errors['city'])){echo $errors['city']; } ?> </span>
									</div>
									<div class="form-group col-md-12">
	 							<input type="pincode" name="pincode" class="form-control" id="pincode" placeholder="Pincode" value="<?php if(isset($values['pincode'])){ echo $values['pincode']; } ?>">
	 							<span><?php if (isset($errors['pincode'])) {echo $errors['pincode'];}?></span>
	 						</div>
							<div class="form-group col-md-12">
								<select name="address_name" class="form-control">
								<option value="">Home/Work/others</option>
								<option <?php if (isset($values['address_name']) == "home"){echo "selected"; }?> value="home">Home</option>
								<option <?php if (isset($values['address_name']) == "work"){echo "selected"; }?> value="work">Work</option>
								<option <?php if (isset($values['address_name']) == "others"){echo "selected"; }?> value="others">Others</option>
								</select>
								<span><?php if (isset($errors['address_name'])){echo $errors['address_name']; } ?> </span>
						</div>
						<div class="form-group text-center col-md-12">
							<a href="<?php echo localhost('billingoptions')?>" class="btn btn-default">Back Billing Options</a>
							<button type="submit" class="btn btn-default">Save Address</button>
						</div>
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	 </section>
 <?php include('includes/footer.php') ?>		