
<?php 
require 'session_track.php';
require 'function.php';
require 'clean.php';

if(isset($_SESSION['transId']) && @$_SESSION['transId']==''){
    $_SESSION['transId'] = transaction();
}else{
    $_SESSION['transId']= transaction();
}

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
        <div class="col-lg-3" style="padding-left:50pxb;" >
          <div class="sidebar">
            <!-- widget end -->
            <div class="widget widget-categories">
              <!-- <h4 class="widget-title">Dashboard</h4> -->
              <?php include 'link.php' ?>
              

            </div>
            
          
          </div>
        </div>
        <!-- end of first col  -->

        <div class="col-lg-9 mt-3x" >
            <div class="row mt-4">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header  my-3 text-success">
                         <p><b> My  Wallet Balance </b></p>
                         <p><b>&#8358; <?php echo number_format($k['dwallet_balance'],2); ?> </b></p>
                        </div>
                        <div class="card-body">
                        <hr>
                        <p class="my-3">Recharge your wallet</p>
                        <form class="cmn-form login-form" method="POST" action="stack-process">
                            <div class="frm-group">
                            <input type="text" name="total" title="Only number is allow" required id="buyPay" pattern="^[0-9]*$" placeholder="Enter Amount Here...">
                            </div>
                            <div class="frm-group">
                            <button type="submit" name="load" class="submit-btn">Proceed</button>
                            </div>
                        </form>

                        <hr>
                        OR
                        <hr>
                        <div class="my-4">
                        <h4>Bank Deposit/Transfer</h4>
                        <p> <b>Account Name: Trophy Ventures International</b> </p>
                        <p> <b>Account Number: 2019803401</b> </p>
                        <p> <b>Bank: First Bank</b> </p>
                        <hr>
                        <p>
                        After making your deposit or transfer, click continue to fill in your transaction detiails.
                        </p>
                        <a href="funding-request" class="btn btn-primary my-3">Continue</a>
                        </div>
                        
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

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
  <?php include('script.php'); ?>

</body>

</html>