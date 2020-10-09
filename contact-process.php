<?php

require 'clean.php';
require 'webname.php';
require 'webname.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['login'])){
        $email = clean($_POST['email']);
        $name = clean($_POST['name']);
        $phone = clean($_POST['phones']);
        $text = clean($_POST['text']);

        $hid = clean($_POST['hid']);
        $code = clean($_POST['code']);
        $id = date("siYhd");
        if($hid == $code){
            $frame = $name .' '.$email.' '. $text;
            mail($dweb_email, $phone, $frame);
            $_SESSION['msgs']='Message send successfully';
            header("Location:contact");
            
        }else{
            $_SESSION['msg']='Invalid anti-spam code';
            header("Location:contact");
        }

               

    }else{
        $_SESSION['msg']='Oops!, try again later';
        header("Location:contact");
    }
}