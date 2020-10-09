
<div class="small-query">
<nav class="navbar navbar-expand-lg bg-primarys mb-2">
<button class="navbar-toggler bg-primaryx" style="background:#000040" type="button" data-toggle="collapse" data-target="#navbarSupportedContented" aria-controls="navbarSupportedContented" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContented" >
            <ul class="navbar-navx main-menus nav-sided bg-primarys">
              <li ><a href="dashboard" style="font-size:20px;">Dashboard</a></li>
              <hr style="margin-bottom:3px; margin-top:-1px;">
                <li><a href="all-avaliable-games" style="font-size:20px;">All Avaliable Tips</a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="subscription" style="font-size:20px;">My Rankings</a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="game_history" style="font-size:20px;">My Bought Tips</a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <?php if($k['dcategory']=='Tipster'): ?>

                    <li>
                    <a class="btns" style="font-size:20px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Post New Tips <i class="fa fa-angle-down" style="float:right; margin-right:20px "></i> 
                    </a>
                    
                    </li>

                    <ul class="collapse" id="collapseExample">
                        <hr style="margin-top:-1px; margin-bottom:4px;">
                        <li><a href="tips" style="font-size:20px;">Sport Bet</a></li>
                        <hr style="margin-top:-1px; margin-bottom:4px;">
                        <li><a href="pool-tip" style="font-size:20px;">Pools</a></li>
                    </ul>


                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="game-offers" style="font-size:20px;"> My Posted Tips</a></li>
                <?php endif; ?>
                <!-- <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="#0" style="font-size:20px;">My Purchases</a></li> -->
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <?php $u = clean($_SESSION['userId']); $h = $conn->query("SELECT * FROM dmessaging WHERE dreceiver ='$u' AND dstatus='unread' ") ?>

                <li>
                <a class="btns" style="font-size:20px;" data-toggle="collapse" href="#collapseExamples" role="button" aria-expanded="false" aria-controls="collapseExamples">
                Messages <?php if($h->num_rows>0){echo '<span class="badge badge-danger">'.$h->num_rows.'</span>';}?> <i class="fa fa-angle-down" style="float:right; margin-right:20px "></i> </i> 
                </a>
                
                </li>

                <ul class="collapse" id="collapseExamples">
                    <li><a href="compose" style="font-size:20px;">Compose Message</a></li>
                        <hr style="margin-top:-1px; margin-bottom:4px;">
                    <li><a href="message" style="font-size:20px;">My Inbox</a></li>
                        <hr style="margin-top:-1px; margin-bottom:4px;">
                    <li><a href="sent-messages" style="font-size:20px;">Sent Messages</a></li>
                </ul>

                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="wallet-balance" style="font-size:20px;">Make Deposit </a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
                    <?php if($k['dcategory']=='Tipster' && $k['dvip']=='active' || $k['dcategory']=='Tipster' && $k['dvip']=='inactive' ||$k['dcategory']=='Punter' && $k['dvip']=='active' ){ ?>
                <li><a href="withdrawal-funds" style="font-size:20px;">Withdraw funds</a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="withdrawal-history" style="font-size:20px;">Withdrawal History</a></li>
                    <?php } ?>

                        <li><a href="transaction-history" style="font-size:20px;">Transaction History</a></li>
                   
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="update-account" style="font-size:20px;">Account Setting</a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="change-password" style="font-size:20px;">Change Password</a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
                <li><a href="logout_" style="font-size:20px;">Logout</a></li>
                <hr style="margin-top:-1px; margin-bottom:4px;">
              </ul>
              
              



</div>

</nav>
<div class="bot text-center mb-4" style="display:block">
              <a href="game-categories" class="btn btn-lgs btn-primary m-2"> Become A Tipster</a>
              <!-- <?php //if($k['dvip'] =='inactive'){?> -->
              <!-- <a href="vip-subscription" class="btn btn-lgs btn-success m-2"> Become A VIP</a> -->
              <!-- <?php //}else{ ?> -->
              <!-- <a href="vip-subscription" class="btn btn-lgs btn-success m-2"> Renew VIP Subscription</a> -->
              <!-- <?php //} ?> -->
              </div>




</div>


