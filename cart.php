<?php 
session_start();
include('includes/header.php'); 
require(rootDir('config/connection'));

$total=0;
$conn =connect();
	  if (isset($_SESSION['cart'])) {
		 $cart = $_SESSION['cart'];
		 foreach ($cart as $product) {
			  $productids[] = $product['productid'];
		}
		$productids = implode(',' , $productids);

		$stmt=$conn->prepare("select products.*,products.image as product_image,categories.name as category_name,categories.image as category_image FROM products JOIN categories ON products.category_id = categories.id where products.id IN ($productids)");
	   $stmt->execute();
	   $products = $stmt->fetchall();
	}else{
			$products = array();
	}
?>
<section class="">
    <div class="container">
          <h2>My Cart (<?php echo count($products); ?>)    
        	<span class="pull-right">
			<a href="<?php echo controller('removefromcart'). '?emptycart=true'; ?>" class="btn btn-sm btn-danger">Empty Cart<span class="glyphicon glyphicon-shopping-cart"></span></a>
          </span></h2>
         <div class="row">
         	<div class="col-md-8">
         		<h4>
         			Products
         			<br>
         		</h4>
         		<?php
         		foreach ($products as $product) 
         			{
	         			$productid = $product['id'];
	         			$cartproduct = $cart[$productid];
	         			$quantity = $cartproduct['quantity'];
	         			$cost = $product['price'] * $quantity;
	         	?>
				<div class="border-tb row pad">
				    <div class="thumbnail col-xs-2 nomargin">  
						 <img src="<?php echo asset($product['product_image']); ?>"  alt="Light" style="max-height: 200px; width:100%">
						</div>
						   		
	         	<div class="col-md-10">
	         		<div class="row">
	         		  <div class="col-md-9">
	         		    	<h3><?php echo $product['product_name']; ?></h3>
	         		    	 <span class="subtitle">Per Product: Rs.<?php echo $product['price'];?></span><br>
	         		    		<span class="subtitle">Quantity: <?php echo $quantity;?></span><br>
	         		    		<span class="subtitle">Category: <?php echo $product['category_name'];?></span><br>
	         		    	</div>
	         		    	<div class="col-md-3 text-right">
	         		    		<h4>Rs <?php echo $cost; ?>/-</h4>
	         		    	<span class="subtitle">RS.<?php echo $product['price'].'x'. $quantity;?></span><br>
	         		    	</div>
	         		    	<div class="col-md-12 text-right">
	         		    		<a href="<?php echo controller('removefromcart').'?productid='.$product['id']; ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash">
	         		    		</span></a>
	         		    	</div>
	         		    </div>
	         	   </div>
	         	</div>  
	         <?php }?>
	       </div> 
	       <div class="col-md-4">
	       	 <div class="border-rl pad">
	       	 	 <h3 class="text-center">Subtotal</h3>
	       	 	 <table class="table table-hover table-condensed ">
	       	 	 	<tbody>
	       	 	 		<?php
	       	 	 		if (count($products) > 0){
                         foreach ($products as $product)
                         {
                        	    $productid = $product['id'];
			         		            $cartproduct = $cart[$productid];
			         			          $quantity = $cartproduct['quantity'];
			         			          $cost = $product['price'] * $quantity;
			         			          $total = $total + $cost;
			         	          ?>
			         	    <tr>
			         	    	<td><?php echo $product['product_name'];?></td>
			         	    		<td class="text-right">Rs <?php echo $cost; ?>/-</td>
			         	    </tr>
							        <?php
				                   }
				                  }else{ ?>
                       	    <tr>
                       	    	<td colspan="2">No Product Available</td>
                       	    </tr>
                   <?php } ?>

                       <tr>
                       	<td>TOTAL</td>
                       	<td class="text-right">Rs <?php echo $total ?>/-</td>
                       </tr>
                       <tr>
                       	<td>SGST(9%)</td>
                       <td class="text-right">Rs <?php echo $total*0.09; ?>/-</td>
                  	 </tr>	
                  	 <tr>
                       	<td>CGST (9%)	</td>
                       <td class="text-right">Rs <?php echo $total*0.09; ?>/-</td>
                  	 </tr>
                  	 <tr>
                       	<td><h3>Total</h3></td>
                       <td class="text-right">Rs <?php echo $total*1.18; ?>/-</td>
                  	 </tr>		       	 	 		
	       	 	 	  </tbody>
	       	 	  </table>
	       	 	 <div>

	       	 	 	<?php if (isset($_SESSION['cart'])) { ?>
	       	 	 	<a href="<?php echo localhost('billingoptions'); ?>" class="btn btn-success btn-lg btn-block">Checkout <span class="glyphicon glyphicon-log-out">
	       	 	 	</span>
	       	 	 </a>
	       	 	<?php }?>
	       	 	 </div>
	    		</div>
       	</div>
      </div>
    </div> 
</section>
<?php include('includes/footer.php') ?>   	