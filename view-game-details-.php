
<?php 
require 'session_track.php';
require 'function.php';
require 'clean.php';

if(isset($_SESSION['transId']) && @$_SESSION['transId']==''){
    $_SESSION['transId'] = transaction();
}else{
    $_SESSION['transId']= transaction();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | My Offers</title>
  <?php include 'style2.php'; ?>
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
  <section class="blog-details-section">
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
                            <div class="card text-center ml-4 mb-3 p-4">
                                <h4> My Tips </h4>
                            </div>
        </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-2">

          <a href="tips" class="tip btn btn-primary p-3" style="font-size:16px">NEW TIPs</a>
        </div>
        </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
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
                        $sqls =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.userid='$id' AND dbooking_code.booking_id='$book' ");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.userid='$id' AND dbooking_code.booking_id='$book' ORDER BY dbooking_code.id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>

                            <tr>
                              <td colspan="2">Booking ID: <?php echo $r['booking_id'] ?></td>
                              <td colspan="2">Coupon Code: <?php echo $r['dcoupon'] ?></td>
                            </tr>

                            <tr>
                              <td colspan="2">Booking Code 1: <?php echo $r['dcode'] ?> <?php if(!empty($r['dweb_name1'])){ echo '('. ucfirst($r['dweb_name1']).')'; } ?></td>
                              <td colspan="2">Booking Code 2: <?php echo $r['dcode2'] ?> <?php if(!empty($r['dweb_name2'])){ echo '('. ucfirst($r['dweb_name2']).')'; }else{ echo 'NULL'; }?></td>
                              
                            </tr>

                            <tr>                              
                              <td colspan="2">Booking Code 3: <?php echo $r['dcode3'] ?> <?php if(!empty($r['dweb_name3'])){echo '('. ucfirst($r['dweb_name3']).')';}else{
                                echo 'NULL';
                              } ?></td>
                              <td colspan="2">Date: <?php echo $r['ddate'] ?></td>
                            </tr>


                            <tr>
                              <td colspan="">Total ODD: <?php echo $r['dtotal_odd'] ?></td>
                              <td colspan="2">Category: <?php echo $r['dcategory'] ?></td>
                              <td colspan="">Result: <?php echo ucfirst($r['dresult']); ?></td>
                            </tr>


                            <?php endwhile; }else{
                              echo '<tr><td colspan="4" style="color:red">No result found </td></tr>';
                            }  endif; ?>
                    </tbody>
                </table>  
                 
            </div>
                            
                        </div>
                        </div>
                    </div>

                </div>
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