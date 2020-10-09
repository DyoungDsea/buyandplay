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
                                    <h2 class="heading">Manage Newsletter</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    

                                                $sqls = $conn->query("SELECT * FROM `dnewletter` ORDER BY id DESC ");
                                                $total_records =$sqls->num_rows;
                                                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                    $start_from = ($page_no - 1) * $total_records_per_page;
                                                
                                                $c = $conn->query("SELECT * FROM `dnewletter` ORDER BY id DESC  LIMIT $start_from, $total_records_per_page");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()): 
                                                    
                                                    if($r['dstatus']=='pending'){
                                                    ?>
                                                    <tr style="font-weight:bold">
                                                        <td><?php echo $num++; ?></td>
                                                        <td><?php echo $r['demail']; ?></td>
                                                        <td><?php echo $r['dsubject']; ?></td>
                                                        <td><?php echo $r['dtext']; ?></td>

                                                        <td>

                                                        
                                                        <a class="btn btn-sm btn-primary " id='yesx' alert='<?php echo $r['id']; ?>' data-toggle="modal" data-target="#max<?php echo $r['id']; ?>" href="#"><i class="fa fa-edit"></i> Read </a>
                                                        </td>
                                                    </tr>
                                                    <?php }else{?>
                                                        <tr>
                                                        <td><?php echo $num++; ?></td>
                                                        <td><?php echo $r['email']; ?></td>
                                                        <td><?php echo $r['dsubject']; ?></td>
                                                        <td><?php echo $r['dtext']; ?></td>

                                                        <td>

                                                        
                                                        <a class="btn btn-sm btn-primary " id='yesx' alert='<?php echo $r['id']; ?>' data-toggle="modal" data-target="#max<?php echo $r['id']; ?>" href="#"><i class="fa fa-edit"></i> Read </a>
                                                        </td>
                                                    </tr>
                                                  <?php  } endwhile;  }else{
                                                        echo '
                                                        <tr>
                                                        <td colspan="4" class="text-danger">Sorry! No result found </td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>
                                                    
                                            </tbody>

                                        </table>

                                        <ul class="pagination pagination text-center justify-content-center">
                                                    <?php 

                                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                            echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                                        
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



<script>
$(document).ready(function(){
    $(document).on("click", "#yesx", function(){
        var id = $(this).attr('alert');
        $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {newsl:1,id:id}
                    
                })
    })

    $(document).on("click", "#clearx", function(){
        // $('.modal').hide();
        $('.modal').modal('hide')
        var id = $(this).attr('clear');
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Delete this message?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {newsD:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Deleted!'});
                    setInterval(function(){
                        window.location.assign('manage-newsletter');
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
    })

})
</script>


<?php

    $x = $conn->query("SELECT * FROM `dnewletter` ORDER BY id DESC  LIMIT $start_from, $total_records_per_page");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="manage-odd-update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Read Message</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                          
                    <h5>Email : <?php echo $xx['demail']; ?></h5>
                    <h5>Subject : <?php echo $xx['dsubject']; ?></h5>
                    <P>Message:  <?php echo $xx['dtext']; ?> </P>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm" id="clearx" clear="<?php echo $xx['id']; ?>">Delete</button>
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