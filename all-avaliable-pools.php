
<?php 

// session_start();

require 'clean.php';
require 'function.php';
require 'all-tips-past.php';
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
  <title>Buy and Bet | All Tips</title>
  
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
                 
                      <h4> Avaliable Pools </h4>
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
                          <?php include 'game-link.php'; ?>
                        
                        </div>
                  </div>
         </div>


         <div class="col-md-10 bg-dangerx">
            <!-- Free Game -->
            <div class="row">
              <?php require 'all-pools-display.php'; ?>
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
      include 'modal-pools-vip.php';
    }else{
        include 'all-pool-modal.php';
    }
  
   ?>
</body>

</html>