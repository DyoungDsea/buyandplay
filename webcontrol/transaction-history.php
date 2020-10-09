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
                                        <input type="text" id="myInput" placeholder="Search Anything"/>
                                        <input type="submit" value="go"/>
                                    </div>
                        </div>
                        
                    </div>

         
            </div>
            <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } else {
                            $page_no = 1;
                            } 
                            $total_records_per_page = 150;

                            ?>


                        <div class="row" style="padding-left:12px">
                        <form action="transaction-date" method="POST">
                            <div class="col-md-3 ">
                                <div class="form-group">
                                <label for="#">Search From</label>
                                    <input type="text" name="start" required value="<?php
                                    if(isset($_GET['end'])){ echo $_GET['end']; }else{ 
                                    $now = date("d-m-Y");
                                    echo date("d-m-Y", strtotime('-30 days', strtotime($now)));} ?>" id="datepicker" placeholder="" class="form-control">
                                    <input type="hidden" name="user"  value="<?php echo $_GET['userid']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="#">Search To</label>
                                    <input type="text" name="end" required value="<?php if(isset($_GET['start'])){ echo $_GET['start']; }else{echo date("d-m-Y");} ?>" placeholder="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="date" class="btn btn-primary btn-sm" style="margin-top:25px">Search</button>
                            </div>
                            </form>
                        </div>


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
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                    <th>Username</th>
                                                    <th>Description</th>
                                                    <th>Credit</th>
                                                    <th>Debit</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 

                                        if(isset($_GET['userid'])):
                                            $userid = clean($_GET['userid']);
                                            if(isset($_GET['start']) AND isset($_GET['end'])){
                                                $start_date = date("Y-m-d h:i:s",  strtotime('+1 days', strtotime(clean($_GET['start']))));
                                                $end_date = date("Y-m-d h:i:s", strtotime(clean($_GET['end'])));
                                            }else{
                                                $start_date = date("Y-m-d h:i:s", strtotime('+1 days', strtotime(date("Y-m-d h:i:s"))));
                                                $end_date = date("Y-m-d h:i:s", strtotime('-30 days', strtotime($start_date)));
                      
                                            }

                                            if(isset($_GET['start']) AND isset($_GET['end'])){
                                                $start_date = date("Y-m-d ",  strtotime('+1 days', strtotime(clean($_GET['start']))));
                                                $end_date = date("Y-m-d ", strtotime(clean($_GET['end'])));
                      
                                                $sqls =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC");
                      
                                              $total_records =$sqls->num_rows;
                                              $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                              $start_from = ($page_no - 1) * $total_records_per_page;
                                              $c =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND CAST(ddate as date) BETWEEN '$start_date'AND '$end_date'  ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                      
                                            }else{
                                               $start_date = date("Y-m-d h:i:s", strtotime('+1 days', strtotime(date("Y-m-d h:i:s"))));
                                               $end_date = date("Y-m-d h:i:s", strtotime('-30 days', strtotime($start_date)));
                      
                                               $sqls =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC");
                      
                                              $total_records =$sqls->num_rows;
                                              $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                              $start_from = ($page_no - 1) * $total_records_per_page;
                                              $c =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                                            }
                                            
                                               
                                           
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):
                                                        $user = $r['userid'];
                                                        $bal = $conn->query("SELECT * FROM members_register WHERE userid='$user'")->fetch_assoc();
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $r['transaction_id']; ?></td>
                                                        <td><?php 
                                                        $date = $r['ddate'];
                                                        echo $ddate = date("d/m/Y h:i:s", strtotime('+5 hours', strtotime($date)));
                                                         ?></td>
                                                        <td><?php echo $bal['username']; ?></td>
                                                        <td><?php echo $r['dname']; ?></td>
                                                        <td style="color:green;"><b><?php if($r['dcredit'] != NULL){echo '&#8358;'.number_format($r['dcredit']);} ?></b></td>
                                                        <td style="color:red;"><b><?php if($r['ddebit'] != NULL){echo '- &#8358;'.number_format($r['ddebit']);} ?></b></td>

                                                        <td> &#8358;<?php echo number_format($r['dwallet_balance']); ?></td>
                                                        
                                                    </tr>
                                                    <?php endwhile;  }else{
                                                        echo '
                                                        <tr>
                                                        <td colspan="8" class="text-danger">Sorry! No result found </td>
                                                        </tr>
                                                        ';
                                                    }
                                                endif;  ?>
                                                    
                                            </tbody>

                                        </table>
                                        <ul class="pagination pagination-md justify-content-center">
            
                                            <?php 

                                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                echo "<li  class='page-item '><a class='page-link' href='transaction-history?userid=$userid&page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                            
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