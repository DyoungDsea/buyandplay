<?php 
    require 'session.php';
    require 'clean.php';
    $user = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$idc'")->fetch_assoc();
    if($user['dposition'] !="administrator"){
        $level = $user['dprivileges'];
            $exploded = explode(',', $level);
    
            if(!in_array('Users', $exploded)){
                header("Location: index");
            }
        }
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Accounts : Bet and Buy</title>

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
                                        <input type="text" id="myInput" placeholder="Auto Search Anything"/>
                                        <input type="submit" value="go"/>
                                    </div>
                        </div>
                        <div class="col-md-6">
                            <form action="search-user" method="POST">
                                <div class="row"  style="margin-top: -20px;">
                                    <div class="col-md-8">
                                    
                                            <div class="form-group ">
                                                <input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="Manual Search Anything" class="form-control">
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" name="user" class="btn btn-primary style3 " value="Submit">
                                    </div>
                                    
                                </div>
                            </form>
                            
                        </div>
                        <!-- <div class="col-md-3">
                            <button type="button" class="btn btn-primary style3 ">Search</button>
                        </div> -->
                    </div>

         
            </div>
            <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } else {
                            $page_no = 1;
                            } 
                            $total_records_per_page = 200;

                            ?>


                        
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Manage Users</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Registration Date</th>
                                                    <th>Username</th>
                                                    <th>Fullname</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Wallet Balance</th>
                                                    <!-- <th>Membership</th>
                                                    <th>VIP</th> -->
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 

                                            if(isset($_GET['search']) AND !empty($_GET['search'])){
                                                $search = $conn->real_escape_string($_GET['search']);

                                                $sqls = $conn->query("SELECT * FROM `members_register` WHERE username LIKE '%$search%' OR dname LIKE '%$search%' OR demail LIKE '%$search%' OR dnumber LIKE '%$search%' OR date_registered LIKE '%$search%' ORDER BY username ");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;

                                                $c = $conn->query("SELECT * FROM `members_register` WHERE username LIKE '%$search%' OR dname LIKE '%$search%' OR demail LIKE '%$search%' OR dnumber LIKE '%$search%' OR date_registered LIKE '%$search%' ORDER BY username LIMIT $start_from, $total_records_per_page");
                                            }else{
                                                $sqls = $conn->query("SELECT * FROM `members_register` ORDER BY username ");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;

                                                $c = $conn->query("SELECT * FROM `members_register` ORDER BY username LIMIT $start_from, $total_records_per_page");
                                            }
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo $r['date_registered']; ?></td>
                                                        <td><?php echo $r['username']; ?></td>
                                                        <td><?php echo $r['dname']; ?></td>
                                                        <td><?php echo $r['dnumber']; ?></td>
                                                        <td><?php echo $r['demail']; ?></td>
                                                        <!-- <td> -->
                                                        <?php
                                                        
                                                        // if($r['dcategory']=='Tipster' && $r['dvip']=='inactive'  ){
                                                        // echo "Member";
                                                        // }else if($r['dcategory']=='Tipster' && $r['dvip']=='active' ){ 
                                                        //     echo "VIP Member";
                                                        // }else if($r['dcategory']=='Punter' && $r['dvip']=='active' ){
                                                        //     echo "VIP";
                                                        // }else{
                                                        //     echo "Basic";
                                                        // }
                                                        //  ?>
                                                        <!-- </td> -->
                                                        <!-- <td><?php //echo ucfirst($r['dvip']); ?></td> -->
                                                        <td> &#8358;<?php echo number_format($r['dwallet_balance']); ?></td>
                                                        <td>

                                                        <input type="hidden" value="<?php echo basename($_SERVER["REQUEST_URI"]); ?>" id='uri'>
                                                        <div class="btn-group">
                                                        <div class="btn-group" >
                                                            <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                                            <li><a class=" " data-toggle="modal" data-target="#max<?php echo $r['userid']; ?>" href="#"><i class="fa fa-eye  text-primary"></i> View</a></li>
                                                            <div class="divider"></div>
                                                            <li><a class=" " data-toggle="modal" data-target="#add<?php echo $r['userid']; ?>" href="#">Add To Wallet</a></li>
                                                            <div class="divider"></div>
                                                            <li><a class=" " data-toggle="modal" data-target="#minus<?php echo $r['userid']; ?>" href="#">Minus From Wallet</a></li>
                                                            <div class="divider"></div>

                                                            <li><a class=" " href="transaction-history?userid=<?php echo $r['userid']; ?>" >Transaction History</a></li>
                                                            <div class="divider"></div>

                                                            <?php if($r['status']=='ban'){?>
                                                            <li><a id="unban" unban="<?php echo $r['userid']; ?>" href="#"  >Unban User</a></li>
                                                            <?php }else{?>
                                                                <li><a id="ban" ban="<?php echo $r['userid']; ?>" href="#"> Ban User</a></li>
                                                          <?php  }?>
                                                            
                                                            </ul>
                                                        </div>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <?php endwhile;  }else{
                                                        echo '
                                                        <tr>
                                                        <td colspan="8" class="text-danger">Sorry! No result found </td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>
                                                    
                                            </tbody>

                                        </table>
                                        <ul class="pagination pagination-md justify-content-center">
            
                                            <?php 
                                            if(isset($_GET['search']) AND !empty($_GET['search'])){
                                                for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                    echo "<li  class='page-item '><a class='page-link' href='manage-users?page_no=$counter&search=$search' style='color:#0088cc;'>$counter</a></li>"; 
                                                
                                                }
                                            }else{
                                                for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                    echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                                
                                                }
                                            }
                                        
                                            ?>
                                            </ul>
                                     
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


<?php

    $x = $conn->query("SELECT * FROM `members_register` ORDER BY dname");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>


<!-- Wrapper End -->
<div class="modal fade" id="add<?php echo $xx['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="wallet-calulation" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add to Wallet</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                    <div class="form-group">                    
                        <input type="text" name="" disabled class="form-control " value="<?php echo $xx['username']; ?>">
                    </div>
                            <div class="form-group">
                                <label for="cat">Amount</label>
                                <input type="hidden" name="userid" value="<?php echo $xx['userid']; ?>">
                                <input type="number" name="cat" id="cat" required pattern="[0-9]" placeholder="Enter amount to Add e.g 1000" class="form-control">
                            </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>



    <div class="modal fade" id="minus<?php echo $xx['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="wallet-calulation" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Minus From Wallet</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                    <div class="form-group">                    
                        <input type="text" name="" disabled class="form-control " value="<?php echo $xx['username']; ?>">
                    </div>
                            <div class="form-group">
                                <label for="cat">Amount</label>
                                <input type="hidden" name="userid" value="<?php echo $xx['userid']; ?>">
                                <input type="number" name="cat" id="cat" required pattern="[0-9]" placeholder="Enter amount to Minus e.g 1000" class="form-control">
                            </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="minus" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>





    <div class="modal fade" id="max<?php echo $xx['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">User Details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                           
                        <table class="table-hover table table-bordered">

                        <tr>
                            <td colspan="2">User ID: <?php echo $xx['userid']; ?> </td>
                            <td colspan="2">Username: <?php echo $xx['username']; ?> </td>
                            
                        </tr>
                        <tr>
                            <td colspan="2">Fullname: <?php echo $xx['dname']; ?> </td>
                            <td colspan="2">Phone: <?php echo $xx['dnumber']; ?> </td>

                        </tr>

                        <tr>
                            <td colspan="2">Email: <?php echo $xx['demail']; ?> </td>
                            <td>Wallet: &#8358;<?php echo number_format($xx['dwallet_balance']); ?></td>
                            
                        </tr>

                        <tr>
                            <td colspan="4">Address: <?php echo $xx['address']; ?> </td>
                            
                        </tr>
                        <tr>
                        <td>Membership: <?php if($xx['dcategory']=='Tipster' && $xx['dvip']=='inactive'  ){
                                                        echo "Member";
                                                        }else if($xx['dcategory']=='Tipster' && $xx['dvip']=='active' ){ 
                                                            echo "VIP Member";
                                                        }else if($xx['dcategory']=='Punter' && $xx['dvip']=='active' ){
                                                            echo "VIP";
                                                        }else{
                                                            echo "Basic";
                                                        } ?></td>
                            <td colspan="">VIP: <?php echo ucfirst($xx['dvip']); ?> </td>
                            <td >Status: <?php echo ucfirst($xx['status']); ?> </td>
                        </tr>
                        </table>
                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                    </div><!-- End .modal-footer -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>
        <?php endwhile; endif; ?>
<?php 
include('footer.php');
?>
</body>
</html>