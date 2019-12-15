<?php
session_start();
include('includes/header.php');
require(rootDir('config/connection'));
  try {
      $conn=connect();
      $stmt=$conn->prepare("select products.*,products.image as product_image,categories.name as category_name,categories.image as category_image FROM products JOIN categories ON products.category_id =categories.id where products.id=:id");
      $stmt->bindParam(':id',$id);
      $id=$_GET['productid'];
      $stmt->execute();
      $product =$stmt->fetch();
      if($product == false){
        redirectTo(localhost('404'));
      }
  }catch (Exception $e) {
      echo "<br>" .$e->getMessage();
      die();   
    }
  ?>
<section class="">
    <div class="container">
    <h1 >Batmans Merchandise</h1>
      <div class="row">
        <div class="col-md-5 thumbnail">
    			<img src="<?php echo asset($product['product_image']); ?>" height="140px" width="400px" alt="light">
        </div>
    		<div class="col-md-7">
    				 	<h3> <b><?php echo $product['product_name']; ?></b></h3>
              <div class="row">
                <div class="col-md-8">
                  <p>
                    Free Shipping<br>
                    Category :<?php echo $product['category_name']; ?> <br>
                    <b>Description</b> : <br>
                    <?php echo $product['product_description']; ?> <br>
                    <hr/>
                    <label for="quantity">Quantity:</label>
                    <form method="POST" action="<?php echo controller('addtocart'). '?productid='.$product['id']; ?>" class='form-inline'>
                      <div class="form-group">
                        <input type="number" name="quantity" class="form-control quantitytext" value="1"><br>
                        <span><?php if (isset($errors['quantity'])){echo $errors['quantity']; } ?> </span>
                      </div>
                      <div class="form-group pull-right">
                        <button class="btn btn-success btn-sm">Add to cart</button>
                      </div>
                    </form>
                  </p>
                  <?php if (isset($_SESSION['cart'])) { ?>
                    <a href="<?php echo localhost('cart') ?>" class="btn btn-primary w100">Checkout</a>
                  <?php }?>
                  <div class="col-md-4">
                    <p class="price"><b>Rs <?php echo $product['price']; ?> /-</b></p>
                  </div>
                </div>
              </div>				 	
					 </div> 
			
		</div>	
</section>


<?php include('includes/footer.php') ?>