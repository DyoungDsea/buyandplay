<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['forget'])):
    $em = clean($_POST['email']);

        $x = $conn->query("SELECT * FROM `members_register` WHERE demail='$em'");
        if($x->num_rows>0){
            // $_SESSION['msgs'] = 'Oops! try again later';
            $r = $x->fetch_assoc();
            //send reset link to user email account
            $headers = "From: buyandbet.com\r\n";
            $headers .= "Reply-To: buyandbet.com\r\n";
            $headers .= "CC: buyandbet.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            $user = $r['userid'];
            $email = $r['demail'];
            $to = $em;
            $subject = "Buy and Bet Account Reset";
            $headers .= "Change Password";
            $message = "Dear ". $r['dname'].", follow this link to reset you password.\r\n";
            $message .="https://buyandbet.com/reset-password?id=$user&em=$email";
            mail($to, $subject, $headers, $message);

            // $_SESSION['user']=true;
            // $_SESSION['userId']=$id;
            $_SESSION['sms'] = '<p class="text-success my-3">Reset link has been sent to your email.</p>';
            header("Location: forgot-password");
        }else{
            $_SESSION['msg'] = 'Oops! try again later';
            header("Location: login");
        }
    


endif;
endif;