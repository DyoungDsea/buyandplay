
<?php 

// session_start();

require 'clean.php';
require 'function.php';
require 'all-pool-past.php';


$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

if(@$_SESSION['user']==true):
require 'session_track.php';
endif;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | All Winning Line Tips</title>
  
 <?php include 'style.php'; ?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

 <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <section class="blog-details-section  padding-top-95x " style="margin:50px 0;">
    <div class="containerfluid">
      <div class="row justify-content-center bg-primaryz" style="padding:40px">
          

        <div class="col-lg-12  bg-primaryx">  

        <div class="row">
          <div class="col-md-4">
              <div class="boxer">
                  <div class="card text-center ml-4 mb-3 p-3">
                      <h4> Avaliable Tips <img src="https://www.tipstersportal.com/assets/img/match_grid_live_now.png" alt=""></h4>
                  </div>
              </div>
          </div>
          <div class="col-md-8"></div>
        </div>

       <div class="row bg-successj">
         <div class="col-md-2 bg-primaryd">
                  <div class="sidebar">
                    <!-- widget end -->
                        <div class="widget widget-categories">                     
                          <ul>
                          <li class="active-sectionb" ><a href="all-tips" style="font-size:20px;">Free</a></li>              
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                            <li ><a href="three-star-game" style="font-size:20px;">3+ Odds</a></li>              
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                            <li><a href="four-star-game" style="font-size:20px;">4+ Odds</a></li>
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                            <li><a href="five-star-game" style="font-size:20px;">5+ Odds</a></li>
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                            <li class="active-sectionx" ><a href="free-pool" style="font-size:20px;">Free(Pool)</a></li>
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                            <li ><a href="nap-pool" style="font-size:20px;">NAP(Pool) </a></li>
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                            <li class="active-section"><a href="wining-line-pool" style="font-size:20px;">Winning Line(Pool) </a></li>
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                          </ul>
                        
                        </div>
                  </div>
         </div>


         <div class="col-md-10 bg-dangerx">
   
            <?php require 'five-star-wpool.php'; ?>
            <?php require 'three-star-wpool.php'; ?>
            <?php require 'four-star-wpool.php'; ?>

        </div>
            <!-- Free Game -->
            <div class="free">
              
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
  <?php 
  
    if(@$k['dvip']=='active'){
      include 'modal-vipp.php';
    }else{
    include 'three-wpool-modal.php';
    include 'four-wpool-modal.php';
    include 'five-wpool-modal.php';
    }
  
   ?>
</body>

</html>