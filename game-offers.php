
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
          <div class="col-lg-3" style="padding-left:50pxn;" >
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
                        } else {
                            $page_no = 1;
                            } 
                            $total_records_per_page = 20;

                            ?>

        <!-- end of first col  -->

        <div class="col-lg-9 mt-3" >
        <div class="row">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center ml-4n mb-3 p-3">
                                <h4>My Posted Tips   <img src="https://www.tipstersportal.com/assets/img/match_grid_live_now.png" alt=""></h4>
                            </div>
        </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">

          <!-- <a href="tips" class="tip btn btn-primary" style="font-size:16pxz">NEW TIPs</a> -->
        </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

        <?php
            $id = clean($_SESSION['userId']);
          $v =$conn->query("SELECT * FROM `dcategory_subscriptions` WHERE userid='$id' AND status ='active' ORDER BY dcategory  ");
          if($v->num_rows>0){
            $num = 1;
              while($r = $v->fetch_assoc()): ?> 
              
        <li class="nav-item">
          <a class="nav-link  <?php if( $num == 1){echo 'active';} ?>" id="pills-home<?php echo $r['dgame_cat_id'] ?>-tab" data-toggle="pill" href="#pills-home<?php echo $r['dgame_cat_id'] ?>" role="tab" aria-controls="pills-home<?php echo $r['dgame_cat_id'] ?>" aria-selected="true"> <?php echo $r['dcategory'] ?> </a>
        </li>
              <?php $num++; endwhile; } ?>

        


      </ul>

      <div class="tab-content" style="width:100%" id="pills-tabContent">
     
              <?php 
              $vb =$conn->query("SELECT * FROM `dcategory_subscriptions` WHERE userid='$id' ORDER BY dcategory ");
              if($vb->num_rows>0){
                $num = 1;
                while($rr = $vb->fetch_assoc()):
                $cat_id = clean($rr['dgame_cat_id']);
              ?>
        <div class="tab-pane fade show <?php if( $num == 1){echo 'active';} ?> container-fliud"  id="pills-home<?php echo $rr['dgame_cat_id'] ?>" role="tabpanel" aria-labelledby="pills-home<?php echo $rr['dgame_cat_id'] ?>-tab">
        
        

        <div class="row">
                <div class="col-md-12">
                    <div class="card text-centerx">                       
                        <div class="card-body">

            
  <?php
  $bool = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.userid='$id' AND dbooking_code.dodd='$cat_id'  ");

  if($bool->num_rows>0){?>
  
            <div class="table-responsive">

                <table class="table table-bordered" id="myTable" >
                    <tr>
                        <th>Result</th>
                        <th>Booking ID</th>
                        <th>Code</th>
                        <th>Coupon</th>
                        <th>Total Odd</th>
                        <th>Date</th>
                        <!-- <th>Result</th> -->
                        <th>---</th>
                    </tr>
                    <tbody>
                        <?php 
                        
                        $sqls =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.userid='$id'");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.userid='$id' AND dbooking_code.dodd='$cat_id' ORDER BY dbooking_code.id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>                        
                        <tr>
                            <td><?php  if($r['dresult']=='won'){?>
                              <img style="width:40%" src="assets/images/icon-.png" alt="site-logo">
                              <?php
                            }elseif($r['dresult']=='lost'){?>
                              <img style="width:45%; margin-left:-5px " src="assets/images/close.png" alt="site-logo">
                           <?php }elseif($r['dresult']=='cancelled'){
                              echo 'cancelled';
                           }elseif($r['dresult']=='pending'){
                            echo 'pending';
                         } ?></td>
                            <td><?php echo $r['booking_id'] ?></td>
                            <td><?php echo $r['dcode'] ?></td>
                            <td><?php echo $r['dcoupon'] ?></td>
                            <td><?php echo $r['dtotal_odd'] ?></td>
                            <td><?php echo date("d M Y ", strtotime($r['dstart_game_time']))?></td>
                            <!-- <td><?php //echo $r['dresult'] ?></td> -->
                            <td>
                              <a href="view-game-details?booking=<?php echo $r['booking_id'] ?>" class="btn btn-primary "> <i class="fa fa-eye"></i> View </a>
                            </td>
                        </tr>
                            <?php endwhile; }else{
                              echo '<tr><td colspan="4" style="color:red">No result found </td></tr>';
                            } ?>
                    </tbody>
                </table>  
                
            </div>
            <?php }else{?>
              
          

              <div class="table-responsive">
                <table class="table" id="myTable">
                    <tr>
                        <th></th>
                        <th>Booking ID</th>
                        <th>Code</th>
                        <th>Week</th>
                        <th>Result</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    <tbody>
                        <?php 

                        // $pool_id = clean($rt['dcategory_ids']);
                        
                        $id = clean($_SESSION['userId']);
                        $sqls =$conn->query("SELECT * FROM `dpool_code` INNER JOIN `dpools` ON dpools.dcategory_ids = dpool_code.dodd WHERE dpool_code.duserid='$id'");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dpool_code` INNER JOIN `dpools` ON dpools.dcategory_ids = dpool_code.dodd WHERE dpool_code.duserid='$id' AND dpool_code.dodd='$cat_id' ORDER BY dpool_code.id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>                        
                        <tr>
                        <td><?php  if($r['dresult']=='won'){?>
                              <img style="width:40%" src="assets/images/icon-.png" alt="site-logo">
                              <?php
                            }elseif($r['dresult']=='lost'){?>
                              <img style="width:45%; margin-left:-5px " src="assets/images/close.png" alt="site-logo">
                           <?php }elseif($r['dresult']=='cancelled'){
                              echo 'cancelled';
                           }elseif($r['dresult']=='pending'){
                            echo 'pending';
                         } ?></td>
                            <td><?php echo $r['pool_id'] ?></td>
                            <td><?php echo $r['dgames'] ?></td>
                            <td><?php echo $r['dweek'] ?></td>
                            <td><?php echo $r['dresult'] ?></td>
                            <td><?php echo $r['pstatus'] ?></td>
                            <td><?php echo date("d M Y", strtotime($r['dstart_time'])) ?></td>
                            
                        </tr>
                            <?php endwhile; }else{
                              echo '<tr><td colspan="4" style="color:red">No result found </td></tr>';
                            } ?>
                    </tbody>
                </table>  
                 
            </div>
          
          
          <?php  }
          
          
            ?>
                 <a href="javascript:history.back()" class="btn btn-secondary pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a> 
                            
                        </div>
                        </div>
                    </div>

                </div>
        
        </div>

        <?php $num++; endwhile; }?>

        
<!-- the end of pill -->






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