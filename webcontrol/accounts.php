<?php 


require 'session.php';
require 'clean.php';


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
                       
                    <div class="col-xs-12">

                         <div class="search-box">
                    <input type="text" id="myInput" placeholder="Search Anything"/>
                    <input type="submit" value="go"/>
                </div>
              

         
            </div>

            <button type="button" class="btn btn-primary style3 " style="float:right;" data-toggle="modal" data-target="#maxx">Add Account</button>

                        
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Manage Accounts</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>user ID</th>
                                                    <th>Account Name</th>
                                                    <th>Email</th>
                                                    <th>Privileges</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                    <?php $admin = clean($_SESSION['userid']);

                                    $work =$conn->query("SELECT * FROM `admin_accounts` WHERE dposition !='administrator'");
                                    if($work->num_rows>0){
                                        while($row=$work->fetch_assoc()):
                                            ?>
                                                <tr>
                                                    <td> <?php echo $row['userid'] ?>  </td>
                                                    <td><?php echo $row['dname'] ?></td>
                                                    <td><?php echo $row['demail'] ?></td>
                                                    <td><?php echo $row['dprivileges'] ?></td>
                                                    <td>
                                                        
                                                    <div class="btn-group">
                                                        <div class="btn-group" >
                                                            <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                                            <li><a class=" " data-toggle="modal" data-target="#max<?php echo $row['userid']; ?>" href="#"><i class="fa fa-edit  text-primary"></i> Edit</a></li>
                                                            <div class="divider"></div>
                                                            <?php if($row['dstatus']=='ban'){?>
                                                            <li><a id="unbanstaff" unban="<?php echo $row['userid']; ?>" href="#"  >Unban User</a></li>
                                                            <?php }else{?>
                                                                <li><a id="banstaff" ban="<?php echo $row['userid']; ?>" href="#"> Ban User</a></li>
                                                          <?php  }?>
                                                            
                                                            </ul>
                                                        </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                        <?php endwhile; } ?>    
                                            </tbody>
                                        </table>
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-rights"> <i class="fa fa-arrow-circle-left"></i> Back</a>

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
    

<div class="modal fade" id="maxx" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="account-process" method="post" >
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create Subadmin</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        

                        <div class="form-group">
                            <label>Account Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>

                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                               
                            </div>



                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="pass" class="form-control" required="required">
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm password</label>
                                        <input type="password" name="cpass" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12"><h5>Privileges</h5></div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" name="funding" value="Funding Request"> Ability To Manage Funding Request</label> <br> 
                                    <label><input type="checkbox"  name="withdrawal" value="Withdrawal Request"> Ability To Manage Withdrawal Request</label>  <br>
                                    <label><input type="checkbox"  name="tips" value="Tips"> Ability To Manage Post Tip</label>  <br>
                                    <label><input type="checkbox"  name="tipster" value="Tips Registration"> Ability To Manage Tipsters Registration</label>  <br> 
                                    <label><input type="checkbox"  name="results" value="Results"> Ability To Manage Results</label> <br>
                                    <label><input type="checkbox"  name="mail" value="Mail"> Ability To Manage Mail</label> 
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox"  name="tipster" value="Tips Registration"> Ability To Manage Tipsters Registration</label>  <br> 
                                    <label><input type="checkbox"  name="games" value="Tips"> Ability To Manage Tips</label>   <br>
                                    <label><input type="checkbox"  name="await" value="Awaiting Payment"> Ability To Manage Awaiting Payment</label>   <br>
                                    <label><input type="checkbox"  name="users" value="Users"> Ability To Manage Users</label>  <br>
                                    <label><input type="checkbox"  name="blog" value="Blog"> Ability To Manage Blog</label>  <br>
                                    <label><input type="checkbox"  name="ranking" value="Ranking Fees"> Ability To Manage Ranking Price Request</label>  
                                </div>
                            </div>
                        </div>


                       

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <input type="submit" name="post" class="btn btn-primary btn-sm">
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>







    <?php
 $work =$conn->query("SELECT * FROM `admin_accounts` WHERE userid !='$admin'");
 if($work->num_rows>0){
while($row=$work->fetch_assoc()):

?>

<div class="modal fade" id="max<?php echo $row['userid']?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="account-update" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create Subadmin</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        

                        <div class="form-group">
                            <label>Account Name</label>
                            <input type="text" name="name" value="<?php echo $row['dname']?>" class="form-control form-control-sm" required>
                            <input type="hidden" name="user" value="<?php echo $row['userid']?>" class="form-control form-control-sm" required>
                        </div>

                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" value="<?php echo $row['demail']?>" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                               
                            </div>


                           <?php  $priv = $row['dprivileges'];
                            $exploded = explode(',', $priv);
                            //check staff accessibility
                            // if(in_array('Product', $exploded)){
                                ?>
                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12"><h5>Privileges</h5></div>
                                <div class="col-md-6"> 
                                    <label><input type="checkbox" <?php  if(in_array('Funding Request', $exploded)){echo 'checked';} ?> name="funding" value="Funding Request"> Ability To Manage Funding Request</label> <br> 

                                    <label><input type="checkbox" <?php  if(in_array('Withdrawal Request', $exploded)){echo 'checked';} ?> name="withdrawal" value="Withdrawal Request"> Ability To Manage Withdrawal Request</label>  <br>

                                    <label><input type="checkbox" <?php  if(in_array('Tips', $exploded)){echo 'checked';} ?> name="tips" value="Tips"> Ability To Manage Post Tips </label>  <br>

                                    <label><input type="checkbox" <?php  if(in_array('Results', $exploded)){echo 'checked';} ?> name="results" value="Results"> Ability To Manage Results</label> <br> 
                                    

                                    <label><input type="checkbox" <?php  if(in_array('Mail', $exploded)){echo 'checked';} ?> name="mail" value="Mail"> Ability To Manage Mail</label> 
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" <?php  if(in_array('Tips Registration', $exploded)){echo 'checked';} ?> name="tipster" value="Tips Registration"> Ability To Manage Tips Registration</label>  <br> 


                                    <label><input type="checkbox" <?php  if(in_array('Awaiting Payment', $exploded)){echo 'checked';} ?>  name="await" value="Awaiting Payment"> Ability To Manage Awaiting Payment</label>   <br>

                                    <label><input type="checkbox" <?php  if(in_array('Users', $exploded)){echo 'checked';} ?> name="users" value="Users"> Ability To Manage Users</label>  <br>

                                    <label><input type="checkbox" <?php  if(in_array('Blog', $exploded)){echo 'checked';} ?> name="blog" value="Blog"> Ability To Manage Blog</label>  <br>

                                    <label><input type="checkbox" <?php  if(in_array('Ranking Fees', $exploded)){echo 'checked';} ?> name="ranking" value="Ranking Fees"> Ability To Manage Ranking Price Request</label>  
                                </div>
                            </div>
                        </div>


                       

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <input type="submit" name="post" class="btn btn-primary btn-sm">
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>




    <?php endwhile; } ?>

<?php 
include('footer.php');
?>
</body>
</html>