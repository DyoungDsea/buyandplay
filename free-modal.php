

<div class="row">
          <?php 
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
                 

                <div class="modal fade" id="exampleModal<?php echo $r['booking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Game Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body text-center">
                      
                        <table class="table-bordered">
                          <tr>
                            <td ><b>Game Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                            <td><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></td>
                          </tr>

                          <tr>
                            <td>Booking Code 1:  </td>
                            <td> <b><?php echo $r['dcode']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite1']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name1']); ?> </a>
                            </td>
                          </tr>

                          <?php if(!empty( $r['dcode2'])):?>
                          <tr>
                            <td>Booking Code 2:  </td>
                            <td> <b><?php echo $r['dcode2']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite2']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name2']); ?> </a>
                            </td>
                          </tr>

                          <?php endif; ?>

                          <?php if(!empty( $r['dcode3'])):?>
                          <tr>
                            <td>Booking Code 3:  </td>
                            <td> <b><?php echo $r['dcode3']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite3']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name3']); ?> </a>
                            </td>
                          </tr>

                          <?php endif; ?>
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_game_time'])); ?></td>
                          </tr>

                        </table>
                       
                       
                      <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>
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
                $silver = $conn->query("SELECT * FROM `dsilver_odd` WHERE dstatus='free'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] <= $won ):?>
                   <div class="modal fade" id="exampleModal<?php echo $r['booking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Game Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body text-center">
                      
                        <table class="table-bordered">
                          <tr>
                            <td ><b>Game Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                            <td><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></td>
                          </tr>

                          <tr>
                            <td>Booking Code 1:  </td>
                            <td> <b><?php echo $r['dcode']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite1']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name1']); ?> </a>
                            </td>
                          </tr>

                          <?php if(!empty( $r['dcode2'])):?>
                          <tr>
                            <td>Booking Code 2:  </td>
                            <td> <b><?php echo $r['dcode2']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite2']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name2']); ?> </a>
                            </td>
                          </tr>

                          <?php endif; ?>

                          <?php if(!empty( $r['dcode3'])):?>
                          <tr>
                            <td>Booking Code 3:  </td>
                            <td> <b><?php echo $r['dcode3']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite3']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name3']); ?> </a>
                            </td>
                          </tr>

                          <?php endif; ?>
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_game_time'])); ?></td>
                          </tr>

                        </table>
                       
                       
                      <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>
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
                 $gold = $conn->query("SELECT * FROM `dgold_odd` WHERE dstatus='free'");
                 $q = $gold->fetch_assoc();
                 $won = clean($q['dgame_won']);
                 if($r['dtotal'] <= $won ):?>
                    <div class="modal fade" id="exampleModal<?php echo $r['booking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Game Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body text-center">
                      
                        <table class="table-bordered">
                          <tr>
                            <td ><b>Game Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                            <td><b>Odd:</b>  <?php echo $r['dtotal_odd']; ?></td>
                          </tr>

                          <tr>
                            <td>Booking Code 1:  </td>
                            <td> <b><?php echo $r['dcode']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite1']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name1']); ?> </a>
                            </td>
                          </tr>

                          <?php if(!empty( $r['dcode2'])):?>
                          <tr>
                            <td>Booking Code 2:  </td>
                            <td> <b><?php echo $r['dcode2']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite2']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name2']); ?> </a>
                            </td>
                          </tr>

                          <?php endif; ?>

                          <?php if(!empty( $r['dcode3'])):?>
                          <tr>
                            <td>Booking Code 3:  </td>
                            <td> <b><?php echo $r['dcode3']; ?></b></td>
                            <td>
                            <a href="<?php echo $r['dwebsite3']; ?>" target="_blank"  class="btn btn-sm btn-primary"><?php echo ucfirst($r['dweb_name3']); ?> </a>
                            </td>
                          </tr>

                          <?php endif; ?>
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_game_time'])); ?></td>
                          </tr>

                        </table>
                       
                       
                      <span class="free" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:12px; border-bottom-left-radius:8px">Free</span>
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

