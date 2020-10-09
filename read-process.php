<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
    if(isset($_POST['reply'])):

    $subject = clean($_POST['subject']);
    $trans = clean($_POST['trans']);
    $sms = clean($_POST['sms']);
    $user = clean($_SESSION['userId']);


        $x = $conn->query("INSERT INTO `dmessaging` SET dsender='$user', dreceiver='2147483647', dsubject='$subject', dmessage='$sms', transid='$trans'");
        if($x){
            $conn->query("INSERT INTO `dmessage_sent` SET dsender='$user', dreceiver='2147483647', dsubject='$subject', dmessage='$sms', transid='$trans'");
            $_SESSION['msgs'] = "<p style='font-size:16px; color:white'>Message received</p>";            
            header("Location: read-message?id=".$trans);
        }
        else{
            $_SESSION['msg'] = "<p style='font-size:16px; color:white'>Oops! try again later</p>";
            header("Location: read-message?id=".$trans);
        }


endif;
endif;
