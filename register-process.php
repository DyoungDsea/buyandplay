<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
    if(isset($_POST['go'])):

    $un = clean($_POST['uname']);
    $fn = clean($_POST['fname']);
    $em = clean($_POST['email']);
    $phone = clean($_POST['phone']);

    

    $address = clean($_POST['address']);
    $pass = md5(clean($_POST['pass']));
    $passs =clean($_POST['pass']);
    $cpass =md5(clean($_POST['cpass']));
    $code = clean($_POST['code']);
    $hide = clean($_POST['hide']);
    $id = clean(date("ymdhis"));

    if(!empty($_POST['check'])){
    //username check
    $user = $conn->query("SELECT * FROM `members_register` WHERE username='$un'");
    if($user->num_rows==0){
        $user = $un;

        //Email check
        $user = $conn->query("SELECT * FROM `members_register` WHERE demail='$em'");
        if($user->num_rows==0){
            $email = $em;
            $now = gmdate("Y-m-d H:i:s");
            $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

                if($pass == $cpass AND $code == $hide){
                    $x = $conn->query("INSERT INTO `members_register` SET username='$un', dname='$fn', demail='$em', dnumber='$phone', dob='$dob', address='$address', pword='$pass', date_registered='$date'");
                    if($x){
                        $idx = $conn->insert_id;
                        $xp = $id.$conn->insert_id;

                        $conn->query("UPDATE `members_register` SET userid='$xp' WHERE id='$idx'");
                        // $_SESSION['msgs'] = 'Oops! try again later';
                        $_SESSION['user']=true;
                        $_SESSION['userId']=$xp;
                        header("Location: dashboard");
            
                        //send details to user email
                        $to = $em;
                        $subject = "Buy and Bet account registration";
                        $header = "Registration Successful";
                        $message = "Dear ". $fn.", your account have been created successfully.";
                        $message .=" Your login details are: Email: ".$em.", password: ".$passs;
                        mail($to, $subject, $header, $message);
                    }
                }else{
                    $_SESSION['msg'] = 'Oops! try again later';
                    header("Location: register");
                }
            
           

        }else{
            $error = 'Email taken';
            $_SESSION['msg'] = 'Email already exist';
            header("Location: register");
        }

    }else{
        $error = 'Username taken';
        $_SESSION['msg'] = 'Username already exist';
        header("Location: register");
    }

}else{
        // $error = 'Username taken';
        $_SESSION['msg'] = 'Oops! something went wrong';
        header("Location: register");
    }

   


endif;
endif;