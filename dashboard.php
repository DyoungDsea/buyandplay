
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
  <title>Buy and Bet | Dashboard</title>
  
 <?php include 'style.php'; ?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

 <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <section class="blog-details-section  padding-top-95x " style="margin:30px 0 50px ">
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

        <div class="col-lg-9"> 
        <?php 
        $promo =$conn->query("SELECT * FROM dpromo")->fetch_assoc();
        $getstart = date("Y-m-d", strtotime($promo['start_date']));
        $getend = date("Y-m-d", strtotime($promo['end_date']));
        $now = date("Y-m-d");
        if( $getstart == $now || $getstart < $now AND $getend >= $now){

        ?>
          <div class="card mb-3 ml-3x">
            <div class="card-body">
            
            <p><?php echo $promo['dtext'] ?></p>
            </div>
          </div>
        <?php } ?>

          <div class="container mt-3">
        <div class="row  ">

        <div class="col-md-4">
          <div class="card mb-3" style="background-color:#000040;">
            <div class="card-body text-center">
            <a href="game-categories" class="text-white">Become A Tipster</a> 
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card  mb-3" style="background-color:#000040;">
            <div class="card-body ">
              <p style="color:white"><b> Username:</b> <?php echo $k['username']; ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card  mb-3" style="background-color:#000040;">
            <div class="card-body ">
              <p style="color:white"><b> Wallet Balance:</b> <?php echo formatNaira($wallet_); ?></p>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4"></div> -->
        </div>

        <!-- <div class="my-2"></div> -->





        <div class="containerx bg-primarys mb-4">
        <div class="row">
        <?php if($k['dcategory']=='Tipster' && $k['dvip']=='inactive'  ){ ?>
        <div class="col-md-4">
          <div class="card mb-3" style="background-color:#000040;">
          <div class="card-body bg-primaryx text-white " style="padding:20px">
          <b> Membership:</b> <?php echo 'Member'; ?>       
          </div>

          </div>
        </div>

        <?php }else if($k['dcategory']=='Tipster' && $k['dvip']=='active' ){ ?>

          <div class="col-md-4">
            <div class="card mb-3">
            <div class="card-body bg-primaryx text-white" style="padding:20px; background-color:#000040;">
            <b> Membership:</b> VIP Member 
            </div>

            </div>
          </div>
          <?php
        }else if($k['dcategory']=='Punter' && $k['dvip']=='active' ){ ?>

          <div class="col-md-4">
            <div class="card mb-3">
            <div class="card-body bg-primaryx text-white" style="padding:20px; background-color:#000040;">
            <b> Membership:</b> VIP  
            </div>

            </div>
          </div>
          
        <?php }else{ ?>
          <div class="col-md-4">
            <div class="card mb-3">
            <div class="card-body bg-primaryx text-white" style="padding:20px; background-color:#000040;">
            <b> Membership:</b> Basic  
            </div>

            </div>
          </div>
          
          <?php 
        } if($k['dcategory']=='Tipster'): ?>        

        <div class="col-md-4">
          <div class="card mb-3">
          <div class="card-body bg-primary " style="padding:20px">
            <a href="tips" class="text-white">Post New Tips </a>       
          </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-3">
          <div class="card-body bg-secondary " style="padding:20px">
            <a href="game-offers" class="text-white">My Posted Tips</a>       
         
          </div>

          </div>
        </div>
        <?php endif; ?>
        <div class="col-md-4">
          <div class="card mb-3">
          <div class="card-body bg-success " style="padding:20px">
            <a href="update-account" class="text-white"> Account Setting  </a>          
          
          </div>

          </div>
        </div>


        <div class="col-md-4 mb-3">
          <div class="card">
          <div class="card-body bg-primary " style="padding:20px">
            <a href="message" class="text-white"> My Messages </a>       
          </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
          <div class="card-body bg-dark " style="padding:20px">
            <a href="subscription" class="text-white"> My Rankings </a>       
         
          </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
          <div class="card-body bg-info " style="padding:20px">
            <a href="game_history" class="text-white">My Bought Tips  </a>          
          
          </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-3">
          <div class="card-body bg-warning " style="padding:20px">
            <a href="wallet-balance" class="text-white">Make Deposit </a>          
          
          </div>

          </div>
        </div>


        <div class="col-md-4">
          <div class="card mb-3">
          <div class="card-body bg-danger " style="padding:20px">
            <a href="change-password" class="text-white">Change Password </a>          
          
          </div>

          </div>
        </div>


        </div>
        </div>


        <a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

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