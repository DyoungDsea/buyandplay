<?php 
    require 'session.php';
    require 'clean.php';
    $user = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$idc'")->fetch_assoc();
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
                                    <h2 class="heading">Manage Won Pool Offers</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                    <table class="table table-hover">
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Code</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Game status</th>
                                        <th>Date</th>
                                    </tr>
                                    <tbody id="myDIV">
                                        <?php 
                                        
                                        
                                        $sqls =$conn->query("SELECT * FROM  `dpool_code`  WHERE dresult = 'won' AND pstatus = 'Approved' ORDER BY dstart_time  ");
                                        $total_records =$sqls->num_rows;
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $start_from = ($page_no - 1) * $total_records_per_page;

                                        $v =$conn->query("SELECT * FROM  `dpool_code`  WHERE dresult = 'won' AND pstatus = 'Approved' ORDER BY dstart_time  LIMIT $start_from, $total_records_per_page");
                                        if($v->num_rows>0){
                                            while($r = $v->fetch_assoc()):?>                        
                                        <tr>
                                        <td><?php echo $r['pool_id'] ?></td>
                                        <td><?php echo $r['dgames'] ?></td>
                                        <td><?php echo $r['dresult'] ?> <img style="width:20%" src="../assets/images/icon-.png" alt="site-logo"></td>
                                        <td><?php echo $r['pstatus'] ?></td>
                                        <td><?php echo $r['don_and_off'] ?></td>
                                        <td><?php echo date("d M Y", strtotime($r['dstart_time'])) ?></td>
                                           
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
include('footer.php');
?>
</body>
</html>