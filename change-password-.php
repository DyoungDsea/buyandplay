
<?php 
require 'session_track.php';
require 'clean.php';
require 'function.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Change Password</title>
  <?php include 'style2.php'; ?>
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
  <section class="blog-details-section">
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

        <div class="col-lg-9 mt-4" >
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <form class="cmn-form login-form text-center" method="POST" action="change-process">
                <div class="frm-group">
                  <input type="password" name="old" required id="f-name" placeholder="Current Password">
                </div>
                <div class="frm-group">
                  <input type="password" name="pass" required id="pass" placeholder="New Password">
                </div>
                <div class="frm-group">
                  <input type="password" name="cpass" required id="pass" placeholder="Confirm New Password">
                </div>
                <div class="frm-group">
                  <button type="submit" name="login" class="submit-btn">Change Password</button>
                </div>
              </form>
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