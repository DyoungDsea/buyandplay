<?php 
    require 'session.php';
    require 'clean.php';
    $user = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$idc'")->fetch_assoc();
    if($user['dposition'] !="administrator"){
        $level = $user['dprivileges'];
            $exploded = explode(',', $priv);
    
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
                            <!-- <button type="button" class="btn btn-primary style3 " style="float:right;" data-toggle="modal" data-target="#add">New Ranking</button> -->
                        </div>
                    </div>

         
            </div>
           


                        
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Manage 3+ Odd</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Stars</th>
                                                    <th>Game to be won</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                
                                                $c = $conn->query("SELECT * FROM `dbronze_odd` ORDER BY dstar ");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo $num++; ?></td>
                                                        <td><?php echo $r['dstar']; ?></td>
                                                        <td><?php echo $r['dgame_won']; ?></td>
                                                        <td>

                                                        <input type="hidden" value="<?php echo $r['category_id']; ?>" id='referral<?php echo $r['id']; ?>'>
                                                        <a class="btn btn-sm btn-primary " data-toggle="modal" data-target="#max<?php echo $r['id']; ?>" href="#"><i class="fa fa-edit"></i> Edit </a>
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
                <form action="manage-ranking-process" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create New Ranking</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="cat">Ranking Star</label>
                                <input type="text" name="cat" id="cat" required placeholder="Enter Ranking Number e.g 5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cat2">Ranking Fees</label>
                                <input type="text" name="catf" id="cat2" required placeholder="Enter Ranking Fees" class="form-control">
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

    $x = $conn->query("SELECT * FROM `dbronze_odd` ORDER BY dstar");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="manage-odd-update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Manage 3+ Odd</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="cat">Ranking Star</label>
                                <input type="text" name="cat" id="cat" disabled value="<?php echo $xx['dstar']; ?>" required placeholder="Enter Number  of Star" class="form-control">
                                <input type="hidden" name="hid"  value="<?php echo $xx['id']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="cat2">Game to be won</label>
                                <input type="text" name="catf" id="cat2"  value="<?php echo $xx['dgame_won']; ?>" required placeholder="Enter Number of games to be won" class="form-control">
                            </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="three" class="btn btn-primary btn-sm">Update</button>
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