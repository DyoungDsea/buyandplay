<?php

require 'clean.php';
$admin = clean($_SESSION['userid']);
$trans =  date("ymdhis").rand(10000, 99999);
//validate 
if($_SERVER["REQUEST_METHOD"]=="POST"):

    $sub = clean($_POST["sub"]);
    $sms = clean($_POST['sms']);

    $now = gmdate("Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

    if(isset($_POST['users'])){
        //send message to all user
        $sql = $conn->query("SELECT * FROM `members_register`");
        while($row=$sql->fetch_assoc()){
            $to = clean($row['demail']);
            $user = clean($row['userid']);
            
            // mail($to, $sub, $sms);
          $go =  $conn->query("INSERT INTO `dmessaging` SET dsender ='$admin', dreceiver='$user', transid='$trans', dsubject='$sub', dmessage='$sms', dtime='$date' ");
        }

        if($go){
            $_SESSION['msgs']='Message sent';
            header("Location: inbox");
        }else{
            $_SESSION['msg']='Message fail!';
            header("Location: inbox");
        }

    }elseif(isset($_POST['Tipsters'])){
    //send message to all user
    $sql = $conn->query("SELECT * FROM `members_register` WHERE dcategory='Tipster'");
    while($row=$sql->fetch_assoc()){
        $to = clean($row['demail']);
        $user = clean($row['userid']);
        // mail($to, $sub, $sms);
    $go =  $conn->query("INSERT INTO `dmessaging` SET dsender ='$admin', dreceiver='$user', transid='$trans', dsubject='$sub', dmessage='$sms', dtime='$date' ");
        
    }
    if($go){
        $_SESSION['msgs']='Message sent';
        header("Location: inbox");
    }else{
        $_SESSION['msg']='Message fail!';
        header("Location: inbox");
    }
    }elseif(isset($_POST['send'])){        
        $email = clean($_POST['email']);
        $sql = $conn->query("SELECT * FROM `members_register` WHERE username='$email'");
        $row=$sql->fetch_assoc();
        $user = clean($row['userid']);
            // mail($to, $sub, $sms);
        $go =  $conn->query("INSERT INTO `dmessaging` SET dsender ='$admin', dreceiver='$user', transid='$trans', dsubject='$sub', dmessage='$sms' ");
            
        if($go){
            $_SESSION['msgs']='Message sent';
            header("Location: inbox");
        }else{
            $_SESSION['msg']='Message fail!';
            header("Location: inbox");
        }
        }


endif;

