
<?php 
session_start();
require 'clean.php';

if(isset($_POST['email'])){
$email = clean($_POST['email']);
}else{
    header("Location:login");
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
              <h3 class="titles" style="margin:20px 0">Complete this form below </h3>
              <form class="cmn-form login-form" method="POST" action="newsletter-process">
                <div class="frm-group">
                  <input type="text"  disabled  value="<?php echo $email; ?>">
                  <input type="hidden" name="email" value="<?php echo $email; ?>" >
                </div>

                <div class="frm-group">
                  <input type="text" name="sub" required id="f-name" placeholder="Subject">
                </div>
                <div class="frm-group">
                  <textarea name="text" id=""  placeholder="Message" ></textarea>
                </div>
                <div class="row">
                <div class="col-md-7">
                    <p class="mt-3 text-danger">Anti-spam code: <?php echo date("id"); ?></p>
                    <input type="hidden" name="hid" value="<?php echo date("id"); ?>" >
                </div>
                <div class="col-md-5">
                    <div class="frm-group">
                    <input type="text" name="code" required placeholder="Code here">
                    </div>
                </div>
                </div>
                <div class="frm-group">
                  <button type="submit" name="login" class="submit-btn">Submit</button>
                </div>
              </form>
              <!-- <p><a href="register">Need account click here?</a><a href="forgot-password">Forget password?</a></p> -->
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