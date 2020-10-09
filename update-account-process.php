<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
    if(isset($_POST['go'])):

    // $un = clean($_POST['uname']);
    // $fn = clean($_POST['fname']);
    // $em = clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $address = clean($_POST['address']);
    $id = clean($_SESSION['userId']);

    if(isset($id) && !empty($id)){
        $x = $conn->query("UPDATE `members_register` SET  dnumber='$phone', address='$address' WHERE userid='$id' ");
        if($x){
            $_SESSION['msgs'] = "<p style='font-size:16px; color:white'>Updated successful</p>";
            header("Location: update-account");
        }
    }else{
        $_SESSION['msg'] = "<p style='font-size:16px; color:white'>Oops! try again later</p>";
        header("Location: update-account");
    }


endif;
endif;