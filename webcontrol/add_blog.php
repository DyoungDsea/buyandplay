<?php

$te=$date=$time=$xp=$address= $ce =$the=$fe=$t=$c=$th=$f=$datee=$timee=$xee=$add=$ime="";
include("../config.php");
if(isset($_POST["submit"])){
  require 'blog_post.php';
}
?>


<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title> Manage Blog : Bet and Buy</title>

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
        
                
      

                        
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">New Blog</h2>
                                </header>
                                <div class="contents"  >
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding">
                                    <h3 style="color:green;"><?php if(isset($success)){ echo $success.'&#10004;'; }?> </h3>

                                    <form method="post" action="add_blog" enctype="multipart/form-data"  >
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" value="" name="title" id="inputEmail4" placeholder=" Title" >
      <span class="text-danger"><?php echo $te;?></span>

    </div>
    
  </div>

  

  

  <div class="form-row">
    <div class="form-group col-md-12">
    <label for="comment">Blog details:</label>
  <textarea  id="editor" class="form-control" value="" name="description" rows="5" id="comment" ></textarea>
  <span class="text-danger"><?php echo $ce;?></span>

    </div>
  </div>

  <div class="form-row">
  
  

    <div class="form-group col-md-6">
      <label for="inputEmail4">Image:</label>
      <input type="file" class="form-controlx" name="img" id="inputEmail4" >
      <span class="text-danger"><?php echo $ime;?></span>

    </div>
  

    
   
  </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Post Blog</button>
    </div>
  </div>


  
</form>
                          <br>              
                  <a href="manage-blog" > Back</a>                     
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



<?php 
include('footer.php');
?>
</body>
</html>