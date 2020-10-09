
<?php 

// session_start();

require 'clean.php';
require 'function.php';
require 'session_track.php';

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
  <title>Buy and Bet | My Tips</title>
  
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
          <div class="col-lg-3" style="padding-left:50pxn;" >
                <div class="sidebar">
                        <div class="widget widget-categories">
                        <?php include 'link.php' ?>
                        </div>
                </div>
            </div>




            <div class="col-lg-9 mt-3" >
        

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <div class="card text-centerx">                       
                    <div class="card-body">
                        <form class="cmn-form login-form" method="POST" action="game-pool-process">
                            <div class="row bg-primaryx">
                              <div class="col-md-12" style="margin-bottom:-20px">
                              <div class="frm-group">
                                <!-- <label for="code">Booking Site </label> -->
                              <select name="odd" id="myselects" required class="form-controlx">
                              <option value="">Choose Odd Category</option>
                              <?php 
                                $gt = clean($_SESSION['userId']);
                              $s = $conn->query("SELECT * FROM `dcategory_subscriptions` INNER JOIN `dpools` ON dpools.dcategory_ids = dcategory_subscriptions.dgame_cat_id WHERE dcategory_subscriptions.userid ='$gt' AND dcategory_subscriptions.status ='active' ORDER BY dpools.dpool ");
                              if($s->num_rows>0):
                                while($rt=$s->fetch_assoc()):?>
                                  <option value="<?php echo $rt['dcategory_ids']?>"><?php echo ucfirst($rt['dcategory'])?></option>
                                <?php endwhile; endif; ?>
                              </select>
                            </div>

                              </div>
                              </div>
                              <div id="game" style="padding:20px">
                              
                                 
                               </div>

                              
                        </form>
                        
                 <a href="javascript:history.back()" class="btn btn-secondary pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>
                    </div>
                    </div>
                </div>

            </div>
            <div class="col-md-1"></div>
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

</html>