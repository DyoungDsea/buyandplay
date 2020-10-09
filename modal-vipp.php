



        <div class="row">
          <?php 
          //get how many game to be won for free games
          
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='3' "); 
          $ra = $ran->fetch_assoc();
          $price = formatNaira($ra['dprice']);
          $amount = (Float)$ra['dprice'] * 100;
          $amounts = (Float)$ra['dprice'];

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
                $silver = $conn->query("SELECT * FROM `dpool_bronze` WHERE dstatus='bronze'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                //check if the game fall under free.
                if($r['dtotal'] == $won ):?>
                 <div class="modal fade" id="exampleModal<?php echo $r['pool_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pool Details</h5>
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

                      <table class="table-bordered">
                          <tr>
                            <td ><b>Pool Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                          </tr>

                          <tr>
                            <td>Pool Code :  </td>
                            <td> <b><?php echo $r['dgames']; ?></b></td>
                            
                          </tr>

                         
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_time'])); ?></td>
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
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dpool_silver` WHERE dstatus='bronze'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] == $won ):?>
                  <div class="modal fade" id="exampleModal<?php echo $r['pool_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pool Details</h5>
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

                      <table class="table-bordered">
                          <tr>
                            <td ><b>Pool Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                          </tr>

                          <tr>
                            <td>Pool Code :  </td>
                            <td> <b><?php echo $r['dgames']; ?></b></td>
                            
                          </tr>

                         
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_time'])); ?></td>
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
                <?php endif; } endwhile; endif; ?>

        </div>








        
        <div class="row">
          <?php 
          //get how many game to be won for free games
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='4' "); 
          $ra = $ran->fetch_assoc();
          $price = formatNaira($ra['dprice']);
          $amount = (Float)$ra['dprice'] * 100;
          $amounts = (Float)$ra['dprice'];


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
                //check if the game fall under free.
                if($r['dtotal'] == $won ):?>
                   <div class="modal fade" id="exampleModal<?php echo $r['pool_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pool Details</h5>
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
                            <td ><b>Pool Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                          </tr>

                          <tr>
                            <td>Pool Code :  </td>
                            <td> <b><?php echo $r['dgames']; ?></b></td>
                            
                          </tr>

                         
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_time'])); ?></td>
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
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dpool_silver` WHERE dstatus='silver'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] == $won ):?>
                  <div class="modal fade" id="exampleModal<?php echo $r['pool_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pool Details</h5>
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
                            <td ><b>Pool Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                          </tr>

                          <tr>
                            <td>Pool Code :  </td>
                            <td> <b><?php echo $r['dgames']; ?></b></td>
                            
                          </tr>

                         
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_time'])); ?></td>
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
                <?php endif; } endwhile; endif; ?>

        </div>
        








         
        <div class="row">
          <?php 
          //get how many game to be won for free games
          $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='5' "); 
          $ra = $ran->fetch_assoc();
          $price =  formatNaira($ra['dprice']);
          $amount = (Float)$ra['dprice'] * 100;
          $amounts = (Float)$ra['dprice'];

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
              $silver = $conn->query("SELECT * FROM `dpool_bronze` WHERE dstatus='gold'");
              $q = $silver->fetch_assoc();
              $won = clean($q['dgame_won']);
                //check if the game fall under free.
                if($r['dtotal'] >= $won ):?>
                   <div class="modal fade" id="exampleModal<?php echo $r['pool_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pool Details</h5>
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
                            <td ><b>Pool Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                          </tr>

                          <tr>
                            <td>Pool Code :  </td>
                            <td> <b><?php echo $r['dgames']; ?></b></td>
                            
                          </tr>

                         
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_time'])); ?></td>
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
              <?php endif;  }elseif($g['dgame']=='silver'){
                //check silver condition for free game
                $silver = $conn->query("SELECT * FROM `dpool_silver` WHERE dstatus='gold'");
                $q = $silver->fetch_assoc();
                $won = clean($q['dgame_won']);
                if($r['dtotal'] >= $won ):?>
                  <div class="modal fade" id="exampleModal<?php echo $r['pool_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pool Details</h5>
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
                            <td ><b>Pool Category:</b></td>
                            <td ><?php echo $odd; ?></td>
                          </tr>

                          <tr>
                            <td>Pool Code :  </td>
                            <td> <b><?php echo $r['dgames']; ?></b></td>
                            
                          </tr>

                         
                          <tr>
                            <td><b>Date & Time:</b> </td>
                            <td colspan="2"> <?php echo date("d M Y h:ia", strtotime($r['dstart_time'])); ?></td>
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
                <?php endif; } endwhile; endif; ?>

        </div>