
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
  <title>Buy and Bet | Transaction History</title>
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


                      


        <div class="col-lg-9 mt-3" >


        <div class="row">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center mb-3 p-3">
                                <h4> Transaction History</h4>
                            </div>
        </div>
        </div>
        <div class="col-md-8"></div>
        </div>

                      <form action="transaction-date" method="POST">
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="form-group">
                                <label for="#">Search From</label>
                                    <input type="text" name="start" required  value="<?php
                                    if(isset($_GET['start'])){ echo $_GET['start']; }else{ 
                                    $now = date("d-m-Y");
                                    echo date("d-m-Y", strtotime('-30 days', strtotime($now)));} ?>" id="datepickers" placeholder="" class="form-control">
                                    <input type="hidden" name="user"  value="<?php echo $_GET['userid']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="#">Search To</label>
                                    <input type="text" name="end" id="pickv" required value="<?php if(isset($_GET['end'])){ echo $_GET['end']; }else{echo date("d-m-Y");} ?>" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="date" class="btn btn-primary btn-smm" style="margin-top:30px">Search</button>
                            </div>
                            </div>
                            </form>
           

            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <!-- <tr>
                        <th>Transaction ID</th>
                        <th>Transaction Details</th>
                        <th>Amount(&#8358;)</th>
                        <th>Transaction Date</th>
                    </tr> -->

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    // echo $_SESSION['userId'];
                    // $query = mysqli_query($conn, "SELECT * from dtransaction_history where userid='21172020092117' AND CAST(ddate AS date) BETWEEN '25-04-2020' AND '25-05-2020' desc") or die(mysqli_error($conn));

                      
                    $id = clean($_SESSION['userId']);

                      if(isset($_GET['start']) AND isset($_GET['end'])){
                          $start_date = date("Y-m-d ",  strtotime('+1 days', strtotime(clean($_GET['start']))));
                          $end_date = date("Y-m-d ", strtotime(clean($_GET['end'])));

                          $sqls =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$id' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC");

                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$id' AND CAST(ddate as date) BETWEEN '$start_date'AND '$end_date'  ORDER BY id DESC LIMIT $start_from, $total_records_per_page");

                      }else{
                         $start_date = date("Y-m-d h:i:s", strtotime('+1 days', strtotime(date("Y-m-d h:i:s"))));
                         $end_date = date("Y-m-d h:i:s", strtotime('-30 days', strtotime($start_date)));

                         $sqls =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$id' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC");

                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$id' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                      }
                        
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()):?>                        
                        <tr>
                            <td><?php echo $r['transaction_id']; ?></td>
                            <td><?php 
                            $date = $r['ddate'];
                            echo $ddate = date("d/m/Y h:i:s", strtotime('+5 hours', strtotime($date)));
                              ?></td>
                            <td><?php echo $r['dname']; ?></td>
                            <td style="color:green;"><b><?php if($r['dcredit'] != NULL){echo '&#8358;'.number_format($r['dcredit']);} ?></b></td>
                            <td style="color:red;"><b><?php if($r['ddebit'] != NULL){echo '- &#8358;'.number_format($r['ddebit']);} ?></b></td>

                            <td> &#8358;<?php echo number_format($r['dwallet_balance']); ?></td>
                            
                        </tr>
                            <?php endwhile; }else{
                              echo '<tr><td colspan=10>No result found</td></tr>';
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