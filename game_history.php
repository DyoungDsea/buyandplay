
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
  <title>Buy and Bet | Game History</title>
  
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
                            $total_records_per_page = 10;

                            ?>

        <!-- end of first col  -->

        <div class="col-lg-9 mt-3" >
        <div class="row">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center ml-4 mb-3 p-3">
                                <h4>My Bought Tips </h4>
                            </div>
        </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">
<?php if($k['dcategory']=='Tipster'): ?>
          <a href="tips" class="tip btn btn-primary mb-2" style="font-size:16pxz">Post New Tips</a>
<?php endif; ?>
        </div>
        </div>

            <div class="row">
                <div class="col-md-12">


                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['pool'])){echo '';}else{echo 'active';} ?>" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="<?php if(isset($_GET['pool'])){echo 'false';}else{echo 'true';} ?>">Sport Bet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['pool'])){echo 'active';} ?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="<?php if(isset($_GET['pool'])){echo 'true';}else{ echo'false';} ?>">Pools</a>
        </li>

        

      </ul>

        <div class="tab-content" style="width:100%" id="pills-tabContent">
            <div class="tab-pane  <?php if(isset($_GET['pool'])){echo '';}else{echo 'fade show active';} ?> container-fliud"  id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                

            <div class="card text-centerx">                       
                        <div class="card-body">

                         

            <div class="table-responsive">
                <table class="table" id="myTable">
                    <tr>
                        <th>Booking ID</th>
                        <th>Tipster</th>
                        <th>Booking Code</th>
                        <th>Total Odd</th>
                        <th>Price(&#8358;)</th>
                        <th>Result</th>
                        <th>---</th>
                    </tr>
                    <tbody>
                        <?php 
                        
                        $id = clean($_SESSION['userId']);
                        $sqls =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_market` ON dgame_market.booking_id = dbooking_code.booking_id WHERE dgame_market.user_id='$id'");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_market` ON dgame_market.booking_id = dbooking_code.booking_id WHERE dgame_market.user_id='$id' ORDER BY dgame_market.id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>                        
                        <tr>
                            <td><?php echo $r['booking_id'] ?></td>
                            <td><?php 
                            
                            $tip = clean($r['userid']); 
                            $name = $conn->query("SELECT * FROM members_register WHERE userid='$tip'")->fetch_assoc();
                            echo $name['username'];
                            
                            ?></td>
                            <td><?php echo $r['dcode'] ?></td>
                            <td><?php echo $r['dtotal_odd'] ?></td>
                            <td><?php echo $r['dprice'] ?></td>
                            <td>
                            <?php  if($r['dresult']=='won'){?>
                                  <img style="width:40%" src="assets/images/icon-.png" alt="site-logo">
                                  <?php
                                }elseif($r['dresult']=='lost'){?>
                                  <img style="width:45%; margin-left:-5px " src="assets/images/close.png" alt="site-logo">
                              <?php }elseif($r['dresult']=='cancelled'){
                                  echo 'cancelled';
                              }elseif($r['dresult']=='pending'){
                                echo 'pending';
                            } ?>  
                            </td>
                            <td>
                              <a href="view-game?booking=<?php echo $r['booking_id'] ?>" class="btn btn-primary "> <i class="fa fa-eye"></i> View </a>
                            </td>
                        </tr>
                            <?php endwhile; }else{
                              echo '<tr><td colspan="4" style="color:red">No result found </td></tr>';
                            } ?>
                    </tbody>
                </table>  
                 
            </div>
                            
                        </div>
                        </div>
                


            </div>


            <div class="tab-pane <?php if(isset($_GET['pool'])){echo 'fade show active';} ?>  container-fliud"  id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            


            <div class="card text-centerx">                       
                        <div class="card-body">

                         

            <div class="table-responsive">
                <table class="table" id="myTable">
                    <tr>
                        <th>Booking ID</th>
                        <th>Tipster</th>
                        <th>Pool Code</th>
                        <th>Price(&#8358;)</th>
                        <th>Result</th>
                    </tr>
                    <tbody>
                        <?php 
                        
                        $id = clean($_SESSION['userId']);
                        $sqls =$conn->query("SELECT * FROM `dpool_code` INNER JOIN `dgame_market` ON dgame_market.booking_id = dpool_code.pool_id WHERE dgame_market.user_id='$id'");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dpool_code` INNER JOIN `dgame_market` ON dgame_market.booking_id = dpool_code.pool_id WHERE dgame_market.user_id='$id' ORDER BY dgame_market.id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>                        
                        <tr>
                            <td><?php echo $r['booking_id'] ?></td>
                            <td>

                            <?php 
                            
                            $tips = clean($r['duserid']); 
                            $name = $conn->query("SELECT * FROM members_register WHERE userid='$tips'")->fetch_assoc();
                            echo $name['username'];
                            
                            ?>

                            </td>
                            <td><?php echo $r['dgames'] ?></td>
                            <td><?php echo $r['dprice'] ?></td>
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
                           
                        </tr>
                            <?php endwhile; }else{
                              echo '<tr><td colspan="4" style="color:red">No result found </td></tr>';
                            } ?>
                    </tbody>
                </table>  
                 
            </div>
            
                            
                        </div>
                        </div>


            </div>

               

        <a href="javascript:history.back()" class="btn btn-secondary pull-right mt-5"> <i class="fa fa-arrow-circle-left"></i> Back</a> 

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