<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['login'])){
        $email = clean($_POST['email']);
        $sub = clean($_POST['sub']);
        $text = clean($_POST['text']);
        $hid = clean($_POST['hid']);
        $code = clean($_POST['code']);
        $id = date("siYhd");
        if($hid == $code){
            $don = $conn->query("INSERT INTO `dnewletter` SET demail='$email', dsubject='$sub', dtext='$text', news_id='$id' ");
            if($don){
                $_SESSION['msgs']='Message send successfully';
                header("Location:login");
            }else{
                $_SESSION['msg']='Oops!, try again later';
                header("Location:login");
            }
        }else{

        }

                $_SESSION['msg']='Invalid anti-spam code';
                header("Location:login");

    }
}