<?php 
    require 'session.php';
    require 'clean.php';
    $user = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$idc'")->fetch_assoc();
    if($user['dposition'] !="administrator"){
        $level = $user['dprivileges'];
            $exploded = explode(',', $level);
    
            if(!in_array('Tips', $exploded)){
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
                                    <h2 class="heading">Manage Rejected Pool Offers</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                    <table class="table table-hover">
                                    <tr>
                                        <th>Username</th>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Week</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Game status</th>
                                        <th>Date</th>
                                        <th>---</th>
                                    </tr>
                                    <tbody id="myDIV">
                                        <?php 
                                        
                                        // SELECT * FROM `dpool_code` INNER JOIN `dpools` ON dpools.dcategory_ids = dpool_code.dodd WHERE dpool_code.duserid='$id' AND dpool_code.dodd='$pool_id' ORDER BY dpool_code.id
                                        
                                        $sqls =$conn->query("SELECT * FROM `dpool_code` INNER JOIN `dpools` ON dpools.dcategory_ids = dpool_code.dodd WHERE dpool_code.dresult = 'rejected' AND dpool_code.pstatus = 'rejected' ORDER BY dpool_code.dstart_time ");
                                        $total_records =$sqls->num_rows;
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $start_from = ($page_no - 1) * $total_records_per_page;

                                        $v =$conn->query("SELECT * FROM `dpool_code` INNER JOIN `dpools` ON dpools.dcategory_ids = dpool_code.dodd WHERE dpool_code.dresult = 'rejected' AND dpool_code.pstatus = 'rejected' ORDER BY dpool_code.dstart_time  LIMIT $start_from, $total_records_per_page");
                                        if($v->num_rows>0){
                                            while($r = $v->fetch_assoc()):
                                                $userid = $conn->real_escape_string($r['duserid']);
                                                $username = $conn->query("SELECT username FROM `members_register` WHERE userid='$userid'")->fetch_assoc();
                                            ?>                        
                                        <tr>
                                        <td><?php echo $username['username'] ?></td>
                                        <td><?php echo $r['dgames'] ?></td>
                                        <td><?php echo $r['dpool'] ?></td>
                                        <td><?php echo $r['dweek'] ?></td>
                                        <td><?php echo $r['dresult'] ?></td>
                                        <td><?php echo $r['pstatus'] ?></td>
                                        <td><?php echo $r['don_and_off'] ?></td>
                                        <td><?php echo date("d M Y", strtotime($r['dstart_time'])) ?></td>
                                        <td>
                                                
                                                <input type="hidden" value="<?php echo basename($_SERVER["REQUEST_URI"]); ?>" id='uri'>
                                                            <div class="btn-group">
                                                            <div class="btn-group" >
                                                                <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                                Action <span class="caret"></span></button>
                                                                <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                                                <!-- <li><a class=" " data-toggle="modal" data-target="#max<?php //echo $r['pool_id']; ?>" href="#"><i class="fa fa-eye  text-primary"></i> View</a></li> -->
    
                                                                <li><a id="restorep" dele="<?php echo $r['pool_id']; ?>" href="#" ><i class="fa fa-reply  text-danger"></i> Restore</a></li>
                                                                <li><a id="delep" dele="<?php echo $r['pool_id']; ?>" href="#" ><i class="fa fa-trash  text-danger"></i> Delete</a></li>
                                                                </ul>
                                                            </div>
                                                            </div>
                                                            </td>
                                        </tr>
                                            <?php endwhile; }else{
                                            echo '<tr><td colspan="4" style="color:red">No result found </td></tr>';
                                            } ?>
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

    $x = $conn->query("SELECT * FROM `dpool_code` INNER JOIN `dpools` ON dpools.dcategory_ids = dpool_code.dodd WHERE dpool_code.dresult = 'rejected' AND dpool_code.pstatus = 'rejected' ORDER BY dpool_code.dstart_time  LIMIT $start_from, $total_records_per_page");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['pool_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <!-- <form action="category-update" method="post"> -->
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">View Details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                    <table class="table table-hover">

                        <tr>
                            <td>User ID</td>
                            <td><?php echo $xx['userid'] ?></td>
                            <td>Coupon Code</td>
                            <td><?php echo $xx['dcoupon'] ?></td>
                        </tr>
                        <tr>
                            <td>Booking ID</td>
                            <td><?php echo $xx['booking_id'] ?></td>

                            
                            <td>Booking Code 1</td>
                            <td><?php echo $xx['dcode'] ?> (<?php echo ucfirst($xx['dweb_name1']) ?>)</td>
                        </tr> 

                        <tr>
                            <td>Booking Code 2</td>
                            <td><?php echo $xx['dcode2'] ?> (<?php echo ucfirst($xx['dweb_name2']) ?>)</td>

                            <td>Booking Code 3</td>
                            <td><?php echo $xx['dcode3'] ?> (<?php echo ucfirst($xx['dweb_name3']) ?>)</td>
                        </tr> 


                        <tr>
                            <td>Total ODD</td>
                            <td><?php echo $xx['dtotal_odd'] ?></td>

                            <td>Category</td>
                            <td><?php echo $xx['dcategory'] ?></td>
                        </tr>
                        <tr>
                        <td>Result</td>
                        <td><?php echo $xx['dresult'] ?></td>


                        <td>Total Tips</td>
                        <td><?php echo $xx['daccumulator'] ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">Starting Date & Time</td>
                        <td colspan="2"><?php echo $xx['dstart_game_time'] ?></td>
                        </tr>
                        </table>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <!-- <button type="submit" name="log" class="btn btn-primary btn-sm">Update</button> -->
                    </div><!-- End .modal-footer -->
                <!-- </form> -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>
        <?php endwhile; endif; ?>



<?php 
include('footer.php');
?>
</body>
</html>