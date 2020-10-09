
        <div class="row">
          <?php 
          //get how many game to be won for 5 games
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
                    <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>

                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                          
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                         //booking_id and user_id 
                         $booking_id = clean($r['booking_id']);
                         $user_id = clean($_SESSION['userId']);
                         $dmarket = $conn->query("SELECT dresult FROM `dgame_market` WHERE booking_id='$booking_id' AND user_id='$user_id' AND dresult='pending'");
                         if($dmarket->num_rows>0){ ?>
                          <a href="view-game?booking=<?php echo $r['booking_id'] ?>" class="btn btn-secondary btn-sm"> View details </a>
                         <?php   }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        
                       
                      <?php } } } ?>
                      <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        </span>
                        <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                       </span>
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
                    <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                         //booking_id and user_id 
                         $booking_id = clean($r['booking_id']);
                         $user_id = clean($_SESSION['userId']);
                         $dmarket = $conn->query("SELECT dresult FROM `dgame_market` WHERE booking_id='$booking_id' AND user_id='$user_id' AND dresult='pending'");
                         if($dmarket->num_rows>0){ ?>
                          <a href="view-game?booking=<?php echo $r['booking_id'] ?>" class="btn btn-secondary btn-sm"> View details </a>
                         <?php   }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                        
                       
                      <?php } } } ?>

                      <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        </span>
                        <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                       </span>
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
                     <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>

                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View details</button>
                      <?php  }else{
                         //booking_id and user_id 
                         $booking_id = clean($r['booking_id']);
                         $user_id = clean($_SESSION['userId']);
                         $dmarket = $conn->query("SELECT dresult FROM `dgame_market` WHERE booking_id='$booking_id' AND user_id='$user_id' AND dresult='pending'");
                         if($dmarket->num_rows>0){ ?>
                          <a href="view-game?booking=<?php echo $r['booking_id'] ?>" class="btn btn-secondary btn-sm"> View details </a>
                         <?php   }else{
                        ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>

                        

                      <?php } } }?>

                      <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        </span>
                        <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                       </span>
                     </div>
                   </div>
                 </div>
                 <?php endif;  } endwhile; endif; ?>

        </div>
        