

        <div class="row">
          <?php //echo $idx;
          //get how many game to be won for free games
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
                //check the free game score
                $bronze = $conn->query("SELECT * FROM `dpool_bronze` WHERE dstatus='free'");
                $q = $bronze->fetch_assoc();
                $won = clean($q['dgame_won']);
                //check if the game fall under free.
                if($r['dtotal'] <= $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-3">
                    <div class="card-body text-center">
                    <?php
                    $uvp = $r['duserid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>

                      <p>  <?php echo $g['dpool']; ?></p>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View Free</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['pool_id'] ?>"> View Free</button>
                      <?php } ?>
                      
                    <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>

                    <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_time'])); ?>
                       </span>

                    </div>
                  </div>
                </div>
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dpool_silver` WHERE dstatus='free'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] <= $won ):?>
                  <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                    <?php
                    $uvp = $r['duserid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p>  <?php echo $g['dpool']; ?></p>
                      <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                          <a href="login" class="btn btn-primary btn-sm">View Free</a>
                      <?php  }else{?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['pool_id'] ?>"> View Free</button>
                      <?php } ?>
                    <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">Free</span>

                    <span class="buy" style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_time'])); ?>
                       </span>


                    </div>
                  </div>
                </div>
                <?php endif; }  endwhile; endif; ?>

        </div>
        
       