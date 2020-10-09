<?php 
    require 'session.php';
    require 'clean.php';

    $userid = clean( $_SESSION['userid']);

?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Home : Bet and Buy</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<?php include 'style.php'; ?>
<?php include 'script.php'; ?>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<div class="structure-row">
        <!-- Sidebar Start -->
        <?php 
include('header.php');
        ?>
                <!-- Header Top Navigation End -->
                <div class="clearfix"></div>
            </header>
            <!-- Right Section Header End -->
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="stat-box colortwo">
                                <!-- <i class="author">&nbsp;</i> -->
                                <a href="#" class="nav-link"><h4>Withdrawal Request</h4></a>
                                <?php $con = $conn->query("SELECT * FROM `dwithdrawal_history` WHERE withdrawal_status='pending'");?>
                                <h1><?php echo $con->num_rows; ?></h1>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="stat-box colorone">
                                <!-- <i class="chart">&nbsp;</i> -->
                                <h4>Pending Tipsters Registration</h4>
                                <?php $cont = $conn->query("SELECT * FROM `dcategory_subscriptions` WHERE status='pending'");?>
                                <h1><?php echo $cont->num_rows; ?></h1>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="stat-box colortwo">
                                <!-- <i class="pages">&nbsp;</i> -->
                                <?php $conr = $conn->query("SELECT * FROM `dbooking_code` WHERE bstatus='pending'");?>
                                <h4>Pending Sport Bet Offers  </h4>
                                <h1><?php echo $conr->num_rows; ?></h1>
                            </div>
                        </div>


                        <div class="col-xs-2">
                            <div class="stat-box colorsix">
                                <!-- <i class="pages">&nbsp;</i> -->
                                <?php $conr = $conn->query("SELECT * FROM `dpool_code` WHERE pstatus='pending'");?>
                                <h4>Pending Pools Offers  </h4>
                                <h1><?php echo $conr->num_rows; ?></h1>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="stat-box colorthree">
                                <!-- <i class="pages">&nbsp;</i> -->
                                <?php $conr = $conn->query("SELECT * FROM `dbooking_code` WHERE dresult='pending'");?>
                                <h4>Pending Sport Bet Result</h4>
                                <h1><?php echo $conr->num_rows; ?></h1>
                            </div>
                        </div>


                        <div class="col-xs-2">
                            <div class="stat-box colorfive">
                                <!-- <i class="pages">&nbsp;</i> -->
                                <?php $conr = $conn->query("SELECT * FROM `dpool_code` WHERE dresult='pending'");?>
                                <h4>Pending Pools Result</h4>
                                <h1><?php echo $conr->num_rows; ?></h1>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="stat-box colorfour">
                                <!-- <i class="users">&nbsp;</i> -->
                                <h4>Total Number Of Users</h4>
                                <?php $conu = $conn->query("SELECT * FROM `members_register`");?>
                                <h1><?php echo $conu->num_rows; ?></h1>
                            </div>
                        </div>
                        

                        <div class="col-xs-2">
                            <div class="stat-box colorthree">
                                <!-- <i class="pages">&nbsp;</i> -->
                                <?php $conrsx = $conn->query("SELECT SUM(dwallet_balance) AS balance FROM `members_register`");?>
                                <h4 >Total users Wallet Balance</h4>
                                <h1><?php if($conrsx->num_rows>0){ $wall=$conrsx->fetch_assoc(); echo number_format($wall['balance']); }; ?></h1>
                            </div>
                        </div>

<?php                               
                                $g = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$userid' ");                                
                                    $rows = $g->fetch_assoc();
                                ?>
                        <div class="col-xs-2">
                            <div class="stat-box colorfive">
                                <!-- <i class="downloads">&nbsp;</i> -->
                                <h4>Escrow Account</h4>
                                <?php  //echo $userid ;
                                $sql = $conn->query("SELECT SUM(dprice) AS total_balance FROM `dgame_market` WHERE dresult='pending'");
                                if($sql->num_rows>0){
                                    $row = $sql->fetch_assoc();
                                ?>
                                <h1>&#8358;<?php echo number_format($row['total_balance']); ?></h1>
                                <?php }else{ ?>
                                    <h1>&#8358;<?php echo number_format($row['total_balance'],2,'.', ' ') ?></h1>
                                <?php  } ?>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="stat-box colorsix">
                                <!-- <i class="comments">&nbsp;</i> -->
                                <h4 class="mb-2">Admin Wallet Balance</h4>
                                
                                <h1>&#8358;<?php   if($rows['dwallet'] != 0 ){ echo number_format($rows['dwallet']); }else{ echo number_format($rows['dwallet'],2,'.', ' ');} ?></h1>
                                <!-- <a href="#" class="nav-link">Withdraw</a> -->
                            </div>

                            
                        </div>

                    
                            <?php if($rows['dposition']=='administrator'){ ?>
                    <div class="col-md-12 mt-4">
                    
                    <a href="set-website" class="btn btn-primary btn-sm my-3">Set website Booking code</a>
                    <a href="set-promo" class="btn btn-success btn-sm my-3">Manage Bonus</a>
                    <a href="set-main-website" style="background: #000040; color:white" class="btn btn-infox  btn-sm my-3">Set Website</a>
                    <!-- <a href="manage-contacts" class="btn btn-info btn-sm my-3">Manage Contact</a> -->
                    <!-- <a href="manage-newsletter" class="btn btn-primary btn-sm my-3">Manage Newsletter</a> -->
                    </div>
                    <?php } ?>

                    <a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->
        </div>
        <!-- Right Section End -->
    </div>
</div>
<!-- Wrapper End -->
<?php 
include('footer.php');
?>
</body>
</html>
