<?php 1
session_start();
include('includes/header.php');
require(rootDir('config/connection'));

?>

<section class="login-banner">
 		<div class="container">
 			<div class="col-md-6">
 				<div class="login-box">
 					<h3 class="text-center"><b>Create new Categories</b></h3>
 					<br>
 					<form action="<?php echo controller("admin_create_categories");?>" class="padrl-20 row" method="POST" enctype="multipart/form-data">
 						<div class="form-group col-md-12">
                    <input type="category_name" name="category_name" class="form-control" id="category_name" placeholder="Category Name" value="<?php if(isset($values['category_name'])){echo $values['category_name']; } ?>">
                    <span><?php if(isset($errors['category_name'])){echo $errors['category_name']; } ?> </span>
									</div>
									<div class="form-group col-md-12">
										<input type="file" name="categoryimage" class="form-control" id="categoryimage" placeholder="category image"  value="<?php if(isset($values['categoryimage'])){echo $values['categoryimage']; } ?>">
										<span><?php if(isset($errors['categoryimage'])){echo $errors['categoryimage']; } ?> </span>
									</div>
									     <div>
									  		<button type="submit" class="btn btn-default btn-lg">Create</button>
									  </div>

            		 </form>
            	</div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>
 					