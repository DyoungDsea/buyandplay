<?php
    require 'session.php'; require 'clean.php' ?>
<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Inbox : Bet and Buy</title>
<!--// Stylesheets //-->
<link href="assets/css/A.style.css%2bbootstrap.css%2cMcc.0ONHoLZfWm.css.pagespeed.cf.2IS1LTyY4Z.css" rel="stylesheet" media="screen"/>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<!--// Javascript //-->
<?php include 'script.php'; ?>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
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
                        <a href="#"  data-toggle="modal" data-target="#maxx"  class="compose"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Compose Email</a>
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
                <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } else {
                            $page_no = 1;
                            } 
                            $total_records_per_page = 100;

                            ?>
                <div class="structure-table">
                	<div class="structure-row">
                    	<nav class="email-nav">
                        	<ul class="effect" id="nav4">
                                <?php 
                                   $admin =clean(2147483647);
                                    $xx=$conn->query("SELECT * FROM dmessaging WHERE dreceiver='$admin' AND dstatus='unread'"); ?>
                                <li><a href="inbox">Inbox<span><?php echo $xx->num_rows; ?></span></a></li>
                                <li><a href="sent">Sent mail</a></li>
                                <!-- <li><a href="trash">Trash<span>05</span></a></li> -->
                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                        <div class="emailslist">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th class="subject">Subject</th>
                                        <th class="subject">message</th>
                                        <th class="dated">Dated</th>
                                        <th class="dated">---</th>
                                    </tr>
                                </thead>
                                <tbody id="myDIV">
                                    <?php 
                                    $sqls =$conn->query("SELECT * FROM dmessaging WHERE dsender='$admin' ORDER BY id DESC ");
                                    $total_records =$sqls->num_rows;
                                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                    $start_from = ($page_no - 1) * $total_records_per_page;
                                    $sms =$conn->query("SELECT * FROM dmessaging WHERE dsender='$admin' ORDER BY id DESC ");
                                    if($sms->num_rows>0){
                                        while($row=$sms->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td class="subject unread"><a href="read-message?userid=<?php echo $row['dreceiver']; ?>& trans=<?php echo $row['transid']; ?>" style="display:block"><?php echo ucwords($row['dsubject']); ?></a> </a></td>
                                        <td class="subject unread"><a href="read-message?userid=<?php echo $row['dreceiver']; ?>& trans=<?php echo $row['transid']; ?>&sent=sent" style="display:block"><?php echo limit_text(ucwords($row['dmessage']), 20); ?></a> </a>  <i class="glyphicon glyphicon-paperclip pull-right"></i></td>
                                        <td class="dated unread"><?php echo date("M d", strtotime($row['dtime'])); ?></td>
                                        
                                    </tr>

                                        <?php  endwhile; }?>
                                   
                                </tbody>
                            </table>
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


<?php include 'footer.php';
function limit_text($text,$limit){
    if(str_word_count($text, 0)>$limit){
        $word = str_word_count($text,2);
        $pos=array_keys($word);
        $text=substr($text,0,$pos[$limit]). '...';
    }
    return $text;
}
?>
</body>

<!-- Mirrored from extracoding.com/demo/html/adminise/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jun 2019 12:03:40 GMT -->
</html>



