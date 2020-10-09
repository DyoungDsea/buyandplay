
<?php session_start(); ?>
<?php 
require 'clean.php';
include 'webname.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from rexbd.net/html/butlar/demo/login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 13:20:10 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Forget Password</title>
  <?php include 'style.php';?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <div class="custom-cursor"></div>
  <?php include 'header.php';?>

 

  <section class="login-section section-paddings" style="margin: 40px 0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="login-block text-center">
            <div class="login-block-inner">
              <?php
              if(isset($_SESSION['sms'])){
                echo $_SESSION['sms'];
              }else{?>
                <h3 class="titlez" style="margin:20px 0">Reset Your Password </h3>
            <?php  } ?>
              <form class="cmn-form login-form" method="POST" action="forgot-process">
                <div class="frm-group">
                  <input type="email" name="email" required id="f-name" placeholder="Your Email">
                </div>
                <div class="frm-group">
                  <button type="submit" name="forget" class="submit-btn">Reset Password</button>
                </div>
              </form>
              <p><a href="login">Login</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
  <?php include 'script.php'; unset($_SESSION['sms']) ?>
</body>

<!-- Mirrored from rexbd.net/html/butlar/demo/login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 13:20:10 GMT -->
</html>