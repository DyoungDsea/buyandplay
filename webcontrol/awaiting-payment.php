<?php 
    require 'session.php';
    require 'clean.php';
    $user = $conn->query("SELECT * FROM `admin_accounts`")->fetch_assoc();
    if($user['dposition'] !="administrator"){
        $level = $user['dprivileges'];
            $exploded = explode(',', $level);
    
            if(!in_array('Awaiting Payment', $exploded)){
                header("Location: index");
            }
        }
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Awaiting Payment : Bet and Buy</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<?php include 'style.php'; ?>
<?php include 'script.php'; ?>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<div class="structure-row">
        <!-- Sidebar Start -->
        <?php include('header.php'); ?>
                <!-- Header Top Navigation End -->
                <div class="clearfix"></div>
            </header>
            <!-- Right Section Header End -->
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-md-4">
                                    <div class="search-box">
                                        <input type="text" id="myInput" placeholder="Search Anything"/>
                                        <input type="submit" value="go"/>
                                    </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <!-- <button type="button" class="btn btn-primary style3 " style="float:right;" data-toggle="modal" data-target="#add">Add Category</button> -->
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


                        
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Awaiting Payment</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Username</th>
                                                    <th>Account Name</th>
                                                    <th>Account Number</th>
                                                    <th>Bank Name</th>
                                                    <th>Fees(&#8358;)</th>
                                                    <th>Date</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                $sqls=$conn->query("SELECT * FROM `dwithdrawal_history` WHERE withdrawal_status='Approved' ORDER BY id");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                // $c = $conn->query("SELECT * FROM `dcategory_subscriptions` WHERE dstatus='Approved' ORDER BY dcategory LIMIT $start_from, $total_records_per_page");

                                                $c = $conn->query("SELECT * FROM `dwithdrawal_history` INNER JOIN `members_register` ON    dwithdrawal_history.user_id = members_register.userid   WHERE dwithdrawal_history.withdrawal_status='Approved' ORDER BY dwithdrawal_history.pdate DESC");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):                                                      
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $r['withdrawal_id']; ?></td>
                                                        <td><?php echo $r['username']; ?></td>
                                                        <td><?php echo ucwords($r['account_name']); ?></td>
                                                        <td><?php echo $r['account_number']; ?></td>
                                                        <td><?php echo ucfirst($r['bank_name']); ?></td>
                                                        <td><?php echo ucfirst($r['amount']); ?></td>
                                                        <td><?php echo date("d/m/Y", strtotime($r['ddate'])); ?></td>
                                                        <td>

                                                        
                                                        <input type="hidden" value="<?php echo basename($_SERVER["REQUEST_URI"]); ?>" id='uri'>
                                                        <div class="btn-group">
                                                        <div class="btn-group" >
                                                            <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                                            <li><a class="nav-link" href="#" id="paymentA" email="<?php echo $r['demail']; ?>" user="<?php echo $r['userid']; ?>" withs="<?php echo $r['withdrawal_id']; ?>" ><i class="fa fa-check "></i> Confirm Payment</a></li>
                                                            <div class="divider"></div>
                                                            <li><a class="nav-link" href="#" id="noPay" email="<?php echo $r['demail']; ?>" user="<?php echo $r['userid']; ?>" withs="<?php echo $r['withdrawal_id']; ?>" ><i class="fa fa-times"></i> Reject</a></li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <?php endwhile;  }else{
                                                        echo '
                                                        <tr>
                                                        <td colspan="4" class="text-danger">Sorry! No result found </td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>
                                                    
                                            </tbody>

                                        </table>
                                        <ul class="pagination pagination text-center justify-content-center">
                                                    <?php 


                                                    if(isset($_GET['pro-name'])){
                                                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                            echo "<li  class='page-item '><a class='page-link' href='register-customer?page_no=$counter&pro-name=".$_GET['pro-name']."' style='color:#0088cc;'>$counter</a></li>"; 
                                                        
                                                        }
                                                    }else{
                                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                            echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                                        
                                                        }
                                                    }

                                                
                                                    ?>
                                                    </ul>
                                                    <a href="javascript:history.back()" style="margin-top:20px" class="btn btn-info  pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>
                                    </section>
                                </div>
                            </div>
                        </div>
                        
                        
                            </div>
                        </div>
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