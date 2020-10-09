
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
  <title>Buy and Bet | All Tips</title>
  
 <?php include 'style.php'; ?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

 <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <section class="blog-details-section  padding-top-95x " style="margin:30px 0 50px">
    <div class="container-fluid">
      <div class="row justify-content-center bg-primaryz" style="">
          <div class="col-lg-3" style="padding-left:50pxv;" >
                <div class="sidebar">
                    <!-- widget end -->
                        <div class="widget widget-categories">
                        <!-- <h4 class="widget-title">Dashboard</h4> -->
                        <?php include 'link.php' ?>
                        

                        </div>
                    
                
                </div>
            </div>
            <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } 
                    else {
                            $page_no = 1;
                          } 
                    $total_records_per_page = 50;

                ?>

        <div class="col-lg-9">  
  

        <div class="row mt-2">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center  mb-3 p-3">
                                <h4> My Ranking <img src="https://www.tipstersportal.com/assets/img/match_grid_live_now.png" alt=""></h4>
                            </div>
        </div>
        </div>
        <div class="col-md-8">
<a href="game-categories" style="margin: 20px 0" class="btn btn-primary hide-small pull-right mr-5"> Become a Tipster</a>
</div>
        </div>

            <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Ranking</th>
                        <th> Date</th>
                    </tr>
                    <tbody>
                        <?php 
                        $id = clean($_SESSION['userId']);
                        $sqls =$conn->query("SELECT * FROM `dcategory_subscriptions` WHERE userid='$id' ORDER BY id DESC");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dcategory_subscriptions` WHERE userid='$id' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):
                            $cat = clean($r['dgame_cat_id']);
                            
                            
                            ?>                        
                        <tr>
                            <td><?php echo $r['dcategory'] ?></td>
                            <td><?php echo $r['status'] ?></td>
                            <td><?php
                            $cot = $conn->query("SELECT * FROM `dstar_rating` INNER JOIN `dgame_categories` ON dstar_rating.dcategory_id= dgame_categories.category_id WHERE dgame_categories.category_id='$cat' AND dstar_rating.duser_id='$id' ");
                            if($cot->num_rows > 0){                            
                             require 'star-rating-new.php';
                             }else{
                              require 'star-rating-pool-new.php';
                             }
                             
                              ?></td>
                            <td><?php echo date("d M Y", strtotime($r['ddate'])) ?></td>
                        </tr>
                            <?php endwhile; }else{
                              echo '<tr><td colspan="4" style="color:red"> 
                              <a href="game-categories" class="btn  btn-primary m-2"> BECOME A FORECASTER</a>
                              </td></tr>';
                              // <a href="game-categories" class="btn  btn-success m-2"> BECOME A VIP</a>
                            } ?>
                    </tbody>
                </table>  
                
                <a href="javascript:history.back()" class="btn btn-secondary pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a> 
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