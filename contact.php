<?php 
@session_start();
require 'clean.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpg"/>
  <title> Contact us : Bet and Buy</title>
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
              <h3 class="title">Contact Us</h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">home</a></li>
                <li class="breadcrumb-item active">Contact us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-section end -->

  <!-- contact-section start -->
  <section class="contact-section section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="section-header text-center">
            <h2 class="section-title">Need More Information Contact With Us</h2>
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="contact-item d-flex">
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <div class="content">
              <h5 class="title">Address</h5>
              <p><?php echo $dweb_address; ?></p>
            </div>
          </div>
        </div><!-- contact-item end -->
        <div class="col-lg-4 col-md-6">
          <div class="contact-item d-flex">
            <div class="icon">
              <i class="fa fa-headphones"></i>
            </div>
            <div class="content">
              <h5 class="title">Phone Number</h5>
              <p><?php echo $dweb_phone; ?></p>
              <!-- <p>+1-202-555-0109</p> -->
            </div>
          </div>
        </div><!-- contact-item end -->
        <div class="col-lg-4 col-md-6">
          <div class="contact-item d-flex">
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <div class="content">
              <h5 class="title">Email Address</h5>
              <p>info@buyandbet.com </p>
              <!-- <p>random2@example.com</p> -->
            </div>
          </div>
        </div><!-- contact-item end -->
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="contact-form-area">
            <form class="cmn-form contact-form" method="POST" action="contact-process">
              <div class="row">
                <!-- <div class="col-md-6">
                  <div class="frm-group">
                    <input type="text" name="c_fname" id="c_fname" placeholder="First Name*">
                  </div>
                </div> -->
                <div class="col-md-12">
                  <div class="frm-group">
                    <input type="text" name="name" id="c_lname" placeholder="Full Name*">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="frm-group">
                    <input type="text" name="phones" id="c_phone" placeholder="Subject*">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="frm-group">
                    <input type="email" name="email" id="c_email" placeholder="Email Address*">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="frm-group">
                    <textarea name="text" id="c_message" placeholder="Write Message*"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                    <p class="mt-3 text-danger">Anti-spam code: <?php echo date("id"); ?></p>
                    <input type="hidden" name="hid" value="<?php echo date("id"); ?>" >
                </div>
                <div class="col-md-6">
                    <div class="frm-group">
                    <input type="text" name="code" required placeholder="Code here">
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="frm-group text-center">
                    <button type="submit" name='login' class="submit-btn">Submit</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="contact-thumb">
              <img src="assets/images/contact.png" alt="image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- contact-section end -->

  <!-- footer-section start -->
 
  <!-- footer-section end -->
<?php 
include('footer.php');
?>

<?php include 'script.php'; ?>
  <!-- scroll-to-top start -->
  
  <
</body>

<!-- Mirrored from rexbd.net/html/butlar/demo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 13:20:57 GMT -->
</html>