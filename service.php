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
<section class="">
    <div class="container">
        <h1>Services</h1>
        <div class="row">
            <div class="col-md-4">
                <div class='box'>
                    <img src="<?php  echo asset('img/joker.jpg')?>" height="185px" width="100%" alt="">
                    <div class="content">
                        <h3>Killing joker</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta modi mollitia animi facere excepturi perferendis aperiam, in reiciendis repudiandae quia aspernatur sequi, dolorem, iusto veritatis unde dignissimos impedit est optio.
                        </p>
                    </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class='box'>
                        <img src="<?php  echo asset('img/helping.jpg')?>" width="100%" alt="">
                        <div class="content">
                            <h3>Helping Law</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta modi mollitia animi facere excepturi perferendis aperiam, in reiciendis repudiandae quia aspernatur sequi, dolorem, iusto veritatis unde dignissimos impedit est optio.
                            </p>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
                <div class='box'>
                    <img src="<?php  echo asset("img/bats.png")?>" width="100%" alt="chu">
                    <div class="content">
                        <h3>Protect arkham city</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta modi mollitia animi facere excepturi perferendis aperiam, in reiciendis repudiandae quia aspernatur sequi, dolorem, iusto veritatis unde dignissimos impedit est optio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <?php include('includes/footer.php') ?>