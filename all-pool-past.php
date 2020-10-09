<?php

$u = $conn->query("SELECT * FROM `dpool_code` WHERE don_and_off='on'");
if($u->num_rows>0):
    while($p=$u->fetch_assoc()):
        $booking_id = clean($p['pool_id']);

        $close = strtotime(date('Y-m-d h:i:sa', strtotime($p['dstart_time']) ) );
        $nows = strtotime(date('Y-m-d h:i:sa'));

        if($nows > $close) {
                //update user accounts
                $conn->query("UPDATE `dpool_code` SET don_and_off='off' WHERE  pool_id='$booking_id'");
            }
    endwhile;
endif;

// die();