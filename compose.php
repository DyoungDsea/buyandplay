<?php 
require 'session_track.php';
require 'clean.php';
require 'function.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Withdrawal History</title>
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
        <!-- end of first col  -->
        <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } 
                    else {
                            $page_no = 1;
                          } 
                    $total_records_per_page = 80;

                ?>

        <div class="col-lg-9 " >
            
               

                        <div class="row mt-4">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                        <div class="card text-center">
                        <div class="card-header  my-2 text-success">
                         <p class="mt-3"><b> Compose Message</b></p>
                        </div>
                        <div class="card-body">
                        <hr>
                            <form class="cmn-form login-form" method="POST" action="message-process">
                                <div class="frm-group">
                                <input type="text" name="subject" required placeholder="Subject Here...">
                                </div>
                                <div class="frm-group">
                                <textarea name="sms" placeholder="Message Here..."></textarea>
                                </div>
                                <div class="frm-group">
                                <button type="submit" name="load" class="submit-btn"> <i class="fa fa-paper-plane"></i> send</button>
                                </div>
                            </form>
                 <a href="javascript:history.back()" class="btn btn-secondary pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a> 
                            </div>
                        </div>
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

