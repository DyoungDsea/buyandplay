<?php

require 'clean.php';
$admin = clean($_SESSION['userid']);
//validate 
if($_SERVER["REQUEST_METHOD"]=="POST"):

    $sub = clean($_POST["sub"]);
    $sms = clean($_POST['sms']);
    $trans =clean($_POST['trans']);
    $user =clean($_POST['user']);
    $now = gmdate("Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));
    if(isset($_POST['send'])){        
          $go =  $conn->query("INSERT INTO `dmessaging` SET dsender ='$admin', dreceiver='$user', transid='$trans', dsubject='$sub', dmessage='$sms', dtime='$date' ");      

        if($go){
            $_SESSION['msgs']='Message sent';
            header("Location: read-message?userid=$user&trans=$trans");
        }else{
            $_SESSION['msg']='Message fail!';
            header("Location: read-message?userid=$user&trans=$trans");
        }

    }

endif;