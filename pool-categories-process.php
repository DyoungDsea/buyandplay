
<?php 
require 'session_track.php';
require 'function.php';
require 'clean.php';

if(isset($_POST['carts']) && $_POST['fee'] !=''){
    $_SESSION['name'] = clean($_POST['name']);
    $_SESSION['fee'] = clean($_POST['fee']);
    $_SESSION['id'] = clean($_POST['id']);
}
else{
  header("Location:game-categories");
}

    $_SESSION['email'] = $email;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Pool Category Process </title>
  <?php include 'style.php'; ?>


</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <div class="custom-cursor"></div>
  <!--  header-section start  -->
  
  <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <!-- banner-section start -->
 
  <!-- banner-section end -->

  <!-- blog-details-section start -->
  <section class="blog-details-section mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3" style="padding-left:50px;" >
          <div class="sidebar">
            <!-- widget end -->
            <div class="widget widget-categories">
              <!-- <h4 class="widget-title">Dashboard</h4> -->
              <?php include 'link.php' ?>
              

            </div>
            
          
          </div>
        </div>
        <!-- end of first col  -->

        <div class="col-lg-9 ">
        <!-- <p>Instruction here.....</p> -->
        <div class="row">
        <div class="col-md-2"></div>

        <?php
        
        if(isset($_SESSION['name']) && isset($_SESSION['fee']) && isset($_SESSION['id'])){
            $cid = $_SESSION['id'];
        $d = $conn->query("SELECT * FROM `dpools` WHERE dcategory_ids='$cid'");
        if($d->num_rows>0):
            $r=$d->fetch_assoc()?>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                        <div class="bg-warning p-3 mb-2 text-white">
                          <p>Wallet Balance: <?php echo formatNaira($wallet_); ?></p>
                        </div>
                        <p>Do you want to become a  Tipster under </p>                        
                        <h5><?php echo ucwords($r['dpool']); ?></h5>
                        <h6 class="mt-2">Cost: <?php echo formatNaira($r['dfee']) ?></h6>
                        

                        <form action="pool-process" method="post">                                       
                        <hr>
                        <input type="hidden" name="name" value='<?php echo $_SESSION['name']; ?> '>
                        <input type="hidden" name="price" value='<?php echo $_SESSION['fee']; ?> '>
                        <input type="hidden" name="id" value='<?php echo $_SESSION['id']; ?> '>
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <a href="javascript:history.back()" class="btn btn-danger">No</a>
                        <hr>   
                        </form> 
                        </div>
                    </div>
                    
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

                </div>
                    
            <?php endif; } ?>

            <div class="col-md-"></div>
        </div>
        </div>
<!-- end of second col  -->




        
      </div>
    </div>
  </section>
  <!-- blog-details-section end -->
<div class="mb-4"></div>
  <!-- footer-section start -->
  <?php 
include('footer.php');
  ?>
  <!-- footer-section end -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->
  <?php include('script.php'); ?>

</body>

</html>