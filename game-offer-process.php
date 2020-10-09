<?php
require 'clean.php';

if($_SERVER['REQUEST_METHOD']=="POST"):
    if(isset($_POST['load'])):

        $id = clean($_SESSION['userId']);
        $odd = clean($_POST['odd']);
        $code = clean($_POST['code']); // !empty($x['appr1']) ? clean($x['appr1']):NULL;
        // $code1 = !empty($_POST['code1'])? clean($_POST['code1']): NULL;
        // $code2 = !empty($_POST['code2'])? clean($_POST['code2']): NULL;
       

        

        $web = clean($_POST['web']);
        if(!empty($_POST['web'])){
            //get site information
            $x = $conn->query("SELECT * FROM `dweb_name` WHERE dweb_id='$web'")->fetch_assoc();
            $name = $x['name'];
            $site = $x['dwebsite'];
        }

        if(!empty($_POST['web1'])){
            $web1 = clean($_POST['web1']);
            //get site information
            $x1 = $conn->query("SELECT * FROM `dweb_name` WHERE dweb_id='$web1'")->fetch_assoc();
            $name1 = $x1['name'];
            $site1 = $x1['dwebsite'];
        }else{
            $web1 = NULL;
        }

        if(!empty($_POST['web2'])){
            $web2 = clean($_POST['web2']);
            //get site information
            $x2 = $conn->query("SELECT * FROM `dweb_name` WHERE dweb_id='$web2'")->fetch_assoc();
            $name2 = $x2['name'];
            $site2 = $x2['dwebsite'];
        }else{
            $web2 = NULL;
        }

        if(!empty($_POST['cweb2'])){
            $web23 = clean($_POST['cweb2']);
            //get site information
            $x23 = $conn->query("SELECT * FROM `dweb_name` WHERE dweb_id='$web23'")->fetch_assoc();
            $cname23 = $x23['name'];
            // $csite2 = $x2['dwebsite'];
        }
        // $web1 = !empty($_POST['web1'])? clean($_POST['web1']): NULL;
        $coupon = clean($_POST['coupon']);
        // $num = clean($_POST['num']);
        $start = clean($_POST['start']);
        $end = clean($_POST['end']);
        $final_date = date("Y-m-d h:i:sa", strtotime("$start $end"));
        $odd_num = clean($_POST['odd-num']);
        $bid = date("ymdhis").rand(10000, 99999);

        

        $sq = $conn->query("INSERT INTO `dbooking_code` SET userid='$id', booking_id='$bid', dcode='$code', dcode2='', dcode3='', dwebsite1='$site', dwebsite2='$site1', dwebsite3='$site2', dweb_name1='$name', dweb_name2='$name1', dweb_name3='$name2', dcoupon='$coupon', cweb_name='$cname23', daccumulator='NULL', dstart_game_time='$final_date', dodd='$odd', dtotal_odd='$odd_num' ");

        if($sq) {
            $_SESSION['msgs'] = "<p style='font-size:16px; color:white'>Game received</p>";            
            header("Location: game-offers");
        }
        else{
            $_SESSION['msg'] = "<p style='font-size:16px; color:white'>Oops! try again later</p>";
            header("Location: game-offers");
        }

    endif;

endif;