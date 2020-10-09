
<?php

  require 'clean.php';
  require 'function.php';
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
  <title>Buy and Bet | Register</title>
  <?php include 'style.php';?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <div class="custom-cursor"></div>
  <?php include 'header.php';?>

 

  <section class="registration-section section-paddings" style="margin: 40px 0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="registration-block text-center">
            <div class="play mt-3x">
                <img style="width:30%" src="assets/images/play.png" alt="">
              </div>
            <div class="registration-block-inner">
              <h3 class="titles" style="margin:20px 0">Create A New Account</h3>
              <form class="cmn-form registration-form" method="POST" action="register-process">
              
                <div class="frm-group">
                  <input type="text" name="uname" required id="u-name" placeholder="Username">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="frm-group">
                      <input type="text" name="fname" required id="f-name" placeholder="Full Name">
                    </div>                    
                  </div>

                  <div class="col-md-6">
                    <div class="frm-group">
                      <input type="text" name="phone" required id="phone" placeholder="Your Phone Number">
                    </div>
                  </div>
                                    
                </div>

                <div class="frm-group">
                  <input type="email" name="email" required id="name" placeholder="Your Email">
                </div>

                <div class="frm-group">
                  <textarea name="address" id="" placeholder="Your Address" ></textarea>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="frm-group">
                      <input type="password" name="pass" required id="pass" placeholder="Your Password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="frm-group">
                      <input type="password" name="cpass" required id="re-pass" placeholder="Enter Re-Password">
                    </div>
                  </div>
                </div>
                
                <div class="frm-group inpy">                
                  <input type="checkbox" name="check" required id="check" value="buy">
                  <label class="form-check-label" for="gridCheck">
                   18years old and above
                  </label>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p class="text-center">Code: <b class=" text-danger"><?php echo $code; ?></b></p>
                    </div>
                    <div class="col-md-8">
                        <div class="frm-group">
                            <input type="text" name="code" required id="code" placeholder="Enter Antispan code">
                            <input type="hidden" name="hide" value="<?php echo $code; ?>" >
                        </div>
                    </div>
                </div>
                <div class="frm-group">
                    <button type="submit" name="go" id="register" class="submit-btn">Sign Up</button>
                </div>
                <p><a href="login">Login here?</a> </p>
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