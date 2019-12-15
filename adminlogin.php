<?php

 include('includes/header.php');
 ?>

<section class="login-banner">
    <div class="container">
        <div class="col-md-6">
            	<div class="login-box">
            		 <h3 class="text-center"><b>Login </b></h3>
            		 <form action="<?php echo controllers('adminuser');?>" class="padrl-20 row" method="POST">
									<div class="form-group col-md-12">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="<?php if(isset($values['email'])){echo $values['email']; } ?>">
                    <span><?php if(isset($errors['email'])){echo $errors['email']; } ?> </span>
									</div>
									<div class="form-group col-md-12">
										<input type="password" name="password" class="form-control" id="password" placeholder="Password">
										<span><?php if(isset($errors['password'])){echo $errors['password']; } ?> </span>
									</div>
									
									  <div class="form-group text-center">
									  		<button type="submit" class="btn btn-default btn-lg">Login</button>
									  </div>

            		 </form>
            	</div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>