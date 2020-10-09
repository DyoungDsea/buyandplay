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
            

                        
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Read Message</h2>
                                </header>
                                <div class="contents"  >
                                    <!-- <a class="togglethis">Toggle</a>
                                    <section class="boxpadding" style="padding:0 0 20px "> -->
                                    <div class="card">
                                        

                                    <?php
                                    if( isset($_GET['userid']) AND !empty($_GET['userid']) AND isset($_GET['trans']) AND !empty($_GET['trans']) AND !isset($_GET['sent']) AND empty($_GET['sent'])){
                                        $user = clean($_GET['userid']);
                                        $tran = clean($_GET['trans']);

                                        $pl = $conn->query("SELECT * FROM dmessaging WHERE transid='$tran'");

                                        if($pl->num_rows>0){
                                            $up =$conn->query("UPDATE dmessaging SET dstatus='read' WHERE transid='$tran' AND dsender='$user'");
                                            while($rop = $pl->fetch_assoc()):
                                            $subject= $rop['dsubject'];
                                            ?>
                                            
                                            <div class="card-header">
                                            <h5>Subject: <?php echo ucfirst($subject); ?></h5>
                                            </div>

                                            <div class="card-body" style="padding:20px; fontsize:18px ">
                                            <p><b> Message:</b><br> <?php echo $rop['dmessage']; ?>

                                            </div>

                                            <?php endwhile; }?>
                                             <div class="card-footer" style="padding:20px; margin:20px ">
                                             <a href="#"  data-toggle="modal" data-target="#maxx" class="btn btn-success"> <i class="fa fa-reply"></i> Reply</a>
                                         
                                         </div>
                                   <?php }elseif(isset($_GET['userid']) AND !empty($_GET['userid']) AND isset($_GET['trans']) AND !empty($_GET['trans']) AND isset($_GET['sent']) AND !empty($_GET['sent'])){
                                        $user = clean($_GET['userid']);
                                        $tran = clean($_GET['trans']);

                                        $pl = $conn->query("SELECT * FROM dmessaging WHERE transid='$tran' GROUP BY transid");

                                        if($pl->num_rows>0){
                                            while($rop = $pl->fetch_assoc()):
                                            $subject= $rop['dsubject'];
                                            ?>
                                            
                                            <div class="card-header">
                                            <h5>Subject: <?php echo ucfirst($subject); ?></h5>
                                            </div>

                                            <div class="card-body" style="padding:20px; fontsize:18px ">
                                            <p><b> Message:</b><br> <?php echo $rop['dmessage']; ?>

                                            </div>
                                            <?php endwhile; } }
                                    
                                    ?>

                                   

<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>

                                    </div>
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
                <form action="message-reply-process" method="post">
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
                    <input type="text" class="form-control" value="RE: <?php echo ucfirst($subject); ?>" required name="sub" id="" placeholder=" Subject" >
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                    <input type="hidden" name="trans" value="<?php echo $tran; ?>">
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                    <label for="comment">Message:</label>
                    <textarea  id="editors" class="form-control editors" required name="sms" rows="10" ></textarea>
                    </div>
                </div>

       

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="send" value="Send" class="btn btn-success btn-sm">
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>


<?php 
include('footer.php');
?>
</body>
</html>