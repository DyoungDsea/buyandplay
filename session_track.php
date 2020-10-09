<?php
@session_start();
require 'config.php';
//track user login
if(!isset($_SESSION['user']) && $_SESSION['user'] != true){
    header("Location: login");
}
    //check if user really login account
    $idx = $conn->real_escape_string($_SESSION['userId']);
    $g = $conn->query("SELECT * FROM `members_register` WHERE userid='$idx'");
    if($g->num_rows == 0){
        header("Location: login");
    }
        $k = $g->fetch_assoc();
        $email = $k['demail'];
        $wallet_ = $k['dwallet_balance'];

?>