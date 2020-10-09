
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
  <title>Buy and Bet | Game Categories</title>
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
  <section class="blog-details-section  mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3" style="padding-left:50pxx;" >
          <div class="sidebar">
            <!-- widget end -->
            <div class="widget widget-categories">
              <!-- <h4 class="widget-title">Dashboard</h4> -->
              <?php include 'link.php' ?>
              

            </div>
            
          
          </div>
        </div>
        <!-- end of first col  -->

        <div class="col-lg-9 ">
        <div class="container">
        <p class="mt-2">Become a Tipster and Earn Money!</p>
        <p>Earn money by selling your tips to help others win!</p>

        <div class="card my-4">
<div class="card-body">
<h3>Sport bet categories</h3>
</div>
</div>

        <div class="row mt-3">
        
        <?php
        $d = $conn->query("SELECT * FROM `dgame_categories` WHERE dcategory !='Free' AND dstatus='active' ORDER BY  dcategory ");
        if($d->num_rows>0):
            while($r=$d->fetch_assoc()):?>
                <div class="col-md-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">                        
                        <h5><?php echo ucwords($r['dcategory']); ?></h5>
                        <h6 class="mt-2 mb-3"><?php echo formatNaira($r['dfee']) ?></h6>

                          <?php 
                          $dgame =clean($r['category_id']);
                          $ui =clean($_SESSION['userId']);
                          $z = $conn->query("SELECT * FROM `dcategory_subscriptions` WHERE dgame_cat_id='$dgame' AND userid='$ui' ORDER BY  dcategory ");
                          if($z->num_rows ==0){
                           ?>
                        <button tyle="button" data-toggle="modal" data-target="#exampleModal<?php echo ucwords($r['category_id']); ?>" class="btn btn-primary ">BECOME A  TIPSTER</button>
                        <!-- </form> -->
                          <?php }else{    ?>
                            <a href='#'  id="tipster" class="btn btn-success "> <i class="fa fa-check"></i>  TIPSTER </a>
                          <?php } ?>
                        
                        </div>
                    </div>
                </div>
                    
            <?php endwhile; endif; ?>
            </div>

<div class="card mt-4">
<div class="card-body">
<h3>Pools Categories</h3>
</div>
</div>

<div class="row mt-3">
        
        <?php
        $dx = $conn->query("SELECT * FROM `dpools` WHERE  dstatus='active' ORDER BY  dpool ");
        if($dx->num_rows>0):
            while($rx=$dx->fetch_assoc()):?>
                <div class="col-md-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">                        
                        <h5><?php echo ucwords($rx['dpool']); ?></h5>
                        <h6 class="mt-2 mb-3"><?php echo formatNaira($rx['dfee']) ?></h6>
                          <?php 
                          $dgame =clean($rx['dcategory_ids']);
                          $ui =clean($_SESSION['userId']);
                          $z = $conn->query("SELECT * FROM `dcategory_subscriptions` WHERE dgame_cat_id='$dgame' AND userid='$ui' ORDER BY  dcategory ");
                          if($z->num_rows ==0){
                           ?>

                        <button tyle="button" data-toggle="modal" data-target="#exampleModal<?php echo ucwords($rx['dcategory_ids']); ?>"  class="btn btn-primary ">BECOME A  TIPSTER</button>

                          <?php }else{    ?>
                            <a href='#'  id="tipster" class="btn btn-success "> <i class="fa fa-check"></i>  TIPSTER </a>
                          <?php } ?>
                        
                        </div>
                    </div>
                </div>
                    
            <?php endwhile; endif; ?>
            </div>



<a href="javascript:history.back()" class="btn btn-danger mt-4  pull-right">Go Back</a>
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


<script>

$(document).ready(function(){
  $(document).on("click", "#tipster", function(){
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Already a Tipster',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
        
      })
  })


  // $(document).on("click","#formSubmit", function(){
  //   var name = $(this).attr("name");
  //   var fee = $(this).attr("fee");
  //   var cat_id = $(this).attr("cat_id");
  //   console.log(name, fee, cat_id);
  //   $.post( "game-categories-process.php", { name: "John", time: "2pm" } );
    
    // $.ajax({
    //             url: 'game-categories-process.php',
    //             type: 'POST',
    //             data: {Game:1, name:name, fee:fee, id:cat_id}
    //         });
  // })


})

</script>



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->


<?php
        $d = $conn->query("SELECT * FROM `dgame_categories` WHERE dcategory !='Free' AND dstatus='active' ORDER BY  dcategory ");
        if($d->num_rows>0):
            while($r=$d->fetch_assoc()):?>
<!-- Modal -->

            <div class="modal fade" id="exampleModal<?php echo ucwords($r['category_id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-center">
                      <div class="bg-warning p-3 mb-2 text-white">
                          <p>Wallet Balance: <?php echo formatNaira($wallet_); ?></p>
                        </div>
                        <p>Do you want to become a  Tipster under </p>                        
                        <h5><?php echo ucwords($r['dcategory']); ?></h5>
                        <h6 class="mt-2">Cost: <?php echo formatNaira($r['dfee']) ?></h6>
                        

                        <form action="buy-cart" method="post">                                       
                        <hr>
                        <input type="hidden" name="name" value='<?php echo $r['dcategory'] ?> '>
                        <input type="hidden" name="price" value='<?php echo $r['dfee']; ?> '>
                        <input type="hidden" name="id" value='<?php echo $r['category_id']; ?> '>
                        <button type="submit" class="btn btn-primary">Yes Confrim</button>
                        <hr>   
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                </div>
              </div>
            </div>

            <?php endwhile; endif; ?>

            <?php
            $dx = $conn->query("SELECT * FROM `dpools` WHERE  dstatus='active' ORDER BY  dpool ");
            if($dx->num_rows>0):
                while($rx=$dx->fetch_assoc()):?>
                 <div class="modal fade" id="exampleModal<?php echo ucwords($rx['dcategory_ids']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-center">
                        <div class="bg-warning p-3 mb-2 text-white">
                          <p>Wallet Balance: <?php echo formatNaira($wallet_); ?></p>
                        </div>
                        <p>Do you want to become a  Tipster under </p>                        
                        <h5><?php echo ucwords($rx['dpool']); ?></h5>
                        <h6 class="mt-2">Cost: <?php echo formatNaira($rx['dfee']) ?></h6>

                          <form action="pool-process" method="post">
                          <hr>
                            <input type="hidden" name="name" value="<?php echo ucwords($rx['dpool']); ?>">
                            <input type="hidden" name="price" value="<?php echo ucwords($rx['dfee']); ?>">
                            <input type="hidden" name="id" value="<?php echo ucwords($rx['dcategory_ids']); ?>">
                            <button type="submit" class="btn btn-primary">Yes Continue</button>
                            <hr>
                            </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                </div>
              </div>
            </div>

            <?php endwhile; endif; ?>