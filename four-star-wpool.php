
        
        <div class="row">
          <?php 
          //get how many game to be won for free games
          
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='4' "); 
          $ra = $ran->fetch_assoc();
          $price = formatNaira($ra['dprice']);

          if(isset($_SESSION['user']) AND @$_SESSION['user'] == true){
            $x = $conn->query("SELECT * FROM `dpool_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dpool_code.dodd WHERE dpool_code.duserid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dpool_code.dodd AND dpool_code.don_and_off ='on' AND dpool_code.pstatus ='Approved' AND dpool_code.duserid !='$idx'  ORDER BY dstar_rating.dtotal DESC ");
          }else{
            $x = $conn->query("SELECT * FROM `dpool_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dpool_code.dodd WHERE dpool_code.duserid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dpool_code.dodd AND dpool_code.don_and_off ='on' AND dpool_code.pstatus ='Approved'  ORDER BY dstar_rating.dtotal DESC ");
          }

          if($x->num_rows>0):            
            while($r=$x->fetch_assoc()):
             
                $category_id = clean($r['dodd']);
                $z = $conn->query("SELECT * FROM `dpools` WHERE dstatus='active' AND dcategory_ids='$category_id' ");
                $g = $z->fetch_assoc();
                $odd =clean($g['dpool']);
                if($g['dgame']=='bronze'){

                //check silver condition for 3star game
                $silver = $conn->query("SELECT * FROM `dpool_bronze` WHERE dstatus='silver'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                // echo $r['dcategory_id'].' '.$r['duser_id'].' '. $won.' '.$r['dtotal'];
                if($r['dtotal'] == $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                    <?php
                    $uvp = $r['duserid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p> <?php echo $odd; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                      <?php  }else{
                        if($k['dvip']=='active'){?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['pool_id'] ?>"> View Free</button>
                      <?php  }else{
                        //booking_id and user_id 
                        $booking_id = clean($r['pool_id']);
                        $user_id = clean($_SESSION['userId']);
                        $dmarket = $conn->query("SELECT dresult FROM `dgame_market` WHERE booking_id='$booking_id' AND user_id='$user_id' AND dresult='pending'");
                        if($dmarket->num_rows>0){ ?> 
                          <a href="game_history?pool" class="btn btn-secondary btn-sm"> View  </a>
                        <?php   }else{
                      ?>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['pool_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                      
                     
                    <?php } } } ?>

                    <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">
                       <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                       </span>

                       <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_time'])); ?>
                       </span>
                      
                    </div>
                  </div>
                </div>
                <?php endif; } endwhile; endif; ?>

        </div>

        