<?php
    require 'session.php'; 
    require 'clean.php';
    $user = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$idc'")->fetch_assoc();
    if($user['dposition'] !="administrator"){
        $level = $user['dprivileges'];
            $exploded = explode(',', $level);
    
            if(!in_array('Mail', $exploded)){
                header("Location: index");
            }
        }?>
<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Inbox : Bet and Buy</title>
<!--// Stylesheets //-->
<!-- <link href="assets/css/A.style.css%2bbootstrap.css%2cMcc.0ONHoLZfWm.css.pagespeed.cf.2IS1LTyY4Z.css" rel="stylesheet" media="screen"/> -->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<!--// Javascript //-->
<?php include 'style.php'; ?>
<?php include 'script.php'; ?>


<style type="text/css">
.showResults{
    position:absolute;
    background: #fff;
    /* width:50%; */
    box-shadow:1px 4px 8px #000;
   
    z-index:3000;

}

.showResults div{
    /* background: #000040; */
    /* margin:2px; */
    padding: 5px 10px;
    border-bottom: 1px solid grey;
    cursor: pointer;
}

.showResults div:hover{
    background: lightgrey;
    color:white;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<div class="structure-row">
        <!-- Sidebar Start -->
        <?php include 'header.php'; ?>
                <!-- Header Top Navigation End -->
                <div class="clearfix"></div>
            </header>
            <!-- Right Section Header End -->
            <!-- Inbox Start -->
            <div class="emailbox">
                <header>
                    <!-- <h2>Inbox (2455)</h2> -->
                    <div class="emailoptions">
                        <a href="#"  data-toggle="modal" data-target="#maxxx"  class="compose"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Compose Single user mail</a>
                        <a href="#"  data-toggle="modal" data-target="#maxx"  class="compose"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Compose Bulk SMS</a>
                        <!-- <div class="emailcontrols">
                            <a href="#" class="prev-email"><i class="glyphicon glyphicon-play">&nbsp;</i></a>
                            <a href="#" class="next-email"><i class="glyphicon glyphicon-play">&nbsp;</i></a>
                            <p>1-30 of 789</p>
                        </div> -->
                        <div class="searchemail">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" placeholder="Search Email" id="myInput" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </header>
                <div class="structure-table">
                	<div class="structure-row">
                    	<nav class="email-nav">
                        	<ul class="effect" id="nav4">
                                <?php 
                                    $admin = clean(2147483647);
                                    $xx=$conn->query("SELECT * FROM dmessaging WHERE dreceiver='$admin' AND dstatus='unread'"); ?>
                                <li><a href="inbox">Inbox<span><?php echo $xx->num_rows; ?></span></a></li>
                                <li><a href="sent">Sent mail</a></li>
                                <!-- <li><a href="trash">Trash<span>05</span></a></li> -->
                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                         <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } else {
                            $page_no = 1;
                            } 
                            $total_records_per_page = 100;

                            ?>

                        <div class="emailslist">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th class="sender">Sender</th>
                                        <th class="subject">Subject</th>
                                        <th class="dated">Dated</th>
                                        <th class="dated">---</th>
                                    </tr>
                                </thead>
                                <tbody id="myDIV">
                                    <?php 
                                    $sqls =$conn->query("SELECT * FROM dmessaging INNER JOIN `members_register` ON dmessaging.dsender = members_register.userid  WHERE dmessaging.dreceiver='$admin' AND dmessaging.dstatus !='delete' ORDER BY dmessaging.id DESC ");
                                    $total_records =$sqls->num_rows;
                                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                    $start_from = ($page_no - 1) * $total_records_per_page;

                                    $sms =$conn->query("SELECT * FROM dmessaging INNER JOIN `members_register` ON dmessaging.dsender = members_register.userid  WHERE dmessaging.dreceiver='$admin' AND dmessaging.dstatus !='delete' ORDER BY dmessaging.id DESC LIMIT $start_from, $total_records_per_page");
                                    if($sms->num_rows>0){
                                        while($row=$sms->fetch_assoc()):
                                            if($row['dstatus']=='unread'){
                                    ?>
                                    <tr>
                                        
                                        <td class="sender unread"><a href="read-message?userid=<?php echo $row['userid']; ?>& trans=<?php echo $row['transid']; ?>"><?php echo $row['username']; ?></a></td>
                                        <td class="subject unread"><a href="read-message?userid=<?php echo $row['userid']; ?>& trans=<?php echo $row['transid']; ?>" style="display:block"><?php echo ucwords($row['dsubject']); ?></a> </a>  <i class="glyphicon glyphicon-paperclip pull-right"></i></td>
                                        <td class="dated unread"><?php echo date("M d, Y  h:i:sa", strtotime($row['dtime'])); ?></td>
                                        <td>
                                            <button class='btn btn-sm btn-danger' id="trash" trans="<?php echo $row['transid']; ?>" style="font-size:10px"> Trash</button>
                                        </td>
                                    </tr>

                                        <?php  }else{ ?>

                                            <tr>
                                        
                                        <td class="sender unreads"><a href="read-message?userid=<?php echo $row['userid']; ?>& trans=<?php echo $row['transid']; ?>"><?php echo $row['username']; ?></a></td>
                                        <td class="subject"><a href="read-message?userid=<?php echo $row['userid']; ?>& trans=<?php echo $row['transid']; ?>" style="display:block"><?php echo ucwords($row['dsubject']); ?></a> </a>    <i class="glyphicon glyphicon-paperclip pull-right"></i></td>
                                        <td class="dated"><?php echo date("M d, Y  h:i:sa", strtotime($row['dtime'])); ?></td>
                                        <td>
                                            <button class='btn btn-sm btn-danger' id="trash" trans="<?php echo $row['transid']; ?>" style="font-size:10px"> Trash</button>
                                        </td>
                                    </tr>
                                            
                                       <?php } endwhile; }?>
                                   
                                </tbody>
                            </table>
        <!-- <div class="" style="margin-bottom:40px">sfsg</div> -->
                            <footer>
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
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inbox End -->
        </div>
        <!-- Right Section End -->
    </div>
</div>
<!-- Wrapper End -->



<div class="modal fade" id="maxx" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="message-process" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Compose Message</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        

                    <div class="row">
                    <div class="form-group col-md-12">
                    <label for="inputEmail4">Subject</label>
                    <input type="text" class="form-control" required name="sub" id="" placeholder=" Subject" >

                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                    <label for="comment">Message:</label>
                    <textarea  id="editors" class="form-control editors" required name="sms" rows="10"  ></textarea>
                    </div>
                </div>

       

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <input type="submit" name="users" value="Send All Users" class="btn btn-success btn-sm">
                        <input type="submit" name="Tipsters" value="Send All Tipsters" class="btn btn-primary btn-sm">
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>




    <div class="modal fade" id="maxxx" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="message-process" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Compose Message</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">

                      <div class="row">
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">To</label>
                        <input type="text" class="form-control" autocomplete="off" required name="email" id="searchForme" placeholder="To e.g youngelefiku" >
                        <div id="showResult" class="showResult"></div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Subject</label>
                            <input type="text" class="form-control" required name="sub" id="" placeholder=" Subject" >
                        </div>
                    
                   
                        <div class="form-group col-md-12">
                            <label for="comment">Message:</label>
                            <textarea  id="editors" class="form-control editors" required name="sms" rows="10"  ></textarea>
                        </div>
                </div>

       

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <input type="submit" name="send" value="Send" class="btn btn-success btn-sm">
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>

<?php include 'footer.php' ?>
<script>
//     $(document).ready(function(){
    
//         $(document).on("keyup", "#searchForme", function(){
//             alert("Yes");
//         })

// });
    </script>
</body>

<!-- Mirrored from extracoding.com/demo/html/adminise/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jun 2019 12:03:40 GMT -->
</html>



