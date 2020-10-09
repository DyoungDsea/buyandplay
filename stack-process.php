
<?php 
require 'session_track.php';
require 'clean.php';
require 'function.php';
// $emails = $k['demail'];

$_SESSION['amount'] = clean($_POST['total']);
// echo $_SESSION['amount'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Wallet Balance</title>
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

        <div class="col-lg-9 mt-3" >
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header  my-4 text-success">
                            <p>Transaction details</p>
                         <p>Transaction ID: <b> <?php echo $_SESSION['transId']; ?></b></p>
                         <p>Amount : <b>&#8358; <?php echo number_format($_SESSION['amount'],2); ?> </b></p>
                         
                        </div>
                        <div class="card-body">
                        <hr>
                        <p class="my-3 text-danger">Use the paystack icon below to complete your tansaction</p>
                        <form action="buy.php" method="post">                                       
                            <script src="https://js.paystack.co/v1/inline.js" data-key="pk_live_e40835e8c03b551e3d0c8e16f931edb7cb5aa6b0" data-email="<?php echo $email; ?>" data-amount="<?php echo $_SESSION['amount'] * 100; ?>" data-ref="<?php echo $_SESSION['transId']; ?>">
                            </script>
                                        
                        </form>
                        
                        </div>
                    </div>

                </div>
                <div class="col-md-3"></div>
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

  <!-- main jquery library js file -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <!-- bootstrap js file -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- slick slider js file -->
  <script src="assets/js/slick.min.js"></script>
  <!-- lightcase js file -->
  <script src="assets/js/lightcase.js"></script>
  <!-- wow js file -->
  <script src="assets/js/wow.min.js"></script>
  <!-- tweenmax js file -->
  <script src='assets/js/TweenMax.min.js'></script>
  <!-- main js file -->
  <script src="assets/js/main.js"></script>
</body>

</html>