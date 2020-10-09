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
                                    <h2 class="heading">Manage Approved <?php echo $_GET['category']; ?> (Pools) </h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                    <table class="table table-hover">
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Username</th>
                                        <th>Code</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Game status</th>
                                        <th>Date</th>
                                        <th>---</th>
                                    </tr>
                                    <tbody id="myDIV">
                                        <?php 
                                        
                                        $get_id = clean($_GET['cat_id']);
                                        $sqls =$conn->query("SELECT * FROM  `dpool_code`  WHERE dresult = 'pending' AND pstatus = 'Approved' AND dodd='$get_id' ORDER BY dstart_time ");
                                        $total_records =$sqls->num_rows;
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $start_from = ($page_no - 1) * $total_records_per_page;

                                        $v =$conn->query("SELECT * FROM  `dpool_code`  WHERE dresult = 'pending' AND pstatus = 'Approved' AND dodd='$get_id' ORDER BY dstart_time LIMIT $start_from, $total_records_per_page");
                                        if($v->num_rows>0){
                                            while($r = $v->fetch_assoc()):?>                        
                                        <tr>
                                        <td><?php echo $r['pool_id'] ?></td>
                                        <td><?php 
                                            
                                                $user_id = clean($r['duserid']);

                                                $plat = $conn->query("SELECT username FROM `members_register` WHERE userid='$user_id'")->fetch_assoc();
                                                echo $plat['username'];
                                             ?></td>
                                        <td><?php echo $r['dgames'] ?></td>
                                        <td><?php echo $r['dresult'] ?></td>
                                        <td><?php echo $r['pstatus'] ?></td>
                                        <td><?php echo $r['don_and_off'] ?></td>
                                        <td><?php echo date("d M Y h:ia", strtotime($r['dstart_time'])) ?></td>
                                            <td>
                                                
                                            <!-- <input type="hiddens" value="<?php //echo basename($_SERVER["REQUEST_URI"]); ?>" id='uri'> -->
                                            <input type="hidden" value="manage-pool-approve?category=<?php echo $_GET['category']; ?>&cat_id=<?php echo $get_id; ?>" id='uri'>

                                                        <div class="btn-group">
                                                        <div class="btn-group" >
                                                            <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">

                                                            
                                                            <?php if($r['pstatus'] !="pending" AND $r['don_and_off']=='off'){?>
                                                            <li><a id="wonP" cat="<?php echo $r['dodd']; ?>" user="<?php echo $r['duserid']; ?>" wonP="<?php echo $r['pool_id']; ?>" href="#"><i class="fa fa-check text-success"></i> Mark As Won</a></li>

                                                            <li><a id="lostP" cat="<?php echo $r['dodd']; ?>" user="<?php echo $r['duserid']; ?>" lostP="<?php echo $r['pool_id']; ?>" href="#"  ><i class="fa fa-times  text-danger"></i> Mark As Lost</a></li>
                                                            <?php } ?>
                                                            <li> <a id="cancelP" cat="<?php echo $r['dodd']; ?>" user="<?php echo $r['duserid']; ?>" lost="<?php echo $r['pool_id']; ?>" href="#"  ><i class="fa fa-minus-circle  text-danger"></i> Mark As Cancel</a></li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                        </td>
                                        </tr>
                                            <?php endwhile; }else{
                                            echo '<tr><td colspan="7" style="color:red">No result found </td></tr>';
                                            } ?>
                                    </tbody>
                                </table>
                                        

                                                        
                                                   
                                        <ul class="pagination pagination text-center justify-content-center">
                                     
                                                    <?php 
                                                            $cate =  $_GET['category'];

                                                    if(isset($_GET['pro-name'])){
                                                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                            echo "<li  class='page-item '><a class='page-link' href='register-customer?page_no=$counter&pro-name=".$_GET['pro-name']."' style='color:#0088cc;'>$counter</a></li>"; 
                                                        
                                                        }
                                                    }else{
                                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                            echo "<li  class='page-item '><a class='page-link' href='manage-pool-approve?category=$cate&cat_id=$get_id&page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                                        
                                                        }
                                                    }

                                                
                                                    ?>
                                                    </ul>
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

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
include('footer.php');
?>
</body>
</html>