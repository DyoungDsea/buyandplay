
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
        <div class="col-lg-3" style="padding-left:50pxc;" >
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
                        
                        <div class="card-body">
                        <p class="my-3">Funding Request</p>
                        <form class="cmn-form login-form" method="POST" action="fund-process">
                            <div class="frm-group">
                                <input type="text" name="name" title="Enter Depositor/account name eg Young Elefiku" required id="buyPayz" placeholder="Enter Depositor/account name e.g Young Elefiku">
                            </div>

                            <div class="frm-group">
                                <input type="text" name="amount" title="Only number is allow" pattern="^[0-9]*$" required id="buyPayz" placeholder="Enter Amount e.g 20000">
                            </div>

                            <div class="frm-group">
                                <input type="text" name="date" title="Enter Date" value="<?php echo date("d-m-Y"); ?>" required id="datepicker" placeholder="Enter Date ">
                            </div>

                            <div class="frm-group">
                                <input type="text" name="ref" title="Enter Refference No" required id="buyPayz" placeholder="Enter Refference No e.g 098787655">
                            </div>

                            <div class="frm-group">
                            <button type="submit" name="loadx" class="submit-btn">Fund My Wallet</button>
                            </div>
                        </form>
                        
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