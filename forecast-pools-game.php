
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
  <title>Buy and Bet | All Avaliable Pools</title>
  
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
          <div class="col-md-6">
              <div class="boxer">
                  <div class="card text-center mb-3 p-3">
                  <?php 
                    $get_id = clean($_GET['cat_id']);  
                            
                    $game = $conn->query("SELECT * FROM `dpools` WHERE  dstatus ='active' AND dcategory_ids='$get_id' ORDER BY dpool"); 
                    if($game->num_rows>0){
                        $done = $game->fetch_assoc();
                            // $cat_id = clean($done['category_id']);
                            $odd =clean($done['dpool']);
                    }
                            ?>
                    <h4> Avaliable Pools (<?php echo $odd; ?>) </h4>
                  </div>
              </div>
          </div>
          <div class="col-md-6"></div>
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


         <div class="col-md-10 bg-dangerx">
            <!-- Free Game -->
            <div class="row">
              <?php require 'all-pools-filter.php'; ?>
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
      include 'modal-pool-filter-vip.php';
    }else{
        include 'all-pool-filter-modal.php';
        include 'view-pool-free.php';
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