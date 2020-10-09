        
        
        <?php //echo $idx;


            $z = $conn->query("SELECT * FROM `dpools` WHERE dstatus='active'");
            while($g = $z->fetch_assoc()):
            $odd =clean($g['dpool']);
            $category_id = clean($g['dcategory_ids']);

          //get how many game to be won for free games
          if(isset($_SESSION['user']) AND @$_SESSION['user'] == true){
            $x = $conn->query("SELECT * FROM `dpool_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dpool_code.dodd WHERE dpool_code.duserid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dpool_code.dodd AND dpool_code.don_and_off ='on' AND dpool_code.pstatus ='Approved' AND dpool_code.duserid !='$idx' AND dpool_code.dodd='$category_id'   ORDER BY dstar_rating.dtotal DESC ");
          }else{
            $x = $conn->query("SELECT * FROM `dpool_code` INNER JOIN `dstar_rating` ON dstar_rating.dcategory_id = dpool_code.dodd WHERE dpool_code.duserid= dstar_rating.duser_id AND dstar_rating.dcategory_id = dpool_code.dodd AND dpool_code.don_and_off ='on' AND dpool_code.pstatus ='Approved' AND dpool_code.dodd='$category_id' ORDER BY dstar_rating.dtotal DESC ");
          }

          
          if($x->num_rows>0):            
            while($r=$x->fetch_assoc()):
                $bronze = $conn->query("SELECT * FROM `dpool_general` ");
                while($q = $bronze->fetch_assoc()):
                $won = clean($q['dgame_won']); 
                
                    // echo $won = $q['dgame_won'].' '.$q['dstatus'].' '.$r['dtotal'].$q['dcategory'].'<br>'; 
                    $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='5' "); 
                    $ra = $ran->fetch_assoc();
                    $price = formatNaira($ra['dprice']);

                    if($q['dstatus']=='gold' AND $q['dcat_id']==$r['dodd']){
                        if($r['dtotal'] >= $won ):?>

                    <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                    <?php
                    $uvp = $r['duserid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-4">Tipster:  <?php echo $vp['username']; ?></p>
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
                          <a href="game_history?pool" class="btn btn-secondary btn-sm"> View </a>
                        <?php   }else{
                      ?>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['pool_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                      
                     
                    <?php } } } ?>

                    <span class="buy" style="position:absolute; background:red;color:white;top:0px; right:0px; padding:4px;font-size:11px; border-bottom-left-radius:8px">
                       <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                       </span>

                       <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_time'])); ?>
                       </span>

                       <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Category:</b>  <?php echo $odd ?>
                       </span>
                      
                    </div>
                  </div>
                </div>

                        <?php endif;
                    }elseif($q['dstatus']=='silver' AND $q['dcat_id']==$r['dodd']){
                        $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='4' "); 
                        $ra = $ran->fetch_assoc();
                        $price = formatNaira($ra['dprice']);
                        if($r['dtotal'] == $won ):?>

                    <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                    <?php
                    $uvp = $r['duserid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-1">Tipster:  <?php echo $vp['username']; ?></p>
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

                       <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_time'])); ?>
                       </span>

                       <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Category:</b>  <?php echo $odd ?>
                       </span>
                      
                    </div>
                  </div>
                </div>

                        <?php endif;

                }elseif($q['dstatus']=='bronze' AND $q['dcat_id']==$r['dodd']){
                    $ran = $conn->query("SELECT * FROM `ranking` WHERE dstar='3' "); 
                        $ra = $ran->fetch_assoc();
                        $price = formatNaira($ra['dprice']);
                    if($r['dtotal'] == $won ):?>

                    <div class="col-md-3">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                    <?php
                    $uvp = $r['duserid'];
                    $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                      <p class="mt-1">Tipster:  <?php echo $vp['username']; ?></p>
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
                          <a href="game_history?pool" class="btn btn-secondary btn-sm"> View </a>
                        <?php   }else{
                      ?>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['pool_id'] ?>"> <i class="fa fa-cart-arrow-down"></i> Buy Now</button>
                      
                     
                    <?php } } } ?>

                    <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_time'])); ?>
                       </span>

                       <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Category:</b>  <?php echo $odd ?>
                       </span>
                      
                    </div>
                  </div>
                </div>
                        <?php endif;
                }elseif($q['dstatus']=='Free' AND $q['dcat_id']==$r['dodd']){
                if($r['dtotal'] <= $won ):?>
                    <div class="col-md-3">
                    <div class="card mb-3">
                      <div class="card-body text-center">
                      <?php
                      $uvp = $r['duserid'];
                      $vp = $conn->query("SELECT username FROM `members_register` WHERE userid='$uvp'")->fetch_assoc(); ?>
                        <p class="mt-1">Tipster:  <?php echo $vp['username']; ?></p>  
                        <p>  <?php echo $g['dpool']; ?></p>
                        <p class="mt-1">Price:  Free</p>
                        <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true){?>
                            <a href="login" class="btn btn-primary btn-sm">View Free</a>
                        <?php  }else{?>
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $r['pool_id'] ?>"> View Free</button>
                        <?php } ?>
                        
                        <span class="buy mt-1" style="position:relative; background:#000044;color:white;bottom:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Expire:</b>  <?php echo date("d/m/Y h:i:sa",strtotime($r['dstart_time'])); ?>
                       </span>

                       <span class="buy " style="position:absolute; background:#000044;color:white;top:0px; left:0px; padding:4px;font-size:11px; border-bottom-left-radius:8pxx">
                       <b>Category:</b>  <?php echo $odd ?>
                       </span>
  
                      </div>
                    </div>
                  </div>
                <?php endif;
              }

                endwhile;
            endwhile;
        endif;
    endwhile;