<?php 
    require 'session.php';
    require 'clean.php';
    include("../config.php");

?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title> Change Password : Bet and Buy</title>

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
        

            <div class="loginwrapper" style="background:none; position:relative; height:0%;">
                
	<!-- <span class="circles"></span> -->
	<div class="loginone" style="margin-top:30px;">
    	<header>
            <h1>Change Password</h1>
    	<!-- <a href="dashboard1.html"><img src="assets/images/xlogo.png.pagespeed.ic.Foz7Hxw-1_.png" alt=""/></a> -->
            <p>Enter your credentials</p>
        </header>
        <?php 
        $admin = $_SESSION['userid'];
                                    
                                    $sqls=$conn->query("SELECT * FROM admin_accounts WHERE userid='$admin'");
                                    
                                   
                        
                                    if($sqls->num_rows>0):
                                        $num = 1;
                                        while($r=$sqls->fetch_assoc()):?>
        <form action="change_password" method="post">
        	
            <div class="password">
            <input type="hidden" name="pid" value="<?php echo  $r['pword'];  ?>">
            	<input type="password" name="oldpassword" class="form-control" placeholder="Enter your Old password"/>
                <i class="glyphicon glyphicon-lock"></i>
            </div>
            <div class="password">
            <input type="hidden" name="id" value="<?php echo  $r['id']; ?>" class="form-control form-control-sm" required>
            	<input type="password" name="password1" class="form-control" placeholder="Enter your New password"/>
                <i class="glyphicon glyphicon-lock"></i>
            </div>
            <div class="password">
            	<input type="password" name="password2" class="form-control" placeholder="Confirm Password"/>
                <i class="glyphicon glyphicon-lock"></i>
            </div>
			
            <input type="submit" name="log" class="btn btn-primary style2" value="Submit"/>
        </form>
        <?php endwhile;
     endif; ?>
       
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
                        <h3 class="modal-title" id="addressModalLabel">Create Account</h3>
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

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
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
                        <h3 class="modal-title" id="addressModalLabel">Update Account</h3>
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

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
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