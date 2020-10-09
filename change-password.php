
<?php 

// session_start();

require 'clean.php';
require 'function.php';
require 'session_track.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Change Password</title>
  
 <?php include 'style.php'; ?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

 <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <section class="blog-details-section  padding-top-95x " style="margin:50px 0;">
    <div class="container-fluid">
         <div class="row justify-content-center bg-primaryz" style="">
            <div class="col-lg-3" style="padding-left:50pxn;" >
                <div class="sidebar">
                    <!-- widget end -->
                        <div class="widget widget-categories">
                        <!-- <h4 class="widget-title">Dashboard</h4> -->
                        <?php include 'link.php' ?>
                        

                        </div>
                    
                
                </div>
            </div>

           

            <div class="col-lg-9 mt-3" >
          
        
    <div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                    

                 
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
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

              </div>

        </div>
        </div>
        <div class="col-md-2"></div>

        </div>
        </div>


            </div>
        </div>
    </div>
</section>

      

  <!-- footer-section start -->
  
 <?php include 'footer.php'; ?>
  <!-- footer-section end -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

 
  <?php include 'script.php'; ?>
</body>

<!-- Mirrored from rexbd.net/html/butlar/demo/statistics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 13:20:01 GMT -->
</html>