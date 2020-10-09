
<?php @session_start(); ?>
<?php 
require 'clean.php';
include 'webname.php';
//check if session isset
if(isset($_SESSION['user']) AND $_SESSION['user']==true){
  header("Location: dashboard");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from rexbd.net/html/butlar/demo/login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 13:20:10 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Login</title>
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
              <h3 class="titles" style="margin:20px 0">Login Your Account </h3>
              <form class="cmn-form login-form" method="POST" action="login-process">
                <div class="frm-group">
                  <input type="email" name="email" required id="f-name" placeholder="Your email">
                </div>
                <div class="frm-group">
                  <input type="password" name="pass" required id="pass" placeholder="Your Password">
                </div>
                <div class="frm-group">
                  <button type="submit" name="login" class="submit-btn">Sign In</button>
                </div>
              </form>
              <p><a href="register">Need account click here?</a><a href="forgot-password">Forget password?</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
  <?php include 'script.php'; ?>
</body>

<!-- Mirrored from rexbd.net/html/butlar/demo/login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 13:20:10 GMT -->
</html>