<?php include('includes/header.php') ?>
<?php
    if(isset($_SESSION['errors'])){
      $errors=$_SESSION['errors'];
      unset($_SESSION['errors']);
    }
    if(isset($_SESSION['values'])){
      $values=$_SESSION['values'];
      unset($_SESSION['values']);
    }
?>

<section>
    	<div class="">
    		<div class="container ">
    			<div class="content-container row">
	    			<div class='col-md-3'>
		    			<img src="<?php  echo asset('img/batmaninlogo.jpg')?>"width="100%" src="" alt="">
	    			</div>
	    			<div class='col-md-9 padding20'>
						<h1>About Batman</h1>
						<p>
							Batman operates in the fictional Gotham City with assistance from various supporting characters, including his butler Alfred, police commissioner Gordon, and vigilante allies such as Robin. Unlike most superheroes, Batman does not possess any superpowers; rather, he relies on his genius intellect, physical prowess, martial arts abilities, detective skills, science and technology, vast wealth, intimidation, and indomitable will. A large assortment of villains make up Batman's rogues gallery, including his archenemy, the Joker.
						</p>
	    			</div>
    			</div>
    		</div>
    	</div>
</section>
    <!-- footer -->
   <?php include('includes/footer.php') ?>