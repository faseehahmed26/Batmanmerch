<?php 
	session_start();
	include('includes/header.php'); 
	require(rootDir('config/connection'));
	require(rootDir('controllers/secure'));
		$conn=connect();
		$id = $_SESSION['_login'];
		$stmt=$conn->prepare("select * FROM users where id=$id");
		$stmt->execute();
		$user = $stmt->fetch();
		$userid =$user['id'];
		$stmt =$conn->prepare("select purchases.*,
																	shipping_address.addressline1,
																	shipping_address.addressline2,
																	shipping_address.city,
																	shipping_address.pincode,
																	shipping_address.address_name
																	FROM purchases
																	JOIN shipping_address ON purchases.shipping_id = shipping_address.id
																	where purchases.user_id =$userid
																	ORDER BY purchases.created_at desc");
		$stmt->execute();
		$orders = $stmt->fetchall();
		$stmt = $conn->prepare("select purchase_details.*,
																	products.product_name,
																	products.image,
																	products.price
																	FROM purchase_details
																	JOIN products ON purchase_details.product_id =products.id
																	where purchase_details.purchases_id = :purchasesid");
		$stmt->bindParam(':purchasesid', $purchasesid);
	?>
	
	<section class="">
		<div class="container">
			<h2>My Orders(<?php echo count($orders); ?>)</h2>
			<div class="row">
				<div class="col-md-12">
					<h4>
						<br>
					</h4>
					<?php
						foreach($orders as $order)
					  {
							$purchasesid = $order['id'];
							$stmt->execute();
							$orderdetails = $stmt->fetchall();
					?>
					<div class="border-tb row pad">
						<div class="col-xs-9">
							<h3>
								Order <?php echo $order['id'];?>
								<span class="pull-right">
									<a href="<?php echo localhost('invoice') .'?order='.$order['id']; ?>" class="btn btn-sm btn-primary">Check Invoice</a>
								</span>
							</h3>
							<p> <b>Shipping Address</b>: <br>
								<?php echo $order['addressline1'];?><br>
								<?php echo $order['addressline2'];?><br>
								<?php echo $order['city'].'-'.$order['pincode'];?>
							</p>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered text-center">
										<thread>
											<tr>
												<td><b>product name</b></td>
												<td><b>product price</b></td>
												<td><b>product quantity</b></td>
												<td><b>product cost <br> (price x quantity)</b></td>
											</tr>
										</thread>
										<tbody>
											<?php $total=0; ?>
											<?php foreach ($orderdetails as $details) { ?>
												<tr>
													<td><?php echo $details['product_name']; ?></td>
													<td><?php echo $details['price']; ?></td>
													<td><?php echo $details['quantity']; ?></td>
													<td><?php echo $details['price']*$details['quantity']; ?></td>
												</tr>
												<?php $total = $total + $details['cost']; ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-xs-3">
							<table class="table" >
								<thead>
									<tr>
										<td class="text-center" colspan="2"><h4>Order Summary</h4></td>
									</tr>
								</thead>
								<tbody>
									<tr>
												<td>TOTAL</td>
	                       	<td class="text-right">Rs <?php echo $total ?>/-</td>
	                       </tr>
	                       <tr>
	                       	<td>SGST(9%)</td>
	                       <td class="text-right">Rs <?php echo $order['sgst']; ?>/-</td>
	                  	 </tr>	
	                  	 <tr>
	                       	<td>CGST (9%)	</td>
	                       <td class="text-right">Rs <?php echo  $order['cgst']; ?>/-</td>
	                  	 </tr>
	                  	  <tr>
	                       	<td><h3>Total</h3></td>
	                       <td class="text-right"><h3>Rs <?php echo  $order['grand_total']; ?>/-</h3></td>
	                  	 </tr>		
								</tbody>
							</table>
						</div>
					</div>
				<?php	}?>
				</div>
			</div>
		</div>
	</section>
<?php include('includes/footer.php') ?> 
