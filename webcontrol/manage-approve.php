<?php 
    require 'session.php';
    require 'clean.php';
    $user = $conn->query("SELECT * FROM `admin_accounts`  WHERE userid='$idc'")->fetch_assoc();
    if($user['dposition'] !="administrator"){
        $level = $user['dprivileges'];
            $exploded = explode(',', $level);
    
            if(!in_array('Results', $exploded)){
                header("Location: index");
            }
        }
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Approved : Bet and Buy</title>

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
                                    <h2 class="heading">Manage Approved Offers</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                    <table class="table table-hover">
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Tipster</th>
                                        <th>Booking Code</th>
                                        <th>Coupon</th>
                                        <th>Result</th>
                                        <th>Game Status</th>
                                        <th>Starting time</th>
                                        <th>---</th>
                                    </tr>
                                    <tbody id="myDIV">
                                        <?php 
                                        $get_id = clean($_GET['cat_id']);
                                        
                                        $sqls =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.dresult = 'pending' AND dbooking_code.bstatus = 'Approved' AND dbooking_code.dodd='$get_id' ");
                                        $total_records =$sqls->num_rows;
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $start_from = ($page_no - 1) * $total_records_per_page;
                                        $v =$conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.dresult = 'pending' AND dbooking_code.bstatus = 'Approved' AND dbooking_code.dodd='$get_id' ORDER BY dbooking_code.id  LIMIT $start_from, $total_records_per_page");
                                        if($v->num_rows>0){
                                            while($r = $v->fetch_assoc()): $cate = $r['dcategory'];?>                        
                                        <tr>
                                            <td><?php echo $r['booking_id'];?></td>
                                            <td><?php 
                                            
                                                $user_id = clean($r['userid']);

                                                $plat = $conn->query("SELECT username FROM `members_register` WHERE userid='$user_id'")->fetch_assoc();
                                                echo $plat['username'];
                                             ?></td>

                                            <td><?php echo $r['dcode'] ?></td>
                                            <td><?php echo $r['dcoupon'] ?></td>                                            
                                            <td><?php echo $r['dresult'] ?></td>
                                            <td><?php echo $r['don_and_off'] ?></td>
                                            <td><?php echo date("d M Y", strtotime($r['dstart_game_time'])); ?></td>
                                            <td>
                                                
                                            <input type="hidden" value="manage-approve?category=<?php echo $r['dcategory']; ?>&cat_id=<?php echo $get_id; ?>" id='uri'>
                                                        <div class="btn-group">
                                                        <div class="btn-group" >
                                                            <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                                            <li><a class=" " data-toggle="modal" data-target="#max<?php echo $r['booking_id']; ?>" href="#"><i class="fa fa-eye  text-primary"></i> View</a></li>
                                                            <?php if($r['bstatus'] =="pending"):?>
                                                            <li><a id="done" done="<?php echo $r['booking_id']; ?>" href="#"><i class="fa fa-check text-success"></i> Approve Game</a></li>
                                                            <?php endif; ?>
                                                            <!-- <li><a id="ignor" ignor="<?php //echo $r['booking_id']; ?>" href="#"  ><i class="fa fa-trash  text-danger"></i> Reject Game</a></li> -->
                                                            <?php if($r['bstatus'] !="pending" AND $r['don_and_off']=='off'):?>
                                                            <li><a id="won" cat="<?php echo $r['dodd']; ?>" user="<?php echo $r['userid']; ?>" won="<?php echo $r['booking_id']; ?>" href="#"><i class="fa fa-check text-success"></i> Mark As Won</a></li>

                                                            <li><a id="lost" cat="<?php echo $r['dodd']; ?>" user="<?php echo $r['userid']; ?>" lost="<?php echo $r['booking_id']; ?>" href="#"  ><i class="fa fa-times  text-danger"></i> Mark As Lost</a></li>
                                                            <?php endif; ?>
                                                            <li> <a id="lostC" cat="<?php echo $r['dodd']; ?>" user="<?php echo $r['userid']; ?>" lost="<?php echo $r['booking_id']; ?>" href="#"  ><i class="fa fa-minus-circle  text-danger"></i> Mark As Cancel</a></li>
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
                                                            echo "<li  class='page-item '><a class='page-link' href='manage-approve?category=$cate&cat_id=$get_id&page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                                        
                                                        }
                                                    }

                                                
                                                    ?>
                                                    </ul>
<a href="javascript:history.back()" style="margin-top: 20px " class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

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

    $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dgame_categories` ON dgame_categories.category_id = dbooking_code.dodd WHERE dbooking_code.dresult = 'pending'  AND dbooking_code.bstatus = 'Approved' AND dbooking_code.dodd='$get_id' ORDER BY dbooking_code.id DESC LIMIT $start_from, $total_records_per_page");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['booking_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
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
                                <td>Coupon: <?php echo $xx['dcoupon'] ?></td>
                                <td>Username: <?php 
                                            
                                                $user_id = clean($xx['userid']);

                                                $plat = $conn->query("SELECT username FROM `members_register` WHERE userid='$user_id'")->fetch_assoc();
                                                echo $plat['username'];
                                             ?></td>
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
                            <td>Status: <?php echo $xx['bstatus'] ?></td>


                            <td>Game Status: <?php echo $xx['don_and_off'] ?></td>
                            </tr>
                            <tr>
                            <td colspan="2">Expire Date</td>
                            <td colspan="2"><?php echo date("d M Y", strtotime($xx['dstart_game_time'])); ?></td>
                            </tr>
                            </table>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
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