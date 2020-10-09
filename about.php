<?php 
require 'clean.php';
include 'webname.php';
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpg"/> -->
  <title> About us : Bet and Buy</title>
  <?php include 'style.php'; $_SESSION['current_page'] =''; ?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <!-- <div class="custom-cursor"></div> -->
  <!--  header-section start  -->
  <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <!-- banner-section start -->
  <section class="breadcum-section">
    <div class="breadcum-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcum-content text-center">
              <h3 class="title">About Us</h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">home</a></li>
                <li class="breadcrumb-item active">about us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-section end -->

  <!-- about-section start -->
  <section class="about-section section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <div class="about-thumb">
            <img src="assets/images/about-img.jpg" alt="about-image">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="about-content" style="text-align: justify">
            <h2 class="title" style="font-size:40px;">About Buy and Bet</h2>
            <p>Buy and Bet is a betting predictions exchange market. The platform is designed to provide sports betting and pools customers a wide variety
               of tips or predictions from various analysts/ Tipsters/compilers that have been vetted to be very good by Buy and Bet.</p>
            <p>All games for sports betting and pool are bought for a small amount that is set by the system according to the performance of the seller,
               and all payments for games are refundable if the game fails. This is how the system works.</p>
               <p>
               Note that we are not a betting website. Tips sold and bought here are played in the various betting websites, bet shops or football pool offices. 
               Our analysts or 
               sellers undergo a rigorous vetting exercise where their games have to pass a minimum level of success before they can be placed on the selling list.
               </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about-section end -->

  <!-- counter-section start -->
  
  <!-- counter-section end -->

  <!-- team-section start -->
  
  <!-- team-section end -->

  <!-- faq-section start  -->
  
  <!-- faq-section end  -->

  <!-- footer-section start -->
  <?php include 'footer.php'; ?>

  <!-- main jquery library js file -->
 
  <?php include 'script.php'; ?>
</body>

</html>