<?php

require 'clean.php';
$id = clean($_SESSION['userId']);

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['login'])):
    $old = md5(clean($_POST['old']));
    $pass = md5(clean($_POST['pass']));
    $cpass = md5(clean($_POST['cpass']));

    if($pass == $cpass){
        $x = $conn->query("SELECT * FROM `members_register` WHERE pword='$old' AND userid='$id' ");
        if($x->num_rows>0){
        //update pword
        $u = $conn->query("UPDATE `members_register` SET pword='$pass' WHERE userid='$id' ");
        if($u){
            $_SESSION['msgs']= "<p style='font-size:16px; color:white'>Password changed</p>";
            header("Location: change-password");
        }else{
            $_SESSION['msg']= "<p style='font-size:16px; color:white'>Fail!  try again later</p>";
            header("Location: change-password");
        }

        }else{
            $_SESSION['msg']= "<p style='font-size:16px; color:white'>Oops!  try again later</p>";
            header("Location: change-password");
        }
    
    }else{
        $_SESSION['msg']= "<p style='font-size:16px; color:white'>Oops! password not match</p>";
            header("Location: change-password");
    }

endif;
endif;