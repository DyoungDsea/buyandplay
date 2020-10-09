
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
  <title>Buy and Bet | My Offers</title>
  
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
            <div class="col-lg-3" style="padding-left:50pxx;" >
                <div class="sidebar">
                    <!-- widget end -->
                        <div class="widget widget-categories">
                        <!-- <h4 class="widget-title">Dashboard</h4> -->
                        <?php include 'link.php' ?>
                        

                        </div>
                    
                
                </div>
            </div>

           

            <div class="col-lg-9 mt-3" >
            <div class="row">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center ml-3n mb-3 p-3">
                                <h4> Account Setting <img src="https://www.tipstersportal.com/assets/img/match_grid_live_now.png" alt=""></h4>
                            </div>
        </div>
        </div>
        <div class="col-md-8"></div>
        </div>
        
    <div class="container">
            <div class="card">
        <div class="card-body">
        
        <?php 
        $id = clean($_SESSION["userId"]);
          $a = $conn->query("SELECT * FROM `members_register` WHERE userid='$id'");
          $as = $a->fetch_assoc();

        ?>

            <form class="cmn-form row registration-form" method="POST" action="update-account-process">

                <div class="col-md-6">
                <div class="frm-group">
                  <input type="text" name="uname" disabled required id="u-name" value="<?php echo $as['username']; ?>" placeholder="Username">
                </div>
                </div>
                <div class="col-md-6">
                <div class="frm-group">
                  <input type="text" name="fname" required disabled id="f-name" value="<?php echo $as['dname']; ?>" placeholder="Full Name">
                </div>                
                </div>

                <div class="col-md-6" style="margin-top:-15px">
                <div class="frm-group">
                  <input type="email" name="email" required id="name" disabled value="<?php echo $as['demail']; ?>" placeholder="Your Email">
                </div>
                </div>
                <div class="col-md-6"  style="margin-top:-15px">
                <div class="frm-group">
                  <input type="text" name="phone" required id="phone" value="<?php echo $as['dnumber']; ?>" placeholder="Your Phone Number">
                </div>                
                </div>

                <div class="col-md-12" style="margin-top:-15px">
                <div class="frm-group ">
                  <textarea name="address" id="" placeholder="Your Address" ><?php echo $as['address']; ?></textarea>
                </div>
                </div>

                <div class="frm-group text-center ml-3">
                    <button type="submit" name="go" class="submit-btn">Update Account</button>
                </div>

              </form>
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

        </div>

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