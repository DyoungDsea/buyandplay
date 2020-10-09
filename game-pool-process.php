<?php
require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
    if(isset($_POST['load'])){

        $id = clean($_SESSION['userId']);
        $odd = clean($_POST['odd']);
        $game = clean($_POST['game']);
        $week = clean($_POST['week']);
        $start = clean($_POST['start']);
        $end = clean($_POST['time']);
        $final_date = date("Y-m-d h:i:sa", strtotime("$start $end"));
        $bid = date("ymdhis").rand(10000, 99999);


// die();
        $sq = $conn->query("INSERT INTO `dpool_code` SET duserid='$id', pool_id='$bid', dstart_time='$final_date', dodd='$odd', dgames='$game', dweek='$week' ");

        if($sq) {
            $_SESSION['msgs'] = "<p style='font-size:16px; color:white'>Game received</p>";            
            header("Location: game-offers");
        }
        else{
            $_SESSION['msg'] = "<p style='font-size:16px; color:white'>Oops! try again later</p>";
            header("Location: game-offers");
        }



    }

endif;