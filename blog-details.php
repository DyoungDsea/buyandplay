
<?php 
// require 'session_track.php';
require 'clean.php';
require 'function.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | Blog </title>
  <?php include 'style.php'; ?>


</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <div class="custom-cursor"></div>
  <!--  header-section start  -->
  
  <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <!-- banner-section start -->
 
  <!-- banner-section end -->

  <!-- blog-details-section start -->
 
  <section class="breadcum-section">
    <div class="breadcum-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcum-content text-center">
              <h3 class="title">Blog details</h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">home</a></li>
                <li class="breadcrumb-item active">blog details</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  
  <!-- blog-details-section start -->
  <section class="blog-details-section section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
        <?php 
              $get = clean($_GET['blog']);
                $blog = $conn->query("SELECT * FROM blog WHERE img ='$get'");
                if($blog->num_rows>0){
                   $row=$blog->fetch_assoc(); ?> 

          <div class="blog-details-wrapper">
            <div class="blog-details-thumb">
              <img style="width:100%;" src="webcontrol/images/<?php echo $row['img']; ?>" alt="image">
            </div>
            <div class="blog-details-content">
              <ul class="post-meta">
                <!-- <li><a href="#"><i class="fa fa-user"></i>04, March, 2019</a></li> -->
                <li><a href="#"><i class="fa fa-calendar"></i><?php echo date("d M Y", strtotime($row['time_created'])); ?></a></li>
              </ul>
              <h2 class="blog-details-title"><?php echo ucwords($row['title']); ?></h2>
              <?php echo nl2br($row['content']); ?>
            </div>
            
          </div><!-- blog-details-wrapper end -->
                <?php } ?>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
           
            <div class="widget widget-categories">
             
            <div class="widget widget-most-view-post">
              <h4 class="widget-title">Most Viewed Posts</h4>
              <ul class="small-post-list">
              <?php 
              $get = clean($_GET['blog']);
                $blog = $conn->query("SELECT * FROM blog WHERE img !='$get' ORDER BY id DESC LIMIT 8");
                if($blog->num_rows>0){
                    while($row=$blog->fetch_assoc()): ?>                    
                <li>
                  <div class="small-post-item">
                    <div class="small-post-thumb">
                      <img src="webcontrol/images/<?php echo $row['img']; ?>" alt="image">
                    </div>
                    <div class="small-post-content">
                      <h6><a href="blog-details?blog=<?php echo $row['img']; ?>"><?php echo ucwords($row['title']); ?></a></h6>
                      <ul class="post-meta">
                        <li><a href="#"><i class="fa fa-calendar"></i><?php echo date("d M Y", strtotime($row['time_created'])); ?></a></li>
                      </ul>
                    </div>
                  </div>
                </li><!-- small-post-item end -->
                    <?php endwhile; } ?>
                
                </ul>
            </div><!-- widget end -->
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- blog-details-section end -->
<div class="mb-4"></div>
  <!-- footer-section start -->
  <?php 
include('footer.php');
  ?>
  <!-- footer-section end -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

  <?php include('script.php'); 
  
  function remove_tags($value){
    $value=htmlspecialchars_decode($value);
    $value=html_entity_decode($value);
    $value=strip_tags($value);
    $value=htmlspecialchars($value);
    return $value;
    }
    

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