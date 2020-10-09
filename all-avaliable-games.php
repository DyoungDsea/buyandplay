
<?php 

// session_start();

require 'clean.php';
require 'function.php';
require 'all-tips-past.php';


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
  <title>Buy and Bet | All Avaliable Tips </title>
  
 <?php include 'style.php'; ?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

 <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <section class="blog-details-section  padding-top-95x " style="margin:0 0 50px;">
    <div class="containerfluid">
      <div class="row justify-content-center bg-primaryz" style="padding:40px">
          

        <div class="col-lg-12  bg-primaryx">  

        <div class="row">
          <div class="col-md-4">
              <div class="boxer">
                  <div class="card text-center  mb-3 p-3">
                      <h4> Avaliable Tips <img src="https://www.tipstersportal.com/assets/img/match_grid_live_now.png" alt=""></h4>
                  </div>
              </div>
          </div>
          <div class="col-md-8"></div>
        </div>

       <div class="row bg-successj">
         <div class="col-md-2 bg-primaryd mb-3">
                  <div class="sidebar">
                    <!-- widget end -->
                        <div class="widget widget-categories">                     
                          <?php include 'game-link.php'; ?>
                        
                        </div>
                  </div>
         </div>


         <div class="col-md-10 bg-dangerx ">
            <!-- Free Game -->
            <div class="row">
              <?php //require 'all-game-display.php'; ?>
              <?php 
                  $game = $conn->query("SELECT * FROM `dgame_categories` WHERE dfee !=0 AND dstatus ='active' ORDER BY dcategory"); 
                    if($game->num_rows>0){                        while($done = $game->fetch_assoc()):

                  ?>
              <div class="col-md-3">
                <a style="display:block" class="hover" href="forecast-sport-game?cat_id=<?php echo $done['category_id']; ?>&<?php echo $done['category_id']; ?>tyff<?php echo $done['category_id']; ?>fgf<?php echo $done['category_id']; ?>bhg<?php echo $done['category_id']; ?>nbhvgf<?php echo $done['category_id']; ?>ghjhyt<?php echo $done['category_id']; ?>" style="font-size:20px;"><div class="card mb-2">
                  <div class="card-body text-center mouse"><?php echo $done['dcategory']; ?></div>
                </div></a>
              </div>

              <?php endwhile; }
                 $game = $conn->query("SELECT * FROM `dpools` WHERE dstatus ='active' ORDER BY dpool"); 
                 if($game->num_rows>0):
                     while($done = $game->fetch_assoc()):
                ?>
                <div class="col-md-3">
                <a style="display:block" class="hover" href="forecast-pools-game?cat_id=<?php echo $done['dcategory_ids']; ?>&<?php echo $done['dcategory_ids']; ?>nhsy<?php echo $done['dcategory_ids']; ?>bgstr<?php echo $done['dcategory_ids']; ?>nkau<?php echo $done['dcategory_ids']; ?>" style="font-size:20px;">                
                  <div class="card">
                    <div class="card-body text-center mouse"><?php echo $done['dpool']; ?>(Pools)</div>
                  </div>
                </a>
              </div>


                <?php endwhile; endif;  ?>



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
      include 'modal-sport-vip.php';
    }else{
    include 'all-sport-modal.php';
    }
  
   ?>
</body>

</html>