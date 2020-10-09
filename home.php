<?php 
require 'clean.php';
// include 'webname.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home : Buy and Bet</title>
  <?php include 'style.php'; $_SESSION['current_page'] ='';?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

  <div class="custom-cursor"></div>
  <!--  header-section start  -->
  
  <?php include 'header.php'; ?>

  <!-- banner-section start -->
  <section class="banner-section " style="height: 440px;" >
    <div class="banner-content-area bet " style="" >
      <div class="container" >
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="banner-content text-center buy bg-primarys">
              <h2 class="banner-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s" style="font-size:30px;">
                  <span style="font-size:30px; color:white;margin-top:-20px"><marquee>Welcome to Buy &amp; Bet, ...Make winning your habit</marquee></span><br>
                  Welcome to the Number One Platform for Exchange of Sports Bet and Football Pools Tips</h2>
              <a href="all-avaliable-games" class="cmn-btn btn-lg mt-3">View All Avaliable Tips</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
  <!-- banner-section end -->

  <!-- feature-section start -->
 
  <!-- feature-section end -->

  <!-- play-section start -->
  
  <!-- play-section end -->

  <!-- testimonial-section start -->
 
  <!-- testimonial-section end -->



   <!-- promotion-section start -->
   <section class="promotion-section section-padding ">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="promotion-content">
            <h2 class="title">Bet with Confidence</h2>
            <p>
            There has been an increase in well knowledgeable sports betting analysts and football pools forecasters who spend considerable time researching on the various markets offered by bookmakers and promoters. Some of these tipsters offer their tips for sale to betting customers. With hundreds of tipsters and a sophisticated verification system, you can be sure all our tipsters know what makes a great bet. Don’t want to leave it to chance? Then follow our verified tipsters and start winning big!
            </p>
            <a href="register" style="margin-top:10px" class="cmn-btn btn-lg">register now</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="promotion-block-thumb">
            <img src="assets/images/promotion/4.png" alt="image">
          </div>
        </div>
      </div>
   

    </div>
  </section>
  <!-- promotion-section end -->

  <section class="testimonial-section section-padding" >
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
        <div class="content" style="margin:-60px 0">
              <h2 class="title"><a href="#0" style="color:#fff">Introduction</a></h2>
              <p class="mb-5"> 
                <center>
                  <img src="assets/images/stop.png" alt="">
                </center>
              </p>
              <p style="text-align: justify;">
              Bet & Buy is not a bookmaker or a sports betting website. Bets are not placed on this website. Instead, the tips exchanged here are placed as bets on the various sports betting websites, betting shops and football pools houses.
              
              </p>
              <a href="introduction" class="cmn-btn btn-lg mt-3">Learn More</a>
          
        </div>
      </div>
    </div>
  </section>

  <!-- step-section start -->
  <section class="step-section section-padding" style="margin-bottom:-60px">
    <div class="container">
      <div class="row justify-content-centerr">
        <div class="col-lg-12">
          <div class="section-header text-centers">
            <h2 class="section-title">HOW IT WORKS</h2>
            <p>The confidence of tips exchanged on this platform is boosted by our ranking system for the tipsters. The system ranks the tipsters according to the previous results of their tips. This ensures that the tipsters with the best performances in the latest past are ranked higher with a higher price for their tips. Every tipster would have to meet a minimum level of performance from their tips before they can be allowed to sell their tips. This ensures that tips sold on this platform will have a higher probability of win rates. Remember that there is a refund policy for all tips bought but eventually lost.</p>
            <center>      
              <img src="assets/images/works.png" alt="banner-image">
            </center>
               <a href="#how-it-work" class="cmn-btn btn-lg mt-3">Learn How It Work</a>
          </div>
        </div>
      </div>     
    </div>
  </section>
  <!-- step-section end -->


  <?php
        $blogs = $conn->query("SELECT * FROM blog ORDER BY id DESC LIMIT 3");
        if($blogs->num_rows>0){?>
  <!-- blog-section start -->
  <section class="blog-section section-padding section-bg"  style="margin:-40px 0 -60px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="section-header text-center">
            <h2 class="section-title">blog/News</h2>
          
        </div>
      </div>
      <div class="row mt-mb-15">
        <?php
        $blog = $conn->query("SELECT * FROM blog ORDER BY id DESC LIMIT 3");
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
               <h5 class="post-title" target="_blank"><a href="blog-details?blog=<?php echo $row['img']; ?>"><?php echo limit_text($row['title'],4); ?></a></h5>
               <p><?php echo limit_text(nl2br($row['content']), 30); ?></p>
             </div>
           </div>
         </div><!-- post-item end -->
         
            <?php endwhile; } ?>

      </div>
    </div>
  </section>
  
  <?php  } ?>
  <!-- blog-section end -->

  <!-- footer-section start -->
  
  <?php include 'footer.php';
  

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



  <!-- main jquery library js file -->
 
  <?php include 'script.php'; ?>


  
	<?php
	if(isset($_SESSION['notification_session']) AND @$_SESSION['notification_session']=="on"){
		$con = $conn->query("SELECT * FROM `notification` WHERE dstatus='active'");
		if($con->num_rows>0):
			?>
	<script>
		$(document).ready(function(){
			$("#notification").modal('show');
		})
	</script>
<?php endif; }?>
    
	<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notification </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<?php
		$con = $conn->query("SELECT * FROM `notification` WHERE dstatus='active'");
		if($con->num_rows>0):
      $not = $con->fetch_assoc();
      
    endif;
			?>
			<h4><?php echo $not['dtitle']; ?> </h4>
			<p>
			<?php echo $not['ddesc']; ?>
			</p>
		
		<!-- <div class="box text-center"> <a href="#hide" class="btn btn-secondary ">Don't show me again</a>  </div> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="hideShow" type="button" data-dismiss="modals">Close</button>
          <!-- <div id="buttons">
          <button class="btn btn-primary"  name="requested" type="submit">Proceed</button>
          </div> -->
          <!-- </form> -->
        </div>
      </div>
    </div>
  </div>



<script>
$(document).ready(function(){
	$(document).on("click","#hideShow",function(){
		$.ajax({
            url:"ajax-session.php",
            method:"POST",
            data:{removeSession:1},
            success:function(){
                $("#notification").modal("hide"); 
            }

        })
	})
})
</script>




</body>


</html>