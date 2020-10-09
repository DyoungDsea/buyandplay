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
                            <button type="button" class="btn btn-primary style3 " style="float:right;" data-toggle="modal" data-target="#add">Add Category</button>
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
                                    <h2 class="heading">Manage Categories</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Categories</th>
                                                    <th>Fees(&#8358;)</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                $sqls=$conn->query("SELECT * FROM `dgame_categories` WHERE dstatus='active' ORDER BY dgame");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                $c = $conn->query("SELECT * FROM `dgame_categories` WHERE dstatus='active' AND dcategory !='Free' ORDER BY dgame DESC LIMIT $start_from, $total_records_per_page");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo $num++; ?></td>
                                                        <td><?php echo $r['dcategory']; ?></td>
                                                        <td><?php echo number_format($r['dfee']); ?></td>
                                                        <td>

                                                        <input type="hidden" value="<?php echo $r['category_id']; ?>" id='referral<?php echo $r['id']; ?>'>
                                                        <div class="btn-group">
                                                        <div class="btn-group" >
                                                            <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                                            <li><a class=" " data-toggle="modal" data-target="#max<?php echo $r['id']; ?>" href="#"><i class="fa fa-edit"></i> Edit Category</a></li>
                                                            <li><a class="" href="#" id="catDelete" cat="<?php echo $r['category_id']; ?>" ><i class="fa fa-trash"></i> Delete</a></li>
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
                                        <ul class="pagination pagination text-center justify-content-center mb-5">
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
<a href="javascript:history.back()" style="margin: 40px 0" class="btn btn-info pull-rights"> <i class="fa fa-arrow-circle-left"></i> Back</a>
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
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="category" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="cat">Category</label>
                                <input type="text" name="cat" id="cat" required placeholder="Enter Category" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cat2">Category Fees</label>
                                <input type="text" name="catf" id="cat2" required placeholder="Enter Category Fees" class="form-control">
                            </div>

                            <!-- <div class="form-group">
                                <label for="cat2t">Game to win </label>
                                <input type="text" name="win" id="cat2t" required placeholder="Enter Number of game to be won" class="form-control">
                            </div> -->

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>

<?php

    $x = $conn->query("SELECT * FROM `dgame_categories` WHERE dstatus='active' ORDER BY dcategory");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="category-update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="cat">Category</label>
                                <input type="text" name="cat" id="cat" value="<?php echo $xx['dcategory']; ?>" required placeholder="Enter Category" class="form-control">
                                <input type="hidden" name="hid"  value="<?php echo $xx['category_id']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="cat2">Category Fees</label>
                                <input type="text" name="catf" id="cat2"  value="<?php echo $xx['dfee']; ?>" required placeholder="Enter Category Fees" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label for="cat2t">Game to win </label>
                                <input type="text" name="win" id="cat2t" required  value="<?php echo $xx['dgame_won']; ?>" placeholder="Enter Number of game to be won" class="form-control">
                            </div> -->

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>
        <?php endwhile; endif; ?>
<?php 
include('footer.php');
?>
</body>
</html>