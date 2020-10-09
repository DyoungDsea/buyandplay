

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
                  <div class="card mb-3">
                    <div class="card-body text-center">
                    <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View Free</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View Free</button>
                      <?php } ?>
                      
                    <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>

                    <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                       </span>

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
                    <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View Free</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View Free</button>
                      <?php } ?>
                    <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">Free</span>

                    <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                       </span>


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
                     <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                       <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View Free</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['booking_id'] ?>"> View Free</button>
                      <?php } ?>
                     <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">Free</span>

                     <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_game_time'])); ?>
                       </span>

                     </div>
                   </div>
                 </div>
                 <?php endif;  } endwhile; endif; ?>

        </div>
        
       