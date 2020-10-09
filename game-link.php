                        
          <nav class="navbar navbar-expand-lg bg-primarys mb-5">
              <button class="navbar-toggler bg-primaryx" style="background:#000040" type="button" data-toggle="collapse" data-target="#navbarSupportedContented" aria-controls="navbarSupportedContented" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="menu-toggle"></span>
               </button>
               <div class="collapse navbar-collapse " id="navbarSupportedContented" >
                        <ul style="width:100%">

                        <li>
                          <a class="btns" style="font-size:20px;" data-toggle="collapse" href="#collapseExamples" role="button" aria-expanded="false" aria-controls="collapseExamples">Sport Bet <i class="fa fa-angle-down" style="float:right"></i> 
                          </a>
                          
                        </li>
                        <hr style="margin-top:-1px; margin-bottom:4px;">
                        <ul class="collapse" id="collapseExamples">
                        <?php 
                            $game = $conn->query("SELECT * FROM `dgame_categories` WHERE dfee !=0 AND dstatus ='active' ORDER BY dcategory"); 
                              if($game->num_rows>0):
                                  while($done = $game->fetch_assoc()):

                            ?>
                              <li class="active-sectionx" ><a href="forecast-sport-game?cat_id=<?php echo $done['category_id']; ?>&<?php echo $done['category_id']; ?>tyff<?php echo $done['category_id']; ?>fgf<?php echo $done['category_id']; ?>bhg<?php echo $done['category_id']; ?>nbhvgf<?php echo $done['category_id']; ?>ghjhyt<?php echo $done['category_id']; ?>" style="font-size:20px;"><?php echo $done['dcategory']; ?></a></li>              
                              <hr style="margin-top:-1px; margin-bottom:4px;">

                                  <?php endwhile; endif; ?>
                        </ul>

                          <!-- <li class="active-sectionx" ><a href="all-avaliable-games" style="font-size:20px;">Sport Bet</a></li>              
                            <hr style="margin-top:-1px; margin-bottom:4px;"> -->

                           
                            <li>
                              <a class="btns" style="font-size:20px;" data-toggle="collapse" href="#collapseExampless" role="button" aria-expanded="false" aria-controls="collapseExampless">Pools<i class="fa fa-angle-down" style="float:right"></i> 
                              </a>
                              
                            </li>
                            <hr style="margin-top:-1px; margin-bottom:4px;">
                            <ul class="collapse" id="collapseExampless">
                            <?php 
                                $game = $conn->query("SELECT * FROM `dpools` WHERE dstatus ='active' ORDER BY dpool"); 
                                  if($game->num_rows>0):
                                      while($done = $game->fetch_assoc()):

                                ?>
                                  <li class="active-sectionx" ><a href="forecast-pools-game?cat_id=<?php echo $done['dcategory_ids']; ?>&<?php echo $done['dcategory_ids']; ?>nhsy<?php echo $done['dcategory_ids']; ?>bgstr<?php echo $done['dcategory_ids']; ?>nkau<?php echo $done['dcategory_ids']; ?>" style="font-size:20px;"><?php echo $done['dpool']; ?>(Pools)</a></li>              
                                  <hr style="margin-top:-1px; margin-bottom:4px;">

                                      <?php endwhile; endif; ?>
                            </ul>

                                <!-- <li class="active-sectionx" ><a href="all-avaliable-pools" style="font-size:20px;">Pools</a></li>              
                            <hr style="margin-top:-1px; margin-bottom:4px;"> -->

                          
                          </ul>
                  </div>

          </nav>

