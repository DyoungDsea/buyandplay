
<?php 
require 'session_track.php';
require 'function.php';
require 'clean.php';
$main = $conn->query("SELECT dmin FROM dwebsite_main")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Withdrawal Funds</title>
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
        <div class="col-lg-3" style="padding-left:50pxc;" >
          <div class="sidebar">
            <!-- widget end -->
            <div class="widget widget-categories">
              <!-- <h4 class="widget-title">Dashboard</h4> -->
              <?php include 'link.php' ?>
              

            </div>
            
          
          </div>
        </div>
        <!-- end of first col  -->

        <div class="col-lg-9 mt-3" >
        
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card text-center">
                        <div class="card-header  my-3 text-success">
                         <p><b> Avaliable Balance </b></p>
                         <p style="color:red"><b>&#8358; <?php echo number_format($k['dwallet_balance'],2); ?> </b></p>
                        </div>
                        <div class="card-body">
                        <hr>
                        <p class="my-1">Make a withdrawal request</p>
                        <p class="my-3">The minimum amount you can request to withdraw from your account is <b class="text-danger"> &#8358;<?php echo number_format($main['dmin']);?></b></p><br>
                            <form class="cmn-form login-form mt-2" method="POST" action="withdrawal-process">
                            <input type="hidden" id="hide" name="balance" value="<?php echo $k['dwallet_balance']; ?>">
                            <input type="hidden" id="min" value="<?php echo $main['dmin']; ?>">

                            <div class="row" style="margin-top:-16px">
                            <div class="col-md-6">
                            <div class="frm-group">
                            <input type="text" name="name" required  placeholder="Bank Account Name Here...">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="frm-group">
                            <input type="text" name="number" required  placeholder="Bank Account Number Here...">
                            </div>
                            </div>
                            </div>
                            
                            <div class="row" style="margin-top:-16px">
                            <div class="col-md-6">
                            <div class="frm-group">
                            <input type="text" name="bank" required  placeholder="Bank Name Here...">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="frm-group">
                            <input type="text" name="amount" id="amount" user="<?php echo $_SESSION['userId'] ?>" id=check title="Only number is allow" required pattern="^[0-9]*$" placeholder="Amount Here...">
                            <p id="error" style="color:red"></p>
                            </div>
                            </div>
                            </div>

                            <div class="frm-group">
                            <input type="password" name="pass" required  placeholder="Enter Password Here...">
                            </div>

                            <div class="frm-group" id="button">
                            <button type="submit" disabled name="load" id="proceed" class="submit-btn">Proceed</button>
                            </div>
                        </form>
                        <a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

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


<script>
  $(document).ready(function(){
    $(document).on("keyup","#amount", function(){
      var amount = $("#amount").val();
      var hide = $("#hide").val();
      var min = $("#min").val();
      // console.log(amount, hide)
      if(amount.length > 3){
        //check if the amount is greater thank total balance
        if(Number(amount) > Number(hide)){
          $("#error").html("<p class='text-danger'>Invalid Request</p>");
          $("#proceed").prop("disabled", true);

        }else{
          
          //check if the amount requesting for is not less than amount set to be withdrawn
          if(Number(amount) >= Number(min)){
            $("#error").html("");
            $("#proceed").prop("disabled", false);
          }else{
            $("#error").html("<p class='text-danger'>Your Request is too low</p>");
            $("#proceed").prop("disabled", true);
          }
        }
      }else{        
        $("#error").html("");
      }
    })

    
  })



</script>


</body>

</html>