
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

  <section class="blog-details-section  padding-top-95x " style="margin:0 0 50px;">
    <div class="containerfluid">
      <div class="row justify-content-center bg-primaryz" style="padding:40px">
          

        <div class="col-lg-12  bg-primaryx">  

        <div class="row">
          <div class="col-md-4">
              <div class="boxer">
                  <div class="card text-center mb-3 p-3">
                  <?php 
$get_id = clean($_GET['cat_id']);  
          
$game = $conn->query("SELECT * FROM `dgame_categories` WHERE dfee !=0 AND dstatus ='active' AND category_id='$get_id' ORDER BY dcategory"); 
if($game->num_rows>0){
    $done = $game->fetch_assoc();
        // $cat_id = clean($done['category_id']);
        $odd =clean($done['dcategory']);
}
        ?>
                      <h4> Avaliable Tips (<?php echo $odd; ?>) </h4>
                  </div>
              </div>
          </div>
          <div class="col-md-8"></div>
        </div>

       <div class="row bg-successj ">
         <div class="col-md-2 bg-primaryd mb-3">
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
              <?php require 'filter-games.php'; ?>
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
      include 'modal-sport-filter-vip.php';
    }else{
        include 'all-sport-filter-modal.php';
        include 'view-free.php';
    }
  
   ?>
<?php
if(isset($_SESSION['modal'])){?>
   <script>
   $('#<?php echo $_SESSION['modal']; ?>').modal('show')   
   </script>

 <?php unset($_SESSION['modal']); }  ?>
</body>

</html>