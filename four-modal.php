
        
        <div class="row">
          <?php 
          //get how many game to be won for free games
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='4' "); 
          $ra = $ran->fetch_assoc();
          $price = formatNaira($ra['dprice']);
          $amount = (Float)$ra['dprice'] * 100;
          $amounts = (Float)$ra['dprice'];


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
                   <div class="modal fade" id="exampleModal<?php echo $r['booking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body text-center">

                      <div class="my-2 bg-warning p-2">
                        <b>Wallet Balance:</b> <?php echo formatNaira($wallet_); ?>
                      </div>
                      <div class="mb-3 bg-danger p-2 ">
                        <p  style="color:white !important">By clicking on the proceed button below, <?php echo $price; ?> will be deducted from your wallet balance</p>
                      </div>
                      <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>

                      <form action="process" method="POST" >
                      <input type="hidden" name="id" value="<?php echo $r['booking_id'] ?>">
                      <input type="hidden" name="price" value="<?php echo $amounts ?>">
                      <input type="hidden" name="user" value="<?php echo $idx ?>">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                      </form>

                      <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dsilver_odd` WHERE dstatus='silver'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] == $won ):?>
                  <div class="modal fade" id="exampleModal<?php echo $r['booking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body text-center">


                      <div class="my-2 bg-warning p-2">
                        <b>Wallet Balance:</b> <?php echo formatNaira($wallet_); ?>
                      </div>
                      <div class="mb-3 bg-danger p-2 ">
                        <p  style="color:white !important">By clicking on the proceed button below, <?php echo $price; ?> will be deducted from your wallet balance</p>
                      </div>
                      <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>

                      <form action="process" method="POST" >
                      <input type="hidden" name="id" value="<?php echo $r['booking_id'] ?>">
                      <input type="hidden" name="price" value="<?php echo $amounts ?>">
                      <input type="hidden" name="user" value="<?php echo $idx ?>">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                      </form>

                      <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
                <?php endif; }elseif($g['dgame']=='gold'){
                 //check gold condition for free game
                 $gold = $conn->query("SELECT * FROM `dgold_odd` WHERE dstatus='silver'");
                 $q = $gold->fetch_assoc();
                 $won = clean($q['dgame_won']);
                 if($r['dtotal'] == $won ):?>
                   <div class="modal fade" id="exampleModal<?php echo $r['booking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body text-center">

                      <div class="my-2 bg-warning p-2">
                        <b>Wallet Balance:</b> <?php echo formatNaira($wallet_); ?>
                      </div>
                      <div class="mb-3 bg-danger p-2 ">
                        <p  style="color:white !important">By clicking on the proceed button below, <?php echo $price; ?> will be deducted from your wallet balance</p>
                      </div>
                      <?php
                    $uvp = $r['userid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Username:  <?php echo $vp['username']; ?></p>
                      <p><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></p>
                      <p><b>Price:</b>  <?php echo $price; ?></p>
                      
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>

                      <form action="process" method="POST" >
                      <input type="hidden" name="id" value="<?php echo $r['booking_id'] ?>">
                      <input type="hidden" name="price" value="<?php echo $amounts ?>">
                      <input type="hidden" name="user" value="<?php echo $idx ?>">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                      </form>

                      <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Buy</span>

                      
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
                 <?php endif;  } endwhile; endif; ?>

        </div>
        



