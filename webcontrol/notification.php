<?php 
    require 'session.php';
    require 'clean.php';
    include("../config.php");
    function remove_tags($value){
        $value=htmlspecialchars_decode($value);
        $value=html_entity_decode($value);
        $value=strip_tags($value);
        $value=htmlspecialchars($value);
        return $value;
        }
        $user = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$idc'")->fetch_assoc();
        // if($user['dposition'] !="administrator"){
        //     $level = $user['dprivileges'];
        //         $exploded = explode(',', $level);
        
        //         if(!in_array('Blog', $exploded)){
        //             header("Location: index");
        //         }
        //     }    
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title> Manage Notification : Bet and Buy</title>

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
                            <!-- <a href="#add_blog" class="btn btn-primary style3 " data-toggle="modal" data-target="#maxx" style="float:right;">Add Blog</a> -->
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
                                    <h2 class="heading">Manage Notification</h2>
                                </header>
                                <div class="contents"  >
                                    <!-- <a class="togglethis">Toggle</a> -->
                                    <section class="boxpadding">
                                        
                                    <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                    <!-- <th>Image</th> -->
                    <th>Title </th>
                    <!-- <th>URL </th> -->
                    <th>Description</th>
                    <th colspan="2">---</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $site=$conn->query("select * from `notification` order by id DESC");
                if($site->num_rows>0){
                while($row=$site->fetch_assoc()){ ?>
                    <tr>
                    <!-- <td>
                    <img src="../_slide_blog/<?php //echo $row['dimg']; ?>" style="height:50px;width:50px;" alt="">
                    </td> -->
                    <td><?php echo $row['dtitle']; ?></td>
                    <!-- <td><?php //echo $row['durl']; ?></td> -->
                    <td><?php echo limit_text($row['ddesc'],15); ?></td>
                    <td><a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillzd" data-toggle="modal" data-target="#edit<?php echo $row['notid']; ?>">Edit</a></td>
                    <td>
                        <?php if($row['dstatus']=='active'){ ?>
                        <a id="not" notid="<?php echo $row['notid']; ?>" text="inactive" dis="Disable" style="cursor:pointer;text-decoration:none;height:20px;width:55px;padding-left:7px;" type="button" class="btn-danger btn-xs " > Disable</a>
                        <?php }else{?>
                            <a id="not" notid="<?php echo $row['notid']; ?>"  dis="Enable" text="active" style="cursor:pointer;text-decoration:none;height:20px;width:55px;padding-left:7px;" type="button" class="btn-danger btn-xs " > Enable</a>
                       <?php  } ?>
                    </td>
                    </tr> 
                <?php } }else{
                    echo "<tr><td colspan='8' class='text-danger' >No result found </td></tr>";
                }
                ?>
                                 
                </tbody>
              </table>
<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>

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





<div class="modal fade" id="maxx" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="blog-process" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Blog</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        

                    <div class="row">
                    <div class="form-group col-md-12">
                    <label for="inputEmail4">Title</label>
                    <input type="text" class="form-control" required name="title" id="" placeholder=" Title" >

                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                    <label for="comment">Blog details:</label>
                    <textarea  id="editors" class="form-control editor" name="description" rows="10"  ></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Image:</label>
                    <input type="file" class="form-controlx" required name="img" id="" >

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
            $slide = $conn->query("SELECT * FROM `notification`");
            if($slide->num_rows>0){
                while($slider = $slide->fetch_assoc()): ?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $slider['notid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="update-not" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Notification</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Title  </label>
                                        <input type="hidden" name="id" id="form-ids" value="<?php echo $slider['notid']; ?>" class="form-control form-control-sm" required>
                                        <input type="text" name="name1" id="form-dtitle1s" value="<?php echo $slider['dtitle']; ?>" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Description </label>
                                        <textarea name="name2" class="form-control form-control-sm editor" id="form-dtitle2s" ><?php echo $slider['ddesc']; ?></textarea>
                                    </div>

                                    <!-- <div class="form-group required-field">
                                        <label>URL(Optional) </label>
                                        <input type="text" name="name3" id="form-dtitle1s" value="<?php //echo $slider['durl']; ?>" class="form-control form-control-sm" >
                                    </div> -->
                                   
                                    <!-- <div class="form-group required-field">
                                    <label> Image(730 X 485) (Optional) </label>
                                        <input type="file" name="img" class="form-control-file form-control-sm" >
                                        <input type="hidden" name="himg" id="form-imgs" value="<?php //echo $slider['dimg']; ?>">
                                    </div> -->


                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary btn-sm">Update Notification </button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


                <?php endwhile; } 
                

                  
     function limit_text($text,$limit){
        if(str_word_count($text, 0)>$limit){
            $word = str_word_count($text,2);
            $pos=array_keys($word);
            $text=substr($text,0,$pos[$limit]). '...';
        }
        return $text;
    }
    

                ?>

                  
   



<script>

    

$(document).ready(function(){
    // alert("yes");
    $(document).on("click", "#not",function(){
        var id = $(this).attr("notid");
        var text = $(this).attr("text");
        var dis = $(this).attr("dis");
        // alert(id);
        Swal.fire({
        position: 'center',
        type: 'warning',
        title: dis+' this?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-user.php',
                type: 'POST',
                data: {Not:1,id:id,text:text}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Confirmed!'});
                setInterval(function(){
                    window.location.assign("notification");
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
include('footer.php');
?>

</body>
</html>