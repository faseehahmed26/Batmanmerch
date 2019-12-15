<?php
session_start();
include('includes/header.php');
 ?>
 <section class="login-banner">
 	<div class="container">
 		<div class="col-md-6">
 			<div class="login-box">
 				<h3 class="text_center"><b>Reset Password</b></h3>
 				<form action="<?php echo controller('resetpassword'); ?>" class="padrl-20" method="POST">
 					<div class="form-group">
 						<input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="<?php if(isset($values['email'])){ echo $values['email'];}?>">
 						<span><?php if (isset($errors['email'])){echo $errors['email'];}?></span>
 					</div>
 					<div class="form-group text-right">
 						<a href="<?php echo localhost('login');?>">Login</a>
 					</div>
 					<div class="form-group text-center">
 						<button type="submit" class="btn btn-default btn-lg">Send verification mail</button>
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 </section>
  <?php include('includes/footer.php') ?>