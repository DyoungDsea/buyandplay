
<?php 

// session_start();

require 'clean.php';
require 'function.php';
require 'all-tips-past.php';


$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

if(@$_SESSION['user']==true):
require 'session_track.php';
endif;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buy and Bet | All Tips</title>
  
 <?php include 'style.php'; ?>
</head>
<body>

  <!-- preloader start -->
  <!-- <div id="preloader"></div> -->
  <!-- preloader end -->

 <?php include 'header.php'; ?>
  <!--  header-section end  -->

  <section class="blog-details-section  padding-top-95x " style="margin:50px 0;">
    <div class="container">
      <div class="row justify-content-center bg-primaryz" style="">
          

        <div class="col-lg-12  bg-primaryx">  

        <div class="row">
        <div class="col-md-4">
          <div class="boxer">
                              <div class="card text-center ml-4 mb-3 p-3">
                                  <h4> All Tips <img src="https://www.tipstersportal.com/assets/img/match_grid_live_now.png" alt=""></h4>
                              </div>
          </div>
        </div>
        <div class="col-md-8"></div>
        </div>   


        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->



        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Free</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bronze</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Silver</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tabx" data-toggle="pill" href="#pills-contactx" role="tab" aria-controls="pills-contact" aria-selected="false">Gold</a>
        </li>

      </ul>
      <div class="tab-content" style="width:100%" id="pills-tabContent">
        <div class="tab-pane fade show active container-fliud"  id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        

        <div class="row">
          <?php //echo $idx;
          //get how many game to be won for free games
          if(isset($_SESSION['user']) AND @$_SESSION['user'] == true){
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved' AND dbooking_code.userid !='$idx'  ORDER BY dstar_rating.dtotal DESC ");
          }else{
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved'  ORDER BY dstar_rating.dtotal DESC ");
          }

          
          if($x->num_rows>0):            
            while($r=$x->fetch_assoc()):
             
              $category_id = clean($r['dodd']);
              $z = $conn->query("SELECT * FROM `dgame_categories` WHERE dstatus='active' AND category_id='$category_id' ");
              $g = $z->fetch_assoc();
              $odd =clean($g['dcategory']);
              if($g['dgame']=='bronze'){
                //check the free game score
                $bronze = $conn->query("SELECT * FROM `dbronze_odd` WHERE dstatus='free'");
                $q = $bronze->fetch_assoc();
                $won = clean($q['dgame_won']);
                //check if the game fall under free.
                if($r['dtotal'] <= $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View details</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php } ?>
                      
                    <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>
                    </div>
                  </div>
                </div>
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dsilver_odd` WHERE dstatus='free'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] <= $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View details</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php } ?>
                    <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>
                    </div>
                  </div>
                </div>
                <?php endif; }elseif($g['dgame']=='gold'){
                 //check gold condition for free game
                 $gold = $conn->query("SELECT * FROM `dgold_odd` WHERE dstatus='free'");
                 $q = $gold->fetch_assoc();
                 $won = clean($q['dgame_won']);
                 if($r['dtotal'] <= $won ):?>
                   <div class="col-md-3">
                   <div class="card mb-4">
                     <div class="card-body text-center">
                       <p class="mt-4">Category:  <?php echo $odd; ?></p>
                       <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                       <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View details</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php } ?>
                     <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>
                     </div>
                   </div>
                 </div>
                 <?php endif;  } endwhile; endif; ?>

        </div>
        
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        
        
        <div class="row">
          <?php 
          //get how many game to be won for free games
          
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='3' "); 
          $ra = $ran->fetch_assoc();
          $price = formatNaira($ra['dprice']);

          if(isset($_SESSION['user']) AND @$_SESSION['user'] == true){
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved' AND dbooking_code.userid !='$idx'  ORDER BY dstar_rating.dtotal DESC ");
          }else{
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved'  ORDER BY dstar_rating.dtotal DESC ");
          }

          if($x->num_rows>0):            
            while($r=$x->fetch_assoc()):
             
              $category_id = clean($r['dodd']);
              $z = $conn->query("SELECT * FROM `dgame_categories` WHERE dstatus='active' AND category_id='$category_id' ");
              $g = $z->fetch_assoc();
              $odd =clean($g['dcategory']);
                         
                      
              if($g['dgame']=='bronze'){
                //check the 3star game score
                $bronze = $conn->query("SELECT * FROM `dbronze_odd` WHERE dstatus='bronze'");
                $q = $bronze->fetch_assoc();
               $won = clean($q['dgame_won']);
                //check if the game fall under free.
                if($r['dtotal'] == $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                    </div>
                  </div>
                </div>
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dsilver_odd` WHERE dstatus='bronze'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] == $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                    </div>
                  </div>
                </div>
                <?php endif; }elseif($g['dgame']=='gold'){
                 //check gold condition for free game
                 $gold = $conn->query("SELECT * FROM `dgold_odd` WHERE dstatus='bronze'");
                 $q = $gold->fetch_assoc();
                 $won = clean($q['dgame_won']);
                 if($r['dtotal'] == $won ):?>
                   <div class="col-md-3">
                   <div class="card mb-4">
                     <div class="card-body text-center">
                       <p class="mt-4">Category:  <?php echo $odd; ?></p>
                       <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                       <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                     </div>
                   </div>
                 </div>
                 <?php endif;  } endwhile; endif; ?>

        </div>
        
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        

        <div class="row">
          <?php 
          //get how many game to be won for free games
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='4' "); 
          $ra = $ran->fetch_assoc();
          $price = formatNaira($ra['dprice']);

          if(isset($_SESSION['user']) AND @$_SESSION['user'] == true){
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved' AND dbooking_code.userid !='$idx'  ORDER BY dstar_rating.dtotal DESC ");
          }else{
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved'  ORDER BY dstar_rating.dtotal DESC ");
          }

          if($x->num_rows>0):            
            while($r=$x->fetch_assoc()):
             
              $category_id = clean($r['dodd']);
              $z = $conn->query("SELECT * FROM `dgame_categories` WHERE dstatus='active' AND category_id='$category_id' ");
              $g = $z->fetch_assoc();
              $odd =clean($g['dcategory']);
              if($g['dgame']=='bronze'){
                //check the 4star game score
                $bronze = $conn->query("SELECT * FROM `dbronze_odd` WHERE dstatus='silver'");
                $q = $bronze->fetch_assoc();
               $won = clean($q['dgame_won']);
                //check if the game fall under free.
                if($r['dtotal'] == $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                    </div>
                  </div>
                </div>
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dsilver_odd` WHERE dstatus='silver'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] == $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                    </div>
                  </div>
                </div>
                <?php endif; }elseif($g['dgame']=='gold'){
                 //check gold condition for free game
                 $gold = $conn->query("SELECT * FROM `dgold_odd` WHERE dstatus='silver'");
                 $q = $gold->fetch_assoc();
                 $won = clean($q['dgame_won']);
                 if($r['dtotal'] == $won ):?>
                   <div class="col-md-3">
                   <div class="card mb-4">
                     <div class="card-body text-center">
                       <p class="mt-4">Category:  <?php echo $odd; ?></p>
                       <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                       <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                     </div>
                   </div>
                 </div>
                 <?php endif;  } endwhile; endif; ?>

        </div>
        
        
        
        </div>
        <div class="tab-pane fade" id="pills-contactx" role="tabpanel" aria-labelledby="pills-contact-tabx">
        
       
        
        <div class="row">
          <?php 
          //get how many game to be won for free games
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='5' "); 
          $ra = $ran->fetch_assoc();
          $price =  formatNaira($ra['dprice']);

          if(isset($_SESSION['user']) AND @$_SESSION['user'] == true){
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved' AND dbooking_code.userid !='$idx'  ORDER BY dstar_rating.dtotal DESC ");
          }else{
            $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved'  ORDER BY dstar_rating.dtotal DESC ");
          }

          if($x->num_rows>0):            
            while($r=$x->fetch_assoc()):
             
              $category_id = clean($r['dodd']);
              $z = $conn->query("SELECT * FROM `dgame_categories` WHERE dstatus='active' AND category_id='$category_id' ");
              $g = $z->fetch_assoc();
              $odd =clean($g['dcategory']);
              if($g['dgame']=='bronze'){
                //check the 4star game score
                $bronze = $conn->query("SELECT * FROM `dbronze_odd` WHERE dstatus='gold'");
                $q = $bronze->fetch_assoc();
               $won = clean($q['dgame_won']);
                //check if the game fall under free.
                if($r['dtotal'] == $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                    </div>
                  </div>
                </div>
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dsilver_odd` WHERE dstatus='gold'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] == $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <p class="mt-4">Category:  <?php echo $odd; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                    </div>
                  </div>
                </div>
                <?php endif; }elseif($g['dgame']=='gold'){
                 //check gold condition for free game
                 $gold = $conn->query("SELECT * FROM `dgold_odd` WHERE dstatus='gold'");
                 $q = $gold->fetch_assoc();
                 $won = clean($q['dgame_won']);
                 if($r['dtotal'] == $won ):?>
                   <div class="col-md-3">
                   <div class="card mb-4">
                     <div class="card-body text-center">
                       <p class="mt-4">Category:  <?php echo $odd; ?></p>
                       <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                       <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                       
                      <?php } } ?>
                     </div>
                   </div>
                 </div>
                 <?php endif;  } endwhile; endif; ?>

        </div>
        
        
        </div>
      </div>


    </div>
    </div>
    </section>

      

  <!-- footer-section start -->
  
 <?php include 'footer.php'; ?>
  <!-- footer-section end -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

 
  <?php include 'script.php'; ?>
  <?php 
  
    if($k['dvip']=='active'){
      include 'modal-vip.php';
    }else{
    include 'modal.php';
    }
  
   ?>
</body>

</html>