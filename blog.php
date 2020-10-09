
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
 
  <!-- blog-details-section start -->
  <section class="breadcum-section">
    <div class="breadcum-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcum-content text-center">
              <h3 class="title">Blog</h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">home</a></li>
                <li class="breadcrumb-item active">blog</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } 
                    else {
                            $page_no = 1;
                          } 
                    $total_records_per_page = 16;

                ?>
  
  <!-- blog-section start -->
  <section class="blog-section section-padding">
    <div class="container">
      <div class="row mt-mb-15">
       

       <?php 

       $sqls =$conn->query("SELECT * FROM blog ORDER BY id DESC");
       $total_records =$sqls->num_rows;
       $total_no_of_pages = ceil($total_records / $total_records_per_page);
       $start_from = ($page_no - 1) * $total_records_per_page;

       $blog = $conn->query("SELECT * FROM blog ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
       if($blog->num_rows>0){
           while($row=$blog->fetch_assoc()): ?>
        <div class="col-lg-4 col-sm-6">
          <div class="post-item">
            <div class="thumb">
              <img src="webcontrol/images/<?php echo $row['img']; ?>" alt="image">
            </div>
            <div class="content">
              <ul class="post-meta">
                <li><a href="#"><i class="fa fa-calendar"></i> <?php echo date("d M Y", strtotime($row['time_created'])); ?></a></li>
              </ul>
              <h5 class="post-title"><a target="_top" href="blog-details?blog=<?php echo $row['img']; ?>"><?php echo limit_text($row['title'],4); ?></a></h5>
              <p><?php echo limit_text(nl2br($row['content']), 30); ?></p>
            </div>
          </div>
        </div><!-- post-item end -->
        
           <?php endwhile; } ?>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <nav class="d-pagination" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                    <?php 

                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                              echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                          
                          }
                   
                    ?>

              <!-- <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li> -->
            </ul>
          </nav>
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