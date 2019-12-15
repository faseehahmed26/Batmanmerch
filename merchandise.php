<?php 
session_start();
include('includes/header.php');
require(rootDir('config/connection'));
try {
    $conn=connect();
    $stmt=$conn->prepare("select * FROM categories");
    $stmt->execute();
    $categories=$stmt->fetchAll();
    
} catch (PDOException $e) {
    echo "<br>" .$e->getMessage();
    die();
    
}
?>
<section class="">
    <div class="container">
    	<h1>Batmans Merchandise</h1>
    		<div class='row'>
            <?php foreach ($categories as $category ) { ?>
                <div class='col-md-4'>
                    <div class='thumbnail box'>
        			        <img src="<?php echo  ($category['image']); ?>" alt="lights" style="max-height: 200px">
        				 <div class="caption text-right">
        				 	<h3 class="text-left text-capitalize"><?php echo $category['name'];?> </h3>
        				 		<a href="<?php echo localhost('products') .'?category='.$category['id']; ?>" class="btn btn-primary" >See more</a>
        				</div> 		
        		    </div>	
                </div>	 	
            <?php } ?>    	
    </div>
</section>

<?php include('includes/footer.php') ?>