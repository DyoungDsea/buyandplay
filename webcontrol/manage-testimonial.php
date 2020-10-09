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
        if($user['dposition'] !="administrator"){
            $level = $user['dprivileges'];
                $exploded = explode(',', $level);
        
                if(!in_array('Testimonial', $exploded)){
                    header("Location: index");
                }
            } 
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title> Manage Testimonial : Bet and Buy</title>

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
                            <a href="#add_testimonial" class="btn btn-primary style3 " data-toggle="modal" data-target="#maxx" style="float:right;">Add Testimonial</a>
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
                                    <h2 class="heading">Manage Testimonial</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                        
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <!-- <th>images</th> -->
                                                    <th>Name</th>
                                                    <th>content</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                $sqls=$conn->query("SELECT * FROM `blog`");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                $c = $conn->query("SELECT * FROM `testimonial` LIMIT $start_from, $total_records_per_page");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo $num++; ?></td>                                                        
                                                        <td><?php echo $r['name']; ?></td>
                                                        <td><?php echo substr(remove_tags($r['content']),0,20); ?>....</td>
                                                        <td>
                                                        <div class="btn-group">
                                                        <div class="btn-group" >
                                                            <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                                                            <li><a class=" " data-toggle="modal" data-target="#max<?php echo $r['id']; ?>" href="#"><i class="fa fa-edit"></i> Edit Testimonial</a></li>
                                                            <li><a class="" href="#" id="testDelete"  img="images/<?php echo $r['src']; ?>.jpg" test="<?php echo $r['id']; ?>" ><i class="fa fa-trash"></i> Delete</a></li>
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
                <form action="testimonial_post" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">New Testimonial</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">

                    <div class="row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Name:</label>
      <input type="text" class="form-control" name="title" id="" placeholder="Name" >

    </div>
    
  </div>

  

  

  <div class="row">
    <div class="form-group col-md-12">
    <label for="comment">Details:</label>
  <textarea  id="editors" class="form-control editor" value="" name="description" rows="5"  ></textarea>

    </div>
  </div>

  <div class="row">
  
  

    <!-- <div class="form-group col-md-6">
      <label for="inputEmail4">Image:</label>
      <input type="file" class="form-controlx" name="img" id="" >

    </div> -->
  

    
   
  </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="test" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>


<?php

    $x = $conn->query("SELECT * FROM `testimonial`");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="testimonial-update" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Testimonial</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        
                        
            <input type="hidden" name="id" value="<?php echo $xx['id']?>">        
            <input type="hidden" name="oldpic" value="<?php echo $xx['src']?>">

                    <div class="row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Name:</label>
      <input type="text" class="form-control" value="<?php echo  $xx['name'];?>" name="title" id="inputEmail4" placeholder="Name" >
      <!-- <span class="text-danger"><?php echo $te;?></span> -->

    </div>
    
  </div>

  

  

  <div class="row">
    <div class="form-group col-md-12">
    <label for="comment">Details:</label>
  <textarea  id="editors" class="form-control editor" value="" name="description" rows="5"  ><?php echo  $xx['content'];?></textarea>
  <!-- <span class="text-danger"><?php echo $ce;?></span> -->

    </div>
  </div>

  <div class="row">
  
  

    <!-- <div class="form-group col-md-6">
      <label for="inputEmail4">Image:</label>
      <input type="file" class="form-controlx" name="img" id="inputEmail4" >

    </div> -->
  

    
   
  </div>

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
</html>