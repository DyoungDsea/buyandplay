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
                            <!-- <button type="button" class="btn btn-primary style3 " style="float:right;" data-toggle="modal" data-target="#add">New Website</button> -->
                        </div>
                    </div>

         
            </div>
           


                        
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Manage Bonus</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Percentage(%)</th>
                                                    <th>Description</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                
                                                $c = $conn->query("SELECT * FROM  `dpromo`");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo $num++; ?></td>
                                                        <td><?php echo $r['dpercentage']; ?></td>
                                                        <td><?php echo $r['dtext']; ?></td>
                                                        <td><?php echo $r['start_date']; ?></td>
                                                        <td><?php echo $r['end_date']; ?></td>
                                                        <td>

                                                        
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
<!-- Wrapper End -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="manage-odd-update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create New Website</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="cat">Website</label>
                                <input type="text" name="cat" id="cat" required placeholder="Enter Website" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cat2">Name</label>
                                <input type="text" name="catf" id="cat2" required placeholder="Enter Name" class="form-control">
                            </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="setnew" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>

<?php

    $x = $conn->query("SELECT * FROM `dpromo`");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="manage-odd-update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Bonus</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="cat">Percentage(%)</label>
                                <input type="text" name="cat" id="cat"  value="<?php echo $xx['dpercentage']; ?>" required placeholder="Enter Percentage e.g 25" class="form-control">
                                <input type="hidden" name="hid"  value="<?php echo $xx['id']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="cat2">Description</label>
                                <textarea type="text" name="text" required placeholder="Enter description" class="form-control"><?php echo $xx['dtext']; ?> </textarea>
                            </div>

                            <div class="form-group">
                                <label for="cat2">Star Date</label>
                                <input type="text" name="catf" id="datepicker"  value="<?php echo $xx['start_date']; ?>" required placeholder="Enter Start Date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="cat2">End Date</label>
                                <input type="text" name="catt" id="pick"  value="<?php echo $xx['end_date']; ?>" required placeholder="Enter End Date" class="form-control">
                            </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="promo" class="btn btn-primary btn-sm">Update</button>
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


<script>
<script src="../_timepicker.min.js"></script>
<script src="../jquery-ui.js"></script>
</script>