<?php
require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST['post'])){
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);

    // echo $pass.'<br> '.$cpass;
    // die();
    $funding =!empty($_POST['funding'])? clean($_POST['funding']).',': '';
    $withdrawal =!empty($_POST['withdrawal'])? clean($_POST['withdrawal']).',': '';

    $tips =!empty($_POST['tips'])? clean($_POST['tips']).',': '';
    $results =!empty($_POST['results'])? clean($_POST['results']).',': '';

    $mail =!empty($_POST['mail'])? clean($_POST['mail']).',': '';
    $tipster =!empty($_POST['tipster'])? clean($_POST['tipster']).',': '';
    $await =!empty($_POST['await'])? clean($_POST['await']).',': '';
    $games =!empty($_POST['games'])? clean($_POST['games']).',': '';

    $users =!empty($_POST['users'])? clean($_POST['users']).',': '';
    $blog =!empty($_POST['blog'])? clean($_POST['blog']).',': '';
    $ranking =!empty($_POST['ranking'])? clean($_POST['ranking']): '';

    $privileges = $funding.$withdrawal.$tips.$results.$mail.$tipster.$games.$await.$users.$blog.$ranking;

    $userid = clean($_POST['user']);

    //check if the password is the same
        $sql = $conn->query("UPDATE `admin_accounts` SET  dname='$name', demail='$email', dprivileges='$privileges' WHERE userid='$userid' ");
        if($sql){
            $_SESSION['msgs']='Updated successfully';
            header("Location: accounts");
        }else{
            $_SESSION['msg']='Oops! try again later';
            header("Location: accounts");
        }
    


    }
}

