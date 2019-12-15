<?php
session_start();
include('includes/header.php');
require(rootDir('config/connection'));
try {
    $conn=connect();
    $stmt=$conn->prepare("select * FROM categories");
    $stmt->execute();
    $categories=$stmt->fetchAll();

    $stmt=$conn->prepare("select products.*,products.image as product_image,categories.name as category_name FROM products JOIN categories ON products.category_id =categories.id where category_id=:id");
    $stmt->bindParam(':id', $id);
    $id = $_GET['category'];
    $stmt->execute();
    $products = $stmt->fetchAll();


    } catch (Exception $e) {
    echo "<br>" .$e->getMessage();
    die();
    
}
?>
<section class="">
    <div class="container">
          <h1>Batmans Merchandise</h1>
            <div class="row">
              <div class="col-md-3 margin20px">
                 <div class="panel-group">
                  <div class="panel panel-default" >
                   <div class="panel-heading">
                     <h4 class="panel-title"> 
                      <a data-toggle="collapse" href="#collapse1">Browse</a></h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                    <ul class="list-unstyled">
                      <?php foreach ($categories as $category ){?> 
                      <li class='text-capitalize'>
                        >  <a href="<?php echo localhost('products').'?category='.$category['id']; ?>">
                          <?php echo $category['name'] ; ?>

                          </a>
                        </li>
                      <?php }?>

                    </ul>
                  </div>
                 </div>
                </div>
              </div>
            </div>

            <div class='col-md-9'>
            <div class='row'>
            <?php foreach ($products as $product ) { ?>
             <div class='col-md-4'>
              <div class="thumbnail box">
               <img src="<?php echo asset($product['product_image']); ?>" height="185px" width="100%" alt="LIght" style="max-height: 200px">
            <div class="caption bordertop">
             <h4 class='text-capitalize'><b><?php echo  $product['product_name'];?></b></h4>
             <div class='text-capitalize subtitle text-left '>Category: <?php echo $product['category_name']; ?>
             </div>
              <div class="row">
                <div class="col-xs-12 text-right">
                          <b>Rs.<?php echo $product['price']; ?></b>
                        </div>
                           <div class="col-xs-12 text-right">
                            <br>
                            <a href="<?php echo controller('addtocart'). '?productid='.$product['id']; ?>" class="btn btn-success">Add to cart</a>
                                <a href="<?php echo localhost('productdetails'). '?productid='.$product['id']; ?>" class="btn btn-primary">View Product</a>
                              </div>
                            </div>
                      </div>
               </div> 		
           </div> 		
        <?php }?>
      </div>
   </div>
  </div>
</section>
<?php include('includes/footer.php') ?>