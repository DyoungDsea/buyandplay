<?php 
require 'session_track.php';
require 'clean.php';
require 'limit-text.php';
require 'function.php';
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

        <div class="col-lg-9 mt-3v" >
        <div class="row">
        <div class="col-md-4">
        <div class="boxer">
                            <div class="card text-center mb-3 p-3">
                                <h4>Sent Messages </h4>
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
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>---</th>
                    </tr>
                    <tbody>
                        <?php 
                        $id = clean($_SESSION['userId']);
                        $sqls =$conn->query("SELECT * FROM `dmessage_sent` WHERE dsender='$id' ORDER BY id DESC");
                        $total_records =$sqls->num_rows;
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $start_from = ($page_no - 1) * $total_records_per_page;
                        $v =$conn->query("SELECT * FROM `dmessage_sent` WHERE dsender='$id' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                        if($v->num_rows>0){
                            while($r = $v->fetch_assoc()): ?>                        
                        <tr style="">
                            <td><?php echo $r['dsubject'] ?></td>
                            <td><?php echo limit_text($r['dmessage'],10) ?></td>
                            <td><?php echo date("d-M-Y", strtotime($r['dtime'])) ?></td>
                            <td>
                            <div class="btn-group">
                                <div class="btn-group" >
                                    <button type="button" style="font-size:15px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Action </button>
                                    <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                    <li><a class="nav-link" href="read-message-sent?id=<?php echo $r['transid']; ?>">Read</a></li>
                                    <li><a class="nav-link" id="delete1" sentSms="<?php echo $r['transid']; ?>" href="#">Delete</a></li>
                                    </ul>
                                </div>
                                </div>



                            </td>
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
                 <a href="javascript:history.back()" class="btn btn-secondary pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>    
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ... dsjkfbjfdf
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
  <?php include('script.php'); ?>


</body>

</html>

