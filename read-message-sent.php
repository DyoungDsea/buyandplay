<?php 
require 'session_track.php';
require 'clean.php';
require 'limit-text.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | My Inbox</title>
  <?php include 'style.php'; ?>


</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <div class="custom-cursor"></div>
  <!--  header-section start  -->
  
  <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <!-- banner-section start -->
 
  <!-- banner-section end -->

  <!-- blog-details-section start -->
  <section class="blog-details-section mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3" style="padding-left:50pxn;" >
          <div class="sidebar">
            <!-- widget end -->
            <div class="widget widget-categories">
              <!-- <h4 class="widget-title">Dashboard</h4> -->
              <?php include 'link.php' ?>
              

            </div>
            
          
          </div>
        </div>
      

        <div class="col-lg-9 mt-3" >
        <div class="row">
          <div class="col-md-4">
            <div class="boxer">
                                <div class="card text-center mb-3 p-3">
                                    <h4>Read Message</h4>
                                </div>
            </div>
          </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="frm-group">
            <!-- <a href="compose" style="font-size:16px" class="btn btn-primary"> Compose message </a> -->
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-2"></div>
            <div class="table-responsiver col-md-8">
                        <?php 
                        $id = clean($_SESSION['userId']);
                        $transid = clean($_GET['id']);
                        // $sender = clean($_GET['sender']);
                        $v =$conn->query("SELECT * FROM `dmessaging` WHERE transid='$transid'");
                        
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()): ?> 
                            <hr>
                            <p>Subject: <?php echo $r['dsubject'] ?></p>
                            <p>Message:<br> <?php echo nl2br($r['dmessage']) ?></p>
                            <hr>
                            <?php endwhile; }
                            // $rx = $v->fetch_assoc();
                        $xv =$conn->query("SELECT * FROM `dmessaging` WHERE transid='$transid'");
                        $rv = $xv->fetch_assoc();
                             ?>
                 <a href="javascript:history.back()" class="btn btn-secondary pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a> 
            </div>
        <div class="col-md-2"></div>
        </div>
        </div>
<!-- end of second col  -->




        
      </div>
    </div>
  </section>
  <!-- blog-details-section end -->
<div class="mb-4"></div>
  <!-- footer-section start -->
  <?php 
include('footer.php');
  ?>
  <!-- footer-section end -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->


  
  <?php include('script.php'); ?>


</body>

</html>

