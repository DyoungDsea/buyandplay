
                        <?php  $priv = $rop['dprivileges'];
                            $exploded = explode(',', $priv);
                            //check staff accessibility
                            // if(in_array('Product', $exploded)){
                                ?>

<ul class="navi-acc" id="nav2">
                        
                        <li>
                            <a href="index" class="dashboard">Dashboard</a>
                        </li>
                       
                        <!-- <li>
                            <a href="accounts" class="layouts">Manage Accounts</a>                           
                        </li> -->
                        <?php  if(in_array('Funding Request', $exploded)){ ?>
                        <li>
                            <a href="#funding" class="layouts">Manage Funding Request</a>
                            <ul>
                                <li><a href="pending-funding">Pending Approval</a></li> 
                                <li><a href="approved-funding">Approved Request</a></li>
                                <li><a href="cancelled-funding">Cancelled Request</a></li>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php  if(in_array('Withdrawal Request', $exploded) || in_array('Awaiting Payment', $exploded)){ ?>
                        <li>
                            <a href="#withdrawal" class="layouts">Manage Withdrawal Request</a>
                            <ul>
                                <li><a href="pending-withdrawal">Pending Approval</a></li> 
                                <?php  if(in_array('Awaiting Payment', $exploded) ){ ?>
                                    <li><a href="awaiting-payment">Awaiting Payment</a></li> 
                                        <?php } ?>
                                <li><a href="paid">Paid Request</a></li>
                                <li><a href="cancelled">Rejected Request</a></li>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php  if(in_array('Tips', $exploded)){ ?>
                        <li>
                            <a href="#manageOffers" class="extras">Manage Tips</a>
                            <ul>


                            <li>
                                    <a href="#FootBalls" >Manage Sport Bet </a>

                                    <ul style="margin-top:-10px">
                                        <li><a href="manage-offers">Manage Pending Tips</a></li> 
                                        <li><a href="manage-rejected-game">Manage Rejected Tips</a></li>
                                    </ul>
                                </li>                             

                                <li>
                                    <a href="#Pools" >Manage Pools </a>

                                    <ul style="margin-top:-10px">
                                        <li><a href="manage-pool-offers">Manage Pending Pools</a></li> 
                                        <li><a href="manage-pool-rejected-game">Manage Rejected Pools</a></li> 
                                    </ul>
                                </li>

                            </ul>
                        </li>
                    <?php } ?>


                    <?php  if(in_array('Results', $exploded)){ ?>
                        <li>
                            <a href="#manageResults" class="extras">Manage Results</a>
                            <ul>


                                <li>
                                    <a href="#FootBalls" >Manage Sport Bet </a>

                                    <ul style="margin-top:-10px">
                                        <!-- <li><a href="manage-approve">Manage Approval</a></li>  -->                                       

                                        <?php 
                                    
                                    $re = $conn->query("SELECT * FROM `dgame_categories` WHERE dgame !='free' AND dstatus='active'");
                                    if($re->num_rows>0):
                                        while($catt=$re->fetch_assoc()):
                                    ?>
                                        <li><a href="manage-approve?category=<?php echo $catt['dcategory']; ?>&cat_id=<?php echo $catt['category_id']; ?>">Manage Approved  <?php echo $catt['dcategory']; ?></a></li>
                                        <?php endwhile; endif; ?>

                                        <li><a href="manage-won-game">View Won Tips</a></li>
                                        <li><a href="manage-lost-game">View Lost Tips</a></li>
                                    </ul>
                                </li>                             

                                <li>
                                    <a href="#Pools" >Manage Pools </a>

                                    <ul style="margin-top:-10px">
                                    <?php 
                                    
                                    $re = $conn->query("SELECT * FROM `dpools` WHERE dstatus ='active' ORDER BY dpool ");
                                    if($re->num_rows>0):
                                        while($catt=$re->fetch_assoc()):
                                    ?>
                                        <li><a href="manage-pool-approve?category=<?php echo $catt['dpool']; ?>&cat_id=<?php echo $catt['dcategory_ids']; ?>"> Approved  <?php echo $catt['dpool']; ?> Pools</a></li>
                                        <?php endwhile; endif; ?>
                                        <!-- <li><a href="manage-pool-approve">Manage Approved Pools</a></li> -->
                                        <li><a href="manage-pool-won-game">Manage Won Pools</a></li>
                                        <li><a href="manage-pool-lost-game">Manage Lost Pools</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
 <?php } ?>


 <?php  if(in_array('Tipster Registration', $exploded)){ ?>
                        <li>
                            <a href="#loginoptionsx" class="extras">Tipsters Registrations</a>
                            <ul>


                                <li>
                                    <a href="#FootBall" >Manage Sport Bet </a>

                                    <ul style="margin-top:-10px">
                                        <li><a href="manage-subscription" class="">Pending Registration</a></li>
                                        <li><a href="manage-subscription-active" class="">Active Tipsters</a></li>
                                        <li><a href="manage-subscription-suspended" class="">Suspended Tipsters</a></li>
                                    </ul>
                                </li>                             

                                <li>
                                    <a href="#Pools" >Manage Pools </a>

                                    <ul style="margin-top:-10px">
                                        <li><a href="manage-pool-subscription" class="">Pending Pools Registration</a></li>
                                        <li><a href="manage-pool-subscription-active" class="">Active Pools Tips</a></li>
                                        <li><a href="manage-subscription-pool-suspended" class="">Suspended Pools Tips</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

             <?php } ?>


             <?php  if(in_array('Tips', $exploded)){ ?>
                        <li>
                            <a href="#gameogg" class="ui-elements">Manage Game </a>
                            <ul>
                                <li><a href="manage-per-won" class="">Manage Percentage Won </a></li>
                                <li><a href="manage-per-lost" class="">Manage Percentage Refund </a></li>
                                <li><a href="manage-categories" class="">Manage Sport Bet Categories</a></li>
                                <li><a href="manage-pool-categories" class="">Manage Pools Categories</a></li>
                                <li><a href="manage-vip-sub">Manage VIP Categories </a></li>
                                <li>
                                        <a href="#SportBetCategories" >Manage Sport Bet  Ranking </a>

                                        <ul style="margin-top:-10px">
                                        <?php 
                                        $cat = $conn->query("SELECT * FROM `dgeneral_booking` WHERE dstatus !='Free' GROUP BY dcat_id ORDER BY dcategory");
                                        if($cat->num_rows>0):
                                            while($odd = $cat->fetch_assoc()): ?>
                                            <li><a href="manage-sport-odd?odd_id=<?php echo $odd['dcat_id']; ?>&category=<?php echo $odd['dcategory']; ?>">Manage <?php echo $odd['dcategory']; ?> </a></li> 
                                            <?php endwhile; endif; ?>
                                        </ul>
                                </li>

                                <li>
                                        <a href="#PoolsCategories" >Manage Pools Ranking </a>

                                        <ul style="margin-top:-10px">  
                                        <?php 
                                        $cats = $conn->query("SELECT * FROM `dpool_general` WHERE dstatus !='Free' GROUP BY dcat_id ORDER BY dcategory");
                                        if($cats->num_rows>0):
                                            while($odds = $cats->fetch_assoc()): ?>
                                            <li><a href="manage-pool-odd?odd_id=<?php echo $odds['dcat_id']; ?>&category=<?php echo $odds['dcategory']; ?>">Manage <?php echo $odds['dcategory']; ?> </a></li> 
                                            <?php endwhile; endif; ?>

                                        </ul>
                                </li>
                            </ul>
                        </li>
 <?php } ?>


 <?php  if(in_array('Users', $exploded)){ ?>
                        <li>
                            <a href="manage-users" class="loginoptions">Manage Users</a>
                        </li>
                     <?php } ?>


                     <?php  if(in_array('Blog', $exploded)){ ?>
                        <li>
                            <a href="manage-blog" class="ui-elements">Manage Blog</a>
                        </li>
                        <?php } ?>

                        

                        <?php  if(in_array('Ranking Fees', $exploded)){ ?>
                        <li>
                            <a href="manage-ranking" class="ui-elements"> Manage Ranking Price</a>
                        </li>
                        <?php } ?>

                        <?php  if(in_array('Mail', $exploded)){ ?>
                        <?php 
                                    $admin = clean(2147483647);
                                    $xx=$conn->query("SELECT * FROM dmessaging WHERE dreceiver='$admin' AND dstatus='unread'"); ?>
                        <li>
                            <a href="inbox" class="mailbox">Mailbox<span class="label label-custom1"><?php echo $xx->num_rows; ?></span></a>                           
                        </li>
                        <?php } ?>
                        <li>
                            <a href="logout" class="ui-elements">Logout</a>                           
                        </li>
                        
                    </ul>