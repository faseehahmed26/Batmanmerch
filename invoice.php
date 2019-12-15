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
	$orderid =$_GET['order'];
	$userid=$user['id'];
	$stmt =$conn->prepare("select purchases.*,
					shipping_address.addressline1,
					shipping_address.addressline2,
					shipping_address.city,
					shipping_address.pincode,
					shipping_address.address_name
					FROM purchases
					JOIN shipping_address ON purchases.shipping_id = shipping_address.id
					where purchases.user_id=$userid
					AND purchases.id=$orderid
					ORDER BY purchases.created_at desc");
	$stmt->execute();
	$purchase =$stmt->fetch();
	$stmt =$conn->prepare("select purchase_details.*,
							products.product_name,
							products.image,
							products.price
							FROM purchase_details
							JOIN products ON purchase_details.product_id =products.id
							where purchase_details.purchases_id=$orderid");
	$stmt->execute();
	$orders =$stmt->fetchall();

?>
   
<section class="">
	<div class="container">
		<br><br>
		<h1  class="text-center">Congratulations ! Batman is Thanking You for buying this product</h1>
		<table class="table table-bordered table-striped table-hover">
<tr>
<th colspan="4">Product Details</th>
</tr>
<tr>
	<th class="text-center">Product name</th>
	<th class="text-center">Product quantity</th>
	<th class="text-center">Product price(per product)</th>
	<th class="text-center">Product Cost(Quantity x Price)</th>

</tr>
<?php
$total=0;
foreach ($orders as $order ) {
	?>
	<tr>
	<td> <?php echo $order['product_name']; ?></td>
	<td> <?php echo $order['quantity']; ?></td>
	<td class="text-right"> <?php echo $order['price']; ?></td>
	<td class="text-right"> <?php echo $order['price']*$order['quantity']; ?></td>
</tr>
<?php $total =$total + $order['cost']; ?>
	<?php }?>

<tr>
	<td class="text-bold" rowspan="3" span="3">Total</td>
	<td class="text-bold" colspan="2">Sum</td>
	<td class="text-right">Rs.<?php echo  $total; ?>/-</td>
</tr>
<tr>
	<td class="text-bold" colspan="2">Taxes(CGST + SGST</td>
	<td class="text-right">Rs.<?php echo  $purchase['cgst'] + $purchase['sgst']; ?>/-</td>
	
</tr>
<tr>
	<td class="text-bold" colspan="2">Grand Total</td>
	<td class="text-right"><h4>Rs.<?php echo  $purchase['grand_total']; ?>/-</h4></td>
	
	
</tr>







			</table>
			<br>
			<h1  class="text-center">Thank You!</h1> 
	</div>
</section>

<?php include('includes/footer.php') ?>