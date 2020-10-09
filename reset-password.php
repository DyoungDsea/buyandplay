<?php 
require 'clean.php';
// include 'webname.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Reset Password</title>
  <?php include 'style.php';?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <div class="custom-cursor"></div>
  <?php include 'header.php'; ?>

 

  <section class="login-section section-paddings" style="margin: 40px 0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="login-block text-center">
            <div class="login-block-inner">
              <h3 class="titles" style="margin:20px 0">Choose New Password </h3>
              <form class="cmn-form login-form" method="POST" action="reset-proccess">
                
                <div class="frm-group">
                  <input type="password" name="pass" required id="pass" placeholder="New Password">
                  <input type="hidden" name="em" value="<?php echo $_GET['em']; ?>">
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                </div>
                
                <div class="frm-group">
                  <input type="password" name="cpass" required id="passx" placeholder="Confirm Password">
                </div>
                <div class="frm-group">
                  <button type="submit" name="reset" class="submit-btn">Proceed</button>
                </div>
              </form>
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