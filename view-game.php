
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
          <div class="col-lg-3" style="padding-left:50px;" >
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
                            $total_records_per_page = 100;

                            ?>

        <!-- end of first col  -->

        <div class="col-lg-9 mt-3" >
        <div class="row">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center ml-4 mb-3 p-3">
                                <h4> Tip  Detail <img src="https://www.tipstersportal.com/assets/img/match_grid_live_now.png" alt=""></h4>
                            </div>
        </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">

          <!-- <a href="tips" class="tip btn btn-primary" style="font-size:16pxz">NEW TIPs</a> -->
        </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card text-centerx">                       
                        <div class="card-body">

                         

                        <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <!-- <th style="width:40%x"></th> -->
                        <th colspan="4" class="text-center">Booking Details</th>
                    </tr>
                    <tbody>
                        <?php 
                        if(!empty($_GET['booking'])):
                        $book = clean($_GET['booking']);
                        $id = clean($_SESSION['userId']);


                        $v =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_market` ON dgame_market.booking_id = dbooking_code.booking_id WHERE dgame_market.user_id='$id' AND dbooking_code.booking_id='$book' ORDER BY dbooking_code.id");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>

                            <tr>
                              <td colspan="2">Booking ID: <?php echo $r['booking_id'] ?></td>
                              <td colspan="2">Total ODD: <?php echo $r['dtotal_odd'] ?></td>
                            </tr>

                            <tr>
                              <td colspan="2">Booking Code: <?php echo $r['dcode'] ?> <?php if(!empty($r['dweb_name1'])){ echo '('. ucfirst($r['dweb_name1']).')'; } ?></td>
                              
                            <td colspan="2">Date: <?php echo $r['ddate'] ?></td>
                              
                            </tr>

                            <tr>                              
                             <td colspan="2"></td>
                              <td colspan="2">Result: <?php  if($r['dresult']=='won'){?>
                              <img style="width:10%" src="assets/images/icon-.png" alt="site-logo">
                              <?php
                            }elseif($r['dresult']=='lost'){?>
                              <img style="width:12%; margin-left:-5px " src="assets/images/close.png" alt="site-logo">
                           <?php }elseif($r['dresult']=='cancelled'){
                              echo 'cancelled';
                           }elseif($r['dresult']=='pending'){
                            echo 'pending';
                         } ?></td>
                            </tr>


                            


                            <?php endwhile; }else{
                              echo '<tr><td colspan="4" style="color:red">No result found </td></tr>';
                            }  endif; ?>
                    </tbody>
                </table>  
                <a href="javascript:history.back()" class="btn btn-secondary pull-right mt-5"> <i class="fa fa-arrow-circle-left"></i> Back</a> 

            </div>


                            
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