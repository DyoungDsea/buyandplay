<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
    if(isset($_POST['load'])):

    $subject = clean($_POST['subject']);
    $sms = clean($_POST['sms']);
    $user = clean($_SESSION['userId']);

    $id = date("ymdhis").rand(10000, 99999);

        $x = $conn->query("INSERT INTO `dmessaging` SET dsender='$user', dreceiver='2147483647', dsubject='$subject', dmessage='$sms', transid='$id'");
        if($x){
            $conn->query("INSERT INTO `dmessage_sent` SET dsender='$user', dreceiver='2147483647', dsubject='$subject', dmessage='$sms', transid='$id'");
            $_SESSION['msgs'] = "<p style='font-size:16px; color:white'>Message received</p>";            
            header("Location: compose");
        }
        else{
            $_SESSION['msg'] = "<p style='font-size:16px; color:white'>Oops! try again later</p>";
            header("Location: compose");
        }


endif;
endif;

