<?php 
session_start();
include('includes/header.php')
 ?>
<section class="login-banner">
    <div class="container">
        <div class="col-md-6">
            	<div class="login-box">
            		 <h3 class="text-center"><b>Register </b></h3>
            		 <br>
            		 <form action="<?php echo controller('registeruser'); ?>" class="padrl-20" method="POST">
							<div class="form-group col-md-12">
								<input type="firstname" name="firstname" class="form-control" id="firstname" placeholder="Firstname" value="<?php if (isset($values['firstname'])){echo $values['firstname']; } ?>">
									<span><?php if (isset($errors['firstname'])){echo $errors['firstname']; } ?> </span>
							</div>
							<div class="form-group col-md-12">
								<input type="lastname" name="lastname" class="form-control" id="lastname" placeholder="Lastname" value="<?php if (isset($values['lastname'])){echo $values['lastname']; } ?>">
									<span><?php if (isset($errors['lastname'])){echo $errors['lastname']; } ?> </span>
							</div>

							<div class="form-group col-md-6">
								<input type="email" name="email" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="form-group col-md-6">
									<input type="number" name="number" class="form-control" id="number" placeholder="Number" value="<?php if (isset($values['number'])){ echo $values['number']; } ?>">
									<span><?php if (isset($errors['number'])){echo $errors['number']; } ?> </span>
								</div>
								<div class="form-group col-md-6">
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
								<div class="form-group col-md-6">
									<select name="gender" class="form-control">
									<option value="">Gender</option>
									<option <?php if (isset($values['gender']) == "male"){echo "selected"; }?> value="male">Male</option>
									<option <?php if (isset($values['gender']) == "female"){echo "selected"; }?> value="female">Female</option>
									<option <?php if (isset($values['gender']) == "others"){echo "selected"; }?> value="others">Others</option>
									</select>
									<span><?php if (isset($errors['gender'])){echo $errors['gender']; } ?> </span>
								</div>
							<div class="form-group col-md-12">
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
									<span><?php if (isset($errors['password'])){echo $errors['password']; } ?> </span>
							</div>
							<div class="form-group text-right">
								<a href="login.php">Already Registered ? Login Now</a>
							</div>

						  <div class="form-group text-center">
						  		<button type="submit" class="btn btn-default btn-lg">Register</button>
						  </div>

            		 </form>
            	</div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>