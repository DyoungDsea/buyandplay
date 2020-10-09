

<?php 

$get_id = clean($_GET['cat_id']);  
          
$game = $conn->query("SELECT * FROM `dgame_categories` WHERE dfee !=0 AND dstatus ='active' AND category_id='$get_id' ORDER BY dcategory"); 
if($game->num_rows>0){
    while($done = $game->fetch_assoc()):
        $cat_id = clean($done['category_id']);
        $odd =clean($done['dcategory']);
        ?>


      <?php //echo $idx;
      //get how many game to be won for free games
      if(isset($_SESSION['user']) AND @$_SESSION['user'] == true){
        $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved' AND dbooking_code.userid !='$idx' AND dbooking_code.dodd='$cat_id'  ORDER BY dstar_rating.dtotal DESC ");
      }else{
        $x = $conn->query("SELECT * FROM `dbooking_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dbooking_code.dodd WHERE dbooking_code.userid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dbooking_code.dodd AND dbooking_code.don_and_off ='on' AND dbooking_code.bstatus ='Approved'  AND dbooking_code.dodd='$cat_id' ORDER BY dstar_rating.dtotal DESC ");
      }

      if($x->num_rows>0):            
        while($r=$x->fetch_assoc()):
            // echo $r['dodd'].' '.$r['dtotal'].' '.$r['userid'].'<br>'; 

            $bronze = $conn->query("SELECT * FROM `dgeneral_booking` ");
            while($q = $bronze->fetch_assoc()):
            $won = clean($q['dgame_won']); 
            // echo $won = $q['dgame_won'].' '.$q['dstatus'].'<br>'; 
            
            if($q['dstatus'] =='gold' AND $q['dcat_id']==$r['dodd']){
                $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='5' "); 
                $ra = $ran->fetch_assoc();
                $price = formatNaira($ra['dprice']);
                if($r['dtotal'] >= $won ):?>
                    <div class="col-md-3">
              <div class="card mb-4">
                <div class="card-body text-center">
                <?php
                $uvp = $r['userid'];
                $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                  <p class="mt-1">Tipster:  <?php echo $vp['username']; ?></p>
                  <p><b><?php echo $r['dweb_name1']; ?> Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                  <p><b>Price:</b>  <?php echo $price; ?></p>
                
                  <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                      <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                  <?php  }else{
                    if($k['dvip']=='active'){?>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View Free</button>
                  <?php  }else{
                      //booking_id and user_id 
                      $booking_id = clean($r['booking_id']);
                      $user_id = clean($_SESSION['userId']);
                      $dmarket = $conn->query("SELECT dresult FROM `dgame_market` WHERE booking_id='$booking_id' AND user_id='$user_id' AND dresult='pending'");
                      if($dmarket->num_rows>0){ ?> 
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#buy<?php echo $r['booking_id'] ?>"> View Free</button>
                      <?php   }else{
                    ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                    
                   
                  <?php } } } ?>

                  <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">
                   <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                   </span>

                   <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                   </span>

                   <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo $odd ?>
                   </span>
                  
                </div>
              </div>
            </div>
                      <?php endif;
            }elseif($q['dstatus']=='silver'  AND $q['dcat_id']==$r['dodd']){
                $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='4' "); 
                $ra = $ran->fetch_assoc();
                $price3 = formatNaira($ra['dprice']);
                if($r['dtotal'] == $won ):?>
                    <div class="col-md-3">
              <div class="card mb-4">
                <div class="card-body text-center">
                <?php
                $uvp = $r['userid'];
                $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                  <p class="mt-1">Tipster:  <?php echo $vp['username']; ?></p>
                  <p><b><?php echo $r['dweb_name1']; ?> Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                  <p><b>Price:</b>  <?php echo $price3; ?></p>
                
                  <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                      <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                  <?php  }else{
                    if($k['dvip']=='active'){?>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View Free</button>
                  <?php  }else{
                      //booking_id and user_id 
                      $booking_id = clean($r['booking_id']);
                      $user_id = clean($_SESSION['userId']);
                      $dmarket = $conn->query("SELECT dresult FROM `dgame_market` WHERE booking_id='$booking_id' AND user_id='$user_id' AND dresult='pending'");
                      if($dmarket->num_rows>0){ ?> 
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#buy<?php echo $r['booking_id'] ?>"> View Free</button>
                      <?php   }else{
                    ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                    
                   
                  <?php } } } ?>

                  <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">
                   <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                   </span>

                   <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                   </span>

                   <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo $odd ?>
                   </span>
                  
                </div>
              </div>
            </div>
                      <?php endif;
            }elseif($q['dstatus']=='bronze'  AND $q['dcat_id']==$r['dodd']){
                $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='3' "); 
                $ra = $ran->fetch_assoc();
                $price = formatNaira($ra['dprice']);
                if($r['dtotal'] == $won ):?>
                    <div class="col-md-3">
              <div class="card mb-4">
                <div class="card-body text-center">
                <?php
                $uvp = $r['userid'];
                $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                  <p class="mt-1">Tipster:  <?php echo $vp['username']; ?></p>
                  <p><b><?php echo $r['dweb_name1']; ?> Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                  <p><b>Price:</b>  <?php echo $price; ?></p>
                
                  <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                      <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                  <?php  }else{
                    if($k['dvip']=='active'){?>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View Free</button>
                  <?php  }else{
                      //booking_id and user_id 
                      $booking_id = clean($r['booking_id']);
                      $user_id = clean($_SESSION['userId']);
                      $dmarket = $conn->query("SELECT dresult FROM `dgame_market` WHERE booking_id='$booking_id' AND user_id='$user_id' AND dresult='pending'");
                      if($dmarket->num_rows>0){ ?> 
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#buy<?php echo $r['booking_id'] ?>"> View Free</button>
                      <?php   }else{
                    ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                    
                   
                  <?php } } } ?>

                  <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">
                   <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                   </span>

                   <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                   </span>

                   <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo $odd ?>
                   </span>
                  
                </div>
              </div>
            </div>

                        <?php endif; 

            }elseif($q['dstatus']=='Free'  AND $q['dcat_id']==$r['dodd']){
                // echo $won = $q['dgame_won'].' '.$q['dstatus'].' '.$r['dtotal'].'<br>'; 
            if($r['dtotal'] <= $won ):?>
                <div class="col-md-3">
                <div class="card mb-3">
                  <div class="card-body text-center">
                  <?php
                  $uvp = $r['userid'];
                  $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                    <p class="mt-1">Tipster:  <?php echo $vp['username']; ?></p>
                  <p><b><?php echo $r['dweb_name1']; ?> Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                    <p><b>Price:</b>  Free</p>
                    <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                        <a href="login" class="btn btn-primary btn-sm">View Free</a>
                    <?php  }else{?>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View Free</button>
                    <?php } ?>
                    
                  <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>

                  <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                   </span>

                   <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                   <?php echo $odd ?>
                   </span>

                  </div>
                </div>
              </div>

                    <?php endif; }

        endwhile;
    endwhile;
    endif;



    endwhile;
}else{?>
    <div class="card">
        <div class="card-body">
            Please come back later
        </div>
    </div>
<?php    }

?>

