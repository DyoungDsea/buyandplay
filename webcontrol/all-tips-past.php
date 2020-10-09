<?php

$u = $conn->query("SELECT * FROM `dbooking_code` WHERE don_and_off='on'");
if($u->num_rows>0):
    while($p=$u->fetch_assoc()):
        $booking_id = clean($p['booking_id']);

        $close = strtotime(date('Y-m-d h:i:sa', strtotime($p['dstart_game_time']) ) );
        $nows = strtotime(date('Y-m-d h:i:sa'));

        if($close < $nows) {
                //update user accounts
                $conn->query("UPDATE `dbooking_code` SET don_and_off='off' WHERE  booking_id='$booking_id'");
            }
    endwhile;
endif;



