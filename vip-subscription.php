
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
  <title>Buy and Bet | VIP Subcription</title>
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
  <section class="blog-details-section  mt-5">
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

        <div class="col-lg-9 mt-3">
        <div class="container">
        <div class="card mb-3">
            <div class="card-body bg-dangers "  style="background-color:#000040;">
                <?php
                    // echo $idx;
                $dzz = $conn->query("SELECT * FROM  `dvip_account` WHERE duser_id='$idx' AND dstatus='active' ");
                if($dzz->num_rows>0){ 
                    $row = $dzz->fetch_assoc();
                    $duration  = $row['dduration'];
                    $now = date("Y-m-d");
                    $date1 =  $row['dstarting_date'];
                    $date2 =  $row['dclosing_date'];
                    $days = floor((strtotime($date2) - strtotime($now)) / (60 * 60 * 24));
                ?>
                <!-- <p style="color:white">You can extend your subscription and your subscription will be added automatically!</p> -->
                <p style="color:white">Subscripton Days: <?php echo $duration; ?>days</p>
                <p style="color:white">Remaining Days: <?php echo $days; ?>days</p>
                <p style="color:white">Subscripton Date: <?php echo date("d M Y", strtotime($date1)); ?></p>
                <p style="color:white">Expiring Date: <?php echo date("d M Y", strtotime($date2)); ?></p>
        <?php }else{?>
                <p style="color:white">Become a VIP and have access to view all games!</p>

            <?php  } ?>
            </div>
        </div>

        <div class="row mt-4">
        
        <?php
        $d = $conn->query("SELECT * FROM `dvip_categories` ORDER BY id ");
        if($d->num_rows>0):
            while($r=$d->fetch_assoc()):?>
                <div class="col-md-4 mb-2">
                    <div class="card text-center">
                        <div class="card-body">                        
                        <h5><?php echo $r['dmonth']; ?></h5>
                        <h6 class="my-3"><?php echo formatNaira($r['dprice']) ?></h6>
                        <form action="Vip-process" method="post">
                            <input type="hidden" name="name" value="VIP registraion for <?php echo $r['ddays']; ?>">
                            <input type="hidden" name="fee" value="<?php echo $r['dprice']; ?>">
                            <input type="hidden" name="id" value="<?php echo $r['vip_id']; ?>">
                          <?php 
                          $dgame =clean($r['vip_id']);
                          $ui =clean($_SESSION['userId']);
                          $z = $conn->query("SELECT * FROM `dvip_account` WHERE  duser_id='$ui' AND dstatus='active'");
                          if($z->num_rows ==0){
                           ?>
                            <button tyle="submit" name="cart" class="btn btn-primary btn-sm">BECOME A VIP</button>
                          <?php }else{ $p=$z->fetch_assoc(); if($p['dduration'] == $r['ddays'] ) { ?>
                            <!-- <button tyle="button" disabled class="btn btn-success btn-sm "> <i class="fa fa-check"></i> VIP </button> -->
                            <button tyle="submit" name="cart" class="btn btn-primary btn-sm">Extend subscription</button>
                          <?php }else{?>

                            <button tyle="submit" name="cart" class="btn btn-primary btn-sm">Subscribe</button>
                        <?php  }  }?>
                        </form>
                        </div>
                    </div>
                </div>
                    
            <?php endwhile; endif; ?>
            </div>
<a href="javascript:history.back()" class="btn btn-danger mt-4  pull-right">Go Back</a>
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