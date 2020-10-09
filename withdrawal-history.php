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
        <div class="col-lg-3" style="padding-left:50pxv;" >
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

        <div class="col-lg-9 mt-3" >
        <div class="row">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center mb-3  p-4">
                                <h4> Withdrawal History</h4>
                            </div>
        </div>
        </div>
        <div class="col-md-8"></div>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th> ID</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Bank Name</th>
                        <th>Amount(&#8358;)</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>---</th>
                    </tr>
                    <tbody>
                        <?php 
                        $id = clean($_SESSION['userId']);
                        $sqls =$conn->query("SELECT * FROM `dwithdrawal_history` WHERE user_id='$id' ORDER BY id DESC");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dwithdrawal_history` WHERE user_id='$id' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>                        
                        <tr>
                            <td><?php echo $r['withdrawal_id'] ?></td>
                            <td><?php echo $r['account_name'] ?></td>
                            <td><?php echo $r['account_number'] ?></td>
                            <td><?php echo $r['bank_name'] ?></td>
                            <td><?php echo number_format($r['amount']) ?></td>
                            <td><?php echo $r['withdrawal_status'] ?></td>
                            <td><?php echo date("d-M-Y", strtotime($r['ddate'])) ?></td>
                            <?php if($r['withdrawal_status']=="pending"){ ?>
                            <td>
                                <button class="btn btn-warning btn-sm" amount="<?php echo $r['amount'] ?>" id='canRequest'sentSms="<?php echo $r['withdrawal_id'] ?>" >Cancel</button>
                           
                            </td>
                            <?php } ?>
                        </tr>
                            <?php endwhile; }else{
                              echo '<tr><td colspan=4>No result found</td></tr>';
                            } ?>
                    </tbody>
                </table> 
                <ul class="pagination pagination-md justify-content-center">
            
                    <?php 

                  for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                        echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                    
                    }
                   
                    ?>
                    </ul>    
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

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