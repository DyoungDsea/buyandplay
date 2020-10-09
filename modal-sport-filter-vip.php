

<?php 

        
$get_id = clean($_GET['cat_id']);  
          
$game = $conn->query("SELECT * FROM `dgame_categories` WHERE dfee !=0 AND dstatus ='active' AND category_id='$get_id' ORDER BY dcategory"); 
if($game->num_rows>0):
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
                $amounts = (Float)$ra['dprice'];
                if($r['dtotal'] >= $won ):?>
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

                      <div class="my-2 bg-warning p-2">
                        <b>Wallet Balance:</b> <?php echo formatNaira($wallet_); ?>
                      </div>
                     
                      
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>

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

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
                      <?php endif;
            }elseif($q['dstatus']=='silver'  AND $q['dcat_id']==$r['dodd']){
                $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='4' "); 
                $ra = $ran->fetch_assoc();
                $price = formatNaira($ra['dprice']);
                $amounts = (Float)$ra['dprice'];
                if($r['dtotal'] == $won ):?>
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

                      <div class="my-2 bg-warning p-2">
                        <b>Wallet Balance:</b> <?php echo formatNaira($wallet_); ?>
                      </div>
                      
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>

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

                     
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
                      <?php endif;
            }elseif($q['dstatus']=='bronze'  AND $q['dcat_id']==$r['dodd']){
                $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='3' "); 
                $ra = $ran->fetch_assoc();
                $price = formatNaira($ra['dprice']);
                $amounts = (Float)$ra['dprice'];
                if($r['dtotal'] == $won ):?>

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
                      <div class="my-2 bg-warning p-2">
                        <b>Wallet Balance:</b> <?php echo formatNaira($wallet_); ?>
                      </div>
                      
                      <div class="my-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>

                      <table class="table-bordered ">
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
                       
                      
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

                        <?php endif; 

            }elseif($q['dstatus']=='Free'  AND $q['dcat_id']==$r['dodd']){
                // echo $won = $q['dgame_won'].' '.$q['dstatus'].' '.$r['dtotal'].'<br>'; 
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


                    <?php endif; }

        endwhile;
    endwhile;
    endif;



    endwhile;
endif;

?>

