<?php

// require 'function.php';
// require 'clean.php';


//Check if VIP period is expired
//select all VIP where dvip is active and check if the date is pass or not
$u = $conn->query("SELECT * FROM `members_register` WHERE dvip='active'");
if($u->num_rows>0):
    while($p=$u->fetch_assoc()):
        $userid = clean($p['userid']);
        $vip = $conn->query("SELECT * FROM `dvip_account` WHERE duser_id='$userid' AND dstatus='active'");
        $r = $vip->fetch_assoc();
        // $close = ;

        $close = strtotime(date('Y-m-d h:i:s', strtotime($r['dclosing_date']) ) );
        $now = strtotime(date('Y-m-d h:i:s'));

        if($close < $now) {
                // echo 'date is in the past';
                //update user accounts
                $conn->query("UPDATE `members_register` SET dvip='inactive' WHERE  userid='$userid'");
                $conn->query("UPDATE `dvip_account` SET dstatus='inactive' WHERE  duser_id='$userid'");
                // echo 'Yes';
            }
    endwhile;
endif;


// all-tips-past.php

