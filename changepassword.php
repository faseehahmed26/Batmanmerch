<?php
session_start();
include('includes/header.php');
require(rootDir('config/connection'));
?>
<?php
	$code =$_SESSION['verification_code'];
	try {
		$conn = connect();
		$stmt=$conn->prepare("select * FROM users WHERE verification_code='$code'");
		$result=$stmt->execute();
		if($stmt->rowCount() == 0){
	    flash('danger','Verification code is Invalid! PLease try again');
		redirectTo(localhost('forgetpassword'));	
		}
	}catch (PDOException $e) {
		echo "<br>" .$e->getMessage();
		die();
	}
?>
<section class="login-banner">
 	<div class="container">
 		<div class="col-md-6">
 			<div class="login-box">
 				<h3 class="text_center"><b>Change Password</b></h3>
 				<form action="<?php echo controller('changepassword'); ?>" class="padrl-20" method="POST">
 					<div class="form-group ">
 						<input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="New Password" value="<?php if(isset($values['newpassword'])){ echo $values['newpassword'];}?>">
 						<span><?php if (isset($errors['newpassword'])){echo $errors['newpassword'];}?></span>
 					</div>
 					<div class="form-group">
 						<input type="password" name="retypepassword" class="form-control" id="retypepassword" placeholder="Re-type Password" value="<?php if(isset($values['retypepassword'])){ echo $values['retypepassword'];}?>">
 						<span><?php if (isset($errors['retypepassword'])){echo $errors['retypepassword'];}?></span>
 					</div>
 				
 					<div class="form-group text-center">
 						<button type="submit" class="btn btn-default btn-lg">Change Password</button>
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 </section>
<?php include('includes/footer.php') ?>