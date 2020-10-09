<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['reset'])):
    $em = clean($_POST['em']);
    $id = clean($_POST['id']);
    $pass = md5(clean($_POST['pass']));
    $cpass = md5(clean($_POST['cpass']));
if($pass == $cpass){
        $x = $conn->query("UPDATE `members_register` SET pword='$pass' WHERE demail='$em' AND userid='$id'");
        if($x){
            // $_SESSION['msgs'] = 'Oops! try again later';
            
            $_SESSION['user']=true;
            $_SESSION['userId']=$id;
            header("Location: dashboard");
            $_SESSION['msgs'] = 'Password reset successfully';
        }else{
            $_SESSION['msg'] = 'Oops! try again later';
            header("Location: reset-password?id=".$id."&em=".$em);
        }
    
    }else{
        $_SESSION['msg'] = 'Oops! try again later';
        header("Location: reset-password?id=".$id."&em=".$em);
    }

endif;
endif;